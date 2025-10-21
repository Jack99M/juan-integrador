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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('cod_reporte')->unique();
            $table->unsignedBigInteger('imagen_id');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->string('ruta_pdf', 255)->nullable();
            $table->json('reporte_json')->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();

            $table->foreign('imagen_id')->references('id')->on('imagenes')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
