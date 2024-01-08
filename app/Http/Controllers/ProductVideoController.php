<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductVideoController extends Controller
{
    public function index()
    {
        $product = null;
        $videoProducts = ProductVideo::with('product')->get();
        return view('product-video.index', [
            'product' => $product,
            'videoProducts' => $videoProducts
        ]);
    }

    public function add()
    {
        $product = Product::get();
        return view('product-video.add', [
            'product' => $product
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'url' => 'required',
        ]);

        // dd($request->all());

        if (count($request->product_id) > 0) {
            foreach ($request->product_id as $item => $value) {
                $data2 = array(
                    'product_id' => $request->product_id[$item],
                    'url' => $request->url[$item],
                );
                ProductVideo::create($data2);
            }
        }

        Session::flash('video', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-video');
        return redirect('/product-video/product:'. $request->product_id[0]);
    }
    
    public function edit($id)
    {
        $productVideo = ProductVideo::find($id);
        $product = Product::get();
        return view('product-video.edit', [
            'productVideo' => $productVideo,
            'product' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'url' => 'required',
        ]);

        $productVideo = ProductVideo::find($id);
        $productVideo->url = $request->url;
        // dd($product-video);
        $productVideo->save();

        Session::flash('video', 'success');
        Session::flash('message', 'Update data success');
        if (!$request->product_id) {
            return redirect('/product-video');
        }
        return redirect('/product-video/product:'. $request->product_id[0]);
    }

    public function delete($id)
    {
        $productVideo = ProductVideo::find($id);
        $productVideo->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/product-video');
    }

    public function detailByProduct($id) {
        $product = Product::find($id);
        $videoProducts = ProductVideo::where('product_id', $id)->get();

        return view('product-video.detailByProduct', [
            'product' => $product,
            'videoProducts' => $videoProducts,
        ]);
    }

}
