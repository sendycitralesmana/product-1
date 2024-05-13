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
    public function index(Request $request, $category_id = null)
    {
        $products = Product::orderBy('id', 'desc')->where('product_category_id', $category_id)->get();
        if ($request->category) {
            $products = $products->where('category_id', $request->category);
        }
        $productCategories = ProductCategory::get();
        $applications = Application::get();
        $pCategory = ProductCategory::find($category_id);
        return view('backoffice.product.index', [
            'products' => $products,
            'productCategories' => $productCategories,
            'applications' => $applications,
            'pCategory' => $pCategory
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
    
    public function detail($category_id, $id)
    {
        $product = Product::with(['category', 'application', 'variant', 'media', 'video'])->find($id);
        $images = MediaProduct::where('product_id', $id)->where('type_id', 1)->get();
        $files = MediaProduct::where('product_id', $id)->where('type_id', 2)->get();
        $productCategories = ProductCategory::get();
        $mediaTypes = MediaType::get();
        $applications = Application::get();

        $pCategory = ProductCategory::find($category_id);

        return view('backoffice.product.detail', [
            'product' => $product,
            'images' => $images,
            'files' => $files,
            'applications' => $applications,
            'productCategories' => $productCategories,
            'mediaTypes' => $mediaTypes,
            'pCategory' => $pCategory
        ]);
    }

    public function create(Request $request, $category_id)
    {
        $validated = $request->validate([
            // 'product_category_id' => 'required',
            'name' => 'required',
            // 'description' => 'required',
        ], [
            // 'product_category_id.required' => 'Produk kategori harus dipilih',
            'name.required' => 'Nama produk harus diisi',
            // 'description.required' => 'Deskripsi produk harus diisi',
        ]);

        $product = new product;
        $product->product_category_id = $category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $path = Storage::disk('s3')->put("", $file);
            $product->thumbnail = $path;
        }
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
        // return redirect('/backoffice/product');
        return redirect()->back();
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

    public function update(Request $request, $category_id, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $product = product::find($id);
        $product->product_category_id = $request->product_category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        if ($request->file('thumbnail')) {
            Storage::disk('s3')->delete("" . $product->thumbnail);
            $file = $request->file('thumbnail');
            $path = Storage::disk('s3')->put("", $file);
            $product->thumbnail = $path;
        }
        $product->update();

        Session::flash('product', 'success');
        Session::flash('message', 'Ubah produk berhasil');
        return redirect()->back();

    }

    public function delete($id)
    {
        $product = Product::find($id);
        // Storage::delete('image/product/' . $product->thumbnail);

        // delete from s3
        Storage::disk('s3')->delete("" . $product->thumbnail);

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
        // return redirect('/backoffice/product');
        return redirect()->back();
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