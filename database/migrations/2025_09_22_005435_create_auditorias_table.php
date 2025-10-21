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
        Schema::create('auditorias', function (Blueprint $table) {
            $table->id();
            $table->string('cod_auditoria')->unique();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->string('accion', 100); // subida, analisis, descarga_reporte, eliminacion
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('auditable_id')->nullable();
            $table->string('auditable_type')->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auditorias');
    }
};
