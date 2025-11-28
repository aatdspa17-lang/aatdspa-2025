<!DOCTYPE html>
<html lang="pt-pt"> <!-- Alterado para pt-pt (Angola) -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota de Cobrança - ORDEPDITA</title>
    <style>
    body { 
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        line-height: 1.5;
    }
    .logo { 
        width: 80px;
        float: left;
        margin-right: 10px;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }
    .org-info {
        margin-right: auto;
        text-align: center;
        flex-grow: 1;
    }
    .org-info p {
        margin: 0;
        line-height: 1.2;
    }
    .org-name {
        font-size: 14px;
        font-weight: bold;
    }
    .billing-info {
        text-align: right;
    }
    .billing-info p {
        margin: 0;
        line-height: 1.2;
    }
    .tabela {
        width: 100%;
        margin: 15px 0;
    }
    .tabela, .tabela th, .tabela td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 6px;
        text-align: center;
    }
    .tabela th {
        background-color: #f0f0f0;
    }
    .box {
        border: 1px solid black;
        padding: 15px;
        margin-top: 30px;
        width: 100%;
        max-width: 550px;
        margin-left: auto;
        margin-right: auto;
    }
    .title { 
        font-size: 16px; 
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }
    .cordenada {
        text-align: center;
        margin: 5px 0;
    }
    .total-value {
        color: red;
        font-weight: bold;
    }
    .footer {
        margin-top: 30px;
        font-size: 10px;
        text-align: center;
        border-top: 1px solid #ccc;
        padding-top: 10px;
    }
    @page {
        margin: 20px;
    }
    </style>
</head>
<body>

<div class="header">
    @if($pdf ?? false)
        <img src="{{ storage_path('app/public/images/logo.jpg') }}" class="logo">
    @else
        <img src="{{ asset('storage/images/logo.jpg') }}" class="logo">
    @endif
    
    <div class="org-info">
        <p class="org-name">ORDEM DOS TÉCNICOS SUPERIORES</p>
        <p>DE DIAGNÓSTICO E TERAPÊUTICA DE ANGOLA</p>
    </div>
    
    <div class="billing-info">
        <p><strong>Nota de cobrança</strong></p>
        <p>Nº <strong>{{ $referencia ?? $id ?? 'N/A' }}</strong></p>
        <p>Data: <strong>{{ now()->format('d/m/Y') }}</strong></p>
    </div>
</div>

<h3>Dados do candidato</h3>
<p><strong>Nome:</strong> {{ $dados['dados_pessoais']['nome'] ?? 'N/A' }}</p>
<p><strong>BI/Passaporte:</strong> {{ $dados['dados_pessoais']['bi'] ?? 'N/A' }}</p>
<p><strong>Contribuinte:</strong> {{ $dados['dados_pessoais']['contribuinte'] ?? 'N/A' }}</p>
<p><strong>Telefone:</strong> {{ $dados['dados_pessoais']['telefone'] ?? 'N/A' }}</p>


<h3>Dados de candidatura</h3>
<table class="tabela">
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
            <td>{{ $dados['dados_profissionais']['area'] ?? 'N/A' }}</td>
            <td>{{ $dados['dados_profissionais']['nivel'] ?? 'N/A' }}</td>
            <td>{{ $dados['dados_profissionais']['curso'] ?? 'N/A' }}</td>
            <td>{{ $dados['dados_profissionais']['provincia'] ?? 'N/A' }}</td>
        </tr>
        <tr>
            <td colspan="3"><strong>TOTAL A PAGAR (Kz)</strong></td>
            <td class="total-value">{{ number_format($dados['dados_profissionais']['total'] ?? 0, 2, ',', '.') }}</td>
        </tr>
    </tbody>
</table>



<h4>ATENÇÃO</h4>
<ol>
    <li>Este documento representa uma nota de cobrança. O não pagamento condiciona a emissão da carteira profissional.</li>
    <li>O pagamento deverá ser feito exclusivamente nos meios autorizados.</li>
    <li>Guarde o comprovativo de pagamento. Ele será exigido para validar o seu processo.</li>
    <li>Não nos responsabilizamos por pagamentos em contas ou referências erradas.</li>
    <li>Após o pagamento, envie o comprovativo no portal na opção de pagamentos.</li>
</ol>

<div class="cordenada">
    <strong>IBAN:</strong> {{ $dadosBancarios['iban'] }}
</div>

<div class="cordenada">
    <strong>TITULAR:</strong> {{ $dadosBancarios['titular'] }}
</div>

<div class="cordenada">
    <strong>REFERÊNCIA:</strong> {{ $id }}
</div>



<div class="footer">
    Documento processado eletronicamente em {{ now()->format('d/m/Y H:i') }} - 
    Sistema de Inscrição OTSDTA
</div>

</body>
</html>