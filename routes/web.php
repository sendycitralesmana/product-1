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
use App\Http\Controllers\ContentAltController;
use App\Http\Controllers\FE\AboutFEController;
use App\Http\Controllers\ApplicationController;
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
use App\Http\Controllers\ManagementContentController;
use App\Http\Controllers\ProductApplicationController;
use App\Http\Controllers\BackOffice\CarouselController;
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

// Route::get('/updateAllSlug', [ProductController::class, 'updateAllSlug']);
// Route::get('/updateAllSlug', [ProductCategoryController::class, 'updateAllSlug']);

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

Route::get('/search', [HomeController::class, 'search']);

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

// backoffice

Route::group(['middleware' => 'auth'], function(){

    // Auth
    Route::get('/logout', [AuthController::class, 'logout']);

    // grup backoffice
    Route::group(['prefix' => 'backoffice'], function(){

        // grup carousel
        Route::group(['prefix' => 'carousel'], function(){
            Route::get('/', [CarouselController::class, 'index']);
            Route::post('/store', [CarouselController::class, 'store']);

            // grup carousel_id
            Route::group(['prefix' => '{carousel_id}'], function(){
                Route::put('/update', [CarouselController::class, 'update']);
                Route::get('/delete', [CarouselController::class, 'delete']);
            });  
        });
        
        // grup data produk
        Route::group(['prefix' => 'product'], function(){

            // grup category
            Route::group(['prefix' => 'category'], function(){
                Route::get('/', [ProductCategoryController::class, 'index']);
                Route::post('/create', [ProductCategoryController::class, 'create']);
                Route::get('/category/{category_id}', [ProductCategoryController::class, 'index']);
                
                // grup category_id
                Route::group(['prefix' => '{category_id}'], function(){
                    Route::put('/update', [ProductCategoryController::class, 'update']);
                    Route::get('/delete', [ProductCategoryController::class, 'delete']);
                    
                    // grup product
                    Route::group(['prefix' => 'product'], function(){
                        Route::get('/', [ProductController::class, 'index']);
                        Route::post('/create', [ProductController::class, 'create']);

                        // grup product_id
                        Route::group(['prefix' => '{product_id}'], function(){
                            Route::get('/detail', [ProductController::class, 'detail']);
                            Route::put('/update', [ProductController::class, 'update']);
                            Route::get('/delete', [ProductController::class, 'delete']);

                            // grup image
                            Route::group(['prefix' => 'image'], function(){
                                Route::get('/', [MediaProductController::class, 'mediaByProduct']);
                                Route::post('/create', [MediaProductController::class, 'imageCreate']);

                                // grup image_id
                                Route::group(['prefix' => '{image_id}'], function(){
                                    Route::put('/update', [MediaProductController::class, 'imageUpdate']);
                                    Route::get('/delete', [MediaProductController::class, 'delete']);
                                });

                            });

                            // grup file
                            Route::group(['prefix' => 'file'], function(){
                                Route::get('/', [MediaProductController::class, 'fileByProduct']);
                                Route::post('/create', [MediaProductController::class, 'fileCreate']);

                                // grup file_id
                                Route::group(['prefix' => '{file_id}'], function(){
                                    Route::get('/download', [MediaProductController::class, 'downloadFile']);
                                    Route::put('/update', [MediaProductController::class, 'fileUpdate']);
                                    Route::get('/delete', [MediaProductController::class, 'delete']);
                                });

                            });

                            // grup variant
                            Route::group(['prefix' => 'variant'], function(){
                                Route::get('/', [ProductVariantController::class, 'index']);
                                Route::post('/create', [ProductVariantController::class, 'create']);

                                // grup variant_id
                                Route::group(['prefix' => '{variant_id}'], function(){
                                    Route::get('/export-pdf', [ProductVariantController::class, 'exportPdf']);
                                    Route::put('/update', [ProductVariantController::class, 'update']);
                                    Route::get('/delete', [ProductVariantController::class, 'delete']);

                                    // grup variant spesifikasi
                                    Route::group(['prefix' => 'variant-specification'], function(){
                                        Route::get('/', [PVSpecificationController::class, 'index']);
                                        Route::post('/create', [PVSpecificationController::class, 'create']);

                                        // grup specification
                                        Route::group(['prefix' => 'specification'], function(){
                                            Route::get('/', [SpecificationController::class, 'index']);
                                            Route::post('/create', [SpecificationController::class, 'create']);

                                            // grup specification_id
                                            Route::group(['prefix' => '{specification_id}'], function(){
                                                Route::put('/update', [SpecificationController::class, 'update']);
                                                Route::get('/delete', [SpecificationController::class, 'delete']);
                                            });
                                            
                                        });

                                        // grup variant_specification_id
                                        Route::group(['prefix' => '{variant_specification_id}'], function(){
                                            Route::put('/update', [PVSpecificationController::class, 'update']);
                                            Route::get('/delete', [PVSpecificationController::class, 'delete']);
                                        });

                                    });

                                });

                            });

                            // grup application
                            Route::group(['prefix' => 'application'], function(){
                                Route::get('/', [ProductApplicationController::class, 'applicationByProduct']);
                                Route::post('/create', [ProductApplicationController::class, 'createApplication']);

                                // grup application_id
                                Route::group(['prefix' => '{application_id}'], function(){
                                    Route::get('/delete', [ProductApplicationController::class, 'deleteApplication']);
                                });

                            });

                        });
                    
                    });
                
                });
            
            });
            
        }); 

        // grup sorot product
        Route::group(['prefix' => 'sorot-product'], function(){
            Route::get('/', [ProductController::class, 'sorotProduct']);

            // grup sorot-product_id
            Route::group(['prefix' => '{sorot_product_id}'], function(){
                Route::get('/sorot', [ProductController::class, 'sorot']);
                Route::get('/non-sorot', [ProductController::class, 'nonSorot']);
            }); 
        });

        // grup management content
        Route::group(['prefix' => 'management-content'], function(){
            Route::get('/', [ManagementContentController::class, 'index']);

            // grup management_content_id
            Route::group(['prefix' => '{management_content_id}'], function(){
                Route::put('/edit', [ManagementContentController::class, 'edit']);
            });
        });

        // grup application
        Route::group(['prefix' => 'application'], function(){
            Route::get('/', [ApplicationController::class, 'index']);
            Route::post('/create', [ApplicationController::class, 'create']);

            // grup application_id
            Route::group(['prefix' => '{application_id}'], function(){
                Route::get('/detail', [ApplicationController::class, 'detail']);
                Route::get('/delete', [ApplicationController::class, 'delete']);
                Route::put('/update', [ApplicationController::class, 'update']);

                // grup image
                Route::group(['prefix' => 'image'], function(){
                    Route::get('/', [MediaApplicationController::class, 'mediaByApplication']);
                    Route::post('/create', [MediaApplicationController::class, 'imageCreate']);

                    // grup image_id
                    Route::group(['prefix' => '{image_id}'], function(){
                        Route::put('/update', [MediaApplicationController::class, 'imageUpdate']);
                        Route::get('/delete', [MediaApplicationController::class, 'delete']);
                    });

                });

                // grup file
                Route::group(['prefix' => 'file'], function(){
                    Route::get('/', [MediaApplicationController::class, 'fileByApplication']);
                    Route::post('/create', [MediaApplicationController::class, 'fileCreate']);

                    // grup file_id
                    Route::group(['prefix' => '{file_id}'], function(){
                        Route::put('/update', [MediaApplicationController::class, 'fileUpdate']);
                        Route::get('/delete', [MediaApplicationController::class, 'delete']);
                    });

                });

                // grup product
                Route::group(['prefix' => 'product'], function(){
                    Route::get('/', [ProductApplicationController::class, 'productByApplication']);
                    Route::post('/create', [ProductApplicationController::class, 'createProduct']);

                    // grup product_id
                    Route::group(['prefix' => '{product_id}'], function(){
                        Route::get('/delete', [ProductApplicationController::class, 'deleteProduct']);
                    });

                });

            });

        });

    });

    // Dashboard
    Route::get('/backoffice/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/backoffice/profile/{id}', [UserController::class, 'profile']);
    Route::put('/backoffice/profile/{id}/update-data', [UserController::class, 'updateData']);
    Route::put('/backoffice/profile/{id}/update-password', [UserController::class, 'updatePassword']);

    // User
    Route::get('/backoffice/user', [UserController::class, 'index']);
    Route::get('/backoffice/user/add', [UserController::class, 'add']);
    Route::post('/backoffice/user/create', [UserController::class, 'create']);
    Route::get('/backoffice/user/{id}/edit', [UserController::class, 'edit']);
    Route::put('/backoffice/user/{id}/update', [UserController::class, 'update']);
    Route::put('/backoffice/user/{id}/update-password', [UserController::class, 'updatePassword']);
    Route::get('/backoffice/user/{id}/delete', [UserController::class, 'delete']);
    Route::put('/backoffice/user/update-profile', [UserController::class, 'updateProfile']);


    
    // Media Type 
    Route::get('/backoffice/media-type', [MediaTypeController::class, 'index']);
    Route::get('/backoffice/media-type/add', [MediaTypeController::class, 'add']);
    Route::post('/backoffice/media-type/create', [MediaTypeController::class, 'create']);
    Route::get('/backoffice/media-type/{id}/edit', [MediaTypeController::class, 'edit']);
    Route::put('/backoffice/media-type/{id}/update', [MediaTypeController::class, 'update']);
    Route::get('/backoffice/media-type/{id}/delete', [MediaTypeController::class, 'delete']);

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
    // Route::get('/backoffice/gallery', [GalleryController::class, 'index']);
    // Route::post('/backoffice/gallery/create', [GalleryController::class, 'create']);
    // Route::put('/backoffice/gallery/{id}/update', [GalleryController::class, 'update']);
    // Route::get('/backoffice/gallery/{id}/delete', [GalleryController::class, 'delete']);

    // Client
    Route::get('/backoffice/client', [ClientController::class, 'index']);
    Route::post('/backoffice/client/create', [ClientController::class, 'create']);
    Route::put('/backoffice/client/{id}/update', [ClientController::class, 'update']);
    Route::get('/backoffice/client/{id}/delete', [ClientController::class, 'delete']);
    Route::get('/backoffice/client/{id}/detail', [ClientController::class, 'detail']);

    Route::get('/backoffice/client/{id}/show', [ClientController::class, 'show']);
    Route::get('/backoffice/client/{id}/hide', [ClientController::class, 'hide']);
    
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