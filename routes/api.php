<?php

use App\Http\Controllers\API\ApplicationController;
use App\Http\Controllers\API\ContentController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SpecificationController;
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

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'detail']);

Route::get('/application', [ApplicationController::class, 'index']);

Route::get('/content', [ContentController::class, 'index']);
Route::get('/content/{id}', [ContentController::class, 'detail']);

Route::get('/history', [HistoryController::class, 'index']);
Route::get('/history/{id}', [HistoryController::class, 'detail']);

Route::get('/specification', [SpecificationController::class, 'index']);
Route::get('/specification/{id}', [SpecificationController::class, 'detail']);

