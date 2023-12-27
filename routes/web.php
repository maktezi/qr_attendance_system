<?php

use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\AttendanceController;

Route::get('/', function () {
    return view('index');
});

Route::get('/form', function () {
    return view('form');
});

Auth::routes();

Route::get('/home', [AdminController::class, 'dashboard'])->name('dashboard');

// User
Route::get('/add_user', [UserController::class, 'add'])->name('add.user');
Route::get('/edit_user/{id}', [UserController::class, 'edit'])->name('edit.user');
Route::post('/update_user/{id}', [UserController::class, 'update'])->name('update.user');
Route::post('/form_user', [UserController::class, 'store'])->name('store.user');
Route::get('/destroy_user/{id}', [UserController::class, 'destroy'])->name('destroy.user');

// Form
Route::get('/add_form', [FormController::class, 'add'])->name('add.form');
Route::get('/edit_form/{id}', [FormController::class, 'edit'])->name('edit.form');
Route::post('/update_form/{id}', [FormController::class, 'update'])->name('update.form');
Route::post('/store_form', [FormController::class, 'store'])->name('store.form');
Route::get('/destroy_form/{id}', [FormController::class, 'destroy'])->name('destroy.form');

// Attendance
Route::post('/attendances/scan/{id}', [AttendanceController::class, 'scanQrCode']);

Route::get('/scanqr', [QrCodeController::class, 'scanQR'])->name('scanqr');

Route::middleware(['check_admin_access'])->group(function () {
    Route::get('/users', [UserController::class, 'admin'])->name('users.admin');
    Route::get('/forms', [FormController::class, 'form'])->name('forms.admin');
    Route::get('/attendances', [AttendanceController::class, 'attendance'])->name('attendances.admin');
    Route::get('/qrcode/{id}', [QrCodeController::class, 'showQR'])->name('qrcode');
});
