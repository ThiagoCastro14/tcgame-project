<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RespostaSuporteApiController;
use App\Http\Controllers\Api\SuporteController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'auth'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/respostas/{suporte_id}', [RespostaSuporteApiController::class, 'getRespostasFromSuporte']);
    Route::post('/respostas/{suporte_id}', [RespostaSuporteApiController::class, 'createNewResposta']);
    Route::delete('/respostas/{id}', [RespostaSuporteApiController::class, 'destroy']);

    Route::apiResource('/suporte', SuporteController::class);
});
