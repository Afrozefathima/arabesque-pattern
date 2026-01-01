<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PartController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\SupplierPartController;
use App\Http\Controllers\Api\AdminController;

Route::get('/test', function () {
    return response()->json(['message' => 'API works']);
});

Route::get('/parts',[PartController::class, 'index']); //works
Route::get('/parts/{id}',[PartController::class, 'show']); //works
Route::post('/parts',[PartController::class, 'store']);   //works
Route::put('/parts/{id}', [PartController::class, 'update']);  //works
Route::delete('/parts/{id}', [PartController::class, 'destroy']);  //works


Route::get('/inquiries', [InquiryController::class, 'index']);      // GET all inquiries //works
Route::get('/inquiries/{id}', [InquiryController::class, 'show']); // GET single inquiry //works
Route::post('/inquiries', [InquiryController::class, 'store']);    // POST new inquiry //works
Route::put('/inquiries/{id}', [InquiryController::class, 'update']); // PUT update inquiry //works
Route::delete('/inquiries/{id}', [InquiryController::class, 'destroy']); // DELETE inquiry //works


// Authentication
Route::post('/suppliers/register', [SupplierController::class, 'register']); //works
Route::post('/suppliers/login', [SupplierController::class, 'login']); //works

// Protected routes
Route::middleware('auth:sanctum')->group(function () { //works
    Route::get('/suppliers/me', [SupplierController::class, 'me']);
    Route::post('/suppliers/logout', [SupplierController::class, 'logout']);
});


Route::middleware('auth:sanctum')->group(function () { //works
    Route::get('/supplier-parts', [SupplierPartController::class, 'index']);       // List supplier's parts
    Route::post('/supplier-parts', [SupplierPartController::class, 'store']);      // Add a part
    Route::put('/supplier-parts/{id}', [SupplierPartController::class, 'update']);  // Update part info
    Route::delete('/supplier-parts/{id}', [SupplierPartController::class, 'destroy']); // Delete part
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/supplier/parts', [SupplierPartController::class, 'index']);
    Route::post('/supplier/parts', [SupplierPartController::class, 'store']);
    Route::delete('/supplier/parts/{id}', [SupplierPartController::class, 'destroy']);
});


// Admin login
Route::post('/admin/login', [AdminController::class, 'login']); //works

// Protected admin routes
Route::middleware('auth:sanctum')->group(function () { //works
    Route::get('/admin/suppliers', [AdminController::class, 'listSuppliers']);
    Route::get('/admin/supplier-parts', [AdminController::class, 'listSupplierParts']);
    Route::post('/admin/supplier-parts/{id}/verify', [AdminController::class, 'verifySupplierPart']);
});

