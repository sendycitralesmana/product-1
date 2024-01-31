<?php

namespace App\Http\Controllers\FE;

use App\Models\Post;
use App\Models\Client;
use App\Models\Product;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index () {
        $posts = Post::orderBy('id', 'desc')->get()->take(3);
        $products = Product::orderBy('id', 'desc')->get();
        $productCategories = ProductCategory::all();
        $applications = Application::orderBy('id', 'desc')->get()->take(3);
        $applicationC = Application::get();
        $clients = Client::get();

        return view('front.homepage.index', [
            'posts' => $posts,
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications,
            'applicationC' => $applicationC,
            'clients' => $clients
        ]);
    }
}
