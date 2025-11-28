@extends('layouts.app')

@section('title', 'Formulario')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />
@endsection

@section('content')

<body>
    <br><br><br><br><h1><a href="/inscricao"><span class="material-symbols-outlined back-icon">arrow_back</span></a>INSCRIÇÃO</h1>

    <section></section><br>
<div class="container">
    
            <x-progress-bar /> {{-- chamada da barra de progresso --}}
    
            <section class="progress"></section><br>
    
            <form method="POST" action="{{ route('formulario.formulario1.storeFormulario1') }}" id="registrationForm" enctype="multipart/form-data">
                @csrf
                <!-- Página 1: Dados Pessoais -->
                <div class="form-page active" id="page1">
                    <h2>Dados Pessoais</h2>
    
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" id="nome" name="nome" placeholder="Nome completo *" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="curso" name="nascimento" placeholder="Curso *" required>
    
                              {{-- <label>Escolha ou escreva:
                            <input name="cargo" list="cargos" />
                            <datalist id="cargos">
                                <option value="Presidente">
                                <option value="Secretário">
                                <option value="Tesoureiro">
                            </datalist>
                            </label> --}}
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
                    </div>
    
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" id="bi" name="bi" placeholder="Nº de B.I ou Passaporte *" required>
                        </div>
    
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Email *" required>
                        </div>
    
                        <div class="form-group">
                            <input type="text" id="instituicao-de-ensino" name="universidade_escola" placeholder="Universidade /Escola *" required>
                        </div>
                    </div>
                    <div class="form-row " id="last-form-row">
                        <div class="form-group last-form">
                            <select id="nacionalidade" name="nacionalidade" required>
                                <option value="">Nacionalidade *</option>
                                <option value="">Selecione um país*</option>
                                <option value="África do Sul">África do Sul</option>
                                <option value="Argélia">Argélia</option>
                                <option value="Angola">Angola</option>
                                <option value="Benin">Benin</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Burquina Faso">Burquina Faso</option>
                                <option value="Burúndi">Burúndi</option>
                                <option value="Cabo Verde">Cabo Verde</option>
                                <option value="Camarões">Camarões</option>
                                <option value="Chade">Chade</option>
                                <option value="Comores">Comores</option>
                                <option value="Costa do Marfim">Costa do Marfim</option>
                                <option value="Djibuti">Djibuti</option>
                                <option value="Egito">Egito</option>
                                <option value="Eritreia">Eritreia</option>
                                <option value="Eswatini">Eswatini</option>
                                <option value="Etiópia">Etiópia</option>
                                <option value="Gabão">Gabão</option>
                                <option value="Gâmbia">Gâmbia</option>
                                <option value="Gana">Gana</option>
                                <option value="Guiné">Guiné</option>
                                <option value="Guiné-Bissau">Guiné-Bissau</option>
                                <option value="Guiné Equatorial">Guiné Equatorial</option>
                                <option value="Lesoto">Lesoto</option>
                                <option value="Libéria">Libéria</option>
                                <option value="Líbia">Líbia</option>
                                <option value="Madagáscar">Madagáscar</option>
                                <option value="Malaui">Malaui</option>
                                <option value="Mali">Mali</option>
                                <option value="Marrocos">Marrocos</option>
                                <option value="Maurício">Maurício</option>
                                <option value="Mauritânia">Mauritânia</option>
                                <option value="Moçambique">Moçambique</option>
                                <option value="Namíbia">Namíbia</option>
                                <option value="Níger">Níger</option>
                                <option value="Nigéria">Nigéria</option>
                                <option value="República Centro-Africana">República Centro-Africana</option>
                                <option value="República do Congo">República do Congo</option>
                                <option value="República Democrática do Congo">República Democrática do Congo</option>
                                <option value="Ruanda">Ruanda</option>
                                <option value="São Tomé e Príncipe">São Tomé e Príncipe</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Serra Leoa">Serra Leoa</option>
                                <option value="Somália">Somália</option>
                                <option value="Sudão">Sudão</option>
                                <option value="Sudão do Sul">Sudão do Sul</option>
                                <option value="Tanzânia">Tanzânia</option>
                                <option value="Togo">Togo</option>
                                <option value="Tunísia">Tunísia</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Zâmbia">Zâmbia</option>
                                <option value="Zimbábue">Zimbábue</option>
                            </select>
                    </div>
    
                    <div class="form-group last-form">
                        <input type="tel" id="telefone" name="telefone2" placeholder="Telefone *">
    
                     </div>
    
                    </div>
                </div>
    
                <x-btn-back-next /> {{-- Chamada dos botões de voltar e avançar. --}}
            </form>
        </div>
