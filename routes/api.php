<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',    [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',  [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);

    // CRUD productos
    Route::apiResource('products', ProductController::class);

    // Valoraciones
    Route::get('/products/{product}/reviews',  [ReviewController::class, 'index']);
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store']);

    // Estadísticas
    Route::get('/products/{product}/average-rating', [ProductController::class, 'averageRating']);
    Route::get('/products-best-rated',               [ProductController::class, 'bestRated']);
});