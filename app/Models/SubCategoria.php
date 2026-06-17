<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

#[Fillable('categoria_id', 'nombre', 'slug', 'imagen', 'descripcion', 'descripcion_corta', 'marcas_disponibles', 'orden', 'estado')]
class SubCategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategoria';

    protected $casts = [
        'marcas_disponibles' => 'array',
        'orden'=> 'integer',
        'estado' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subcategoria) {
            if (empty($subcategoria->slug)) {
                $subcategoria->slug = Str::slug($subcategoria->nombre);
            }
        });

        static::updating(function ($subcategoria) {
            if ($subcategoria->isDirty('nombre') && !$subcategoria->isDirty('slug')) {
                $subcategoria->slug = Str::slug($subcategoria->nombre);
            }
        });
    }

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function scopeOrdenados($query)
    {
        return $query->orderBy('orden', 'asc')->orderBy('nombre', 'asc');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    public function detalles(): HasOne
    {
        return $this->hasOne(DetalleSubcategoria::class, 'subcategoria_id');
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

    public function tieneMarca(int $marcaId): bool
    {
        return in_array($marcaId, $this->marcas_disponibles ?? []);
    }

    public function getUrlAttribute(): string
    {
        return route('subcategorias.show', $this->slug);
    }
}
