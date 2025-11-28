@extends('layouts.app')

@section('title', 'Formulario')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario2.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />
@endsection

@section('content')

<body>
        <br><br><br><br><h1><a href="/formulario"><span class="material-symbols-outlined back-icon">arrow_back</span></a>INSCRIÇÃO</h1>

        <section></section><br>

    <div class="container">
        
        <x-progress-bar /> {{-- chamada da barra de progresso --}}
        
        <section class="progress"></section><br>

        <div id="formularioTrabalho">
            <form method="POST" action="{{ route('formulario.formulario1.storeFormulario1') }}" id="registrationForm" enctype="multipart/form-data">
            @csrf
            <!-- Página 1: Dados Pessoais -->
            <div class="form-page active" id="page1">
                <h2>Dados Institucionais</h2>
                
                <div class="form-row">
                    <div class="form-group">
                        <input type="text" id="local_de_trabalho" name="local_de_trabalho" placeholder="Nome do local de trabalho *" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="ocupacao_laboral" name="ocupacao_laboral" placeholder="Função que ocupa *" required>
                    </div>

                    <div class="form-group">
                        <input type="text" id="sector" name="sector" placeholder="Sector de atuação *" required>
                    </div>                    
                </div>
            
                <div class="form-row">
                   <div class="form-group">
                        <input type="email" id="email" name="email" placeholder="Email *" required>
                    </div>

                <div class="form-group">
                    <input type="tel" id="telefone" name="telefone2" placeholder="Telefone *">
                </div>
                <div class="form-group">
                    <select name="provincia" id="provincia">
                        <option value="" selected>Província</option>
                        <optgroup label="Norte">
                            <option value="Cabinda">Cabinda</option>
                            <option value="Zaire">Zaire</option>
                            <option value="Uíge">Uíge</option>
                            <option value="Lunda Norte">Lunda Norte</option>
                            <option value="Malanje">Malanje</option>
                        </optgroup>
                        <optgroup label="Centro">
                            <option value="Lunda Sul">Lunda Sul</option>
                            <option value="Bengo">Bengo</option>
                            <option value="Luanda">Luanda</option>
                            <option value="Cuanza Norte">Cuanza Norte</option>
                            <option value="Cuanza Sul">Cuanza Sul</option>
                            <option value="Bié">Bié</option>
                            <option value="Huambo">Huambo</option>
                        </optgroup>
                        <optgroup label="Sul">
                            <option value="Cuando Cubango">Cuando Cubango</option>
                            <option value="Cunene">Cunene</option>
                            <option value="Huíla">Huíla</option>
                            <option value="Namibe">Namibe</option>
                            <option value="Benguela">Benguela</option>
                            <option value="Moxico">Moxico</option>
                        </optgroup>
                    </select>
                </div>
                </div>
                <div class="form-row " id="last-form-row">
                    <div class="form-group last-form">
                       <select id="municipio" name="municipio" required>
                        <option value="" selected>Selecione o município</option>

                        <!-- LUANDA -->
                        <option value="Luanda">Luanda</option>
                        <option value="Viana">Viana</option>
                        <option value="Talatona">Talatona</option>
                        <option value="Belas">Belas</option>
                        <option value="Cazenga">Cazenga</option>
                        <option value="Cacuaco">Cacuaco</option>
                        <option value="Kilamba Kiaxi">Kilamba Kiaxi</option>

                        <!-- BENGUELA -->
                        <option value="Benguela">Benguela</option>
                        <option value="Lobito">Lobito</option>
                        <option value="Baía Farta">Baía Farta</option>

                        <!-- HUÍLA -->
                        <option value="Lubango">Lubango</option>
                        <option value="Humpata">Humpata</option>
                        <option value="Chibia">Chibia</option>

                        <!-- HUAMBO -->
                        <option value="Huambo">Huambo</option>
                        <option value="Caála">Caála</option>
                        <option value="Ekunha">Ekunha</option>

                        <!-- CABINDA -->
                        <option value="Cabinda">Cabinda</option>
                        <option value="Cacongo">Cacongo</option>

                        <!-- MALANJE -->
                        <option value="Malanje">Malanje</option>
                        <option value="Cacuso">Cacuso</option>

                        <!-- UÍGE -->
                        <option value="Uíge">Uíge</option>
                        <option value="Negage">Negage</option>

                        <!-- CUANZA SUL -->
                        <option value="Sumbe">Sumbe</option>
                        <option value="Porto Amboim">Porto Amboim</option>
                        <option value="Cela">Cela</option>

                        <!-- CUANZA NORTE -->
                        <option value="Ndalatando">Ndalatando</option>
                        <option value="Cazengo">Cazengo</option>

                        <!-- BENGO -->
                        <option value="Caxito">Caxito</option>
                    </select>


                </div>
                </div>
            </div>
            <x-btn-back-next /> {{-- Chamada dos botões de voltar e avançar. --}}
        </form>
    </div>
  
    <script>
    // Mostrar formulário institucional se o checkbox estiver marcado
   /*  function mostrarFormulario() {
        const checkbox = document.getElementById("trabalhaCheckbox");
        const form = document.getElementById("formularioTrabalho");
        form.style.display = checkbox.checked ? "block" : "block";
    }
*/
    // Ações dos botões VOLTAR e SEGUINTE
    document.getElementById('btnVoltar').addEventListener('click', () => {
        window.location.href = "{{ url('/formulario') }}";
    });

    document.getElementById('btnSeguinte').addEventListener('click', () => {
        window.location.href = "{{ url('/formulario3') }}";
    }); 

    </script>
</body>

@endsection