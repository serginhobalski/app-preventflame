<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\QuestaoController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::group(['prefix' => '/'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/contato', [HomeController::class, 'contato']);
    Route::get('/cursos', [HomeController::class, 'cursos']);
    Route::get('/curso_detalhes', [HomeController::class, 'curso_detalhes']);
    Route::get('/sobre', [HomeController::class, 'sobre']);
    Route::get('/loja', [HomeController::class, 'loja']);
    Route::get('/detalhe_produto', [HomeController::class, 'detalhe_produto']);
    Route::get('/carrinho', [HomeController::class, 'carrinho']);
    Route::get('/checkout', [HomeController::class, 'checkout']);
});

Route::group(['prefix' => '/aluno'], function () {
    Route::get('/', [AlunoController::class, 'index']);
    Route::get('/painel', [AlunoController::class, 'index'])->name('aluno');
    Route::get('/atualizar/{id}', [AlunoController::class, 'atualizar'])->name('aluno.atualizar');
    Route::get('/curso/{id}', [AlunoController::class, 'curso']);
    Route::get('/aula/{id}', [AlunoController::class, 'aula']);
    Route::put('/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
});

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [AdminController::class, 'painel']);
    Route::get('/painel', [AdminController::class, 'painel'])->name('admin');
    Route::resource('usuarios', UserController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('aulas', AulaController::class);
    Route::resource('recursos', RecursoController::class);
    Route::resource('provas', ProvaController::class);
    Route::resource('questoes', QuestaoController::class);
});
