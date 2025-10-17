<?php

use Illuminate\Support\Facades\Route;

// Redirect root ke dashboard
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::get('/ppdb', function () {
        return view('admin.ppdb');
    })->name('ppdb');
    
    Route::get('/blog', function () {
        return view('admin.blog');
    })->name('blog');
});