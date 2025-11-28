@extends('layouts.app')

@section('title', 'Formulario')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario4.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />

@endsection

@section('content')

<body>
    <br><br><br><br><h1><a href="/formulario3"><span class="material-symbols-outlined back-icon">arrow_back</span></a>INSCRIÇÃO</h1>

    <section></section><br>

    <div class="container">
        
        <br><br><div class="progress-bar">
            <div class="progress-step">
                <div class="step-number">1</div>
                <div class="step-label">Dados Pessoais</div>
            </div>
            <div class="progress-step">
                <div class="step-number">2</div>
                <div class="step-label">Dados Institucional</div>
            </div>
            <div class="progress-step">
                <div class="step-number">3</div>
                <div class="step-label">Dados Acadêmicos</div>
            </div>
            <div class="progress-step active">
                <div class="step-number">4</div>
                <div class="step-label">Anexar Documentos</div>
            </div>
            <div class="progress-step">
                <div class="step-number">5</div>
                <div class="step-label">Pagamento</div>
            </div>
        </div>
        
        <section class="progress"></section><br>

        <h1 class="anexar">Anexar Documentos</h1>
        <p id="ficheiro">Ficheiro permitido: PDF (tamanho máximo: 2mb)</p>

        <div class="upload-container">
            <label for="bi_pdf" class="custom-upload">
                <img src="{{ asset('fotos/upload-file.png') }}" alt="Upload" class="upload-icon-img">
                <span class="upload-text">B.I.</span>
                <div id="bi_file_preview" class="file-preview-container"></div>
                <input type="file" name="bi_pdf" id="bi_pdf" accept="application/pdf">
            </label>



            <label for="inarees_pdf" class="custom-upload">
                <img src="{{ asset('fotos/upload-file.png') }}" alt="Upload" class="upload-icon-img">
                <span class="upload-text">Declaração do INAREES</span>
                <div id="inarees_file_preview" class="file-preview-container"></div>
                <input type="file" name="inarees_pdf" id="inarees_pdf" accept="application/pdf">
            </label>

            <label for="diploma_pdf" class="custom-upload">
                <img src="{{ asset('fotos/upload-file.png') }}" alt="Upload" class="upload-icon-img">
                <span class="upload-text">Diploma ou Certificado</span>
                <div id="diploma_file_preview" class="file-preview-container"></div>
                <input type="file" name="diploma_pdf" id="diploma_pdf" accept="application/pdf">
            </label>
        </div>

        <h3 id="nota">Nota: Os documentos a anexar ao processo devem estar traduzidos na Língua Portuguesa.<br>TERMO DE COMPROMISSO</h3>

        <div class="verificar">
            <label class="checkbox-container">
                <input type="checkbox" id="trabalhaCheckbox" onchange="mostrarFormulario()">
                <span class="checkmark">
                    <span class="material-icons">check</span>
                </span>
                <p>Eu declaro, sob minha inteira responsabilidade e para todos os fins de direito, que os documentos enviados por meio desta plataforma são legítimos e completos em sua totalidade.<br><br>Assumo por meio de este Termo de Compromisso dar fé, diante das autoridades públicas e/ou Privadas, que os documentos submetidos são irrepreensíveis na sua íntegra.</p>
            </label>
        </div>

        <div class="navigation">
            <button id="btnVoltar" class="btn btn-back">VOLTAR</button>
            <button id="btnSeguinte" class="btn btn-next">SEGUINTE</button>
        </div>
    </div>

    <script>
        // Configuração para mostrar o preview do arquivo DENTRO do container
        document.addEventListener('DOMContentLoaded', function() {
            // Função para todos os inputs
            function setupFileInput(inputId, previewId) {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(previewId);
                
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    
                    if (file) {
                        // Verifica se é PDF
                        if (file.type !== 'application/pdf') {
                            alert('Por favor, selecione um arquivo PDF.');
                            this.value = '';
                            preview.style.display = 'none';
                            return;
                        }
                        
                        // Verifica o tamanho (2MB máximo)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('O arquivo é muito grande. Tamanho máximo permitido: 2MB.');
                            this.value = '';
                            preview.style.display = 'none';
                            return;
                        }
                        
                        // Cria URL para o arquivo
                        const fileUrl = URL.createObjectURL(file);
                        
                        // Atualiza o preview
                        preview.innerHTML = `
                            <a href="${fileUrl}" class="file-preview-link" target="_blank" title="Abrir PDF">
                                <span class="material-icons">picture_as_pdf</span>
                                ${file.name}
                            </a>
                            <span class="material-icons delete-file" 
                                  onclick="event.stopPropagation(); removeFile('${inputId}', '${previewId}')">
                                delete
                            </span>
                        `;
                        preview.style.display = 'flex';
                    } else {
                        preview.style.display = 'none';
                    }
                });
            }
            
            // Configura todos os inputs
            setupFileInput('bi_pdf', 'bi_file_preview');
            setupFileInput('inarees_pdf', 'inarees_file_preview');
            setupFileInput('diploma_pdf', 'diploma_file_preview');
        });
        
        // Função global para remover arquivo
        function removeFile(inputId, previewId) {
            document.getElementById(inputId).value = '';
            document.getElementById(previewId).style.display = 'none';
            document.getElementById(previewId).innerHTML = '';
        }



         // Verifica se há arquivos carregados
    function hasUploadedFiles() {
        const inputs = [
            document.getElementById('bi_pdf'),
            document.getElementById('inarees_pdf'),
            document.getElementById('diploma_pdf')
        ];
        
        return inputs.some(input => input.files.length > 0);
    }



    // Ações dos botões VOLTAR e SEGUINTE
    document.getElementById('btnVoltar').addEventListener('click', () => {
        window.location.href = "{{ url('/formulario3') }}";
    });

    document.getElementById('btnSeguinte').addEventListener('click', () => {
        window.location.href = "{{ url('/formulario6') }}";
    });


    </script>
</body>

@endsection