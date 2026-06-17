<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable('nombre', 'slug', 'icono', 'imagen', 'descripcion', 'subcategorias_usadas', 'servicios_usados', 'estado',)]
class Industria extends Model
{
    use HasFactory;

    protected $table = 'industrias';

    protected $casts = [
        'subcategorias_usadas' => 'array',
        'servicios_usados' => 'array',
        'estado' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($industria) {
            if (empty($industria->slug)) {
                $industria->slug = Str::slug($industria->nombre);
            }
        });

        static::updating(function ($industria) {
            if ($industria->isDirty('nombre') && !$industria->isDirty('slug')) {
                $industria->slug = Str::slug($industria->nombre);
            }
        });
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function subcategorias()
    {
        if (empty($this->subcategorias_usadas)) {
            return collect();
        }

        return Subcategoria::whereIn('id', $this->subcategorias_usadas)
            ->activos()
            ->orderBy('nombre')
            ->get();
    }

    public function servicios()
    {
        if (empty($this->servicios_usados)) {
            return collect();
        }

        return Servicio::whereIn('id', $this->servicios_usados)
            ->activos()
            ->orderBy('nombre')
            ->get();
    }

    public function getImagenUrlAttribute(): string
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : '';
    }

    public function getIconoUrlAttribute(): string
    {
        return $this->icono ? asset('storage/' . $this->icono) : '';
    }

    public function getSubcategoriasCountAttribute(): int
    {
        return count($this->subcategorias_usadas ?? []);
    }

    public function getServiciosCountAttribute(): int
    {
        return count($this->servicios_usados ?? []);
    }

    public function getUrlAttribute(): string
    {
        return route('industrias.show', $this->slug);
    }
}
