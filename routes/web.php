<?php

use App\Http\Controllers\RestaurantesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\FacebookController;

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


/*

Route::get('/event/create', [EventController::class, 'create']);

Route::get('/teste', function () {

    $busca = request('search');

    return view('teste',['busca' => $busca]);
});

Route::get('/testes/{id?}', function ($id = NULL) {
    return view('unitario',['id' => $id]);
});

*/


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('rota');

    Route::get('/restaurantes/lojas', [RestaurantesController::class, 'view'])->name('restaurantes.loja');
    Route::get('/restaurantes/cadastro', [RestaurantesController::class, 'cadastro'])->name('restaurantes.cadastro');
    Route::post('/restaurantes', [RestaurantesController::class, 'store'])->name('restaurantes.store');

    Route::get('/{idproduto}/carrinho/adicionar', [EventController::class, 'adicionarCarrinho'])->name('adicionar_carrinho');
    Route::get('/{indice}/excluircarrinho', [EventController::class, 'excluirCarrinho'])->name('carrinho_excluir');
    Route::get('/carrinho', [EventController::class, 'verCarrinho'])->name('ver_carrinho');
    Route::post('/carrinho/finalizar', [EventController::class, 'finalizar'])->name('carrinho_finalizar');

    Route::match(['get', 'post'],'/compras/historico', [EventController::class, 'historico'])->name('hist_pedidos');

    Route::match(['get', 'post'],'/compras/detalhes', [EventController::class, 'detalhes'])->name('detalhes_pedidos');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('auth/google',[GoogleController::class,'googlepage']);
Route::get('auth/google/callback',[GoogleController::class,'googlecallback']);

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

