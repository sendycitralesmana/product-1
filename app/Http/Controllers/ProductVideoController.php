<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductVideoController extends Controller
{
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
        return redirect('/backoffice/product/video/'. $request->product_id[0]);
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
            return redirect('/backoffice/product-video');
        }
        return redirect('/backoffice/product/video/'. $request->product_id[0]);
    }

    public function delete($id)
    {
        $productVideo = ProductVideo::find($id);
        $productVideo->delete();

        Session::flash('video', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/product/video/'. $productVideo->product_id);
    }

    public function videoByProduct($id) {
        $product = Product::find($id);
        $videoProducts = ProductVideo::where('product_id', $id)->get();

        return view('backoffice.product.video.videoByProduct', [
            'product' => $product,
            'videoProducts' => $videoProducts,
        ]);
    }

}
