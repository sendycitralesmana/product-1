<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Session;

class ProductVariantController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_id.*' => 'required',
            'name.*' => 'required',
            'price.*' => 'required|min:1',
            'long.*' => 'required|min:1',
            'weight.*' => 'required|min:1',
            'width.*' => 'required|min:1',
            'height.*' => 'required|min:1',
        ]);

        if (count($request->product_id) > 0) {
            foreach ($request->product_id as $item => $value) {
                $data2 = array(
                    'product_id' => $request->product_id[$item],
                    'name' => $request->name[$item],
                    'price' => $request->price[$item],
                    'long' => $request->long[$item],
                    'weight' => $request->weight[$item],
                    'width' => $request->width[$item],
                    'height' => $request->height[$item],
                );
                ProductVariant::create($data2);
            }
        }

        Session::flash('variant', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/backoffice/product/variant'. $request->product_id[0]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|min:1',
            'long' => 'required|min:1',
            'weight' => 'required|min:1',
            'width' => 'required|min:1',
            'height' => 'required|min:1',
        ]);

        $productVariant = ProductVariant::find($id);
        $productVariant->name = $request->name;
        $productVariant->price = $request->price;
        $productVariant->long = $request->long;
        $productVariant->weight = $request->weight;
        $productVariant->width = $request->width;
        $productVariant->height = $request->height;
        // dd($productVariant);
        $productVariant->save();

        Session::flash('variant', 'success');
        Session::flash('message', 'Update data success');
        if(!$request->product_id) {
            return redirect('/backoffice/product-variant');
        }
        return redirect('/backoffice/product/variant/'. $request->product_id[0]);
    }

    public function delete($id)
    {
        $productVariant =ProductVariant::find($id);
        $productVariant->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/product/variant/'. $productVariant->product_id);
    }

    public function variantByProduct($id) 
    {
        $product = Product::find($id);
        $productVariants = ProductVariant::where('product_id', $id)->get();

        return view('backoffice.product.variant.variantByProduct', [
            'product' => $product,
            'productVariants' => $productVariants
        ]);
    }

}
