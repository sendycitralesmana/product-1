<?php

namespace App\Http\Controllers\FE;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class AboutFEController extends Controller
{
    public function index () {
        $aboutTK = Content::where('id', 1)->first();
        $aboutVM = Content::where('id', 2)->first();
        $productCategories = ProductCategory::all();
        return view('front.about.aboutPage', [
            'aboutTK' => $aboutTK,
            'aboutVM' => $aboutVM,
            'productCategories' => $productCategories
        ]);
    }
}
