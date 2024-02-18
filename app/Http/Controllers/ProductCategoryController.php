<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productsCategories = ProductCategory::all();
        return view('backoffice.product.category.index', [
            'productsCategories' => $productsCategories
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            // 'description' => 'required',
            // 'thumbnail' => 'image',
        ]);

        $newName = null;
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/category', str_replace(' ', '_', $newName));
        }

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->description = '-';
        $productCategory->thumbnail = str_replace(' ', '_', $newName);
        $productCategory->save();

        Session::flash('category', 'success');
        Session::flash('message', 'Tambah kategori berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/category');
    }

    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'name' => 'required',
            // 'description' => 'required',
            // 'thumbnail' => 'image'
        ]);

        $newName = null;
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/category/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/category/', str_replace(' ', '_', $newName));
        }

        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->name;
        $productCategory->description = '-';
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $productCategory->thumbnail = $request->oldImage;
            } else {
                $productCategory->thumbnail = str_replace(' ', '_', $newName);
            }
        } else {
            $productCategory->thumbnail = str_replace(' ', '_', $newName);
        }
        $productCategory->save();

        Session::flash('category', 'success');
        Session::flash('message', 'Edit kategori berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/category');
    }

    public function delete($id)
    {
        
        $productCategory = ProductCategory::find($id);
        if ($productCategory->thumbnail) {
            Storage::delete('image/category/' . $productCategory->thumbnail);
        }
        $productCategory->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/product/category');
    }

}
