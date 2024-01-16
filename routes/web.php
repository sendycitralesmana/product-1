<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FE\HomepageController;
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
// front end

Route::get('/', [HomepageController::class, 'index']);

Route::get('/application', [HomepageController::class, 'application']);
Route::get('/application/{id}', [HomepageController::class, 'applicationDetail']);

Route::get('/client', [HomepageController::class, 'client']);
Route::get('/client/{id}', [HomepageController::class, 'clientDetail']);

Route::get('/about', [HomepageController::class, 'about']);

Route::get('/product', [HomepageController::class, 'product']);
Route::get('/product/category/{id}', [HomepageController::class, 'productCategory']);
Route::get('/product/{id}', [HomepageController::class, 'productDetail']);

Route::get('/product/variant/{id}', [HomepageController::class, 'productVariant']);

// front end


Route::group(['middleware' => 'auth'], function(){

    // Auth
    Route::get('/logout', [AuthController::class, 'logout']);

    // Dashboard
    Route::get('/backoffice/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/backoffice/profile/{id}', [UserController::class, 'profile']);

    // User
    Route::get('/backoffice/user', [UserController::class, 'index']);
    Route::get('/backoffice/user/add', [UserController::class, 'add']);
    Route::post('/backoffice/user/create', [UserController::class, 'create']);
    Route::get('/backoffice/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/backoffice/user/{id}/update', [UserController::class, 'update']);
    Route::get('/backoffice/user/{id}/delete', [UserController::class, 'delete']);
    Route::put('/backoffice/user/update-profile', [UserController::class, 'updateProfile']);
    
    // Product
    Route::get('/backoffice/product', [ProductController::class, 'index']);
    Route::get('/backoffice/product/add', [ProductController::class, 'add']);
    Route::post('/backoffice/product/create', [ProductController::class, 'create']);
    Route::get('/backoffice/product/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/backoffice/product/{id}/update', [ProductController::class, 'update']);
    Route::get('/backoffice/product/{id}/delete', [ProductController::class, 'delete']);
    Route::get('/backoffice/product/{id}/detail', [ProductController::class, 'detail']);
        
        Route::get('/backoffice/product/application/{id}', [ProductController::class, 'applicationByProduct']);
        Route::post('/backoffice/product/application/create', [ProductApplicationController::class, 'createApplication']);

        Route::get('/backoffice/product/category', [ProductCategoryController::class, 'index']);
        Route::get('/backoffice/product/category/add', [ProductCategoryController::class, 'add']);
        Route::post('/backoffice/product/category/create', [ProductCategoryController::class, 'create']);
        Route::get('/backoffice/product/category/{id}/edit', [ProductCategoryController::class, 'edit']);
        Route::put('/backoffice/product/category/{id}/update', [ProductCategoryController::class, 'update']);
        Route::get('/backoffice/product/category/{id}/delete', [ProductCategoryController::class, 'delete']);
        Route::get('/backoffice/product/category/{id}/detail', [ProductCategoryController::class, 'detail']);

        Route::get('/backoffice/product/variant', [ProductVariantController::class, 'index']);
        Route::get('/backoffice/product/variant/add', [ProductVariantController::class, 'add']);
        Route::post('/backoffice/product/variant/create', [ProductVariantController::class, 'create']);
        Route::post('/backoffice/product/variant/store', [ProductVariantController::class, 'store']);
        Route::get('/backoffice/product/variant/{id}/edit', [ProductVariantController::class, 'edit']);
        Route::put('/backoffice/product/variant/{id}/update', [ProductVariantController::class, 'update']);
        Route::get('/backoffice/product/variant/{id}/delete', [ProductVariantController::class, 'delete']);
        Route::get('/backoffice/product/variant/{id}', [ProductVariantController::class, 'variantByProduct']);

        Route::get('/backoffice/product/specification', [SpecificationController::class, 'index']);
        Route::get('/backoffice/product/specification/add', [SpecificationController::class, 'add']);
        Route::post('/backoffice/product/specification/create', [SpecificationController::class, 'create']);
        Route::get('/backoffice/product/specification/{id}/edit', [SpecificationController::class, 'edit']);
        Route::put('/backoffice/product/specification/{id}/update', [SpecificationController::class, 'update']);
        Route::get('/backoffice/product/specification/{id}/delete', [SpecificationController::class, 'delete']);

        Route::get('/backoffice/product/media', [MediaProductController::class, 'index']);
        Route::get('/backoffice/product/media/add', [MediaProductController::class, 'add']);
        Route::post('/backoffice/product/media/create', [MediaProductController::class, 'create']);
        Route::post('/backoffice/product/media/createMultiple', [MediaProductController::class, 'createMultiple']);
        Route::get('/backoffice/product/media/{id}/edit', [MediaProductController::class, 'edit']);
        Route::put('/backoffice/product/media/{id}/update', [MediaProductController::class, 'update']);
        Route::get('/backoffice/product/media/{id}/delete', [MediaProductController::class, 'delete']);
        Route::get('/backoffice/product/media/{id}', [MediaProductController::class, 'mediaByProduct']);
        Route::get('/backoffice/product/media/download/{id}', [MediaProductController::class, 'downloadFile']);

        Route::get('/backoffice/product/video', [ProductVideoController::class, 'index']);
        Route::get('/backoffice/product/video/add', [ProductVideoController::class, 'add']);
        Route::post('/backoffice/product/video/create', [ProductVideoController::class, 'create']);
        Route::get('/backoffice/product/video/{id}/edit', [ProductVideoController::class, 'edit']);
        Route::put('/backoffice/product/video/{id}/update', [ProductVideoController::class, 'update']);
        Route::get('/backoffice/product/video/{id}/delete', [ProductVideoController::class, 'delete']);
        Route::get('/backoffice/product/video/{id}', [ProductVideoController::class, 'videoByProduct']);

        Route::get('/backoffice/product/vs', [PVSpecificationController::class, 'index']);
        Route::get('/backoffice/product/vs/add', [PVSpecificationController::class, 'add']);
        Route::post('/backoffice/product/vs/create', [PVSpecificationController::class, 'create']);
        Route::get('/backoffice/product/vs/{id}/edit', [PVSpecificationController::class, 'edit']);
        Route::put('/backoffice/product/vs/{id}/update', [PVSpecificationController::class, 'update']);
        Route::get('/backoffice/product/vs/{id}/delete', [PVSpecificationController::class, 'delete']);
        Route::get('/backoffice/product/vs/{id}', [PVSpecificationController::class, 'specByVariant']);
    // Product End
    
    // Media Type 
    Route::get('/backoffice/media-type', [MediaTypeController::class, 'index']);
    Route::get('/backoffice/media-type/add', [MediaTypeController::class, 'add']);
    Route::post('/backoffice/media-type/create', [MediaTypeController::class, 'create']);
    Route::get('/backoffice/media-type/{id}/edit', [MediaTypeController::class, 'edit']);
    Route::put('/backoffice/media-type/{id}/update', [MediaTypeController::class, 'update']);
    Route::get('/backoffice/media-type/{id}/delete', [MediaTypeController::class, 'delete']);
    
    // Application
    Route::get('/backoffice/application', [ApplicationController::class, 'index']);
    Route::get('/backoffice/application/add', [ApplicationController::class, 'add']);
    Route::post('/backoffice/application/create', [ApplicationController::class, 'create']);
    Route::get('/backoffice/application/{id}/edit', [ApplicationController::class, 'edit']);
    Route::put('/backoffice/application/{id}/update', [ApplicationController::class, 'update']);
    Route::get('/backoffice/application/{id}/delete', [ApplicationController::class, 'delete']);
    Route::get('/backoffice/application/{id}/detail', [ApplicationController::class, 'detail']);
    Route::get('/backoffice/application/product/{id}', [ApplicationController::class, 'productByApplication']);
    
    Route::post('/backoffice/application/media/create', [MediaApplicationController::class, 'create']);
    Route::get('/backoffice/application/media/{id}/edit', [MediaApplicationController::class, 'edit']);
    Route::put('/backoffice/application/media/{id}/update', [MediaApplicationController::class, 'update']);
    Route::get('/backoffice/application/media/{id}/delete', [MediaApplicationController::class, 'delete']);
    Route::get('/backoffice/application/media/{id}', [MediaApplicationController::class, 'mediaByApplication']);
    Route::get('/backoffice/application/media/download/{id}', [MediaApplicationController::class, 'downloadFile']);

    Route::post('/backoffice/application/video/create', [VideoApplicationController::class, 'create']);
    Route::get('/backoffice/application/video/{id}/edit', [VideoApplicationController::class, 'edit']);
    Route::put('/backoffice/application/video/{id}/update', [VideoApplicationController::class, 'update']);
    Route::get('/backoffice/application/video/{id}/delete', [VideoApplicationController::class, 'delete']);
    Route::get('/backoffice/application/video/{id}', [VideoApplicationController::class, 'videoByApplication']);
    
    Route::post('/backoffice/application/product/create', [ProductApplicationController::class, 'createProduct']);
    Route::get('/backoffice/application/product-application/{id}', [ProductApplicationController::class, 'productByApplication']);
    // Application End


    // Post
    Route::get('/backoffice/post', [PostController::class, 'index']);
    Route::post('/backoffice/post/create', [PostController::class, 'create']);
    Route::put('/backoffice/post/{id}/update', [PostController::class, 'update']);
    Route::get('/backoffice/post/{id}/delete', [PostController::class, 'delete']);
    Route::get('/backoffice/post/{id}/detail', [PostController::class, 'detail']);
    Route::get('/backoffice/post/user/{id}', [PostController::class, 'postByUser']);
    
        Route::get('/backoffice/post/category/{id}', [PostCategoryController::class, 'postByCategory']);
        Route::get('/backoffice/post/category', [PostCategoryController::class, 'index']);
        Route::post('/backoffice/post/category/create', [PostCategoryController::class, 'create']);
        Route::put('/backoffice/post/category/{id}/update', [PostCategoryController::class, 'update']);
        Route::get('/backoffice/post/category/{id}/delete', [PostCategoryController::class, 'delete']);
        Route::get('/backoffice/post/category/{id}/detail', [PostCategoryController::class, 'detail']);
    // Post End

    // Post
    Route::get('/backoffice/client', [ClientController::class, 'index']);
    Route::post('/backoffice/client/create', [ClientController::class, 'create']);
    Route::put('/backoffice/client/{id}/update', [ClientController::class, 'update']);
    Route::get('/backoffice/client/{id}/delete', [ClientController::class, 'delete']);
    Route::get('/backoffice/client/{id}/detail', [ClientController::class, 'detail']);
    
    // Content
    Route::get('/backoffice/about/content', [ContentController::class, 'index']);
    Route::post('/backoffice/about/content/create', [ContentController::class, 'create']);
    Route::put('/backoffice/about/content/{id}/update', [ContentController::class, 'update']);
    Route::get('/backoffice/about/content/{id}/delete', [ContentController::class, 'delete']);
    
    // History
    Route::get('/backoffice/about/history', [HistoryController::class, 'index']);
    Route::post('/backoffice/about/history/create', [HistoryController::class, 'create']);
    Route::put('/backoffice/about/history/{id}/update', [HistoryController::class, 'update']);
    Route::get('/backoffice/about/history/{id}/delete', [HistoryController::class, 'delete']);
});