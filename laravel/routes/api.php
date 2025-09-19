<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| File ini berisi definisi route untuk API.
| Semua route yang didefinisikan di sini otomatis memiliki prefix "/api".
|
*/

// Default route untuk cek API
Route::get('/ping', function () {
    return response()->json(['message' => 'API is working!']);
});

// User routes

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

