<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productsCategories = ProductCategory::all();
        return view('product-category.index', [
            'productsCategories' => $productsCategories
        ]);
    }
    
    public function detail($id)
    {
        $productCategory = ProductCategory::find($id);
        return view('product-category.detail', [
            'productCategory' => $productCategory
        ]);
    }

    public function add()
    {
        return view('product-category.add');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'thumbnail' => 'image',
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('thumbnail')->storeAs('image', $newName);
        }

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;
        $productCategory->thumbnail = $newName;
        // dd($productCategory);
        $productCategory->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/product-category');
    }
    
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);
        return view('product-category.edit', [
            'productCategory' => $productCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('thumbnail')->storeAs('image', $newName);
        }

        $productCategory = ProductCategory::find($id);
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;
        $productCategory->thumbnail = $newName;
        // dd($productCategory);
        $productCategory->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update data success');
        return redirect('/product-category');
    }

    public function delete($id)
    {
        $productCategory = ProductCategory::find($id);
        $productCategory->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/product-category');
    }

}
