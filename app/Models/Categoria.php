<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable('nombre', 'slug', 'descripcion', 'icon', 'imagen', 'marcas_disponibles', 'orden', 'estado')]
class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $casts = [
        'marcas_disponibles' => 'array',
        'orden'=> 'integer',
        'estado' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($categoria) {
           if (empty($categoria->slug)) {
                $categoria->slug = Str::slug($categoria->nombre);
            }
        });

        static::updating(function ($categoria) {
            if ($categoria->isDirty('nombre') && !$categoria->isDirty('slug')) {
                $categoria->slug = Str::slug($categoria->nombre);
            }
        });
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function marcas(): BelongsToMany
    {
        return $this->belongsToMany(Marca::class, table: null, foreignPivotKey: 'categoria_id', relatedPivotKey: 'marca_id')
            ->using(function ($query) {
                // Como usamos JSON, necesitamos un approach diferente
                return $query;
            });
    }

    public function subcategorias(): HasMany
    {
        return $this->hasMany(SubCategoria::class, 'categoria_id');
    }

    public function subcategoriasActivas(): HasMany
    {
        return $this->subcategorias()->where('estado', true)->orderBy('orden');
    }

    public function getMarcasDisponiblesCollection()
    {
        if (empty($this->marcas_disponibles)) {
            return collect();
        }

        return Marca::whereIn('id', $this->marcas_disponibles)
            ->activos()
            ->get();
    }

    public function getImagenUrlAttribute(): string
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : '';
    }

    public function getIconUrlAttribute(): string
    {
        return $this->icon ? asset('storage/' . $this->icon) : '';
    }

    public function getSubcategoriasCountAttribute(): int
    {
        return $this->subcategoriasActivas()->count();
    }
}
