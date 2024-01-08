<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaType;
use App\Models\MediaProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MediaProductController extends Controller
{
    public function index()
    {
        $product = null;
        $mediaTypes = MediaType::get();
        $mediaProducts = MediaProduct::all();
        return view('media-product.index', [
            'product' => $product,
            'mediaTypes' => $mediaTypes,
            'mediaProducts' => $mediaProducts
        ]);
    }

    public function add()
    {
        $product = Product::get();
        $type = MediaType::get();
        return view('media-product.add', [
            'product' => $product,
            'type' => $type
        ]);
    }
    
    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_id.*' => 'required',
            'type_id.*' => 'required',
            'name.*' => 'required',
            'url.*' => 'required',
        ]);

        if (count($request->product_id) > 0) {
            foreach ($request->product_id as $item => $value) {
                $data2 = array(
                    'product_id' => $request->product_id[$item],
                    'type_id' => $request->type_id[$item],
                    'name' => $request->name[$item],
                    'url' => $request->url[$item],
                );
                MediaProduct::create($data2);
            }
        }


        Session::flash('media', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/media-product');
        return redirect('/media-product/product:'. $request->product_id[0]);

    }
    
    public function edit($id)
    {
        $mediaProduct = MediaProduct::find($id);
        $product = Product::get();
        $mediaType = MediaType::get();
        return view('media-product.edit', [
            'mediaProduct' => $mediaProduct,
            'product' => $product,
            'mediaType' => $mediaType,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'type_id' => 'required',
            'name' => 'required',
            'url' => 'required',
        ]);

        $mediaProduct = MediaProduct::find($id);
        $mediaProduct->type_id = $request->type_id;
        $mediaProduct->name = $request->name;
        $mediaProduct->url = $request->url;
        $mediaProduct->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Update data success');
        if (!$request->product_id) {
            return redirect('/media-product');
        }
        return redirect('/media-product/product:'. $request->product_id[0]);

    }

    public function delete($id)
    {
        $mediaProduct = MediaProduct::find($id);
        $mediaProduct->delete();

        Session::flash('media', 'success');
        Session::flash('message', 'Delete data success');
        // return redirect('/media-product');
        return redirect('/product/'. $mediaProduct->product_id .'/detail');
    }

    public function createMultiple(Request $request) {
        // $validated = $request->validate([
        //     'product_id[]' => 'required',
        //     'type_id[]' => 'required',
        //     'name[]' => 'required',
        //     'url[]' => 'required',
        // ]);
        // dd($request->all());
        

        if (count($request->product_id) > 0) {
            foreach ($request->name as $item => $value) {
                $data2 = array(
                    'product_id' => $request->product_id[$item],
                    'type_id' => $request->type_id[$item],
                    'name' => $request->name[$item],
                    'url' => $request->url[$item],
                );
                MediaProduct::create($data2);
            }
        }
    }

    public function detailByProduct($id) {
        $product = Product::find($id);
        $mediaTypes = MediaType::get();
        $mediaProducts = MediaProduct::where('product_id', $id)->with(['product'])->get();
        return view('media-product.detailByProduct', [
            'product' => $product,
            'mediaTypes' => $mediaTypes,
            'mediaProducts' => $mediaProducts,
        ]);
    }

}
