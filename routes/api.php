<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Public Routes
// Route::get('/users',[UserController::class, 'index']);
// Route::get('/users/{id}',[UserController::class, 'show']);
// Route::post('/users',[UserController::class,'store']);
// Route::put('/users/{id}',[UserController::class,'update']);
// Route::delete('/users/{id}',[UserController::class,'destroy']);

// Route::resource('users', UserController::class);

   Route::post('/register', [CustomAuthController::class, 'register']);
   Route::post('/login', [CustomAuthController::class, 'login']);

// Protected Routes
// Route::middleware('auth:sanctum')->get('/users/{id}',[UserController::class, 'show']);
// Route::middleware('auth:sanctum')->get('/users',[UserController::class, 'index']);

// Route::middleware('auth:sanctum')->group(function(){
//  Route::get('/users', [UserController::class, 'index']);
//  Route::get('/users/{id}', [UserController::class, 'show']);
//  Route::post('/users', [UserController::class, 'store']);
//  Route::put('/users/{id}', [UserController::class, 'update']);
//  Route::delete('/users/{id}', [UserController::class, 'destroy']);
//  Route::post('/logout', [CustomAuthController::class, 'logout']);
// });

// Partially Procted
// Public
    Route::get('/users',[UserController::class, 'index']);
    Route::get('/users/{id}',[UserController::class, 'show']);

// Protected
   Route::middleware('auth:sanctum')->group(function(){
     Route::post('/users', [UserController::class, 'store']);
     Route::put('/users/{id}', [UserController::class, 'update']);
     Route::delete('/users/{id}', [UserController::class, 'destroy']);
     Route::post('/logout', [CustomAuthController::class, 'logout']);
    });


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });