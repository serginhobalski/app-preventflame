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
        Schema::create('questoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prova_id');
            $table->string('categoria');
            $table->longText('descricao');
            $table->string('imagem')->nullable();
            $table->string('opcao_a')->nullable();
            $table->string('opcao_b')->nullable();
            $table->string('opcao_c')->nullable();
            $table->string('opcao_d')->nullable();
            $table->string('opcao_e')->nullable();
            $table->timestamps();

            // constraint
            $table->foreign('prova_id')->references('id')->on('provas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questoes');
    }
};
