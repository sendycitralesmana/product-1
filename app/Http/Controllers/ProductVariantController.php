<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\PVSpecification;
use App\Models\Specification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class ProductVariantController extends Controller
{
    public function index($category_id, $product_id)
    {
        $pCategory = ProductCategory::find($category_id);
        $productVariants = ProductVariant::where('product_id', $product_id)->get();
        $product = Product::find($product_id);
        $specifications = Specification::get();
        return view('backoffice.product.variant.variantByProduct', [
            'pCategory' => $pCategory,
            'productVariants' => $productVariants,
            'product' => $product,
            'specifications' => $specifications
        ]);
    }

    public function create(Request $request, $category_id, $product_id)
    {
        // $validated = $request->validate([
        //     'product_id.*' => 'required',
        //     'name.*' => 'required',
        //     'price.*' => 'required|min:1',
        //     'long.*' => 'required|min:1',
        //     'weight.*' => 'required|min:1',
        //     'width.*' => 'required|min:1',
        //     'height.*' => 'required|min:1',
        // ]);

        // if (count($request->product_id) > 0) {
        //     foreach ($request->product_id as $item => $value) {
        //         $data2 = array(
        //             'product_id' => $request->product_id[$item],
        //             'name' => $request->name[$item],
        //             'price' => $request->price[$item],
        //             'long' => $request->long[$item],
        //             'weight' => $request->weight[$item],
        //             'width' => $request->width[$item],
        //             'height' => $request->height[$item],
        //         );
        //         ProductVariant::create($data2);
        //     }
        // }

        $validated = $request->validate([
            'name' => 'required',
            // 'price' => 'required|min:1',
        ]);

        $productVariant = new ProductVariant();
        $productVariant->product_id = $request->product_id;
        $productVariant->name = $request->name;
        // $productVariant->price = $request->price;
        // $productVariant->long = $request->long;
        // $productVariant->weight = $request->weight;
        // $productVariant->width = $request->width;
        // $productVariant->height = $request->height;
        // dd($productVariant);
        $productVariant->save();

        Session::flash('variant', 'success');
        Session::flash('message', 'Tambah varian berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/variant/'. $request->product_id[0]);
    }

    public function update(Request $request, $category_id, $product_id, $variant_id)
    {
        $validated = $request->validate([
            'name' => 'required',
            // 'price' => 'required|min:1',
            // 'long' => 'required',
            // 'weight' => 'required',
            // 'width' => 'required',
            // 'height' => 'required',
        ]);

        $productVariant = ProductVariant::find($variant_id);
        $productVariant->name = $request->name;
        // $productVariant->price = $request->price;
        // $productVariant->long = $request->long;
        // $productVariant->weight = $request->weight;
        // $productVariant->width = $request->width;
        // $productVariant->height = $request->height;
        // dd($productVariant);
        $productVariant->save();

        Session::flash('variant', 'success');
        Session::flash('message', 'Ubah varian berhasil');
        if(!$request->product_id) {
            return redirect('/backoffice/product-variant');
        }
        return redirect()->back();
        // return redirect('/backoffice/product/variant/'. $request->product_id[0]);
    }

    public function delete($category_id, $product_id, $variant_id)
    {
        // $pvSpecs = PVSpecification::where('product_variant_id', $id)->get();
        // if ($pvSpecs->count() != 0) {
        //     $pvSpecs->delete();
        // }

        $productVariant =ProductVariant::find($variant_id);
        $productVariant->spec()->delete();
        $productVariant->delete();

        Session::flash('variant', 'success');
        Session::flash('message', 'Hapus varian berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/variant/'. $productVariant->product_id);
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

    public function exportPdf($id) 
    {
        $productVariant = ProductVariant::find($id);

        $pdf = Pdf::loadView('backoffice.product.variant.export.pdf', [
            'productVariant' => $productVariant
        ]);
        return $pdf->stream($productVariant->name . '.pdf');
    }

}
