<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable('nombre', 'slug', 'descripcion', 'descripcion_corta', 'imagen', 'galeria', 'beneficios', 'estado',)]
class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';

    protected $casts = [
        'galeria' => 'array',
        'beneficios' => 'array',
        'estado' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($servicio) {
            if (empty($servicio->slug)) {
                $servicio->slug = Str::slug($servicio->nombre);
            }
        });

        static::updating(function ($servicio) {
            if ($servicio->isDirty('nombre') && !$servicio->isDirty('slug')) {
                $servicio->slug = Str::slug($servicio->nombre);
            }
        });
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function getImagenUrlAttribute(): string
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : '';
    }

    public function getGaleriaUrlsAttribute(): array
    {
        if (empty($this->galeria)) {
            return [];
        }

        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->galeria);
    }

    public function getBeneficiosFormateadosAttribute(): array
    {
        return $this->beneficios ?? [];
    }

    public function tieneGaleria(): bool
    {
        return !empty($this->galeria);
    }

    public function tieneBeneficios(): bool
    {
        return !empty($this->beneficios);
    }

    public function getUrlAttribute(): string
    {
        return route('servicios.show', $this->slug);
    }
}
