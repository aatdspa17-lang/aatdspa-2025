@extends('admin')

@section('content')
<head>
    <link rel="stylesheet" href="{{ asset('css/listar_tecnicos.css') }}">
</head>
<div class="content">
    <h2 style="margin-bottom: 20px;">Lista de Técnicos</h2>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Campo de pesquisa --}}
    <div class="search-box">
        <form method="GET" action="{{ route('tecnicos.indexs') }}">
            <input type="text" name="search" placeholder="Pesquisar por ID ou BI..." value="{{ request('search') }}">
            <button type="submit" class="btn-search">
                <span class="material-icons">search</span>
            </button>
        </form>
    </div>

    {{-- Tabela de técnicos --}}
    @if(count($tecnicos) > 0)
        <table class="styled-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Bilhete</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Especialidade</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tecnicos as $index => $tecnico)
                    <tr>
                        {{-- ID auto incremento simulado --}}
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tecnico['nome'] }}</td>
                        <td>{{ $tecnico['bi'] }}</td>
                        <td>{{ $tecnico['email'] }}</td>
                        <td>{{ $tecnico['telefone'] }}</td>
                        <td>{{ $tecnico['especialidade'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <a href="{{ route('tecnicos.reset') }}" class="btn-reset">Resetar Técnicos</a> --}}

                <!-- resetar todos os dados -->
        <div class="actions">
            <a href="{{ route('tecnicos.reset') }}" class="btn-reset">
                <span class="material-icons">delete</span> Resetar Dados
            </a>
        </div>

    @else
        <p class="no-data">Nenhum técnico cadastrado até agora.</p>
    @endif
</div>
@endsection
