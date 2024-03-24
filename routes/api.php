<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return 'test';
});

Route::prefix('/books')->group(function () {
    Route::get('/', [\App\Http\Controllers\BookController::class, 'index']);
    Route::get('/{book}', [\App\Http\Controllers\BookController::class, 'show']);
    Route::post('/', [\App\Http\Controllers\BookController::class, 'post']);
    Route::patch('/{book}', [\App\Http\Controllers\BookController::class, 'update']);
    Route::delete('/{book}', [\App\Http\Controllers\BookController::class, 'destroy']);
});