<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;

    protected $table = 'candidatos';

    protected $fillable = [
        'nome_completo',
        'nacionalidade',
        'email',
        'telefone1',
        'telefone2',
        'bi',
        'data_nascimento',
        'genero',
        'perfil',
        'bi_pdf',
        'declaracao',
        'foto_png',
        'certificado_pdf',
        'comprovativo_pagamento_pdf',
        'licenca_pdf',
        'carteira_pdf',
        'escola',
        'curso',
        'classe',
        'area',
        'provincia_trabalho',
        'cargo',
        'sector',
    ];
}
