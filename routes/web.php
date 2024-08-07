<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TesteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']) -> name('site.sobrenos');

Route::get('contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('contato', [ContatoController::class, 'salvar']) -> name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index']) -> name('site.login');
Route::post('/login', [LoginController::class, 'autenticar']) -> name('site.login');

Route::prefix('/app')->middleware('autenticacao')->group(function () {
    Route::get('home', [HomeController::class, 'index']) -> name('app.home');
    Route::get('sair', [LoginController::class, 'sair']) -> name('app.sair');
    Route::get('cliente', [ClienteController::class, 'index']) -> name('app.cliente');

    Route::get('fornecedor', [FornecedorController::class, 'index']) -> name('app.fornecedor');
    Route::get('fornecedor/listar', [FornecedorController::class, 'listar']) -> name('app.fornecedor.listar');
    Route::post('fornecedor/listar', [FornecedorController::class, 'listar']) -> name('app.fornecedor.listar');
    Route::get('fornecedor/adicionar', [FornecedorController::class, 'adicionar']) -> name('app.fornecedor.adicionar');
    Route::post('fornecedor/adicionar', [FornecedorController::class, 'adicionar']) -> name('app.fornecedor.adicionar');
    Route::get('fornecedor/editar', [FornecedorController::class, 'editar']) -> name('app.fornecedor.editar');
    Route::get('fornecedor/excluir', [FornecedorController::class, 'excluir']) -> name('app.fornecedor.excluir');

    Route::resource('produto', ProdutoController::class);
    Route::resource('produto-detalhe', ProdutoDetalheController::class);
});

Route::get('teste/{param1}/{param2}', [TesteController::class, 'teste']) -> name('teste') 
    -> where('param1', '[0-9]+')
    -> where('param2', '[0-9]+');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para acessar a tela inicial.';
});