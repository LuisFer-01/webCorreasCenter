<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable('nombre', 'direccion', 'telefono', 'whatsapp', 'email', 'horarios', 'mapa_incrustado', 'latitud', 'longitud', 'es_principal', 'estado',)]
class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursales';

    protected $casts = [
        'whatsapp' => 'array',
        'horarios' => 'array',
        'latitud' => 'decimal:7',
        'longitud' => 'decimal:7',
        'es_principal' => 'boolean',
        'estado' => 'boolean',
    ];

    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    public function scopePrincipales($query)
    {
        return $query->where('es_principal', true);
    }

    public function getWhatsappUrlAttribute(): string
    {
        if (empty($this->whatsapp)) {
            return '';
        }

        $numero = $this->whatsapp['numero'] ?? '';
        $mensaje = urlencode($this->whatsapp['mensaje_default'] ?? 'Hola, me gustaría obtener más información');

        return "https://wa.me/{$numero}?text={$mensaje}";
    }

    public function getHorariosFormateadosAttribute(): array
    {
        return $this->horarios ?? [];
    }

    public function getCoordenadasAttribute(): ?string
    {
        if ($this->latitud && $this->longitud) {
            return "{$this->latitud},{$this->longitud}";
        }

        return null;
    }

    public function getGoogleMapsUrlAttribute(): string
    {
        if ($this->latitud && $this->longitud) {
            return "https://www.google.com/maps?q={$this->latitud},{$this->longitud}";
        }

        return "https://www.google.com/maps/search/" . urlencode($this->direccion);
    }

    public function tieneCoordenadas(): bool
    {
        return !is_null($this->latitud) && !is_null($this->longitud);
    }

    public function tieneMapaIncrustado(): bool
    {
        return !empty($this->mapa_incrustado);
    }

    public function getTelefonoLlamadaAttribute(): string
    {
        return preg_replace('/[^0-9+]/', '', $this->telefono);
    }
}
