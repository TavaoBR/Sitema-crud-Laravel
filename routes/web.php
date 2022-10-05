<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'LoginForm'])->name('form.login');
Route::post('/valida/login', [LoginController::class, 'validaLogin'])->name('valida.login');

Route::get("/exibir/pessoas", [PessoaController::class, 'show'])->name('exibir.pessoas');

Route::get("/perfil/{nome}/{id_url}", [PessoaController::class, 'exibirPessoa'])->name('exibir.perfil');

Route::get('/cadastro', [PessoaController::class, 'registro'])->name('form.registro');

Route::post('/valida/registro', [PessoaController::class, 'registroValida'])->name('valida.registro');
