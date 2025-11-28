@extends('layouts.app')

@section('title', 'ORDEPDITA - Pagamento')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/pagamento.css') }}">
@endsection

@section('content')
<main class="pagamento-container">
    {{-- Formulário de pesquisa por BI --}}
    <div class="form-pagamento">
        <form method="POST" action="{{ route('pagamento.verificar') }}">
            @csrf
            <label for="bi">Digite o seu número de identificação</label>
            <input type="text" id="bi" name="bi" placeholder="Nº de B.I ou Passaporte*" required>
            <button type="submit">Verificar</button>
        </form>

        {{-- Mensagens de erro ou sucesso --}}
        @if(session('erro'))
            <p class="mensagem-erro">{{ session('erro') }}</p>
        @endif

        @if(session('sucesso'))
            <p class="mensagem-sucesso">{{ session('sucesso') }}</p>
        @endif
    </div>

    {{-- Exibir dados do candidato e upload --}}
    @if(isset($dados))
        <div class="dados">
            <h3>Dados do Candidato</h3>
            <ul>
                <li><strong>Nome:</strong> {{ $dados->nome ?? '—' }}</li>
                <li><strong>BI:</strong> {{ $dados->bi ?? '—' }}</li>
                <li><strong>Email:</strong> {{ $dados->email ?? '—' }}</li>
                <li><strong>Telefone:</strong> {{ $dados->telefone ?? '—' }}</li>
                <li><strong>Especialidade:</strong> {{ $dados->especialidade ?? '—' }}</li>
            </ul>

            <div class="upload-container">
                <form method="POST" action="{{ route('pagamento.comprovativo', $dados->id ?? 0) }}" enctype="multipart/form-data">
                    @csrf
                    <label for="comprovativo">Carregar Comprovativo de Pagamento (PDF, JPG, PNG):</label>
                    <input type="file" name="comprovativo" id="comprovativo" accept=".jpg,.jpeg,.png,.pdf" required>
                    <button type="submit">Enviar Comprovativo</button>
                </form>

                <p class="mensagem-info">
                    Após o envio, aguarde a validação do pagamento pela equipa da ORDEPDITA.
                </p>
            </div>
        </div>
    @endif
</main>
@endsection
