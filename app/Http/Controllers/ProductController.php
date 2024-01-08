<?php

namespace App\Http\Controllers;

use App\Models\MediaProduct;
use App\Models\MediaType;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', [
            'products' => $products
        ]);
    }
    
    public function detail($id)
    {
        $mediaProductsC = MediaProduct::where('product_id', $id)->count();
        $videoProductsC = ProductVideo::where('product_id', $id)->count();
        $productVariantsC = ProductVariant::where('product_id', $id)->count();

        $product = Product::with(['category'])->find($id);
        $productCategory = ProductCategory::get();
        $mediaTypes = MediaType::get();
        $mediaTypesC = MediaType::count();
        $mediaProducts = MediaProduct::where('product_id', $id)->with(['mediaType'])->paginate(2);
        $videoProducts = ProductVideo::where('product_id', $id)->paginate(2);
        $productVariants = ProductVariant::where('product_id', $id)->paginate(2);
        return view('product.detail', [
            'product' => $product,
            'productCategory' => $productCategory,
            'mediaTypes' => $mediaTypes,
            'mediaTypesC' => $mediaTypesC,
            'mediaProductsC' => $mediaProductsC,
            'videoProductsC' => $videoProductsC,
            'productVariantsC' => $productVariantsC,
            'mediaProducts' => $mediaProducts,
            'videoProducts' => $videoProducts,
            'productVariants' => $productVariants,
        ]);
    }

    public function add()
    {
        $productCategory = ProductCategory::get();
        return view('product.add', [
            'productCategory' => $productCategory
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = new product;
        $product->product_category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $productCategory = ProductCategory::get();
        return view('product.edit', [
            'product' => $product,
            'productCategory' => $productCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        $product = product::find($id);
        $product->product_category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        // dd($product);
        $product->save();

        Session::flash('product', 'success');
        Session::flash('message', 'Update data success');
        // return redirect('/product');
        return redirect('/product/'. $request->product_id .'/detail');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/product');
    }

}