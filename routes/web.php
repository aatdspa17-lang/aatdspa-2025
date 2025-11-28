<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\consultaController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\PagamentoController;


Route::get('/cadastrar-tecnico', [TecnicoController::class, 'create'])->name('tecnico.create');
Route::post('/cadastrar-tecnico', [TecnicoController::class, 'store'])->name('tecnico.store');

Route::view('/', 'home');
Route::view('/informacao', 'informacao');
Route::view('/pagamento', 'pagamento');
Route::view('/inscricao', 'inscricao');
Route::view('/login', 'login');
Route::view('/cadastrar_membro', 'cadastrar_membro');


Route::post('/pagamento/comprovativo/{id}', [PagamentoController::class, 'uploadComprovativo'])->name('pagamento.comprovativo');



// fibalizar inscrição
Route::post('/finalizar-inscricao', [FormularioController::class, 'finalizarInscricao'])->name('formulario.finalizar');
Route::get('/resumo', [FormularioController::class, 'resumo'])->name('candidato.resumo');



// carteira
Route::get('/carteira/{id}/visualizar', [PagamentoController::class, 'visualizarCarteira'])->name('carteira.visualizar');

// licença
Route::get('/licenca/{id}/visualizar', [PagamentoController::class, 'visualizarLicenca'])->name('licenca.visualizar');



Route::get('/consultar', [ConsultaController::class, 'index'])->name('consultar.index');
Route::post('/consultar', [ConsultaController::class, 'buscar'])->name('consultar.buscar');

// Página inicial (Dashboard)
Route::get('/dashbord', function () {
    $tecnicos = session()->get('tecnicos', []);
    $totalTecnicos = count($tecnicos);

    return view('dashbord', compact('totalTecnicos'));
})->name('dashbord');

// resetar section
Route::get('/tecnicos/reset', [TecnicoController::class, 'reset'])->name('tecnicos.reset');


// Página de pagamento
Route::post('/pagamento/verificar', [PagamentoController::class, 'verificar'])->name('pagamento.verificar');


// Cadastrar membros
Route::get('/cadastrar_membro', function () {
    return view('cadastrar_membro');
})->name('cadastrar_membro');

// Listar técnicos
Route::get('/tecnicos', [TecnicoController::class, 'indexs'])->name('tecnicos.indexs');


// rota para processar o login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Listar Técnicos
Route::get('/listar-tecnicos', [TecnicoController::class, 'index'])->name('tecnico.index');


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Formulário multi-etapas com sessões
Route::get('/formulario', [FormularioController::class, 'formulario1'])->name('formulario.etapa1');

Route::post('/formulario', [FormularioController::class, 'storeFormulario1'])->name('formulario.formulario1.storeFormulario1');

Route::get('/formulario2', [FormularioController::class, 'etapa2'])->name('formulario.etapa2');
Route::post('/formulario2', [FormularioController::class, 'storeFormulario2']);

// ETAPA 3 (dados académicos)
Route::get('/formulario3', [FormularioController::class, 'etapa3'])->name('formulario3');
Route::post('/formulario3', [FormularioController::class, 'storeFormulario3'])->name('storeFormulario3');

Route::get('/formulario4', [FormularioController::class, 'etapa4'])->name('formulario.etapa4');
Route::post('/formulario4', [FormularioController::class, 'storeFormulario4']);

Route::get('/formulario5', [FormularioController::class, 'etapa5'])->name('formulario.etapa5');
Route::post('/formulario5', [FormularioController::class, 'storeFormulario5']);

Route::get('/formulario6', [FormularioController::class, 'resumo'])->name('formulario6');


// PDF
Route::get('/nota_cobranca/pdf/{id}', [FormularioController::class, 'gerarPDF'])->name('nota.pdf');


Route::get('/noticias/{noticia?}/show', [NoticiaController::class, 'show'])->name('noticias.show');