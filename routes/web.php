<?php

use Illuminate\Http\Request;
use App\Models\ProductApplication;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FE\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FE\PostFEController;
use App\Http\Controllers\MediaTypeController;
use App\Http\Controllers\FE\AboutFEController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContentAltController;
use App\Http\Controllers\FE\HomepageController;
use App\Http\Controllers\FE\ContactFEController;
use App\Http\Controllers\FE\GalleryFEController;
use App\Http\Controllers\FE\ProductFEController;
use App\Http\Controllers\MediaProductController;
use App\Http\Controllers\MessageEmailController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ProductMediaController;
use App\Http\Controllers\ProductVideoController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\VariantProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\PVSpecificationController;
use App\Http\Controllers\FE\ApplicationFEController;
use App\Http\Controllers\MediaApplicationController;
use App\Http\Controllers\VideoApplicationController;
use App\Http\Controllers\ProductApplicationController;
use App\Http\Controllers\FE\GoogleTranslateFEController;

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

Route::get('/cek', function () {
    return view('backoffice.auth.resetPassword');
});


// All role
Route::group(['middleware' => 'guest'], function(){
    
    // Auth
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-process', [AuthController::class, 'loginProcess']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register-process', [AuthController::class, 'registerProcess']);
    Route::get('verify/{token}', [AuthController::class, 'verifyEmail']);
    Route::get('reset/{token}', [AuthController::class, 'resetPassword']);
    Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('/forgot-password-process', [AuthController::class, 'forgotPasswordProcess']);
    Route::post('/reset-password-process/{token}', [AuthController::class, 'resetPasswordProcess']);
     
});
// front end

// google translate
Route::get('google/translate',[GoogleTranslateFEController::class,'googleTranslate']);

// homepage
Route::get('/', [HomeController::class, 'index']);

// product
Route::get('/product', [ProductFEController::class, 'index']);
Route::get('/product/category/{id}', [ProductFEController::class, 'category']);
Route::get('/product/{id}', [ProductFEController::class, 'detail']);
Route::get('/product/file/download/{id}', [MediaProductController::class, 'downloadFile']);

// application
Route::get('/application', [ApplicationFEController::class, 'index']);
Route::get('/application/{id}', [ApplicationFEController::class, 'detail']);
Route::get('/application/file/download/{id}', [MediaApplicationController::class, 'downloadFile']);

// blog / post
Route::get('/blog', [PostFEController::class, 'index']);
Route::get('/blog/{id}', [PostFEController::class, 'detail']);
Route::get('/blog/category/{id}', [PostFEController::class, 'category']);

// gallery
Route::get('/gallery', [GalleryFEController::class, 'index']);

// about
Route::get('/about', [AboutFEController::class, 'index']);

