<?php

use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;

Route::get('/', [ProdiController::class, 'home'])->name('home');
Route::get('/dosen', [ProdiController::class, 'dosen'])->name('dosen');
Route::get('/kalender', [ProdiController::class, 'kalender'])->name('kalender');
Route::get('/kontak', [ProdiController::class, 'kontak'])->name('kontak');
Route::get('/dosen/tambah', [DosenController::class, 'create'])->name('dosen.create');
Route::post('/dosen', [DosenController::class, 'store'])->name('dosen.store');
Route::get('/dosen/{dosen}/edit', [DosenController::class, 'edit'])->name('dosen.edit');
Route::put('/dosen/{dosen}', [DosenController::class, 'update'])->name('dosen.update');
Route::delete('/dosen/{dosen}', [DosenController::class, 'destroy'])->name('dosen.destroy');
