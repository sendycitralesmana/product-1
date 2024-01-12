<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ProductApplication;
use Illuminate\Support\Facades\Session;

class ProductApplicationController extends Controller
{
    public function createApplication(Request $request)
    {
        $validated = $request->validate([
            'application_id' => 'required',
        ]);

        foreach ($request->application_id as $item => $value) {
            $data2 = array(
                'product_id' => $request->product_id,
                'application_id' => $request->application_id[$item]
            );
            ProductApplication::create($data2);
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/product/application/'. $request->product_id);
    }
    
    public function createProduct(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
        ]);

        foreach ($request->product_id as $item => $value) {
            $data2 = array(
                'product_id' => $request->product_id[$item],
                'application_id' => $request->application_id
            );
            ProductApplication::create($data2);
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/application/product/'. $request->application_id);
    }
}
