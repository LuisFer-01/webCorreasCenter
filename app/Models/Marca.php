<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

#[Fillable('nombre', 'slug', 'logo', 'descripcion', 'sitio_web', 'estado',)]
class Marca extends Model
{
    use HasFactory;

    protected $table = 'marcas';

    protected $casts = [
        'estado' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($marca) {
            if (empty($marca->slug)) {
                $marca->slug = Str::slug($marca->nombre);
            }
        });

        static::updating(function ($marca) {
            if ($marca->isDirty('nombre') && !$marca->isDirty('slug')) {
                $marca->slug = Str::slug($marca->nombre);
            }
        });
    }

    public function subcategorias(): HasMany
    {
        return $this->hasMany(Subcategoria::class);
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class);
    }

    public function getLogoUrlAttribute(): string
    {
        return asset('storage/' . $this->logo);
    }
}
