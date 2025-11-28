<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Candidato;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class FormularioController extends Controller
{

     private $dadosBancarios = [
        'iban' => 'AO06004400000123456789001',
        'titular' => 'Ordem dos Técnicos de Diagnóstico e Terapeutas'
    ];


    // Etapa 1
    public function formulario1()
    {
        return view('formulario');
    }

   public function storeFormulario1(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'nascimento' => 'required|date',
            'genero' => 'required|string',
            'bi' => 'required|string|regex:/^[A-Za-z0-9]{14}$/',
            'emissaoBI' => 'required|date',
            'validadeBI' => 'required|after:today',
            'perfil' => 'required|string',
            'nacionalidade' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'telefone2' => 'nullable|string',
            'provincia' => 'required|string', // ← adicionado
            'foto' => 'required|image|max:2048',
        ]);

        // Armazenar a foto
        $fotoPath = $request->file('foto')->store('fotos');

        // Salvar todos os dados na sessão
        $validated['foto'] = $fotoPath;
        session(['formulario1' => $validated]);

        return redirect()->route('formulario.etapa2');
    }


    // Etapa 2
    public function etapa2()
    {
        return view('formulario2');
    }

    public function storeFormulario2(Request $request)
    {
        $validated = $request->validate([
            'cargo' => 'required|string|max:255',
            'provincia_trabalho' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
        ]);

        session(['formulario2' => $validated]);

        return redirect()->route('formulario3');

    }

    // Etapa 3
    public function etapa3()
    {
        return view('formulario3');
    }

   public function storeFormulario3(Request $request)
{
    // Validação comum
    $validated = $request->validate([
        'nivel' => 'required|string',
        'instituicao' => 'required|string|max:255',
        'curso' => 'required|string|max:255',
        'classe' => 'nullable|string|max:255', // só para Ensino Médio
        'ano' => 'nullable|string', // só para Licenciatura, Mestrado, Doutoramento
        'area' => 'required|string|max:255',
    ]);

    // Salvar na sessão para manter os dados entre etapas
    $formulario3 = session('formulario3', []);
    $formulario3[] = $validated;
    session(['formulario3' => $formulario3]);

    // Redirecionar para a etapa 4
    return redirect()->route('formulario.etapa4');
}



    // Etapa 4
    public function etapa4()
    {
        return view('formulario4');
    }

    public function storeFormulario4(Request $request)
    {
        $validated = $request->validate([
        'bi_pdf' => 'required|file|mimes:pdf|max:2048',
        'declaracao' => 'nullable|file|mimes:pdf|max:2048',
        'certificado' => 'required|file|mimes:pdf|max:2048',
]);

$paths = [
    'bi_pdf' => $request->file('bi_pdf')->store('documentos'),
    'declaracao' => $request->file('declaracao')?->store('documentos'),
    'certificado' => $request->file('certificado')->store('documentos'),
];

        session(['formulario4' => $paths]);
    // Agora só redireciona
    return redirect()->route('formulario6');
    }

    // Etapa 5
    public function etapa5()
    {
        return view('formulario5');
    }

    public function storeFormulario5(Request $request)
    {
         $paths = [
            'formulario_pdf' => $request->file('formulario_pdf')->store('documentos'),
        ];

        session(['formulario5' => $paths]);

        return redirect()->route('formulario6');
    }

   // Etapa 6 (resumo)
public function resumo()
{
    $dados1 = session('formulario1', []);
    $dados3 = session('formulario3', []);

    // Pega o ID formatado gerado anteriormente
    $id = session('id', '---');

    return view('formulario6', [
        'id'        => $id,
        'nome'      => $dados1['nome'] ?? '',
        'bi'        => $dados1['bi'] ?? '',
        'provincia' => $dados1['provincia'] ?? '',
        'area'      => $dados3[0]['area'] ?? '',
        'nivel'     => $dados3[0]['nivel'] ?? '',
        'curso'     => $dados3[0]['curso'] ?? '',
        'total'     => '12.500,00 Kz',
        'iban'      => $this->dadosBancarios['iban'],
        'titular'   => $this->dadosBancarios['titular'],
    ]);
}






 // Gerar PDF
     private function getDadosFormulario()
    {
        $dados1 = session('formulario1', []);
        $dados2 = session('formulario2', []);

        return [
            'nome' => $dados1['nome'] ?? '',
            'identificacao' => $dados1['bi'] ?? '',
            'area' => $dados2['area'] ?? '',
            'nivel' => $dados2['nivel'] ?? '',
            'provincia' => $dados1['provincia'] ?? '',
            'total' => $dados2['total'] ?? '0',
            'id' => uniqid(),
            'iban' => $this->dadosBancarios['iban'],
            'titular' => $this->dadosBancarios['titular']
        ];
    }

