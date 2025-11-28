<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Licença</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: DejaVu Sans, sans-serif;
        }

        .pagina {
            position: relative;
            width: 297mm;
            height: 210mm;
            overflow: hidden;
        }

        .barra-superior,
        .barra-inferior {
            width: 100%;
            height: 5mm;
            background-color: rgb(12, 193, 224);
        }

        .barra-inferior1 {
            width: 100%;
            height: 20mm;
            background-color: rgb(12, 193, 224);
            text-align: center;
            color: white;
        }

        .barra-superior {
            position: absolute;
            top: 0;
            left: 0;
        }

        .barra-inferior1,
        .barra-inferior {
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .fundo {
            display: block;
            margin: 20px auto;
            width: 70mm;
            height: auto;
            object-fit: contain;
            opacity: 1;
            margin-top: 100px;
        }

        .fundo {
            display: block;
            text-align: center;
            width: 70mm;
            height: auto;
            object-fit: contain;
            opacity: 1;
            margin-top: 100px;
        }

        .conteudo {
            position: absolute;
            top: 40%;
            left: 27%;
            z-index: 10;
            color: #000;
            font-size: 23px;
        }

        /* Centraliza o conteúdo principal sem sair da página */
        .conteudo1 {
            position: absolute;
            top: 10%; /* ajusta conforme o visual desejado */
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 10;
            font-size: 23px;
        }

        .conteudo5 {
            position: absolute;
            top: 1%; /* ajusta conforme o visual desejado */
            left: 45%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 10;
            font-size: 23px;
        }

        .conteudo2 {
            position: absolute;
            top: 30%; /* ajusta conforme o visual desejado */
            left: 0%;
            text-align: center;
            font-size: 30px;
        }

        .conteudo3 {
            position: absolute;
            top: 70%; /* ajusta conforme o visual desejado */
            font-size: 20px;
            left: 22%;
            text-align: center;
        }

        .conteudo4 {
            position: absolute;
            top: 86%; /* ajusta conforme o visual desejado */
            transform: translateX(-50%);
            font-size: 15px;
            right: 77%;
        }

        .foto {
            margin-top: 100px;
            position: absolute;
            top: 22%;
            left: 6%;
            width: 55mm;
            height: 60mm;
            border-radius: 5px;
            object-fit: cover;
        }

        .foto1 {
            margin-top: 300px;
            position: absolute;
            top: 22%;
            left: 5%;
            width: 60mm;
            height: 30mm;
            border-radius: 5px;
            object-fit: cover;
        }

        .fundo2 {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 90%; /* ou 50% se quiseres menor */
    height: auto;
    opacity: 0.15; /* imagem fusca */
    transform: translate(-50%, -50%);
    z-index: 0; /* fica atrás do conteúdo */
}

        .canto-superior-direito,
        .canto-inferior-esquerdo {
            position: absolute;
            width: 200mm;
            height: auto;
            opacity: 0.9;
        }

        .canto-superior-direito {
            top: -32.1mm;
            right: -65mm;
        }

        .canto-inferior-esquerdo {
            bottom: -32.1mm;
            left: -65mm;
            transform: rotate(180deg);
        }

        .qrcode {
            position: absolute;
            top: 10mm;
            right: 20mm;
            width: 35mm;
            height: 35mm;
            z-index: 100;
        }

        .assinatura-bastonario {
            position: absolute;
            bottom: 6mm;
            right: 10mm;
            width: 50mm;
            height: auto;
            object-fit: contain;
        }

        .bandeira {
            position: absolute;
            top: 0%;
            right: 0mm;
            width: 40mm;
            height: 20mm;
            object-fit: contain;
        }
        .quadrado{
             position: absolute;
             top: -25%;
             height: 160mm;
             width: 230mm;
            right: -95mm;
            object-fit: contain;
        }

        .primary {
            color: rgb(12, 193, 224);
        }

    </style>
</head>
<body>

    {{-- Página da frente --}}
    <div class="pagina">
        <div class="barra-superior"></div>
        <div class="barra-inferior"></div>

        {{-- Cantos decorativos --}}
        <img src="{{ public_path('imagens/canto-sem-fundo.png') }}" class="canto-superior-direito" alt="Canto superior direito">
        <img src="{{ public_path('imagens/canto-sem-fundo.png') }}" class="canto-inferior-esquerdo" alt="Canto inferior esquerdo">

        {{-- Logotipo --}}
        <img src="{{ public_path('imagens/associação-logo.jpg') }}" class="fundo" alt="Logotipo da associação">

        {{-- QR Code --}}
        <img src="{{ public_path('imagens/qrcode.png') }}" class="qrcode" alt="qrcode">

        {{-- Assinatura --}}
        <img src="{{ public_path('imagens/assinatura-bastonario.jpg') }}" class="assinatura-bastonario" alt="Assinatura do Bastonário">

        {{-- Foto e barra de código --}}
        <img src="{{ public_path('imagens/1.jpg') }}" class="foto" alt="Foto">
        <img src="{{ public_path('imagens/codigo_de_barra.png') }}" class="foto1" alt="BarraCode">

        {{-- Conteúdo centralizado (ajustado) --}}
        <div class="conteudo1">
            <strong>A.A.T.D.S.P.A</strong><br>
            <p>ASSOCIAÇÃO DE APOIO DOS TÉCNICOS DE<br>DIAGNÓSTICO TERAPÊUTICA E S. P DE ANGOLA
            <strong>(DR. III - nº 143 de 22 de Agosto / 2019)</strong><br></p>
            <strong>Licença de Estágio</strong>
        </div>

        {{-- Dados do técnico --}}
        <div class="conteudo">
            <strong>Nome:</strong> {{ $dados['nome'] }}<br>
            <strong>Área:</strong> {{ $dados['area'] }}<br>
            <strong>Nível:</strong> {{ $dados['nivel'] }}<br>
            <strong>Nº:</strong> {{ $dados['id'] }}-ORDEDPITA<br>
            <strong>BI:</strong> {{ $dados['bi'] }}
        </div>
    </div>

    {{-- Página de trás --}}
<div class="pagina">

    {{-- Imagem de fundo com opacidade reduzida --}}
    <img src="{{ public_path('imagens/associação-logo.jpg') }}" class="fundo2" alt="Logotipo da associação">

    <img src="{{ public_path('imagens/quadrado.png') }}" class="quadrado">

    <div class="barra-inferior1">
        <p>PROFISSIONAL DE DIAGNÓSTICO E TERAPÊUTICA</p>
        <img src="{{ public_path('imagens/angola.png') }}" class="bandeira">
    </div>

    {{-- Conteúdo centralizado (ajustado) --}}
    <div class="conteudo5">
        <p>(DR. III - nº 143 de 22 de Agosto / 2019)</p>
        <p><strong>Art.º4º</strong> do 4, 5, 6, 7, 8 dos Estatutos</p><br>
    </div>

    <div class="conteudo2">
        <p>Este passe pertence à A.A.T.D.S.P.A, distribuído para o uso de estudantes em <strong>Estágio</strong>, é intransmissível e deve-se acompanhar por um outro documento de identificação sempre que solicitado.</p>
    </div>

    <div class="conteudo3">
        <p><strong>Site:</strong> <span class="primary">www.aatdspa.ao aadspa@gmail.com</span> <strong>Página:</strong> <span class="primary">AATDSPA</span></p>
        <p><strong>Contactos:</strong> 925395706 / 941860550 / 930819054</p>
    </div>

    <div class="conteudo4">
        <p><strong>Validade:</strong> 17/02/2026</p>
    </div>

</div>



    </div>

</body>
</html>
