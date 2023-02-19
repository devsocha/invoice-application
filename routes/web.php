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
Route::post('/password-confirm/submit',[\App\Http\Controllers\credential\registerController::class,'registerVerifySubmit'
])->name('passwordConfirm.submit');
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
Route::get('users-settings',[\App\Http\Controllers\admin\optionsController::class,'usersSettings'
])->name('usersSettings');
Route::post('users-settings/submit',[\App\Http\Controllers\credential\registerController::class,'registerSubmit'
])->name('usersSettings.submit');
Route::get('user-settings-edit/{id}',[\App\Http\Controllers\admin\optionsController::class,'userSettingsEdit'
])->name('userSettingsEdit');
Route::post('user-settings-submit',[\App\Http\Controllers\admin\optionsController::class,'userSettingsEditUpdate'
])->name('userSettingsEditSubmit');
Route::get('user-settings-delete/{id}',[\App\Http\Controllers\admin\optionsController::class,'userSettingsDelete'
])->name('userSettingsDelete');
Route::get('company-settings',[\App\Http\Controllers\admin\optionsController::class,'companySettings'
])->name('companySettings');
Route::post('company-settings/submit',[\App\Http\Controllers\admin\optionsController::class,'companySettingsEdit'
])->name('companySettingsSubmit');
Route::get('number-account-settings',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettings'
])->name('numberAccountSettings');
Route::post('number-account-settings-submit',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsUpdate'
])->name('numberAccountSettingsSubmit');
Route::get('number-account-settings-delete/{id}',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsDelete'
])->name('numberAccountSettingsDelete');
Route::get('number-account-settings-edit/{id}',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsEdit'
])->name('numberAccountSettingsEdit');
Route::post('number-account-settings-edit-submit',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsEditSubmit'
])->name('numberAccountSettingsEditSubmit');
