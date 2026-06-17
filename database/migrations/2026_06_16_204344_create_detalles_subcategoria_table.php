<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_subcategorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subcategoria_id')->constrained('subcategoria')->restrictedOnDelete();
            $table->json('caracteristicas'); // TODO: Se usara para mostrar las caracteristicas principales de la subcategoria en la vista de detalle
            $table->json('gama_productos'); // TODO: Se usará para mostrar la gama de productos de la subcategoria con sus imagenes en la vista de detalle, en correas ej: Seccion A, seccion B, etc.
            $table->json('medidas_productos'); // TODO: Se usará para mostrar las medidas de los productos de la subcategoria en la vista de detalle ordenado por la gama de productos, un ejemplo aplicado a la subcategoria de correas en V: ancho superior en inches, espesor o grosor en inches, el angulo en grados (40º).
            $table->json('construccion'); // TODO: Se usará para mostrar la composicion de los productos de la subcategoria en la vista de detalle, un ejemplo aplicado a la subcategoria de correas en V: Caucho natural/SBR, cuerda de poliester, cubierta mezcla de algodon con poliester.
            $table->json('aplicaciones'); // TODO: Se usará para mostrar las aplicaciones de la subcategoria en la vista de detalle, con correas ej: Industria general, equipos de HVAC, césped y Jardín, Agricultura
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_subcategorias');
    }
};
