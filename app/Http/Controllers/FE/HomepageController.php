<?php

namespace App\Http\Controllers\FE;

use App\Models\Post;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Content;
use App\Models\Product;
use App\Models\Application;
use App\Models\MediaProduct;
use App\Models\PostCategory;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\PVSpecification;
use App\Models\MediaApplication;
use App\Models\VideoApplication;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index() {
        $productCategories = ProductCategory::get();
        $products = Product::with('media')->get();
        $aboutC = Content::where('page_id', 1)->first();
        $vimiC = Content::where('page_id', 2)->first();
        $content1 = Content::where('id', 1)->first();
        $content2 = Content::where('id', 2)->first();
        $posts = Post::get();
        if ($posts->count() > 1) {
            $postLatest = Post::orderBy('id', 'desc')->take(2)->get();
        } else {
            $postLatest = $posts;
        }
        $applicationC = Application::count();
        if ($applicationC > 5) {
            $applications = Application::with(['media'])->get()->random(6);
        } else {
            $applications = Application::with(['media'])->get();
        }

        $clients = Client::get();
        return view('frontend.homepage.index', [
            'productCategories' => $productCategories,
            'products' => $products,
            'applications' => $applications,
            'clients' => $clients,
            'aboutC' => $aboutC,
            'vimiC' => $vimiC,
            'postLatest' => $postLatest,
            'content1' => $content1,
            'content2' => $content2
        ]);
    }

    public function application() {
        $applications = Application::with(['media'])->paginate(6);
        $productCategories = ProductCategory::get();

        return view('frontend.application.application', [
            'applications' => $applications,
            'productCategories' => $productCategories

        ]);
    }
    
    public function applicationDetail($id) {
        $application = Application::with(['media', 'client'])->find($id);
        $mediaApps = MediaApplication::where('application_id', $id)->Where('type_id', 1)->get();
        $fileApps = MediaApplication::where('application_id', $id)->Where('type_id', 2)->get();
        $videoApps = VideoApplication::where('application_id', $id)->get();
        $productCategories = ProductCategory::get();

        return view('frontend.application.detail', [
            'application' => $application,
            'mediaApps' => $mediaApps,
            'fileApps' => $fileApps,
            'videoApps' => $videoApps,
            'productCategories' => $productCategories

        ]);
    }

    public function client() {
        $clients = Client::get();
        $productCategories = ProductCategory::get();

        return view('frontend.client.client', [
            'clients' => $clients,
            'productCategories' => $productCategories
        ]);
    }

    public function clientDetail($id) {
        $client = Client::find($id);
        $productCategories = ProductCategory::get();
        return view('frontend.client.detail', [
            'client' => $client,
            'productCategories' => $productCategories
        ]);
    }

    public function product() {
        $products = Product::paginate(9);
        $productCategories = ProductCategory::get();
        return view('frontend.product.product', [
            'products' => $products,
            'productCategories' => $productCategories,
        ]);
    }
    
    public function productCategory($id) {
        $products = Product::where('product_category_id', $id)->paginate(9);
        $productCategories = ProductCategory::get();
        $productCategory = ProductCategory::find($id);

        return view('frontend.product.productCategory', [
            'products' => $products,
            'productCategories' => $productCategories,
            'productCategory' => $productCategory,
        ]);
    }
    
    public function productDetail($id) {
        $product = Product::find($id);
        $productCategories = ProductCategory::get();
        $productCategory = ProductCategory::find($id);
        $imgProducts = MediaProduct::where('type_id', 1)->where('product_id', $id)->get();
        $fileProducts = MediaProduct::where('type_id', 2)->where('product_id', $id)->get();
        $variantProducts = ProductVariant::where('product_id', $id)->get();
        $videoProducts = ProductVideo::where('product_id', $id)->get();

        return view('frontend.product.detail', [
            'product' => $product,
            'productCategories' => $productCategories,
            'productCategory' => $productCategory,
            'imgProducts' => $imgProducts,
            'fileProducts' => $fileProducts,
            'variantProducts' => $variantProducts,
            'videoProducts' => $videoProducts,
        ]);
    }

    public function about() {
        $productCategories = ProductCategory::get();
        $content1 = Content::where('id', 1)->first();
        $content2 = Content::where('id', 2)->first();

        return view('frontend.about.about', [
            'productCategories' => $productCategories,
            'content1' => $content1,
            'content2' => $content2
        ]);
    }

    public function post() {
        $posts = Post::paginate(4);
        $postRecents = Post::orderBy('id', 'desc')->take(2)->get();
        $postCategories = PostCategory::get();
        $productCategories = ProductCategory::get();
        return view('frontend.post.post', [
            'posts' => $posts,
            'postRecents' => $postRecents,
            'postCategories' => $postCategories,
            'productCategories' => $productCategories
        ]);
    }

    public function postCategory($id) {
        $postsAll = Post::get();
        $posts = Post::where('post_category_id', $id)->paginate(4);
        $postRecents = Post::orderBy('id', 'desc')->take(2)->get();
        $postCategories = PostCategory::get();
        $productCategories = ProductCategory::get();
        $postCategory = PostCategory::find($id);

        return view('frontend.post.category', [
            'postsAll' => $postsAll,
            'posts' => $posts,
            'postRecents' => $postRecents,
            'postCategories' => $postCategories,
            'productCategories' => $productCategories,
            'postCategory' => $postCategory
        ]);
    }

    public function postDetail($id) {
        $post = Post::find($id);
        $posts = Post::get();
        $postCategories = PostCategory::get();
        $postRecents = Post::orderBy('id', 'desc')->take(2)->get();
        $productCategories = ProductCategory::get();
        $commentC = Comment::where('post_id', $id)->get();
        $comments = Comment::where('post_id', $id)->paginate(5);
        return view('frontend.post.detail', [
            'posts' => $posts,
            'postRecents' => $postRecents,
            'postCategories' => $postCategories,
            'post' => $post,
            'productCategories' => $productCategories,
            'commentC' => $commentC,
            'comments' => $comments
        ]);
    }

    public function variantDetail($id) {
        $variant = ProductVariant::find($id);
        $productCategories = ProductCategory::get();
        $variantSpecs = PVSpecification::where('product_variant_id', $id)->get();
        return view('frontend.variant.detail', [
            'variant' => $variant,
            'productCategories' => $productCategories,
            'variantSpecs' => $variantSpecs
        ]);
    }
    
}
