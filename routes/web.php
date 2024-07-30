<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'index']) -> name('site.login');
Route::post('/login', [LoginController::class, 'autenticar']) -> name('site.login');

Route::prefix('/app')
    ->middleware('autenticacao')
    ->group(function () {
        Route::get('clientes', function () { echo 'clientes';}) -> name('app.clientes');
        Route::get('fornecedores', [FornecedorController::class, 'index']) -> name('app.fornecedores');
        Route::get('produtos', function () { echo 'produtos';}) -> name('app.produtos');
    });

Route::get('teste/{param1}/{param2}', [TesteController::class, 'teste']) -> name('teste') 
    -> where('param1', '[0-9]+')
    -> where('param2', '[0-9]+');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para acessar a tela inicial.';
});