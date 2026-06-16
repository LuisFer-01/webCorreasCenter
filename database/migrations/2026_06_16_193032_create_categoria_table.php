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
        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique();
            $table->string('slug')->unique();
            $table->text('descripcion')->nullable();
            $table->string('icon')->nullable();
            $table->string('imagen')->nullable();
            $table->json('marcas_disponibles'); // TODO: Se usará para mostrar las marcas disponibles de la subcategoria con los logos de las marcas en la vista de detalle
            $table->integer('orden')->default(0);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria');
    }
};
