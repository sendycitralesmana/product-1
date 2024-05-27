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
use App\Http\Controllers\API\CarouselController;
use App\Http\Controllers\API\PostCategoryController;
use App\Http\Controllers\API\ProductCategoryController;
use App\Http\Controllers\API\ProductMediaController;
use App\Http\Controllers\API\ProductVariantController;
use App\Http\Controllers\API\PVSpecificationtController;
use App\Http\Controllers\API\SpecificationController;
use App\Http\Controllers\API\UserController;

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

// user
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'detail']);

// carousel
Route::get('/carousel', [CarouselController::class, 'index']);

// product
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'detail']);

// product-category
Route::get('/product-category', [ProductCategoryController::class, 'index']);
Route::get('/product-category/{id}', [ProductCategoryController::class, 'detail']);

// product-media
Route::get('/product/{product_id}/media', [ProductMediaController::class, 'index']);
Route::get('/product/{product_id}/media/{media_id}', [ProductMediaController::class, 'detail']);

// product-file
Route::get('/product/{product_id}/file', [ProductMediaController::class, 'index']);
Route::get('/product/{product_id}/file/{file_id}', [ProductMediaController::class, 'detail']);

// product-variant
Route::get('/product/{product_id}/variant', [ProductVariantController::class, 'index']);
Route::get('/product/{product_id}/variant/{variant_id}', [ProductVariantController::class, 'detail']);

// product-variant-specification
Route::get('/product/{product_id}/variant/{variant_id}/spec', [PVSpecificationtController::class, 'index']);
Route::get('/product/{product_id}/variant/{variant_id}/spec/{spec_id}', [PVSpecificationtController::class, 'detail']);

// post / artikel
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'detail']);

// post-category
Route::get('/post-category', [PostCategoryController::class, 'index']);
Route::get('/post-category/{id}', [PostCategoryController::class, 'detail']);

// application / proyek
Route::get('/application', [ApplicationController::class, 'index']);
Route::get('/application/{id}', [ApplicationController::class, 'detail']);

// gallery
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{id}', [GalleryController::class, 'detail']);

// specification
Route::get('/specification', [SpecificationController::class, 'index']);
Route::get('/specification/{id}', [SpecificationController::class, 'detail']);

// client
Route::get('/client', [ClientController::class, 'index']);
Route::get('/client/{id}', [ClientController::class, 'detail']);

// comment
Route::get('/comment', [CommentController::class, 'index']);
Route::get('/comment/{id}', [CommentController::class, 'detail']);



// Route::get('/content', [ContentController::class, 'index']);
// Route::get('/content/{id}', [ContentController::class, 'detail']);

// Route::get('/history', [HistoryController::class, 'index']);
// Route::get('/history/{id}', [HistoryController::class, 'detail']);