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
        $productsCategories = ProductCategory::orderBy('id', 'desc')->get();
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

        $thumbnail = null;
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            // $request->file('thumbnail')->storeAs('image/product/category', str_replace(' ', '_', $newName));
            // simpan gambar ke disk 
            $fThumbnail = $request->file('thumbnail');
            $thumbnail = Storage::disk('s3')->put("", $fThumbnail);
        }

        $ikon = null;
        if ($request->file('ikon')) {
            $fileName = $request->file('ikon')->getClientOriginalExtension();
            // $ikon = 'ikon-' . now()->timestamp . '.' . $fileName;
            // $request->file('ikon')->storeAs('image/product/category', str_replace(' ', '_', $ikon));
            // simpan gambar ke disk
            $fIkon = $request->file('ikon');
            $ikon = Storage::disk('s3')->put("", $fIkon);
        }

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->description = '-';
        $productCategory->thumbnail = str_replace(' ', '_', $thumbnail);
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
            // Storage::delete('image/product/category/' . $productCategory->thumbnail);
            Storage::disk('s3')->delete("" . $productCategory->thumbnail);
            $fileNameThumbnail = $request->file('thumbnail')->getClientOriginalExtension();
            // $thumbnail = 'thumbnail-' . now()->timestamp . '.' . $fileNameThumbnail;
            // $request->file('thumbnail')->storeAs('image/product/category', str_replace(' ', '_', $thumbnail));
            $fThumbnail = $request->file('thumbnail');
            $thumbnail = Storage::disk('s3')->put("", $fThumbnail);
            $productCategory->thumbnail = $thumbnail;
        }
        if ($request->file('ikon')) {
            // Storage::delete('image/product/category/' . $productCategory->icon);
            Storage::disk('s3')->delete("" . $productCategory->icon);
            $fileNameIkon = $request->file('ikon')->getClientOriginalExtension();
            $ikon = 'ikon-' . now()->timestamp . '.' . $fileNameIkon;
            // $request->file('ikon')->storeAs('image/product/category', str_replace(' ', '_', $ikon));
            $fIkon = $request->file('ikon');
            $ikon = Storage::disk('s3')->put("", $fIkon);
            $productCategory->icon = $ikon;
        }
        // if ($request->oldImage != null) {
        //     if ($request->file('thumbnail') == "") {
        //         $productCategory->thumbnail = $request->oldImage;
        //     } else {
        //         $productCategory->thumbnail = str_replace(' ', '_', $thumbnail);
        //     }
        // } else {
        //     $productCategory->thumbnail = str_replace(' ', '_', $thumbnail);
        // }
        // if ($request->oldIcon != null) {
        //     if ($request->file('ikon') == "") {
        //         $productCategory->icon = $request->oldImage;
        //     } else {
        //         $productCategory->icon = str_replace(' ', '_', $ikon);
        //     }
        // } else {
        //     $productCategory->icon = str_replace(' ', '_', $ikon);
        // }
        $productCategory->update();

        Session::flash('category', 'success');
        Session::flash('message', 'Ubah kategori berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/category');
    }

    public function delete($id)
    {
        
        $productCategory = ProductCategory::find($id);
        if ($productCategory->thumbnail) {
            // Storage::delete('image/product/category/' . $productCategory->thumbnail);
            Storage::disk('s3')->delete("" . $productCategory->thumbnail);
            Storage::disk('s3')->delete("" . $productCategory->icon);
        }
        // $productCategory->product()->delete();
        $productCategory->delete();

        Session::flash('category', 'success');
        Session::flash('message', 'Hapus data kategori berhasil');
        return redirect('/backoffice/product/category');
    }

}
