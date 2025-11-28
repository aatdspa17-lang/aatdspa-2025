<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Carteira Profissional</title>
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
        width: 297mm;   /* largura total da folha A4 (paisagem) */
        height: 210mm;  /* altura total da folha A4 */
        overflow: hidden;
    }

    .fundo {
        position: absolute;
        width: 150mm;
        height: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        object-fit: contain;
        filter: brightness(250%) contrast(80%);
        opacity: 0.25; /* deixa o fundo mais claro */
        z-index: 0;
    }

    .conteudo {
        position: absolute;
        top: 40%;
        left: 20%;
        z-index: 10;
        color: #000;
        font-size: 16px;
    }

    .foto {
        position: absolute;
        top: 22%;
        left: 8%;
        width: 40mm;
        height: 45mm;
        border-radius: 5px;
        object-fit: cover;
    }
</style>

</head>
<body>
    {{-- Página da frente --}}
    <div class="pagina">
        <img src="{{ public_path('images/logotipo.jpg') }}" class="fundo">
        <img src="{{ storage_path('app/' . $dados['foto']) }}" class="foto" alt="Foto">
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
        <img src="{{ public_path('images/logotipo.jpg') }}" class="fundo">
    </div>
</body>

</html>
