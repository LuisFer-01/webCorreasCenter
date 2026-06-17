<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable('subcategoria_id', 'caracteristicas', 'gama_productos', 'medidas_productos', 'construccion', 'aplicaciones', 'estado',)]
class DetalleSubCategoria extends Model
{
    use HasFactory;

    protected $table = 'detalles_subcategorias';

    protected $casts = [
        'caracteristicas' => 'array',
        'gama_productos' => 'array',
        'medidas_productos' => 'array',
        'construccion' => 'array',
        'aplicaciones' => 'array',
        'estado' => 'boolean',
    ];

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function subcategoria(): BelongsTo
    {
        return $this->belongsTo(Subcategoria::class, 'subcategoria_id');
    }

    public function getCaracteristicasFormateadasAttribute(): array
    {
        return $this->caracteristicas ?? [];
    }

    public function getGamaProductosFormateadaAttribute(): array
    {
        return $this->gama_productos ?? [];
    }

    public function getMedidasProductosFormateadasAttribute(): array
    {
        return $this->medidas_productos ?? [];
    }

    public function getConstruccionFormateadaAttribute(): array
    {
        return $this->construccion ?? [];
    }

    public function getAplicacionesFormateadasAttribute(): array
    {
        return $this->aplicaciones ?? [];
    }

    public function tieneCaracteristicas(): bool
    {
        return !empty($this->caracteristicas);
    }

    public function tieneGamaProductos(): bool
    {
        return !empty($this->gama_productos);
    }

    public function tieneMedidas(): bool
    {
        return !empty($this->medidas_productos);
    }

    public function tieneConstruccion(): bool
    {
        return !empty($this->construccion);
    }

    public function tieneAplicaciones(): bool
    {
        return !empty($this->aplicaciones);
    }
}
