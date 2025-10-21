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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->id();
            $table->string('cod_imagen')->unique();
            $table->unsignedBigInteger('usuario_id');
            $table->string('nombre_original', 255);
            $table->string('ruta_almacenamiento', 255);
            $table->string('mime', 50)->nullable();
            $table->integer('tamano')->nullable();
            $table->enum('estado',['subida','en_cola','procesando','terminado','error'])->default('subida');
            $table->boolean('activo')->default(true);

            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
