<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Specification;
use App\Models\ProductVariant;
use App\Models\ProductCategory;
use App\Models\PVSpecification;
use Illuminate\Support\Facades\Session;

class PVSpecificationController extends Controller
{
    public function index($category_id, $product_id, $variant_id)
    {
        $variantAktif = ProductVariant::find($variant_id);

        $pCategorys = ProductCategory::get();
        $variants = ProductVariant::get();

        $pCategory = ProductCategory::find($category_id);
        $product = Product::find($product_id);
        $variant = ProductVariant::find($variant_id);
        $specifications = Specification::get();
        $pvSpecifications = PVSpecification::where('product_variant_id', $variant_id)->with(['productVariant', 'specification'])->orderBy('updated_at', 'desc')->get();
        // dd($pvSpecifications);
        return view('backoffice.product.variant.specification.specByVariant', [
            'variantAktif' => $variantAktif,

            'pCategorys' => $pCategorys,
            'variants' => $variants,

            'variant' => $variant,
            'specifications' => $specifications,
            'pvSpecifications' => $pvSpecifications,
            'product' => $product,
            'pCategory' => $pCategory
        ]);
    }

    public function productByCategory($category_id)
    {
        $product = Product::where('product_category_id', $category_id)->get();
        return response()->json($product);
    }

    public function variantByProduct($category_id, $product_id)
    {
        $variant = ProductVariant::where('product_id', $product_id)->get();
        return response()->json($variant);
    }

    public function specByVariant2($variant_id)
    {
        $specification = PVSpecification::where('product_variant_id', $variant_id)->with(['productVariant', 'specification'])->get();
        return response()->json($specification);
    }

    public function create(Request $request, $category_id, $product_id, $variant_id)
    {
        $validated = $request->validate([
            // 'product_variant_id.*' => 'required',
            'specification_id.*' => 'required',
            'value.*' => 'required',
        ]);

        if (count($request->specification_id) > 0) {
            foreach ($request->specification_id as $item => $value) {
                $data2 = array(
                    'product_variant_id' => $variant_id,
                    'specification_id' => $request->specification_id[$item],
                    'value' => $request->value[$item],
                );
                PVSpecification::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Tambah spesifikasi berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/vs/'. $request->product_variant_id[0]);
    }

    public function update(Request $request, $category_id, $product_id, $variant_id, $variant_specification_id)
    {
        $validated = $request->validate([
            'specification_id' => 'required',
            'value' => 'required',
        ]);

        $pvSpecification = PVSpecification::find($variant_specification_id);
        $pvSpecification->specification_id = $request->specification_id;
        $pvSpecification->value = $request->value;
        // dd($pvSpecification);
        $pvSpecification->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Ubah spesifikasi berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/vs/'. $request->product_variant_id);
    }

    public function delete($category_id, $product_id, $variant_id, $variant_specification_id)
    {
        $pvSpecification = PVSpecification::find($variant_specification_id);
        $pvSpecification->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Hapus spesifikasi berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/vs/'. $pvSpecification->product_variant_id);
    }

    public function specByVariant($product, $id) {
        $product = Product::find($product);
        $productVariant = ProductVariant::find($id);
        $specifications = Specification::get();
        $pvSpecifications = PVSpecification::where('product_variant_id', $id)->with(['productVariant', 'specification'])->get();
        return view('backoffice.product.variant.specification.specByVariant', [
            'productVariant' => $productVariant,
            'specifications' => $specifications,
            'pvSpecifications' => $pvSpecifications,
            'product' => $product
        ]);
    }

    public function copySpecification($category_id, $product, $variant) {
        $pCategory = ProductCategory::find($category_id);
        $product = Product::find($product);
        $variants = ProductVariant::get();
        $variant = ProductVariant::find($variant);
        $specifications = Specification::get();
        return view('backoffice.product.variant.specification.copySpecification', [
            'pCategory' => $pCategory,
            'variant' => $variant,
            'variants' => $variants,
            'specifications' => $specifications,
            'product' => $product
        ]);
    }

    public function copySpec(Request $request, $category_id, $product_id, $variant_id) {
        dd("masuk");
    }

    public function copySpec2(Request $request, $variant_id, $req_variant_id) {

        $variant = ProductVariant::find($variant_id);
        $req_variant = ProductVariant::find($req_variant_id);
        $specifications = Specification::get();
       
        return view('backoffice.product.variant.specification.req-copy-spec', [
            'variant' => $variant,
            'req_variant' => $req_variant,
            'specifications' => $specifications
        ]);
    }

    public function copySpec2Action(Request $request, $variant_id, $req_variant_id) {

        $variant = ProductVariant::find($variant_id);
        
        // dd($request->specification_id, $request->value);

        if (count($request->specification_id) > 0) {
            foreach ($request->specification_id as $item => $value) {
                $data2 = array(
                    'product_variant_id' => $variant_id,
                    'specification_id' => $request->specification_id[$item],
                    'value' => $request->value[$item],
                );
                PVSpecification::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Tambah spesifikasi berhasil');
        return redirect('/backoffice/product/category/'. $variant->product->product_category_id . '/product/'. $variant->product_id . '/variant/'. $variant_id . '/variant-specification');
    }

    public function clearSpecByVariant ($category_id, $product_id, $variant_id) {
        // PVSpecification::where('product_variant_id', $variant_id)->delete();
        $specs = PVSpecification::where('product_variant_id', $variant_id)->get();
        foreach ($specs as $spec) {
            $spec->delete();
        }

        return redirect('/backoffice/product/category/'. $category_id . '/product/'. $product_id . '/variant/'. $variant_id . '/variant-specification')->with('status', 'success')->with('message', 'Hapus spesifikasi berhasil');
    }

}