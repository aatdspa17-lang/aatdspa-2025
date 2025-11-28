<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function gerar(Request $request)
    {
        $dados1 = session('formulario1');
        $dados2 = session('formulario2');
        $id = session('id');

        if (!$dados1 || !$dados2) {
            return redirect()->back()->with('error', 'Dados do candidato não encontrados na sessão.');
        }

        // Dados criptografados para o QR Code
        $dadosCriptografados = [
            'id' => $id,
            'bi' => $dados1['bi'],
            'nome' => $dados1['nome'],
            'area' => $dados2['area'],
            'categoria' => $dados2['categoria'],
            'timestamp' => now()->timestamp,
            'hash' => $this->gerarHash($dados1['bi'], $id)
        ];

        // Converter para string criptografada
        $dadosString = base64_encode(json_encode($dadosCriptografados));
        
        // GERAR QR CODE COM GD - MÉTODO CORRETO
        $qrCodeContent = QrCode::format('png')
            ->size(150)
            ->margin(2)
            ->errorCorrection('H')
            ->encoding('UTF-8')
            ->generate($dadosString);

        $qrCodeBase64 = base64_encode($qrCodeContent);

        $dados = [
            'nome' => $dados1['nome'],
            'bi' => $dados1['bi'],
            'area' => $dados2['area'],
            'categoria' => $dados2['categoria'],
            'nivel' => $dados2['nivel'] ?? '',
            'id' => $id,
        ];

        return view('licenca', compact('dados', 'qrCodeBase64'));
    }

    /**
     * Gera hash de verificação para segurança
     */
    private function gerarHash($bi, $id)
    {
        return hash('sha256', $bi . $id . 'chave-secreta-ofatx-2024');
    }

    /**
     * Página para verificar licença
     */
    public function verificarLicenca()
    {
        return view('verificar-licenca');
    }

    /**
     * Processar verificação da licença
     */
    public function processarVerificacao(Request $request)
    {
        $dadosQR = $request->input('dados_qr');
        
        try {
            $dadosDecodificados = json_decode(base64_decode($dadosQR), true);
            
            if (!$dadosDecodificados) {
                return view('verificar-licenca', [
                    'resultado' => ['valido' => false, 'erro' => 'Dados do QR Code inválidos']
                ]);
            }

            // Verificar hash
            $hashCalculado = $this->gerarHash(
                $dadosDecodificados['bi'], 
                $dadosDecodificados['id']
            );
            
            if ($hashCalculado === $dadosDecodificados['hash']) {
                return view('verificar-licenca', [
                    'resultado' => [
                        'valido' => true, 
                        'dados' => $dadosDecodificados,
                        'data_emissao' => date('d/m/Y H:i', $dadosDecodificados['timestamp'])
                    ]
                ]);
            } else {
                return view('verificar-licenca', [
                    'resultado' => ['valido' => false, 'erro' => 'Licença não autenticada - possível falsificação']
                ]);
            }
        } catch (\Exception $e) {
            return view('verificar-licenca', [
                'resultado' => ['valido' => false, 'erro' => 'QR Code inválido ou corrompido']
            ]);
        }
    }
}