<?php

use Illuminate\Support\Facades\Route;

/* Logowanie */
Route::get('/', [\App\Http\Controllers\credential\loginController::class,'index'])->name('loginpage');
Route::post('/login-submit',[\App\Http\Controllers\credential\loginController::class,'login'])->name('login.submit');
Route::get('logout',[\App\Http\Controllers\credential\loginController::class,'logout'])->name('logout');
/* Reset hasła */
Route::get('forget-password/',[\App\Http\Controllers\credential\forgetPasswordController::class,'index'])->name('forget.password');
Route::post('forget-password/submit',[\App\Http\Controllers\credential\forgetPasswordController::class,'forgetPassword'])->name('forget.password.submit');
/* Potwierdzenie hasła */
Route::get('/password-confirm/{token}/{email}',[\App\Http\Controllers\credential\registerController::class,'registerVerify'])->name('confirm.password');

/* Rejestracja */

/* User */
Route::get('/home',[\App\Http\Controllers\user\homeController::class,'index'
])->name('user.home');
Route::get('pdf',[\App\Http\Controllers\user\pdfController::class,'pdf'
])->name('pdf.invoice');
Route::get('account-settings',[\App\Http\Controllers\user\optionsController::class,'accountSettings'
])->name('accountSettings');
Route::post('account-settings/submit',[\App\Http\Controllers\user\optionsController::class,'accountSettingsUpdate'
])->name('accountSettings.submit');
Route::get('invoice',[\App\Http\Controllers\user\invoiceController::class,'index'
])->name('invoice');
Route::get('company',[\App\Http\Controllers\user\companyController::class,'index'
])->name('company');
Route::get('reports',[\App\Http\Controllers\user\reportsController::class,'index'
])->name('reports');
/* Admin */
