@extends('layouts.app')

@section('title', 'Login')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/inscricao.css') }}">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
<main>
    <div id="login">
        <form action="{{ route('login.submit') }}" method="POST">
            @if ($errors->any())
                <div class="error-dialog">
                    <span class="material-icons">error</span>
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif

            @csrf
            <div class="input-with-icon">
                <i class="material-icons">person</i>
                <input type="email" name="email" id="email" required placeholder="Digite seu email">
            </div>
    
            <div class="input-with-icon">
                <i class="material-icons">lock</i>
                <input type="password" name="password" id="senha" required placeholder="Digite sua senha">
            </div>
    
            <input type="submit" value="ENTRAR" id="entrar">
        </form>

    </div>
    <div id="imagem">
        <img src="{{ asset('images/logo.jpeg') }}" class="slide active" alt="Imagem 1">
    </div>
</main>
@endsection