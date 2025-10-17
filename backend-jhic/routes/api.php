<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/registers', [RegisterController::class, 'index']);
Route::post('/registers', [RegisterController::class, 'store']);
Route::get('/registers/{id}', [RegisterController::class, 'show']);
Route::put('/registers/{id}', [RegisterController::class, 'update']);
Route::delete('/registers/{id}', [RegisterController::class, 'destroy']);