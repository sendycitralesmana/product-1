<?php

namespace App\Http\Controllers\FE;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Models\MediaProduct;
use App\Models\ProductVideo;
use App\Models\PVSpecification;

class ProductFEController extends Controller
{
    public function index (Request $request) {
        $products = Product::all();
        if (request()->name) {
            $products = Product::where('name', 'like', '%' . $request->name . '%')->paginate();
        }
        $productP = Product::paginate(12);
        $productCategories = ProductCategory::all();

        return view('front.product.productPage', [
            'name' => $request->name,
            'products' => $products,
            'productP' => $productP,
            'productCategories' => $productCategories
        ]);
    }

    public function category (Request $request, $id) {
        $productCategories = ProductCategory::all();
        $productCategory = ProductCategory::find($id);
        $products = Product::where('product_category_id', $id)->paginate(8);
        if ($request->name) {
            $products = Product::where('name', 'like', '%' . $request->name . '%')->paginate(8);
        }
        return view('front.product.categoryPage', [
            'name' => $request->name,
            'products' => $products,
            'productCategory' => $productCategory,
            'productCategories' => $productCategories
        ]);
    }

    public function detail (Request $request, $id) {
        $product = Product::find($id);
        $productCategories = ProductCategory::all();
        $productR = Product::where('product_category_id', $product->product_category_id)->get();
        $images = MediaProduct::where('product_id', $product->id)
                                ->where('type_id', 1)
                                ->get();
        $files = MediaProduct::where('product_id', $product->id)->where('type_id', 2)->get();
        $videos = ProductVideo::where('product_id', $product->id)->get();
        $productVariant = ProductVariant::where('product_id', $product->id)->first();
        $minPrice = ProductVariant::where('product_id', $product->id)->min('price');
        $maxPrice = ProductVariant::where('product_id', $product->id)->max('price');
        if ($productVariant == null) {
            return view('front.product.detail', [
                'product' => $product,
                'files' => $files,
                'productCategories' => $productCategories,
                'productR' => $productR,
                'images' => $images,
                'videos' => $videos,
                'productVariant' => $productVariant,
            ]);
        }
        
        $specifications = PVSpecification::where('product_variant_id', $productVariant->id)->get();
        if ($request->variant) {
            $productVariant = ProductVariant::where('id', $request->variant)->first();
            $specifications = PVSpecification::where('product_variant_id', $productVariant->id)->get();
        }
        return view('front.product.detail', [
            'product' => $product,
            'productCategories' => $productCategories,
            'productR' => $productR,
            'images' => $images,
            'files' => $files,
            'videos' => $videos,
            'productVariant' => $productVariant,
            'specifications' => $specifications,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice
        ]);
    }

    public function indexEn (Request $request) {
        $products = Product::all();
        if (request()->name) {
            $products = Product::where('name', 'like', '%' . $request->name . '%')->paginate();
        }
        $productP = Product::paginate(12);
        $productCategories = ProductCategory::all();

        return view('front-en.product.productPage', [
            'products' => $products,
            'productP' => $productP,
            'productCategories' => $productCategories
        ]);
    }

    public function categoryEn (Request $request, $id) {
        $productCategories = ProductCategory::all();
        $productCategory = ProductCategory::find($id);
        $products = Product::where('product_category_id', $id)->paginate(8);
        if ($request->name) {
            $products = Product::where('name', 'like', '%' . $request->name . '%')->paginate(8);
        }
        return view('front-en.product.categoryPage', [
            'products' => $products,
            'productCategory' => $productCategory,
            'productCategories' => $productCategories
        ]);
    }

    public function detailEn (Request $request, $id) {
        $product = Product::find($id);
        $productCategories = ProductCategory::all();
        $productR = Product::where('product_category_id', $product->product_category_id)->get();
        $images = MediaProduct::where('product_id', $product->id)
                                ->where('type_id', 1)
                                ->get();
        $videos = ProductVideo::where('product_id', $product->id)->get();
        $productVariant = ProductVariant::where('product_id', $product->id)->first();
        $minPrice = ProductVariant::where('product_id', $product->id)->min('price');
        $maxPrice = ProductVariant::where('product_id', $product->id)->max('price');
        if ($productVariant == null) {
            return view('front-en.product.detail', [
                'product' => $product,
                'productCategories' => $productCategories,
                'productR' => $productR,
                'images' => $images,
                'videos' => $videos,
                'productVariant' => $productVariant,
            ]);
        }
        
        $specifications = PVSpecification::where('product_variant_id', $productVariant->id)->get();
        if ($request->variant) {
            $productVariant = ProductVariant::where('id', $request->variant)->first();
            $specifications = PVSpecification::where('product_variant_id', $productVariant->id)->get();
        }
        return view('front-en.product.detail', [
            'product' => $product,
            'productCategories' => $productCategories,
            'productR' => $productR,
            'images' => $images,
            'videos' => $videos,
            'productVariant' => $productVariant,
            'specifications' => $specifications,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice
        ]);
    }
}