// contact
Route::get('/contact', [ContactFEController::class, 'index']);
Route::post('/contact/send', [ContactFEController::class, 'send']);

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
    Route::put('/backoffice/user/{id}/update-password', [UserController::class, 'updatePassword']);
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
        Route::get('/backoffice/product/application/{id}/delete', [ProductApplicationController::class, 'deleteApplication']);
        Route::post('/backoffice/product/application/create', [ProductApplicationController::class, 'createApplication']);

        Route::get('/backoffice/product/category/{id}', [ProductController::class, 'category']);
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
        Route::get('/backoffice/product/variant/{id}/export-pdf', [ProductVariantController::class, 'exportPdf']);

        Route::get('/backoffice/product/specification', [SpecificationController::class, 'index']);
        Route::get('/backoffice/product/specification/add', [SpecificationController::class, 'add']);
        Route::post('/backoffice/product/specification/create', [SpecificationController::class, 'create']);
        Route::get('/backoffice/product/specification/{id}/edit', [SpecificationController::class, 'edit']);
        Route::put('/backoffice/product/specification/{id}/update', [SpecificationController::class, 'update']);
        Route::get('/backoffice/product/specification/{id}/delete', [SpecificationController::class, 'delete']);

        Route::get('/backoffice/product/media', [MediaProductController::class, 'index']);
        Route::get('/backoffice/product/media/add', [MediaProductController::class, 'add']);
        Route::post('/backoffice/product/media/create', [MediaProductController::class, 'imageCreate']);
        Route::post('/backoffice/product/file/create', [MediaProductController::class, 'fileCreate']);
        Route::post('/backoffice/product/media/createMultiple', [MediaProductController::class, 'createMultiple']);
        Route::get('/backoffice/product/media/{id}/edit', [MediaProductController::class, 'edit']);
        Route::put('/backoffice/product/media/{id}/update', [MediaProductController::class, 'update']);
        Route::put('/backoffice/product/media/{id}/update', [MediaProductController::class, 'imageUpdate']);
        Route::put('/backoffice/product/file/{id}/update', [MediaProductController::class, 'fileUpdate']);
        Route::get('/backoffice/product/media/{id}/delete', [MediaProductController::class, 'delete']);
        Route::get('/backoffice/product/media/{id}', [MediaProductController::class, 'mediaByProduct']);
        Route::get('/backoffice/product/file/{id}', [MediaProductController::class, 'fileByProduct']);
        Route::get('/backoffice/product/file/download/{id}', [MediaProductController::class, 'downloadFile']);

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
        Route::get('/backoffice/product/{product}/vs/{id}', [PVSpecificationController::class, 'specByVariant']);
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
    
    Route::post('/backoffice/application/media/create', [MediaApplicationController::class, 'imageCreate']);
    Route::post('/backoffice/application/file/create', [MediaApplicationController::class, 'fileCreate']);
    Route::get('/backoffice/application/media/{id}/edit', [MediaApplicationController::class, 'edit']);
    Route::put('/backoffice/application/media/{id}/update', [MediaApplicationController::class, 'imageUpdate']);
    Route::put('/backoffice/application/file/{id}/update', [MediaApplicationController::class, 'fileUpdate']);
    Route::get('/backoffice/application/media/{id}/delete', [MediaApplicationController::class, 'delete']);
    Route::get('/backoffice/application/media/{id}', [MediaApplicationController::class, 'mediaByApplication']);
    Route::get('/backoffice/application/file/{id}', [MediaApplicationController::class, 'fileByApplication']);
    Route::get('/backoffice/application/file/download/{id}', [MediaApplicationController::class, 'downloadFile']);

    Route::post('/backoffice/application/video/create', [VideoApplicationController::class, 'create']);
    Route::get('/backoffice/application/video/{id}/edit', [VideoApplicationController::class, 'edit']);
    Route::put('/backoffice/application/video/{id}/update', [VideoApplicationController::class, 'update']);
    Route::get('/backoffice/application/video/{id}/delete', [VideoApplicationController::class, 'delete']);
    Route::get('/backoffice/application/video/{id}', [VideoApplicationController::class, 'videoByApplication']);
    
    Route::post('/backoffice/application/product/create', [ProductApplicationController::class, 'createProduct']);
    Route::get('/backoffice/application/product/{id}/delete', [ProductApplicationController::class, 'deleteProduct']);
    // Route::get('/backoffice/application/product-application/{id}', [ProductApplicationController::class, 'productByApplication']);
    // Application End


    // Post
    Route::get('/backoffice/post', [PostController::class, 'index']);
    Route::post('/backoffice/post/create', [PostController::class, 'create']);
    Route::put('/backoffice/post/{id}/update', [PostController::class, 'update']);
    Route::get('/backoffice/post/{id}/delete', [PostController::class, 'delete']);
    Route::get('/backoffice/post/{id}/detail', [PostController::class, 'detail']);
    Route::get('/backoffice/post/user/{id}', [PostController::class, 'postByUser']);
    Route::get('/backoffice/post/category/{id}', [PostController::class, 'postCategory']);

        Route::get('/backoffice/post/comment/{id}/delete', [CommentController::class, 'deleteComment']);

        Route::get('/backoffice/post/category', [PostCategoryController::class, 'index']);
        Route::post('/backoffice/post/category/create', [PostCategoryController::class, 'create']);
        Route::put('/backoffice/post/category/{id}/update', [PostCategoryController::class, 'update']);
        Route::get('/backoffice/post/category/{id}/delete', [PostCategoryController::class, 'delete']);
    // Post End

    // Gallery
    Route::get('/backoffice/gallery', [GalleryController::class, 'index']);
    Route::post('/backoffice/gallery/create', [GalleryController::class, 'create']);
    Route::put('/backoffice/gallery/{id}/update', [GalleryController::class, 'update']);
    Route::get('/backoffice/gallery/{id}/delete', [GalleryController::class, 'delete']);

    // Client
    Route::get('/backoffice/client', [ClientController::class, 'index']);
    Route::post('/backoffice/client/create', [ClientController::class, 'create']);
    Route::put('/backoffice/client/{id}/update', [ClientController::class, 'update']);
    Route::get('/backoffice/client/{id}/delete', [ClientController::class, 'delete']);
    Route::get('/backoffice/client/{id}/detail', [ClientController::class, 'detail']);
    
    // Feedback
    Route::get('/backoffice/feedback', [ContactUsController::class, 'index']);
    Route::get('/backoffice/feedback/{id}/delete', [ContactUsController::class, 'delete']);
    Route::get('/backoffice/feedback/{id}/detail', [ContactUsController::class, 'detail']);
        Route::post('/backoffice/feedback/{id}/send', [MessageEmailController::class, 'send']);
    
    // Content
    // Route::get('/backoffice/about/content', [ContentController::class, 'index']);
    // Route::post('/backoffice/about/content/create', [ContentController::class, 'create']);
    // Route::get('/backoffice/about/content/{id}/edit', [ContentController::class, 'edit']);
    // Route::put('/backoffice/about/content/{id}/update', [ContentController::class, 'update']);
    // Route::get('/backoffice/about/content/{id}/delete', [ContentController::class, 'delete']);

    Route::get('/backoffice/about/content', [ContentAltController::class, 'index']);
    Route::get('/backoffice/about/content/{id}/edit', [ContentAltController::class, 'edit']);
    Route::put('/backoffice/about/content/{id}/update', [ContentAltController::class, 'update']);
    
    // History
    Route::get('/backoffice/about/history', [HistoryController::class, 'index']);
    Route::post('/backoffice/about/history/create', [HistoryController::class, 'create']);
    Route::put('/backoffice/about/history/{id}/update', [HistoryController::class, 'update']);
    Route::get('/backoffice/about/history/{id}/delete', [HistoryController::class, 'delete']);
});