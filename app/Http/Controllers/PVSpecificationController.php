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
    public function index()
    {
        $pvSpecification = PVSpecification::with(['productVariant', 'specification'])->get();
        return view('pvspecification.index', [
            'pvSpecification' => $pvSpecification
        ]);
    }

    public function add()
    {
        $product = Product::get();
        $specification = Specification::get();
        return view('pvspecification.add',[
            'product' => $product,
            'specification' => $specification
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'specification_id' => 'required',
            'value' => 'required',
        ]);

        $specification = new PVSpecification;
        $specification->product_id = $request->product_id;
        $specification->specification_id = $request->specification_id;
        $specification->value = $request->value;
        $specification->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/pv-specification');
    }

    public function createMultiple(Request $request)
    {
        $validated = $request->validate([
            'product_variant_id.*' => 'required',
            'specification_id.*' => 'required',
            'value.*' => 'required',
        ]);

        // dd($request->all());
        $productVariant = ProductVariant::find($request->product_variant_id[0]);

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
        return redirect('/pv-specification/variant:'. $productVariant->id);
    }
    
    public function edit($id)
    {
        $pvSpecification = PVSpecification::with(['product', 'specification'])->find($id);
        return view('pvspecification.edit', [
            'pvSpecification' => $pvSpecification
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'value' => 'required',
        ]);

        $pvSpecification = PVSpecification::find($id);
        $pvSpecification->value = $request->value;
        // dd($pvSpecification);
        $pvSpecification->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update data success');
        return redirect('/pv-specification/variant:'. $request->product_variant_id);
    }

    public function delete($id)
    {
        $pvSpecification = PVSpecification::find($id);
        $pvSpecification->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/pv-specification/variant:'. $pvSpecification->product_variant_id);
    }

    public function detail($id) {
        $productVariant = ProductVariant::find($id);
        $specifications = Specification::get();
        $pvSpecifications = PVSpecification::where('product_variant_id', $id)->with(['productVariant', 'specification'])->get();
        return view('pvspecification.variant-detail', [
            'productVariant' => $productVariant,
            'specifications' => $specifications,
            'pvSpecifications' => $pvSpecifications,
        ]);
    }

}