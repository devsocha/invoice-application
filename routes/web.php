<?php

use Illuminate\Support\Facades\Route;

/* Logowanie */
Route::get('/', [\App\Http\Controllers\credential\loginController::class,'index'])->name('loginpage');
Route::post('/login-submit',[\App\Http\Controllers\credential\loginController::class,'login'])->name('login.submit');

/* Rejestracja */

/* User */

/* Admin */
