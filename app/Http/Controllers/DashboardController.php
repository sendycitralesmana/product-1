<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Client;
use App\Models\Product;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $products = Product::get();
        $applications = Application::get();
        $posts = Post::get();
        $clients = Client::get();

        return view('backoffice.dashboard.index', [
            'products' => $products,
            'applications' => $applications,
            'posts' => $posts,
            'clients' => $clients
        ]);
    }
}
