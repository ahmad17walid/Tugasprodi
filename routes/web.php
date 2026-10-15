<?php

use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProdiController::class, 'home'])->name('home');
Route::get('/dosen', [ProdiController::class, 'dosen'])->name('dosen');
Route::get('/kalender', [ProdiController::class, 'kalender'])->name('kalender');
Route::get('/kontak', [ProdiController::class, 'kontak'])->name('kontak');