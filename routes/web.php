<?php

use Illuminate\Support\Facades\Route;

/* Logowanie */
Route::get('/', [\App\Http\Controllers\credential\loginController::class,'index'])->name('loginpage');
Route::post('/login-submit',[\App\Http\Controllers\credential\loginController::class,'login'])->name('login.submit');
/* Reset hasła */
Route::get('forget-password/',[\App\Http\Controllers\credential\forgetPasswordController::class,'index'])->name('forget.password');
Route::post('forget-password/submit',[\App\Http\Controllers\credential\forgetPasswordController::class,'forgetPassword'])->name('forget.password.submit');
/* Potwierdzenie hasła */
Route::get('/password-confirm/{token}/{email}',[\App\Http\Controllers\credential\registerController::class,'registerVerify'])->name('confirm.password');

/* Rejestracja */

/* User */
Route::get('/home',[\App\Http\Controllers\user\homeController::class,'index'])->name('user.home');

/* Admin */
