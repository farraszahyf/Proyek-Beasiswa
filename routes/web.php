<?php

use App\Http\Controllers\BeasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hasilbeasiswa', [BeasiswaController::class, 'show'])->name('beasiswa.show');

Route::get('/daftarbeasiswa', [BeasiswaController::class,'create'])->name('beasiswa.create');
Route::post('/daftarbeasiswa', [BeasiswaController::class, 'store'])->name('beasiswa.store');

Route::get('/home', [BeasiswaController::class, 'home'])->name('home');