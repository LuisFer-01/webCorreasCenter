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
        Schema::create('subcategoria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained()->restrictOnDelete();
            $table->string('nombre', 100)->unique();
            $table->string('slug')->unique(); // TODO: Se usara para la url de redireccionamiento para ver su detalle
            $table->string('imagen'); // TODO: Se usara tanto para la vista de detalle como para la vista de listado
            $table->text('descripcion'); // TODO: Se usara para mostrar la descripcion de la subcategoria en la vista de detalle
            $table->string('descripcion_corta')->nullable(); // TODO: Se usara para mostrar una descripcion corta de la subcategoria en la vista de listado
            $table->integer('orden')->default(0); // TODO: Se usará para ordenar las subcategorias en la vista de detalle de la categoria, ej: 1, 2, 3, etc.
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategoria');
    }
};
