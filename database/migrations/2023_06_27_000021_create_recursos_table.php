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
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aula_id');
            $table->string('nome');
            $table->longText('descricao')->nullable();
            $table->string('tipo')->nullable();
            $table->string('link')->nullable();
            $table->string('codigo')->nullable();
            $table->string('imagem')->nullable();
            $table->string('anexo')->nullable();
            $table->timestamps();

            // constraint
            $table->foreign('aula_id')->references('id')->on('aulas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recursos');
    }
};
