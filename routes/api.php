<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PartController;
use App\Http\Controllers\Api\InquiryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\SupplierPartController;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\CarController;

Route::get('/test', function () {
    return response()->json(['message' => 'API works']);
});

Route::get('/parts',[PartController::class, 'index']);
Route::get('/parts/{id}',[PartController::class, 'show']); 
Route::post('/parts',[PartController::class, 'store']);  
Route::put('/parts/{id}', [PartController::class, 'update']);  
Route::delete('/parts/{id}', [PartController::class, 'destroy']);  


Route::get('/inquiries', [InquiryController::class, 'index']);      
Route::get('/inquiries/{id}', [InquiryController::class, 'show']); 
Route::post('/inquiries', [InquiryController::class, 'store']);    
Route::put('/inquiries/{id}', [InquiryController::class, 'update']); 
Route::delete('/inquiries/{id}', [InquiryController::class, 'destroy']); 


// Authentication
Route::post('/suppliers/register', [SupplierController::class, 'register']); 
Route::post('/suppliers/login', [SupplierController::class, 'login']); 

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


