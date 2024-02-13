<?php

namespace App\Http\Controllers\FE;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class GalleryFEController extends Controller
{
    public function index () {
        $galleries = Gallery::paginate(16);
        $productCategories = ProductCategory::all();

        return view('front.gallery.galleryPage', [
            'galleries' => $galleries,
            'productCategories' => $productCategories
        ]);
    }
}
