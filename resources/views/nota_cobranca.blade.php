<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota de Cobrança - ORDEPDITA</title>
    <style>
    body { 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 12px; 
        margin: 0;
        padding: 20px;
        background-color: #f8f9fa;
        color: #333;
    }
    .container {
        max-width: 900px;
        margin: 0 auto;
        background-color: white;
        padding: 25px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 25px;
    }
    .left-section {
        display: flex;
        align-items: center;
    }
    .logo { 
        width: 80px;
        margin-right: 15px;
    }
    .org-info {
        text-align: left;
        margin-left: 90px;
        margin-top: -70px;
    }
    .org-info p {
        margin: 0;
        line-height: 1.2;
    }
    .org-info p:first-child {
        color: #1d3557;
    }
    .org-info p:last-child {
        color: #1d3557;
        margin-top: 5px;
    }
    .billing-info {
        text-align: right;
        margin-top: -80px;
        margin-bottom: 50px;
    }
    .billing-info p {
        margin: 3px 0;
        line-height: 1.3;
    }
    .billing-info p:first-child {
        font-weight: bold;
        color: #e63946;
        font-size: 14px;
    }

    .tabela-container {
        width: 100%;
        display: flex;
        justify-content: center;
        margin: 20px 0;
    }
    
    .tabela {
        width: 95% !important;
        border: 1px solid #1d3557;
        border-collapse: collapse;
    }
    
    .tabela, .tabela th, .tabela td {
        border: 1px solid #1d3557;
        padding: 10px;
        text-align: center;
    }

    .tabela th {
         background-color: #a8dadc;
         color: #1d3557;
         font-weight: bold;
    }
    .box {
        border-radius: 12px;
        border: 1px solid #457b9d;
        padding: 20px;
        margin-top: 30px;
        width: 90%;
        margin: 40px auto 20px auto;
        background-color: #f1faee;
    }
    .title { 
        font-size: 16px; 
        font-weight: bold;
        text-align: center;
        color: #1d3557;
        margin-bottom: 15px;
    }

    .cordenada{
        text-align: center;
        margin: 8px 0;
        font-weight: bold;
    }
    .total-value {
        color: #e63946;
        font-weight: bold;
        font-size: 14px;
    }
    .footer {
        margin-top: 50px;
        font-size: 10px;
        text-align: center;
        color: #6c757d;
        padding-top: 15px;
        border-top: 1px solid #dee2e6;
    }
    h3 {
        color: #1d3557;
        border-bottom: 2px solid #a8dadc;
        padding-bottom: 5px;
    }
    h4 {
        color: #e63946;
        margin-top: 25px;
    }
    ol {
        padding-left: 20px;
    }
    li {
        margin-bottom: 8px;
        line-height: 1.4;
    }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="left-section">
            <img src="{{ public_path('images/logo.jpg') }}" class="logo">
            <div class="org-info">
                <p>ORDEM DOS TÉCNICOS DE DIAGNÓSTICO</p>
                <p>E TERAPÊUTICA DE ANGOLA</p>
            </div>
        </div>

        <div class="billing-info">
            <p><strong>Nota de cobrança</strong></p>
            <p>I.D.: <strong>{{ $id }}</strong></p>
            <p>Data: <strong>{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong></p>
        </div>
    </div>

  <p><strong>Nome:</strong> {{ $dados['dados_pessoais']['nome'] ?? 'N/A' }}</p>
<p><strong>BI/Passaporte:</strong> {{ $dados['dados_pessoais']['bi'] ?? 'N/A' }}</p>
<br><br>

    <h3>Dados de candidatura</h3>
    <div class="tabela-container">
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
<td>{{ $dados['dados_pessoais']['provincia'] ?? 'N/A' }}</td>
<tr>
<td colspan="3"><strong>TOTAL A PAGAR (Kz)</strong></td>
<td class="total-value">{{ $total ?? '25.000,00' }}</td>

</tbody>

        </table>
    </div>

    <h4>ATENÇÃO</h4>
    <ol>
        <li>Este documento representa uma nota de cobrança. O não pagamento condiciona a emissão da carteira profissional.</li>
        <li>O pagamento deverá ser feito exclusivamente nos meios autorizados.</li>
        <li>Guarde o comprovativo de pagamento. Ele será exigido para validar o seu processo.</li>
        <li>Não nos responsabilizamos por pagamentos em contas ou referências erradas.</li>
        <li>Após o pagamento, envie o comprovativo no portal na opção de pagamentos.</li>
    </ol>

    <div class="box">
        <div class="title">MÉTODO DE PAGAMENTO</div>
            <p>O pagamento deve ser feito exclusivamente por transferência bancária, através de ATM BANK ou MULTICAIXA EXPRESS, pelas seguintes coordenadas:</p>
        
            <div class="cordenada">
                <strong>IBAN:</strong> {{ $dadosBancarios['iban'] }}
            </div>
            <div class="cordenada">
                <strong>TITULAR:</strong> {{ $dadosBancarios['titular'] }}
            </div>

        </div>

        <div class="footer">
            Documento processado eletronicamente em 10/09/2025 14:30 - 
            Sistema de Inscrição ORDEPDITA
        </div>
    </div>

</body>
</html>