public function gerarPDF($id)
{
    $dados1 = session('formulario1', []);
    $dados3Array = session('formulario3', []);
    $dados3 = $dados3Array[0] ?? [];

    $dados = [
        'dados_pessoais' => [
            'nome' => $dados1['nome'] ?? 'N/A',
            'bi' => $dados1['bi'] ?? 'N/A',
            'provincia' => $dados1['provincia'] ?? 'N/A',
        ],
        'dados_profissionais' => [
            'area' => $dados3['area'] ?? 'N/A',
            'nivel' => $dados3['nivel'] ?? 'N/A',
            'curso' => $dados3['curso'] ?? 'N/A',
        ]
    ];

    $dadosBancarios = [
        'iban' => $this->dadosBancarios['iban'],
        'titular' => $this->dadosBancarios['titular']
    ];

    $total = '12.500,00';
    $pdf = Pdf::loadView('nota_cobranca', compact('id', 'dados', 'dadosBancarios', 'total'));


    return $pdf->stream('nota_cobranca_' . $id . '.pdf');
}







public function pagamento()
{
    return view('pagamento');
}

public function verificarPagamento(Request $request)
{
    $biDigitado = $request->input('bi');

    // Verifica se BI ou ID existe na sessão
    if (session('bi') == $biDigitado || session('id') == $biDigitado) {
        return redirect()->route('formulario.etapa5'); // formulario5
    }

    // Caso não exista
    return redirect()->route('pagamento.index')->with('erro', 'Candidato não encontrado.');
}

public function finalizarInscricao(Request $request)
{
    try {
        // Pega os dados das sessões
        $formulario1 = session('formulario1', []);
        $formulario2 = session('formulario2', []);
        $formulario3Array = session('formulario3', []);
        $formulario3 = $formulario3Array[0] ?? []; // Corrige array de arrays
        $formulario4 = session('formulario4', []);
        $formulario5 = session('formulario5', []);

        // Junta todos os dados em um único array
        $dados = array_merge(
            $formulario1,
            $formulario2,
            $formulario3,
            $formulario4,
            $formulario5
        );

        // Validação
        $validator = Validator::make($dados, [
            'nome' => 'required|string|max:255',
            'nacionalidade' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'bi' => 'required|string|max:20',
            'nascimento' => 'required|date',
            'genero' => 'required|string',
            'perfil' => 'nullable|string',
            'foto' => 'required|string',
            'bi_pdf' => 'nullable|string',
            'declaracao' => 'nullable|string',
            'certificado' => 'nullable|string',
            'escola' => 'nullable|string',
            'curso' => 'nullable|string',
            'classe' => 'nullable|string',
            'area' => 'nullable|string',
            'provincia_trabalho' => 'required|string',
            'cargo' => 'required|string',
            'sector' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Criar e salvar candidato
        $candidato = new Candidato();
        $candidato->nome_completo = $dados['nome'];
        $candidato->nacionalidade = $dados['nacionalidade'];
        $candidato->email = $dados['email'];
        $candidato->telefone1 = $dados['telefone'];
        $candidato->telefone2 = $dados['telefone2'] ?? null;
        $candidato->bi = $dados['bi'];
        $candidato->data_nascimento = $dados['nascimento'];
        $candidato->genero = $dados['genero'];
        $candidato->perfil = $dados['perfil'] ?? null;
        $candidato->foto_png = $dados['foto'];

        // Documentos PDF
        $candidato->bi_pdf = $dados['bi_pdf'] ?? null;
        $candidato->declaracao = $dados['declaracao'] ?? null;
        $candidato->certificado_pdf = $dados['certificado'] ?? null;

        // Informações acadêmicas
        $candidato->escola = $dados['escola'] ?? null;
        $candidato->curso = $dados['curso'] ?? null;
        $candidato->classe = $dados['classe'] ?? null;
        $candidato->area = $dados['area'] ?? null;

        // Informações de trabalho
        $candidato->provincia_trabalho = $dados['provincia_trabalho'];
        $candidato->cargo = $dados['cargo'];
        $candidato->sector = $dados['sector'];

        // Salvar no banco
        $candidato->save();

        // Guardar o ID formatado
        $formattedId = $candidato->id . '-ORDEDPITA';
        session(['id' => $formattedId]);

        // Limpar sessões antigas
        session()->forget(['formulario1', 'formulario2', 'formulario3', 'formulario4', 'formulario5']);

        // Retornar resposta JSON de sucesso
        return response()->json([
            'success' => true,
            'id' => $candidato->id,
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Erro interno: ' . $e->getMessage(),
        ], 500);
    }
}


}
