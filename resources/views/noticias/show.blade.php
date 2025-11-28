@extends('layouts.app')
@section('title', 'Notícia')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<section id="noticia-show">
    <div id="noticia-container">
        <div id="noticia-image">
            <img src="{{ asset('imagens/3.jpg') }}" alt="titulo notícia" class="imagem-media">
        </div>

        <div id="noticia-info">
            <h1>Titulo notícia</h1>
            <p>
                <strong>Autor:</strong> <span>Josimar Martins</span>
            </p>
            <p>
                <strong>Data:</strong> <span>16/11/2025</span>
            </p>
        </div>
    </div>
    <hr>
    <div id="content-news">
        <h2>Detalhes da notícia</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta cum quam amet expedita in impedit quae eaque maiores modi culpa vel quis asperiores, sint dolorem, possimus facere recusandae laudantium debitis?
        </p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta cum quam amet expedita in impedit quae eaque maiores modi culpa vel quis asperiores, sint dolorem, possimus facere recusandae laudantium debitis?
        </p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta cum quam amet expedita in impedit quae eaque maiores modi culpa vel quis asperiores, sint dolorem, possimus facere recusandae laudantium debitis?
        </p>
    </div>
</section>
@endsection