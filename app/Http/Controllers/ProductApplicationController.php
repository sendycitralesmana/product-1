<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductApplication;
use Illuminate\Support\Facades\Session;

class ProductApplicationController extends Controller
{
    public function applicationByProduct( $category_id, $product_id )
    {
        $pCategory = ProductCategory::find($category_id);
        $product = Product::find($product_id);
        $pApplications = ProductApplication::where('product_id', $product_id)->get();
        $applications = Application::get();
        return view('backoffice.product.application.applicationByProduct', [
            'applications' => $applications,
            'pCategory' => $pCategory,
            'product' => $product,
            'pApplications' => $pApplications
        ]);
    }

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

        Session::flash('application', 'success');
        Session::flash('message', 'Tambah proyek berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/application/'. $request->product_id);
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

        Session::flash('product', 'success');
        Session::flash('message', 'Tambah produk berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/product/'. $request->application_id);
    }

    public function deleteApplication($category_id, $product_id, $application_id) {
        $application = ProductApplication::find($application_id);
        $application->delete();

        Session::flash('application', 'success');
        Session::flash('message', 'Hapus proyek berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/application/'. $application->product_id);
    } 
    
    public function deleteProduct($id) {
        $product = ProductApplication::find($id);
        $product->delete();

        Session::flash('product', 'success');
        Session::flash('message', 'Hapus produk berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/product/'. $product->application_id);
    } 
}
