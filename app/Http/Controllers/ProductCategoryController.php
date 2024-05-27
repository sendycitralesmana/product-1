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
        ]);

        $thumbnail = null;
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            $fThumbnail = $request->file('thumbnail');
            $thumbnail = Storage::disk('s3')->put("", $fThumbnail);
        }

        $ikon = null;
        if ($request->file('ikon')) {
            $fileName = $request->file('ikon')->getClientOriginalExtension();
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
    }

    public function update(Request $request, $id)
    {  
        // dd($request->all());

        $request->validate([
            'name' => 'required',
        ]);

        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->name;
        $productCategory->description = '-';
        if ($request->file('thumbnail')) {
            if ($productCategory->thumbnail) {
                Storage::disk('s3')->delete("" . $productCategory->thumbnail);
            }
            $fThumbnail = $request->file('thumbnail');
            $thumbnail = Storage::disk('s3')->put("", $fThumbnail);
            $productCategory->thumbnail = $thumbnail;
        }
        if ($request->file('ikon')) {
            if ($productCategory->icon) {
                Storage::disk('s3')->delete("" . $productCategory->icon);
            }
            $fIkon = $request->file('ikon');
            $ikon = Storage::disk('s3')->put("", $fIkon);
            $productCategory->icon = $ikon;
        }
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
