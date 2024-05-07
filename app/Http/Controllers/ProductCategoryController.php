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
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            $request->file('thumbnail')->storeAs('image/product/category', str_replace(' ', '_', $newName));
        }

        $ikon = null;
        if ($request->file('ikon')) {
            $fileName = $request->file('ikon')->getClientOriginalExtension();
            $ikon = 'ikon-' . now()->timestamp . '.' . $fileName;
            $request->file('ikon')->storeAs('image/product/category', str_replace(' ', '_', $ikon));
        }

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->description = '-';
        $productCategory->thumbnail = str_replace(' ', '_', $newName);
        $productCategory->icon = str_replace(' ', '_', $ikon);
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
        ]);

        // $newName = null;
        // if($request->file('thumbnail')) {
        //     if ($request->oldImage) {
        //         Storage::delete('image/category/' . $request->oldImage);
        //     }
        //     $fileName = $request->file('thumbnail')->getClientOriginalName();
        //     $newName = now()->timestamp . '-' . $fileName;
        //     $request->file('thumbnail')->storeAs('image/product/category/', str_replace(' ', '_', $newName));
        // }

        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->name;
        $productCategory->description = '-';
        if ($request->file('thumbnail')) {
            Storage::delete('image/product/category/' . $productCategory->thumbnail);
            $fileNameThumbnail = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail = 'thumbnail-' . now()->timestamp . '.' . $fileNameThumbnail;
            $request->file('thumbnail')->storeAs('image/product/category', str_replace(' ', '_', $thumbnail));
            $productCategory->thumbnail = str_replace(' ', '_', $thumbnail);
        }
        if ($request->file('ikon')) {
            Storage::delete('image/product/category/' . $productCategory->icon);
            $fileNameIkon = $request->file('ikon')->getClientOriginalExtension();
            $ikon = 'ikon-' . now()->timestamp . '.' . $fileNameIkon;
            $request->file('ikon')->storeAs('image/product/category', str_replace(' ', '_', $ikon));
            $productCategory->icon = str_replace(' ', '_', $ikon);
        }
        // if ($request->oldImage != null) {
        //     if ($request->file('thumbnail') == "") {
        //         $productCategory->thumbnail = $request->oldImage;
        //     } else {
        //         $productCategory->thumbnail = str_replace(' ', '_', $newName);
        //     }
        // } else {
        //     $productCategory->thumbnail = str_replace(' ', '_', $newName);
        // }
        $productCategory->save();

        Session::flash('category', 'success');
        Session::flash('message', 'Ubah kategori berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/category');
    }

    public function delete($id)
    {
        
        $productCategory = ProductCategory::find($id);
        if ($productCategory->thumbnail) {
            Storage::delete('image/product/category/' . $productCategory->thumbnail);
        }
        $productCategory->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/product/category');
    }

}
