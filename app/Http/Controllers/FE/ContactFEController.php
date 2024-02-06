<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ContactFEController extends Controller
{
    public function index () {
        $productCategories = ProductCategory::all();
        
        return view('front.contact.contactPage', [
            'productCategories' => $productCategories
        ]);
    }
    
    public function indexEn () {
        $productCategories = ProductCategory::all();

        return view('front-en.contact.contactPage', [
            'productCategories' => $productCategories
        ]);
    }
}
