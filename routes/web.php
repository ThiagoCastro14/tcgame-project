<?php

use App\Http\Controllers\Admin\RespostaSuporteController;
use App\Http\Controllers\Admin\SuporteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\ContatoController;
use Illuminate\Support\Facades\Route;

Route::get('/contato', [ContatoController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/suporte/{id}/respostas', [RespostaSuporteController::class, 'store'])->name('respostas.store');
    Route::delete('/suporte/{id}/respostas/{resposta}', [RespostaSuporteController::class, 'destroy'])->name('respostas.destroy');
    Route::get('/suporte/{id}/respostas', [RespostaSuporteController::class, 'index'])->name('respostas.index');


    Route::delete('/suporte/{id}', [SuporteController::class, 'destroy'])->name('suporte.destroy');
    Route::put('/suporte/{id}', [SuporteController::class, 'update'])->name('suporte.update');
    Route::get('/suporte/{id}/edit', [SuporteController::class, 'edit'])->name('suporte.edit');
    Route::get('/suporte/create', [SuporteController::class, 'create'])->name('suporte.create');
    Route::post('/suporte', [SuporteController::class, 'store'])->name('suporte.store');
    Route::get('/suporte', [SuporteController::class, 'index'])->name('suporte.index');

    
});

require __DIR__ . '/auth.php';