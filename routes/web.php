<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\ProdiController;
use App\Http\Controllers\ProdiController as ControllersProdiController;

Route::get('/', [ControllersProdiController::class, 'home'])->name('home');
Route::get('/kontak', [ControllersProdiController::class, 'kontak'])->name('kontak');