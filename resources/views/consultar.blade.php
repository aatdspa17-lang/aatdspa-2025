@extends('layouts.app')

@section('title', 'Consultar Pedido')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/consultar.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')


<br><br><br><br>


<div class="container">
    

    <section class="consulta-card">
        <div class="titulo">
            <span class="material-icons card-icon">search</span>
            <h2>Consultar Estado do Pedido</h2>
        </div>

        <form method="POST" action="{{ route('consultar.buscar') }}">
            @csrf
            <label for="tipoConsulta">Pesquisar por:</label>
            <select id="tipoConsulta" name="tipoConsulta">
                <option value="bi">Número de BI</option>
                <option value="id">Número de ID</option>
            </select>

            <input type="text" id="valorConsulta" name="valorConsulta" placeholder="Digite o número aqui..." required>

            <button type="submit" class="btn-consultar">
                <span class="material-icons">search</span> Consultar
            </button>
        </form>

        {{-- Mensagem de erro --}}
        @if(session('erro'))
            <p class="erro">❌ {{ session('erro') }}</p>
        @endif

        {{-- Resultado encontrado --}}
        <br>
        @if(session('dados'))
            @php $dados = session('dados'); @endphp

            @if($dados)
            <div class="dados">
                <h3>Dados do Candidato</h3>
                <p><strong>Nome:</strong> {{ $dados->nome ?? '—' }}</p>
                <p><strong>BI:</strong> {{ $dados->bi ?? '—' }}</p>
                <p><strong>Estado:</strong> {{ $dados->estado ?? '—' }}</p>

                @if(($dados->estado ?? '') === 'Carteira disponível' && !empty($dados->ficheiro_pdf))
                    <div class="botoes">
                        <a href="{{ asset('storage/carteiras/'.$dados->ficheiro_pdf) }}" class="btn-download" download>
                            <span class="material-icons">picture_as_pdf</span> Baixar Carteira (PDF)
                        </a>
                    </div>
                @endif
            </div>
            @endif
        @endif
    </section>
</div>
@endsection
