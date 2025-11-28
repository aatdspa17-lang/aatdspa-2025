<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    // Exibe a página de consulta
    public function index()
    {
        return view('consultar');
    }

    // Processa a pesquisa
    public function buscar(Request $request)
    {
        $request->validate([
            'tipoConsulta' => 'required|in:bi,id',
            'valorConsulta' => 'required|string|max:50',
        ]);

        $tipo = $request->input('tipoConsulta');
        $valor = trim($request->input('valorConsulta'));

        // Recuperar os técnicos armazenados na sessão
        $tecnicos = session()->get('tecnicos', []);

        $dadosEncontrados = null;

        foreach ($tecnicos as $index => $tecnico) {
            // ID simulado (posição no array)
            $idSimulado = $index + 1;

            if (
                ($tipo === 'id' && (string)$idSimulado === $valor) ||
                ($tipo === 'bi' && isset($tecnico['bi']) && $tecnico['bi'] === $valor)
            ) {
                // Simulando estado e PDF (apenas exemplo)
                $tecnico['estado'] = $tecnico['estado'] ?? 'Em análise';
                $tecnico['ficheiro_pdf'] = $tecnico['ficheiro_pdf'] ?? null;

                $dadosEncontrados = (object) array_merge($tecnico, ['id' => $idSimulado]);
                break;
            }
        }

        // Caso não encontre
        if (!$dadosEncontrados) {
            return redirect()->route('consultar.index')
                ->with('erro', 'Nenhum pedido encontrado para o número informado.');
        }

        // Se encontrou, retorna os dados à view
        return redirect()->route('consultar.index')->with('dados', $dadosEncontrados);
    }
}
