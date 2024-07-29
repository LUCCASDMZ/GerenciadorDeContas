<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContaController;

Route::get('/', function () {
    return view('welcome');
});


// CONTAS

Route::get('/', [ContaController::class, 'menu'])->name('site.menu');
Route::get('/index-conta', [ContaController::class, 'index'])->name('conta.index');
Route::get('/create-conta', [ContaController::class, 'create'])->name('conta.create');
Route::post('/store-conta', [ContaController::class, 'store'])->name('conta.store');
Route::get('/show-conta{conta}', [ContaController::class, 'show'])->name('conta.show');
Route::get('/edit-conta{conta}', [ContaController::class, 'edit'])->name('conta.edit');
Route::put('/update-conta{conta}', [ContaController::class, 'update'])->name('conta.update');
Route::delete('/destroy-conta', [ContaController::class, 'destroy'])->name('conta.destroy');
