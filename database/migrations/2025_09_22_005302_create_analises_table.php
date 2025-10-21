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
        Schema::create('analisis', function (Blueprint $table) {
            $table->id();
            $table->string('cod_analisis')->unique();
            $table->unsignedBigInteger('imagen_id');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->enum('resultado',['desconocido','limpia','sospechosa','manipulada'])->default('desconocido');
            $table->decimal('probabilidad', 5, 2)->nullable(); // 0.00 - 100.00 %
            $table->string('ruta_mapa_calor', 255)->nullable();
            $table->json('detalles')->nullable();
            $table->enum('estado',['en_cola','procesando','terminado','fallo'])->default('en_cola');
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
        Schema::dropIfExists('analisis');
    }
};
