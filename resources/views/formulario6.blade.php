@extends('layouts.app')

@section('title', 'Formulario')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario6.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />

<style>
/* Estilos modais */
.modal { display: none; position: fixed; z-index: 999; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); justify-content: center; align-items: center; }
.modal-content { background: #fff; padding: 25px; border-radius: 10px; text-align: center; width: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.3); }
.progress-modal p { font-size: 18px; color: #333; }
.loader { border: 5px solid #f3f3f3; border-top: 5px solid #007bff; border-radius: 50%; width: 50px; height: 50px; margin: 15px auto; animation: spin 1s linear infinite; }
@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>
@endsection

@section('content')
<body>
<br><br><br><br>
<h1><a href="{{ url('/formulario4') }}"><span class="material-symbols-outlined back-icon">arrow_back</span></a>INSCRIÇÃO</h1>

<div class="container">
    <div class="progress-bar">
        <div class="progress-step"><div class="step-number">1</div><div class="step-label">Dados Pessoais</div></div>
        <div class="progress-step"><div class="step-number">2</div><div class="step-label">Dados Institucional</div></div>
        <div class="progress-step"><div class="step-number">3</div><div class="step-label">Dados Acadêmicos</div></div>
        <div class="progress-step"><div class="step-number">4</div><div class="step-label">Anexar Documentos</div></div>
        <div class="progress-step active"><div class="step-number">5</div><div class="step-label">Ficha de inscrição</div></div>
    </div>

    <h1 class="ficha_cobranca">Ficha de cobrança</h1>

    <div class="corpo">
        <div class="header">
            <img src="{{ asset('images/logo.jpg') }}" class="logo">
            <div class="org-info">
                <p><strong>ORDEM DOS TÉCNICOS SUPERIORES</strong></p>
                <p>DE DIAGNÓSTICO E TERAPÊUTICA DE ANGOLA</p>
            </div>
            <div class="billing-info">
                <p><strong>Nota de cobrança</strong></p>
                <p>I.D.: <strong>{{ $id }}</strong></p>
            </div>
        </div>

        <h3>Dados do candidato</h3>
        <p><strong>Nome:</strong> {{ $nome }}</p>
        <p><strong>Identificação:</strong> {{ $bi }}</p>

        <h3>Dados de candidatura</h3>
        <table class="tabela" width="90%">
            <thead>
                <tr>
                    <th>ÁREA</th>
                    <th>NÍVEL ACADÉMICO</th>
                    <th>CURSO</th>
                    <th>PROVÍNCIA</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $area }}</td>
                    <td>{{ $nivel }}</td>
                    <td>{{ $curso }}</td>
                    <td>{{ $provincia }}</td>
                </tr>
                <tr>
                    <td colspan="3"><strong>TOTAL A PAGAR</strong></td>
                    <td style="color:red;"><strong>{{ $total }}</strong></td>
                </tr>
            </tbody>
        </table>

        <div class="box">
            <div class="title">MÉTODO DE PAGAMENTO</div>
            <p>O pagamento deve ser feito exclusivamente por transferência bancária, através de ATM BANK ou MULTICAIXA EXPRESS:</p>
            <p class="cordenada">IBAN: <strong>{{ $iban }}</strong></p>
            <p class="cordenada">NOME: <strong>{{ $titular }}</strong></p>
        </div>
    </div>

    <div class="navigation">
        <button id="btnVoltar" class="btn btn-back">VOLTAR</button>
        <button id="btnEnviar" class="btn btn-next">ENVIAR</button>
    </div>
</div>

{{-- Modais --}}
<div class="modal" id="confirmModal">
    <div class="modal-content">
        <h3>Tem a certeza que deseja submeter a inscrição?</h3>
        <button id="confirmYes" class="btn btn-next">Sim</button>
        <button id="confirmNo" class="btn btn-back">Cancelar</button>
    </div>
</div>

<div class="modal" id="progressModal">
    <div class="modal-content progress-modal">
        <div class="loader"></div>
        <p>A processar a inscrição...</p>
    </div>
</div>

<div class="modal" id="successModal">
    <div class="modal-content">
        <h3>✅ Inscrição submetida com sucesso!</h3>
        <p>Será redirecionado em instantes...</p>
    </div>
</div>

<script>
const btnVoltar = document.getElementById('btnVoltar');
const btnEnviar = document.getElementById('btnEnviar');
const confirmModal = document.getElementById('confirmModal');
const progressModal = document.getElementById('progressModal');
const successModal = document.getElementById('successModal');
const confirmYes = document.getElementById('confirmYes');
const confirmNo = document.getElementById('confirmNo');

btnVoltar.addEventListener('click', () => {
    window.location.href = "{{ url('/formulario4') }}";
});

btnEnviar.addEventListener('click', () => {
    confirmModal.style.display = 'flex';
});

confirmNo.addEventListener('click', () => {
    confirmModal.style.display = 'none';
});

confirmYes.addEventListener('click', () => {
    confirmModal.style.display = 'none';
    progressModal.style.display = 'flex';

    fetch("{{ route('formulario.finalizar') }}", {
    method: "POST",
    headers: {
        "X-CSRF-TOKEN": "{{ csrf_token() }}",
        "Accept": "application/json",
        "Content-Type": "application/json"
    },
    body: JSON.stringify({}) // vazio, pois os dados vêm da sessão
})

    .then(res => res.json())
    .then(data => {
        progressModal.style.display = 'none';
        if (data.success) {
            successModal.style.display = 'flex';
            setTimeout(() => {
                window.location.href = "{{ url('/nota_cobranca/pdf/' . $id) }}";
            }, 3000);
        } else {
            alert("Ocorreu um erro ao submeter. Tente novamente!");
        }
    })
    .catch(err => {
        progressModal.style.display = 'none';
        alert("Erro de conexão com o servidor!");
        console.error(err);
    });
});
</script>
</body>
@endsection
