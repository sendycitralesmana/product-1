<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Application;
use App\Models\Client;
use App\Models\MediaApplication;
use App\Models\ProductApplication;
use App\Models\VideoApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    public function index() {
        $applications = Application::get();
        $products = Product::get();
        $clients = Client::get();

        return view('application.index', [
            'applications' => $applications,
            'products' => $products,
            'clients' => $clients
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'area' => 'required',
            'time' => 'required',
        ]);

        $application = new Application;
        $application->client_id = $request->client_id;
        $application->name = $request->name;
        $application->area = $request->area;
        $application->time = $request->time;
        $application->save();

        $applicationId = Application::orderBy('id', 'desc')->first();

        if ($request->product_id) {
            foreach ($request->product_id as $item => $value) {
                $data2 = array(
                    'product_id' => $request->product_id[$item],
                    'application_id' => $applicationId->id
                );
                ProductApplication::create($data2);
            }
        }

        Session::flash('application', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/application');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'area' => 'required',
            'time' => 'required',
        ]);

        $application = Application::find($id);
        $application->client_id = $request->client_id;
        $application->name = $request->name;
        $application->area = $request->area;
        $application->time = $request->time;
        $application->save();

        Session::flash('application', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/application/'. $request->application_id .'/detail');
    }

    public function detail($id) {
        $application = Application::with(['product', 'client'])->find($id);
        $productsC = Product::count();
        $products = Product::get();
        $mediaApplicationsC = MediaApplication::where('application_id', $id)->count();
        $videoApplicationsC = VideoApplication::where('application_id', $id)->count();
        $clients = Client::get();

        return view('application.detail', [
            'application' => $application,
            'productsC' => $productsC,
            'products' => $products,
            'mediaApplicationsC' => $mediaApplicationsC,
            'videoApplicationsC' => $videoApplicationsC,
            'clients' => $clients
        ]);
    }

    public function detailByProduct($id) 
    {
        $product = Product::find($id);
        $applications = Application::where('product_id', $id)->get();

        return view('product-variant.detailByProduct', [
            'product' => $product,
            'app$applications' => $applications
        ]);
    }

    public function productByApplication($id) {
        $applications = Application::with(['product'])->find($id);
        $products = Product::get();
        return view('application.product.productByApplication', [
            'applications' => $applications,
            'products' => $products
        ]);
    }
}