</div>

    <script>
        // Elementos do DOM
        const photoUpload = document.getElementById('photoUpload');
        const photoInput = document.getElementById('photoInput');
        const photoPreview = document.getElementById('photoPreview');
        const progressSteps = document.querySelectorAll('.progress-step');
        const form = document.getElementById('registrationForm');

        // Upload de foto
        photoUpload.addEventListener('click', () => {
            photoInput.click();
        });

        photoInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file && file.type.match('image.*')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    photoPreview.src = e.target.result;
                    photoPreview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });

        // Validações
        function validarBI(bi) {
            const regex = /^[0-9]{9}[A-Z]{2}[0-9]{3}$/;
            return regex.test(bi);
        }

        function validarTelefone(telefone) {
            const regex = /^(?:\+244)?9\d{8}$/;
            return regex.test(telefone);
        }

        function calcularIdade(nascimento) {
            const hoje = new Date();
            const nascimentoDate = new Date(nascimento);
            let idade = hoje.getFullYear() - nascimentoDate.getFullYear();
            const m = hoje.getMonth() - nascimentoDate.getMonth();
            if (m < 0 || (m === 0 && hoje.getDate() < nascimentoDate.getDate())) {
                idade--;
            }
            return idade;
        }

        function validarDatasBI(emissaoBI, validadeBI) {
            const hoje = new Date();
            const emissao = new Date(emissaoBI);
            const validade = new Date(validadeBI);
            if (emissao > hoje) return 'A data de emissão não pode ser no futuro.';
            if (validade <= hoje) return 'A data de validade deve ser maior que a data atual.';
            return null;
        }

        // Validação do formulário antes de enviar
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nome = document.getElementById('nome').value.trim();
            const bi = document.getElementById('bi').value.trim();
            const telefone = document.getElementById('telefone').value.trim();
            const dataNascimento = document.getElementById('nascimento').value;
            const dataEmissao = document.getElementById('emissaoBI').value;
            const dataValidade = document.getElementById('validadeBI').value;

            if (nome === '') {
                alert('Por favor, preencha seu nome completo.');
                return;
            }

            if (!validarBI(bi)) {
                alert('Número de B.I. inválido. Use o formato 000000000XX000.');
                return;
            }

            if (!validarTelefone(telefone)) {
                alert('Número de telefone inválido. Use 900000000 ou +244900000000.');
                return;
            }

            if (!dataNascimento) {
                alert('Por favor, informe sua data de nascimento.');
                return;
            }

            if (calcularIdade(dataNascimento) < 18) {
                alert('É necessário ter pelo menos 18 anos.');
                return;
            }

            if (!dataEmissao || !dataValidade) {
                alert('Informe as datas de emissão e validade do B.I.');
                return;
            }

            const erroDatas = validarDatasBI(dataEmissao, dataValidade);
            if (erroDatas) {
                alert(erroDatas);
                return;
            }

            // Se todas as validações passarem, envia o formulário
            this.submit();
        });

        // Botão voltar
        document.querySelector('.btn-back').addEventListener('click', function() {
            window.location.href = '/inscricao';
        });

        document.querySelectorAll('input[type="date"]').forEach(input => {
            input.addEventListener('change', () => {
                if (input.value) {
                    input.classList.add('filled');
                } else {
                    input.classList.remove('filled');
                }
            });
        });
    </script>
</body>
@endsection