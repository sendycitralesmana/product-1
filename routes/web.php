<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MediaApplicationController;
use App\Http\Controllers\MediaProductController;
use App\Http\Controllers\MediaTypeController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductApplicationController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\VariantProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductMediaController;
use App\Http\Controllers\ProductVideoController;
use App\Http\Controllers\PVSpecificationController;
use App\Http\Controllers\VideoApplicationController;
use App\Models\ProductApplication;

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
    
    // Product
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/add', [ProductController::class, 'add']);
    Route::post('/product/create', [ProductController::class, 'create']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/product/{id}/update', [ProductController::class, 'update']);
    Route::get('/product/{id}/delete', [ProductController::class, 'delete']);
    Route::get('/product/{id}/detail', [ProductController::class, 'detail']);
        
        Route::get('/product/application/{id}', [ProductController::class, 'applicationByProduct']);
        Route::post('/product/application/create', [ProductApplicationController::class, 'createApplication']);

        Route::get('/product/category', [ProductCategoryController::class, 'index']);
        Route::get('/product/category/add', [ProductCategoryController::class, 'add']);
        Route::post('/product/category/create', [ProductCategoryController::class, 'create']);
        Route::get('/product/category/{id}/edit', [ProductCategoryController::class, 'edit']);
        Route::put('/product/category/{id}/update', [ProductCategoryController::class, 'update']);
        Route::get('/product/category/{id}/delete', [ProductCategoryController::class, 'delete']);
        Route::get('/product/category/{id}/detail', [ProductCategoryController::class, 'detail']);

        Route::get('/product/variant', [ProductVariantController::class, 'index']);
        Route::get('/product/variant/add', [ProductVariantController::class, 'add']);
        Route::post('/product/variant/create', [ProductVariantController::class, 'create']);
        Route::post('/product/variant/store', [ProductVariantController::class, 'store']);
        Route::get('/product/variant/{id}/edit', [ProductVariantController::class, 'edit']);
        Route::put('/product/variant/{id}/update', [ProductVariantController::class, 'update']);
        Route::get('/product/variant/{id}/delete', [ProductVariantController::class, 'delete']);
        Route::get('/product/variant/{id}', [ProductVariantController::class, 'variantByProduct']);

        Route::get('/product/specification', [SpecificationController::class, 'index']);
        Route::get('/product/specification/add', [SpecificationController::class, 'add']);
        Route::post('/product/specification/create', [SpecificationController::class, 'create']);
        Route::get('/product/specification/{id}/edit', [SpecificationController::class, 'edit']);
        Route::put('/product/specification/{id}/update', [SpecificationController::class, 'update']);
        Route::get('/product/specification/{id}/delete', [SpecificationController::class, 'delete']);

        Route::get('/product/media', [MediaProductController::class, 'index']);
        Route::get('/product/media/add', [MediaProductController::class, 'add']);
        Route::post('/product/media/create', [MediaProductController::class, 'create']);
        Route::post('/product/media/createMultiple', [MediaProductController::class, 'createMultiple']);
        Route::get('/product/media/{id}/edit', [MediaProductController::class, 'edit']);
        Route::put('/product/media/{id}/update', [MediaProductController::class, 'update']);
        Route::get('/product/media/{id}/delete', [MediaProductController::class, 'delete']);
        Route::get('/product/media/{id}', [MediaProductController::class, 'mediaByProduct']);
        Route::get('/product/media/download/{id}', [MediaProductController::class, 'downloadFile']);

        Route::get('/product/video', [ProductVideoController::class, 'index']);
        Route::get('/product/video/add', [ProductVideoController::class, 'add']);
        Route::post('/product/video/create', [ProductVideoController::class, 'create']);
        Route::get('/product/video/{id}/edit', [ProductVideoController::class, 'edit']);
        Route::put('/product/video/{id}/update', [ProductVideoController::class, 'update']);
        Route::get('/product/video/{id}/delete', [ProductVideoController::class, 'delete']);
        Route::get('/product/video/{id}', [ProductVideoController::class, 'videoByProduct']);

        Route::get('/product/vs', [PVSpecificationController::class, 'index']);
        Route::get('/product/vs/add', [PVSpecificationController::class, 'add']);
        Route::post('/product/vs/create', [PVSpecificationController::class, 'create']);
        Route::get('/product/vs/{id}/edit', [PVSpecificationController::class, 'edit']);
        Route::put('/product/vs/{id}/update', [PVSpecificationController::class, 'update']);
        Route::get('/product/vs/{id}/delete', [PVSpecificationController::class, 'delete']);
        Route::get('/product/vs/{id}', [PVSpecificationController::class, 'specByVariant']);
    // Product End
    
    // Media Type 
    Route::get('/media-type', [MediaTypeController::class, 'index']);
    Route::get('/media-type/add', [MediaTypeController::class, 'add']);
    Route::post('/media-type/create', [MediaTypeController::class, 'create']);
    Route::get('/media-type/{id}/edit', [MediaTypeController::class, 'edit']);
    Route::put('/media-type/{id}/update', [MediaTypeController::class, 'update']);
    Route::get('/media-type/{id}/delete', [MediaTypeController::class, 'delete']);
    
    // Application
    Route::get('/application', [ApplicationController::class, 'index']);
    Route::get('/application/add', [ApplicationController::class, 'add']);
    Route::post('/application/create', [ApplicationController::class, 'create']);
    Route::get('/application/{id}/edit', [ApplicationController::class, 'edit']);
    Route::put('/application/{id}/update', [ApplicationController::class, 'update']);
    Route::get('/application/{id}/delete', [ApplicationController::class, 'delete']);
    Route::get('/application/{id}/detail', [ApplicationController::class, 'detail']);
    Route::get('/application/product/{id}', [ApplicationController::class, 'productByApplication']);
    
    Route::post('/application/media/create', [MediaApplicationController::class, 'create']);
    Route::get('/application/media/{id}/edit', [MediaApplicationController::class, 'edit']);
    Route::put('/application/media/{id}/update', [MediaApplicationController::class, 'update']);
    Route::get('/application/media/{id}/delete', [MediaApplicationController::class, 'delete']);
    Route::get('/application/media/{id}', [MediaApplicationController::class, 'mediaByApplication']);
    Route::get('/application/media/download/{id}', [MediaApplicationController::class, 'downloadFile']);

    Route::post('application/video/create', [VideoApplicationController::class, 'create']);
    Route::get('application/video/{id}/edit', [VideoApplicationController::class, 'edit']);
    Route::put('application/video/{id}/update', [VideoApplicationController::class, 'update']);
    Route::get('application/video/{id}/delete', [VideoApplicationController::class, 'delete']);
    Route::get('application/video/{id}', [VideoApplicationController::class, 'videoByApplication']);
    
    Route::post('application/product/create', [ProductApplicationController::class, 'createProduct']);
    Route::get('/application/product-application/{id}', [ProductApplicationController::class, 'productByApplication']);
    // Application End


    // Post
    Route::get('/post', [PostController::class, 'index']);
    Route::post('/post/create', [PostController::class, 'create']);
    Route::put('/post/{id}/update', [PostController::class, 'update']);
    Route::get('/post/{id}/delete', [PostController::class, 'delete']);
    Route::get('/post/{id}/detail', [PostController::class, 'detail']);
    Route::get('/post/user/{id}', [PostController::class, 'postByUser']);
    
        Route::get('/post/category/{id}', [PostCategoryController::class, 'postByCategory']);
        Route::get('/post/category', [PostCategoryController::class, 'index']);
        Route::post('/post/category/create', [PostCategoryController::class, 'create']);
        Route::put('/post/category/{id}/update', [PostCategoryController::class, 'update']);
        Route::get('/post/category/{id}/delete', [PostCategoryController::class, 'delete']);
        Route::get('/post/category/{id}/detail', [PostCategoryController::class, 'detail']);
    // Post End

    // Post
    Route::get('/client', [ClientController::class, 'index']);
    Route::post('/client/create', [ClientController::class, 'create']);
    Route::put('/client/{id}/update', [ClientController::class, 'update']);
    Route::get('/client/{id}/delete', [ClientController::class, 'delete']);
    Route::get('/client/{id}/detail', [ClientController::class, 'detail']);
    
    // Content
    Route::get('/about/content', [ContentController::class, 'index']);
    Route::post('/about/content/create', [ContentController::class, 'create']);
    Route::put('/about/content/{id}/update', [ContentController::class, 'update']);
    Route::get('/about/content/{id}/delete', [ContentController::class, 'delete']);
    
    // History
    Route::get('/about/history', [HistoryController::class, 'index']);
    Route::post('/about/history/create', [HistoryController::class, 'create']);
    Route::put('/about/history/{id}/update', [HistoryController::class, 'update']);
    Route::get('/about/history/{id}/delete', [HistoryController::class, 'delete']);
});