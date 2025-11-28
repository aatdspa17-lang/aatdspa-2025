<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa a criação da tabela candidatos.
     */
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();

            // Informações pessoais
            $table->string('nome_completo');
            $table->string('nacionalidade');
            $table->string('email')->unique();
            $table->string('telefone1');
            $table->string('telefone2');
            $table->string('bi');
            $table->date('data_nascimento');
            $table->string('genero');
            $table->string('perfil');          

            // Documentos e arquivos
            $table->string('bi_pdf');
            $table->string('declaracao')->nullable();
            $table->string('foto_png');
            $table->string('certificado_pdf');
            $table->string('comprovativo_pagamento_pdf')->nullable();
            $table->string('licenca_pdf')->nullable();
            $table->string('carteira_pdf')->nullable();

            // informações academica
            $table->string('escola');
            $table->string('curso');
            $table->string('classe');
            $table->string('area');

            // informações de trabalho
            $table->string('provincia_trabalho');
            $table->string('cargo');
            $table->string('sector');
        });
    }

    /**
     * Reverte a criação da tabela.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
