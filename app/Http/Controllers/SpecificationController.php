<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\PVSpecification;
use Illuminate\Support\Facades\Session;

class SpecificationController extends Controller
{
    public function index($category_id, $product_id, $variant_id)
    {
        $specifications = Specification::all();
        $pCategory = ProductCategory::find($category_id);
        $product = Product::find($product_id);
        $variant = ProductVariant::find($variant_id);
        return view('backoffice.product.specification.index', [
            'specifications' => $specifications,
            'product' => $product,
            'pCategory' => $pCategory,
            'variant' => $variant
        ]);
    }

    public function create(Request $request, $category_id, $product_id, $variant_id)
    {
        $validated = $request->validate([
            'name.*' => 'required'
        ]);

        // dd($request->all());

        if (count($request->name) > 0) {
            foreach ($request->name as $item => $value) {
                $data2 = array(
                    'name' => $request->name[$item]
                );
                Specification::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Tambah spesifikasi berhasil');
        // return redirect('/backoffice/product/specification');
        return redirect()->back();
    }

    public function update(Request $request, $category_id, $product_id, $variant_id, $spesification_id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $specification = specification::find($spesification_id);
        $specification->name = $request->name;
        // dd($specification);
        $specification->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Ubah spesifikasi berhasil');
        // return redirect('/backoffice/product/specification');
        return redirect()->back();
    }

    public function delete($category_id, $product_id, $variant_id, $spesification_id)
    {
        $specification = specification::find($spesification_id);
        $specification->specV()->delete();
        $specification->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Hapus spesifikasi berhasil');
        // return redirect('/backoffice/product/specification');
        return redirect()->back();
    }

}