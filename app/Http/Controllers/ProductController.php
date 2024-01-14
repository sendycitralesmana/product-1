<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaType;
use App\Models\Application;
use App\Models\MediaProduct;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\ProductApplication;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productCategories = ProductCategory::get();
        $applications = Application::get();
        return view('product.index', [
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications
        ]);
    }
    
    public function detail($id)
    {
        $product = Product::with(['category', 'application', 'variant', 'media', 'video'])->find($id);

        $productCategories = ProductCategory::get();
        $mediaTypes = MediaType::get();
        $applications = Application::get();
        return view('product.detail', [
            'product' => $product,
            'applications' => $applications,
            'productCategories' => $productCategories,
            'mediaTypes' => $mediaTypes,
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

        $productId = Product::orderBy('id', 'desc')->first();

        if ($request->application_id) {
            foreach ($request->application_id as $item => $value) {
                $data2 = array(
                    'product_id' => $productId->id,
                    'application_id' => $request->application_id[$item]
                );
                ProductApplication::create($data2);
            }
        }

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

    public function applicationByProduct($id) {
        $product = Product::with(['application'])->find($id);
        $applications = Application::get();

        return view('product.application.applicationByProduct', [
            'product' => $product,
            'applications' => $applications
        ]);
    }

}