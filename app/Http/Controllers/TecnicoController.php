<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    // Mostrar formulário
    public function create()
    {
        return view('cadastrar_membro');
    }

    // Guardar dados (sessão temporária)
    public function store(Request $request)
    {
        // Validar
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'bi' => 'required|string|max:14',
            'email' => 'required|email',
            'telefone' => 'required|string|max:20',
            'especialidade' => 'required|string',
        ]);

        // Armazenar na sessão (simulação de BD)
        $tecnicos = session()->get('tecnicos', []);
        $tecnicos[] = $data;
        session(['tecnicos' => $tecnicos]);

        return redirect()->back()->with('success', 'Técnico cadastrado com sucesso!');
    }

    public function index()
    {
        // Pegar técnicos armazenados na sessão
        $tecnicos = session()->get('tecnicos', []);

        // Contagem
        $totalTecnicos = count($tecnicos);

        // Simulações de outros dados (por enquanto)
        $pendentes = 0;
        $carteiras = 0;

        return view('dashboard', compact('totalTecnicos', 'pendentes', 'carteiras'));

    }

    public function indexs(Request $request)
{
    $tecnicos = session()->get('tecnicos', []);

    // Filtragem simples por ID (simulado) ou BI (quando tiver campo)
    $search = $request->input('search');
    if ($search) {
        $tecnicos = array_filter($tecnicos, function ($tecnico, $key) use ($search) {
            $id = $key + 1; // ID auto incremento simulado
            return str_contains((string) $id, $search) ||
                   (isset($tecnico['bi']) && str_contains($tecnico['bi'], $search));
        }, ARRAY_FILTER_USE_BOTH);
    }

    return view('listar_tecnicos', compact('tecnicos'));
}


public function reset()
{
    // Remove todos os técnicos da sessão
    session()->forget('tecnicos');

    return redirect()->route('tecnicos.indexs')->with('success', 'Todos os técnicos foram removidos!');
}


}
