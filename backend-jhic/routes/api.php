<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Account;

// Public routes (tidak perlu login)
Route::get('/test', function () {
    return response()->json(['message' => 'API jalan']);
});
Route::post('/register', [AccountController::class, 'register']); // buat akun
Route::post('/login', [AccountController::class, 'login']);   
Route::get('/accounts', function() {
    return response()->json(Account::all());
});    // login akun

// Protected routes (butuh token Sanctum)
// Protected routes (butuh token Sanctum)
Route::middleware('auth:sanctum')->group(function () {

    // Akun logout
    Route::post('/logout', [AccountController::class, 'logout']);

    // Profil pengguna (Account + Register)
    Route::get('/profile', [ProfileController::class, 'show']);

    // CRUD PPDB / Register data
    Route::get('/registers', [RegisterController::class, 'index']);
    Route::post('/registers', [RegisterController::class, 'store']);
    Route::get('/registers/{id}', [RegisterController::class, 'show']);
    Route::put('/registers/{id}', [RegisterController::class, 'update']);
    Route::delete('/registers/{id}', [RegisterController::class, 'destroy']);
});

