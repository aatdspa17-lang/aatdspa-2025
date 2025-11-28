@extends('layouts.app')

@section('title', 'Formulario')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formulario5.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet" />
@endsection

@section('content')


    <section></section><br>

    <div class="container">

            <div class="dados-candidato">
    <h2>Dados do Candidato</h2>
    <p><strong>Nome:</strong> {{ session('nome') }}</p>
    <p><strong>BI/Passaporte:</strong> {{ session('bi') }}</p>
    <p><strong>ID:</strong> {{ session('id') }}</p>
    <p><strong>Área:</strong> {{ session('area') }}</p>
    <p><strong>Nível Acadêmico:</strong> {{ session('nivel') }}</p>
    <p><strong>Categoria:</strong> {{ session('categoria') }}</p>
    <p><strong>Província:</strong> {{ session('provincia') }}</p>
</div>



        <section class="progress"></section><br>

        <h1 class="anexar">Carregar o comprovativo de pagamento</h1>

        <div class="upload-container">
            <label for="bi_pdf" class="custom-upload">
                <img src="{{ asset('fotos/upload-file.png') }}" alt="Upload" class="upload-icon-img">
                <span class="upload-text">Comprovativo de pagamento</span>
                <div id="bi_file_preview" class="file-preview-container"></div>
                <input type="file" name="bi_pdf" id="bi_pdf" accept="application/pdf">
            </label>
        </div>

        <div class="navigation">
            <button id="btnVoltar" class="btn btn-back">VOLTAR</button>
            <button id="btnSeguinte" class="btn btn-next">ENVIAR</button>
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

    // Adiciona o event listener para antes de descarregar a página
    window.addEventListener('beforeunload', function(e) {
        if (hasUploadedFiles()) {
            // Mensagem personalizada (alguns navegadores podem não mostrar)
            const confirmationMessage = 'Você carregou documentos. Tem certeza que deseja recarregar a página? Os arquivos serão perdidos.';
            
            // Padrão para a maioria dos navegadores
            e.preventDefault();
            e.returnValue = confirmationMessage;
            return confirmationMessage;
        }
    });

    // Adiciona também confirmação para links/cliques que saem da página
    document.addEventListener('click', function(e) {
        if (hasUploadedFiles()) {
            const target = e.target.closest('a');
            if (target && target.href) {
                if (!confirm('Você carregou documentos. Tem certeza que deseja sair desta página? Os arquivos serão perdidos.')) {
                    e.preventDefault();
                }
            }
        }
    });


    // Ações dos botões VOLTAR e SEGUINTE
    document.getElementById('btnVoltar').addEventListener('click', () => {
        window.location.href = "{{ url('/formulario4') }}";
    });

    document.getElementById('btnSeguinte').addEventListener('click', () => {
        window.location.href = "{{ url('#') }}";
    });


    </script>


@endsection