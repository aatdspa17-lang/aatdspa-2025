@extends('layouts.app')

@section('title', 'Inscricao')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/inscricao.css') }}">
{{-- Google Material Icons --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
@endsection

@section('content')
   <div class="main-content">
        <h2>
            <a href="/">
                <span class="material-symbols-outlined back-icon">arrow_back</span>
            </a>
            INSCRIÇÃO
        </h2>

        <section></section><br>
    </div>

    <div class="h3">
        <h3>SELECIONAR A DIRECÇÃO</h3>
    </div>
    
    <div class="cards-section">
        <a href="formulario">
            <div class="card">
                <span class="material-icons">description</span>
                <h3>LICENÇA</h3>
            </div>
        </a>
        <a href="/formulario">
            <div class="card">
                <span class="material-icons">badge</span>
                <h3>CARTEIRA PROFISSIONAL</h3>
            </div>
        </a>
    </div>
    
    <div class="cards-section">
        <a href="formulario">
            <div class="card">
                <span class="material-icons">article</span>
                <h3>DECLARAÇÃO</h3>
            </div>
        </a>
        <a href="/formulario">
            <div class="card">
                <span class="material-icons">group_add</span>
                <h3>CADASTRAR MEMBRO</h3>
            </div>
        </a>
    </div><br><br><br>

@endsection