<?php

namespace App\Http\Controllers\FE;

use App\Models\Post;
use App\Models\Client;
use App\Models\Content;
use App\Models\Product;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index () {
        $galleries = Gallery::orderBy('id', 'desc')->get()->take(8);
        $aboutTK = Content::where('id', 1)->first();
        $aboutVM = Content::where('id', 2)->first();
        $posts = Post::orderBy('id', 'desc')->get()->take(3);
        $products = Product::orderBy('id', 'desc')->get();
        $productCategories = ProductCategory::all();
        $applications = Application::orderBy('id', 'desc')->get()->take(3);
        $applicationC = Application::get();
        $clients = Client::get();

        return view('front.homepage.index', [
            'galleries' => $galleries,
            'aboutTK' => $aboutTK,
            'aboutVM' => $aboutVM,
            'posts' => $posts,
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications,
            'applicationC' => $applicationC,
            'clients' => $clients
        ]);
    }
    
    public function indexEn () {
        $posts = Post::orderBy('id', 'desc')->get()->take(3);
        $products = Product::orderBy('id', 'desc')->get();
        $productCategories = ProductCategory::all();
        $applications = Application::orderBy('id', 'desc')->get()->take(3);
        $applicationC = Application::get();
        $clients = Client::get();

        return view('front-en.homepage.index', [
            'posts' => $posts,
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications,
            'applicationC' => $applicationC,
            'clients' => $clients
        ]);
    }
}
