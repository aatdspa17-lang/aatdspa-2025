@extends('layouts.app')

@section('title', 'Formulário')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario2.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />
@endsection

@section('content')
<br><br><br><br>

<h1>
    <a href="{{ url('/formulario2') }}">
        <span class="material-symbols-outlined back-icon">arrow_back</span>
    </a>
    INSCRIÇÃO
</h1>

<section></section><br>

<div class="container">
    <div id="formularioTrabalho">
            <form method="POST" action="{{ route('formulario.formulario1.storeFormulario1') }}" id="registrationForm" enctype="multipart/form-data">
            @csrf
            <!-- Página 3: DADOS ACADÉMICOS -->
            <div class="form-page active" id="page1">
                <h2>DADOS ACADÉMICOS</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="curso" name="curso" placeholder="Curso *" required>
                    </div>
                     <div class="form-group">
                             <select name="classe" id="classe">
                                <option value="" selected>Selecione a sua classe </option>
                                <option value="10ª">10ª</option>
                                <option value="11ª">11ª</option>
                                <option value="12ª">12ª</option>
                                <option value="13ª">13ª</option>
                             </select>
                        </div>
                        <div class="form-group">
                            <input type="text" id="nome_da_instituicao" name="nome_da_instituicao" placeholder="Nome da instituição *" required>
                        </div> 
                    </div>
                    
                </div>
                <x-btn-back-next /> {{-- Chamada dos botões de voltar e avançar. --}}               
             
            </form>
        </div>

</div>

</div>

<script>
function mostrarFormulario(checkboxId, formId) {
    const checkbox = document.getElementById(checkboxId);
    const form = document.getElementById(formId);
    form.style.display = checkbox.checked ? "block" : "none";
}

// Botão voltar
document.getElementById('btnVoltar').addEventListener('click', () => {
    window.location.href = "{{ url('/formulario2') }}";
});
</script>

@endsection
