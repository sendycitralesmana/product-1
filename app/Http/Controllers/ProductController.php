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
use App\Models\PVSpecification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }
        $productCategories = ProductCategory::get();
        $applications = Application::get();
        // dd($products);
        return view('backoffice.product.index', [
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications
        ]);
    }

    public function category($id) {
        $products = Product::where('product_category_id', $id)->get();
        $productC = Product::get();
        $productCategories = ProductCategory::get();
        $productCategory = ProductCategory::find($id);
        $applications = Application::get();
        return view('backoffice.product.category', [
            'products' => $products,
            'productC' => $productC,
            'productCategories' => $productCategories,
            'productCategory' => $productCategory,
            'applications' => $applications
        ]);
    }
    
    public function detail($id)
    {
        $product = Product::with(['category', 'application', 'variant', 'media', 'video'])->find($id);
        $images = MediaProduct::where('product_id', $id)->where('type_id', 1)->get();
        $files = MediaProduct::where('product_id', $id)->where('type_id', 2)->get();
        $productCategories = ProductCategory::get();
        $mediaTypes = MediaType::get();
        $applications = Application::get();
        return view('backoffice.product.detail', [
            'product' => $product,
            'images' => $images,
            'files' => $files,
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
            // 'description' => 'required',
        ], [
            'product_category_id.required' => 'Produk kategori harus dipilih',
            'name.required' => 'Nama produk harus diisi',
            // 'description.required' => 'Deskripsi produk harus diisi',
        ]);

        $newName = null;
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            $request->file('thumbnail')->storeAs('image/product/', str_replace(' ', '_', $newName));
        }

        $product = new product;
        $product->product_category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->thumbnail = str_replace(' ', '_', $newName);
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
        Session::flash('message', 'Tambah produk berhasil');
        return redirect('/backoffice/product');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $productCategory = ProductCategory::get();
        return view('backoffice.product.edit', [
            'product' => $product,
            'productCategory' => $productCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_category_id' => 'required',
            'name' => 'required',
        ]);

        $newName = null;
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/product/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            $request->file('thumbnail')->storeAs('image/product/', str_replace(' ', '_', $newName));
        }

        $product = product::find($id);
        $product->product_category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $product->thumbnail = $request->oldImage;
            } else {
                $product->thumbnail = str_replace(' ', '_', $newName);
            }
        } else {
            $product->thumbnail = str_replace(' ', '_', $newName);
        }
        // dd($product);
        $product->save();

        Session::flash('product', 'success');
        Session::flash('message', 'Ubah produk berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/'. $product->id .'/detail');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        Storage::delete('image/product/' . $product->thumbnail);
        $product->media()->delete();
        $product->video()->delete();
        // $product->variant()->delete();
        
        $variantProds = ProductVariant::with(['spec'])->where('product_id', $id)->get();
        if ($variantProds->count() != 0) {
            foreach ($variantProds as $variant) {
                $variant->spec()->delete();
                $variant->delete();
            }
        }
        $product->productApp()->delete();
        $product->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Hapus produk berhasil');
        return redirect('/backoffice/product');
    }

    public function applicationByProduct(Request $request, $id) {
        $product = Product::with(['application'])->find($id);
        $applications = Application::get();
        $appProducts = ProductApplication::where('product_id', $id)->paginate(6);

        return view('backoffice.product.application.applicationByProduct', [
            'product' => $product,
            'applications' => $applications, 
            'appProducts' => $appProducts,
            'title' => $request->title
        ]);
    }

}