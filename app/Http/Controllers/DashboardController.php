<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Client;
use App\Models\Product;
use App\Models\Application;
use App\Models\Gallery;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $products = Product::get();
        $applications = Application::get();
        $posts = Post::get();
        $galleries = Gallery::get();
        $clients = Client::get();
        $feedbacks = Message::get();

        return view('backoffice.dashboard.index', [
            'products' => $products,
            'applications' => $applications,
            'posts' => $posts,
            'galleries' => $galleries,
            'clients' => $clients,
            'feedbacks' => $feedbacks
        ]);
    }
}
