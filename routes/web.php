<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
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

Route::get('/', [EventController::class, 'index']);


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


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
