@extends('layouts.app')

@section('title', 'OFA-home')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link rel="stylesheet" href="{{ asset('css/informacao.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />
@endsection

@section('content')

<br><br><br><br><h1><a href="/"><span class="material-symbols-outlined back-icon">arrow_back</span></a>INFORMAÇÃO</h1>

        <section></section><br>


    <section id="card-info">
        <p>
            Requisitos necessários para as inscrições dos membros nacionais e Solicitação de documentos.
        </p>
        <article>
            <div class="card-requisitos">
                <h3 id="primeiro">INSCRIÇÃO DE MEMBRO</h3>
                <ul>
                    <li>Preenchimento do formulário de inscrição</li>
                    <li>Fotografia tipo passe com fundo branco</li>
                    <li>Fotocópia do Bilhete de Identidade</li>
                    <li>Certificado de Habilitações nas áreas de diagnostico e terapêutica</li>
                    <li>Fotocópia da Declaração do INAREES</li>
                    <li>Diaspora - Anexar cópia do Passaporte nas páginas <br> com o visto, com o carimbo de saída de Angola e entrada no país de destino</li>
                    <li>Pagamento da inscrição (Jóia) é 12.000,00kz</li>
                </ul>
            </div>
            <div class="card-requisitos">
                <h3 id="segundo">SOLICITAÇÃO DE LICENÇA DE ESTÁGIO</h3>
                <ul>
                    <li>Preenchimento do formulário de inscrição</li>
                    <li>Fotografia tipo passe com fundo branco</li>
                    <li>Fotocópia do Bilhete de Identidade</li>
                    <li>Declaração de frequência (Técnico médio/Licenciado)</li>
                    <li>Pagamento: normal 12.000,00kz e urgente 15.000,00kz</li>
                </ul>
            </div>
        </article>
        {{-- 
            Remoevi o hr porque percebi que não havia necessidade de separar 
            como havia no site da ORDEPDITA.
        --}}
        <article>
            <div class="card-requisitos">
                <h3 id="terceiro">SOLICITAÇÃO DE  IDENTIDADE PROFISSIONAL </h3>
                <ul>
                    <li>Preenchimento do formulário de inscrição</li>
                    <li>Fotografia tipo passe com fundo branco</li>
                    <li>Fotocópia do Bilhete de Identidade</li>
                    <li>Certificado de habilitações literárias (Técnico médio/Licenciado)</li>
                    <li>Obs: para os licenciados o documento deve estar devidamente reconhecido pelo INAREES.</li>
                    <li>Pagamento: normal 12.000,00kz e urgente 15.000,00kz</li>
                </ul>
            </div>
        </article>
    </section> 
@endsection