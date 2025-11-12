<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Web Kolong
Route::prefix('api/v1/web')->name('api.v1.')->group(function () {
    Route::get('/health', function () {
        return response()->json([
            'status' => 'ok',
            'message' => 'Kolong API is running',
            'timestamp' => now()->toISOString(),
        ]);
    })->name('health');

    Route::get('/users', [UserController::class, 'index']);
});

// API Mobile Kolong
Route::prefix('api/v1')->name('api.v1.')->group(function () {
    Route::get('/health', function () {
        return response()->json([
            'status' => 'ok',
            'message' => 'Kolong API is running',
            'timestamp' => now()->toISOString(),
        ]);
    })->name('health');

    Route::get('/users', [UserController::class, 'index']);
});