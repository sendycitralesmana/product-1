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
}
