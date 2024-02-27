<?php

namespace App\Http\Controllers\FE;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Models\Product;

class AboutFEController extends Controller
{
    public function index () {
        $aboutTK = Content::where('id', 1)->first();
        $aboutVM = Content::where('id', 2)->first();
        $productCategories = ProductCategory::all();
        $products = Product::get();
        return view('front.about.aboutPage', [
            'aboutTK' => $aboutTK,
            'products' => $products,
            'aboutVM' => $aboutVM,
            'productCategories' => $productCategories
        ]);
    }
}
