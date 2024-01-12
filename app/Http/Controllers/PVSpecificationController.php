<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use App\Models\PVSpecification;
use App\Models\Specification;
use Illuminate\Support\Facades\Session;

class PVSpecificationController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id.*' => 'required',
            'specification_id.*' => 'required',
            'value.*' => 'required',
        ]);

        if (count($request->specification_id) > 0) {
            foreach ($request->specification_id as $item => $value) {
                $data2 = array(
                    'product_variant_id' => $request->product_variant_id[$item],
                    'specification_id' => $request->specification_id[$item],
                    'value' => $request->value[$item],
                );
                PVSpecification::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/product/vs/'. $request->product_variant_id[0]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'specification_id' => 'required',
            'value' => 'required',
        ]);

        $pvSpecification = PVSpecification::find($id);
        $pvSpecification->specification_id = $request->specification_id;
        $pvSpecification->value = $request->value;
        // dd($pvSpecification);
        $pvSpecification->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update data success');
        return redirect('/product/vs/'. $request->product_variant_id);
    }

    public function delete($id)
    {
        $pvSpecification = PVSpecification::find($id);
        $pvSpecification->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/product/vs/'. $pvSpecification->product_variant_id);
    }

    public function specByVariant($id) {
        $productVariant = ProductVariant::find($id);
        $specifications = Specification::get();
        $pvSpecifications = PVSpecification::where('product_variant_id', $id)->with(['productVariant', 'specification'])->get();
        return view('product.variant.specification.specByVariant', [
            'productVariant' => $productVariant,
            'specifications' => $specifications,
            'pvSpecifications' => $pvSpecifications,
        ]);
    }

}