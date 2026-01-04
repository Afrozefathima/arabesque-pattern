<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/supplier/register', [SupplierController::class, 'showRegisterForm'])->name('supplier.register');
Route::post('/supplier/register', [SupplierController::class, 'register'])->name('supplier.register.submit');

Route::get('/supplier/login', [SupplierController::class, 'showLoginForm'])->name('supplier.login');
Route::post('/supplier/login', [SupplierController::class, 'login'])->name('supplier.login.submit');

Route::get('/supplier/dashboard', [SupplierController::class, 'dashboard'])->name('supplier.dashboard');

Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/', function () {
    return view('pages.home');
});

Route::get('/find-parts', [CarController::class, 'index'])->name('find-parts.index');


Route::get('/find-parts/{make}', [CarController::class, 'findByMake'])->name('find-parts');

