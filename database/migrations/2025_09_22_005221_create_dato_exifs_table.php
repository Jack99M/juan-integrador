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
        Schema::create('datos_exif', function (Blueprint $table) {
            $table->id();
            $table->string('cod_exif')->unique();
            $table->unsignedBigInteger('imagen_id');
            $table->string('fabricante_camara', 100)->nullable();
            $table->string('modelo_camara', 100)->nullable();
            $table->string('software', 100)->nullable();
            $table->timestamp('fecha_captura')->nullable();
            $table->json('datos_crudos')->nullable();
            $table->timestamps();

            $table->foreign('imagen_id')->references('id')->on('imagenes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_exif');
    }
};
