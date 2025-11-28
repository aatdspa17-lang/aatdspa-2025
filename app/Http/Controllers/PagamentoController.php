<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PagamentoController extends Controller
{
    public function verificar(Request $request)
{
    $bi = $request->input('bi');

    // Busca os técnicos salvos em sessão
    $tecnicos = session()->get('tecnicos', []);

    // Procura o técnico pelo BI
    $dados = collect($tecnicos)->firstWhere('bi', $bi);

    if ($dados) {
        // Gera um ID único e guarda na sessão
        $id = uniqid();
        session(['id' => $id]);

        // Adiciona o ID e informações à variável
        $dados = (object) array_merge($dados, [
            'id' => $id,
            'estado' => 'Carteira disponível para download',
        ]);

        return view('pagamento', compact('dados'));
    }

    return redirect()->to('/pagamento')->with('erro', 'Candidatura não encontrada.');

}


 public function gerarCarteira($id)
    {
        // Recuperar dados da sessão
        $dados1 = session('formulario1', []);
        $dados2 = session('formulario2', []);

        // Confirmar se o ID bate com o da sessão
        $idSessao = session('id') ?? ($dados1['id'] ?? null);

        if (!$idSessao || $idSessao !== $id) {
            return redirect()->back()->with('erro', 'ID inválido ou sessão expirada.');
        }

        // Dados completos da carteira
        $dados = [
            'id'        => $idSessao,
            'nome'      => $dados1['nome'] ?? '',
            'bi'        => $dados1['bi'] ?? '',
            'area'      => $dados2['area'] ?? '',
            'nivel'     => $dados2['nivel'] ?? '',
            'categoria' => $dados2['categoria'] ?? '',
            'foto'      => $dados1['foto'] ?? '',
        ];

        // Gerar PDF com a view 'carteira.blade.php'
        $pdf = Pdf::loadView('carteira', compact('dados'))
                  ->setPaper('a4', 'landscape');

        return $pdf->download('Carteira_' . $dados['nome'] . '.pdf');
    }

    public function uploadComprovativo(Request $request, $id)
{
    $request->validate([
        'comprovativo' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);

    // Guardar o comprovativo na pasta public/storage/comprovativos
    $path = $request->file('comprovativo')->store('comprovativos', 'public');

    // Aqui podes salvar no banco, se já tiver tabela de pagamentos
    // Exemplo:
    // Pagamento::create([
    //     'tecnico_id' => $id,
    //     'ficheiro' => $path,
    // ]);

    return back()->with('sucesso', 'Comprovativo enviado com sucesso! Aguarde a validação.');
}


    public function visualizarCarteira($id)
{
    // Dados de teste — só para ver o PDF
    $dados = [
        'nome' => 'Manuel Fuxi',
        'area' => 'Diagnóstico Clínico',
        'nivel' => 'Técnico Médio',
        'id' => $id,
        'bi' => '004567890LA045',
        'foto' => 'public/fotos/exemplo.jpg', // usa uma imagem de teste no storage
    ];

    $pdf = Pdf::loadView('carteira', compact('dados', 'imagePath'))
          ->setPaper('a4', 'landscape');


    return $pdf->stream('Carteira_'.$dados['nome'].'.pdf');
}



public function visualizarLicenca($id)
{
    $dados = [
        'nome' => 'Manuel Fuxi',
        'area' => 'Diagnóstico Clínico', 
        'nivel' => 'Técnico Médio',
        'id' => $id,
        'bi' => '004567890LA045',
        'categoria' => 'Exemplo'
    ];

    // Caminho da imagem do QR Code fixo
    $qrCodePath = public_path('imagens/qrcode.png');

    $pdf = Pdf::loadView('licenca', compact('dados', 'qrCodePath'))
              ->setPaper('a4', 'landscape')
              ->setOption('dpi', 96);

    return $pdf->stream('Licenca_' . $dados['nome'] . '.pdf');
}



}
