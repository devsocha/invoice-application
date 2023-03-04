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
Route::get('pdf/{id}',[\App\Http\Controllers\user\pdfController::class,'pdf'
])->name('pdf.invoice');
Route::get('account-settings',[\App\Http\Controllers\user\optionsController::class,'accountSettings'
])->name('accountSettings');
Route::post('account-settings/submit',[\App\Http\Controllers\user\optionsController::class,'accountSettingsUpdate'
])->name('accountSettings.submit');
Route::get('invoice',[\App\Http\Controllers\user\invoiceController::class,'index'
])->name('invoice');
Route::get('company',[\App\Http\Controllers\user\companyController::class,'index'
])->name('company');
Route::get('company-add',[\App\Http\Controllers\user\companyController::class,'companyAdd'
])->name('companyAdd');
Route::post('company-add-submit',[\App\Http\Controllers\user\companyController::class,'companyAddSubmit'
])->name('companyAddSubmit');
Route::get('company-edit/{id}',[\App\Http\Controllers\user\companyController::class,'companyEdit'
])->name('companyEdit');
Route::post('company-edit-submit',[\App\Http\Controllers\user\companyController::class,'companyEditSubmit'
])->name('companyEditSubmit');
Route::get('new-invoice',[\App\Http\Controllers\user\invoiceController::class,'newInvoice'
])->name('newInvoice');
Route::post('new-invoice-Add',[\App\Http\Controllers\user\invoiceController::class,'newInvoiceAdd'
])->name('newInvoiceAdd');
Route::get('invoice-remove/{id}',[\App\Http\Controllers\user\invoiceController::class,'deleteInvoice'
])->name('invoiceRemove');
Route::get('invoice-paid/{id}',[\App\Http\Controllers\user\invoiceController::class,'paidInvoice'
])->name('invoicePaid');
Route::get('invoice-created/{id}',[\App\Http\Controllers\user\invoiceController::class,'createdInvoice'
])->name('invoiceCreated');
Route::get('invoice-edit/{id}',[\App\Http\Controllers\user\invoiceController::class,'editInvoice'
])->name('invoiceEdit');
Route::post('invoice-edit-submit',[\App\Http\Controllers\user\invoiceController::class,'editInvoiceSubmit'
])->name('invoiceEditSubmit');

/* Admin */
Route::get('users-settings',[\App\Http\Controllers\admin\optionsController::class,'usersSettings'
])->name('usersSettings')->middleware('auth','admin');
Route::post('users-settings/submit',[\App\Http\Controllers\credential\registerController::class,'registerSubmit'
])->name('usersSettings.submit')->middleware('auth','admin');
Route::get('user-settings-edit/{id}',[\App\Http\Controllers\admin\optionsController::class,'userSettingsEdit'
])->name('userSettingsEdit')->middleware('auth','admin');
Route::post('user-settings-submit',[\App\Http\Controllers\admin\optionsController::class,'userSettingsEditUpdate'
])->name('userSettingsEditSubmit')->middleware('auth','admin');
Route::get('user-settings-delete/{id}',[\App\Http\Controllers\admin\optionsController::class,'userSettingsDelete'
])->name('userSettingsDelete')->middleware('auth','admin');
Route::get('company-settings',[\App\Http\Controllers\admin\optionsController::class,'companySettings'
])->name('companySettings')->middleware('auth','admin');
Route::post('company-settings/submit',[\App\Http\Controllers\admin\optionsController::class,'companySettingsEdit'
])->name('companySettingsSubmit')->middleware('auth','admin');
Route::get('number-account-settings',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettings'
])->name('numberAccountSettings')->middleware('auth','admin');
Route::post('number-account-settings-submit',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsUpdate'
])->name('numberAccountSettingsSubmit')->middleware('auth','admin');
Route::get('number-account-settings-delete/{id}',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsDelete'
])->name('numberAccountSettingsDelete')->middleware('auth','admin');
Route::get('number-account-settings-edit/{id}',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsEdit'
])->name('numberAccountSettingsEdit')->middleware('auth','admin');
Route::post('number-account-settings-edit-submit',[\App\Http\Controllers\admin\optionsController::class,'numberAccountSettingsEditSubmit'
])->name('numberAccountSettingsEditSubmit')->middleware('auth','admin');
