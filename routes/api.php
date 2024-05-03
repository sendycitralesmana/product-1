<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\ClientController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ContentController;
use App\Http\Controllers\API\GalleryController;
use App\Http\Controllers\API\HistoryController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ApplicationController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\SpecificationController;

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

Route::get('/product-category', [ProductCategoryController::class, 'index']);
Route::get('/product-category/{id}', [ProductCategoryController::class, 'detail']);

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'detail']);

Route::get('/application', [ApplicationController::class, 'index']);
Route::get('/application/{id}', [ApplicationController::class, 'detail']);

Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{id}', [GalleryController::class, 'detail']);

Route::get('/specification', [SpecificationController::class, 'index']);
Route::get('/specification/{id}', [SpecificationController::class, 'detail']);

Route::get('/client', [ClientController::class, 'index']);
Route::get('/client/{id}', [ClientController::class, 'detail']);

Route::get('/comment', [CommentController::class, 'index']);
Route::get('/comment/{id}', [CommentController::class, 'detail']);

// Route::get('/content', [ContentController::class, 'index']);
// Route::get('/content/{id}', [ContentController::class, 'detail']);

// Route::get('/history', [HistoryController::class, 'index']);
// Route::get('/history/{id}', [HistoryController::class, 'detail']);