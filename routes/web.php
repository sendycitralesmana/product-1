<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaProductController;
use App\Http\Controllers\MediaTypeController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\VariantProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductMediaController;
use App\Http\Controllers\ProductVideoController;
use App\Http\Controllers\PVSpecificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('user/index');
// });

// All role
Route::group(['middleware' => 'guest'], function(){
    
    // Auth
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthController::class, 'loginProcess']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register-process', [AuthController::class, 'registerProcess']);
    
});

Route::group(['middleware' => 'auth'], function(){

    // Auth
    Route::get('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // User
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/add', [UserController::class, 'add']);
    Route::post('/user/create', [UserController::class, 'create']);
    Route::get('/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/user/{id}/update', [UserController::class, 'update']);
    Route::get('/user/{id}/delete', [UserController::class, 'delete']);
    Route::put('/user/update-profile', [UserController::class, 'updateProfile']);
    
    // Product Categories
    Route::get('/product-category', [ProductCategoryController::class, 'index']);
    Route::get('/product-category/add', [ProductCategoryController::class, 'add']);
    Route::post('/product-category/create', [ProductCategoryController::class, 'create']);
    Route::get('/product-category/{id}/edit', [ProductCategoryController::class, 'edit']);
    Route::put('/product-category/{id}/update', [ProductCategoryController::class, 'update']);
    Route::get('/product-category/{id}/delete', [ProductCategoryController::class, 'delete']);
    Route::get('/product-category/{id}/detail', [ProductCategoryController::class, 'detail']);
    
    // Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/add', [ProductController::class, 'add']);
    Route::post('/product/create', [ProductController::class, 'create']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/product/{id}/update', [ProductController::class, 'update']);
    Route::get('/product/{id}/delete', [ProductController::class, 'delete']);
    Route::get('/product/{id}/detail', [ProductController::class, 'detail']);

    // Specification
    Route::get('/specification', [SpecificationController::class, 'index']);
    Route::get('/specification/add', [SpecificationController::class, 'add']);
    Route::post('/specification/create', [SpecificationController::class, 'create']);
    Route::get('/specification/{id}/edit', [SpecificationController::class, 'edit']);
    Route::put('/specification/{id}/update', [SpecificationController::class, 'update']);
    Route::get('/specification/{id}/delete', [SpecificationController::class, 'delete']);
    
    // Variant
    Route::get('/product-variant', [ProductVariantController::class, 'index']);
    Route::get('/product-variant/add', [ProductVariantController::class, 'add']);
    Route::post('/product-variant/create', [ProductVariantController::class, 'create']);
    Route::post('/product-variant/store', [ProductVariantController::class, 'store']);
    Route::get('/product-variant/{id}/edit', [ProductVariantController::class, 'edit']);
    Route::put('/product-variant/{id}/update', [ProductVariantController::class, 'update']);
    Route::get('/product-variant/{id}/delete', [ProductVariantController::class, 'delete']);
    Route::get('/product-variant/product:{id}', [ProductVariantController::class, 'detailByProduct']);
    
    // Product Variant Specification
    Route::get('/pv-specification', [PVSpecificationController::class, 'index']);
    Route::get('/pv-specification/add', [PVSpecificationController::class, 'add']);
    Route::post('/pv-specification/create', [PVSpecificationController::class, 'create']);
    // Route::post('/pv-specification/create-multiple', [PVSpecificationController::class, 'createMultiple']);
    Route::get('/pv-specification/{id}/edit', [PVSpecificationController::class, 'edit']);
    Route::put('/pv-specification/{id}/update', [PVSpecificationController::class, 'update']);
    Route::get('/pv-specification/{id}/delete', [PVSpecificationController::class, 'delete']);
    Route::get('/pv-specification/variant:{id}', [PVSpecificationController::class, 'detail']);
    
    // Media Type 
    Route::get('/media-type', [MediaTypeController::class, 'index']);
    Route::get('/media-type/add', [MediaTypeController::class, 'add']);
    Route::post('/media-type/create', [MediaTypeController::class, 'create']);
    Route::get('/media-type/{id}/edit', [MediaTypeController::class, 'edit']);
    Route::put('/media-type/{id}/update', [MediaTypeController::class, 'update']);
    Route::get('/media-type/{id}/delete', [MediaTypeController::class, 'delete']);
    
    // Product Media
    Route::get('/media-product', [MediaProductController::class, 'index']);
    Route::get('/media-product/add', [MediaProductController::class, 'add']);
    Route::post('/media-product/create', [MediaProductController::class, 'create']);
    Route::post('/media-product/createMultiple', [MediaProductController::class, 'createMultiple']);
    Route::get('/media-product/{id}/edit', [MediaProductController::class, 'edit']);
    Route::put('/media-product/{id}/update', [MediaProductController::class, 'update']);
    Route::get('/media-product/{id}/delete', [MediaProductController::class, 'delete']);
    Route::get('/media-product/product:{id}', [MediaProductController::class, 'detailByproduct']);
    
    // Product Video
    Route::get('/product-video', [ProductVideoController::class, 'index']);
    Route::get('/product-video/add', [ProductVideoController::class, 'add']);
    Route::post('/product-video/create', [ProductVideoController::class, 'create']);
    Route::get('/product-video/{id}/edit', [ProductVideoController::class, 'edit']);
    Route::put('/product-video/{id}/update', [ProductVideoController::class, 'update']);
    Route::get('/product-video/{id}/delete', [ProductVideoController::class, 'delete']);
    Route::get('/product-video/product:{id}', [ProductVideoController::class, 'detailByProduct']);
});