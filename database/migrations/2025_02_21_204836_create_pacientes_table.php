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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('numero_documento', 15)->unique();
            $table->string('primer_nombre', 45);
            $table->string('segundo_nombre', 45)->nullable();
            $table->string('primer_apellido', 45);
            $table->string('segundo_apellido', 45)->nullable();
            $table->boolean('estado');

            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->unsignedBigInteger('genero_id')->nullable();
            // $table->unsignedBigInteger('departamento_id')->nullable(); // Se omite debido a que ya están relacionadas las entidades departamentos y municipios.
            $table->unsignedBigInteger('municipio_id')->nullable();

            $table->foreign('tipo_documento_id')
                ->references('id')
                ->on('tipo_documentos')
                ->onDelete('set null');

            $table->foreign('genero_id')
                ->references('id')
                ->on('generos')
                ->onDelete('set null');

            // $table->foreign('departamento_id')
            //     ->references('id')
            //     ->on('departamentos')
            //     ->onDelete('set null');

            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
                ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
