<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\MediaApplication;
use App\Models\VideoApplication;
use App\Models\ProductApplication;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index() {
        $applications = Application::get();
        $products = Product::get();
        $clients = Client::get();

        return view('backoffice.application.index', [
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

        $newName = "";
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/application/', $newName);
        }

        $application = new Application;
        $application->client_id = $request->client_id;
        $application->name = $request->name;
        $application->area = $request->area;
        $application->time = $request->time;
        $application->thumbnail = $newName;
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
        return redirect('/backoffice/application');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'area' => 'required',
            'time' => 'required',
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/application/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/application/', $newName);
        }

        $application = Application::find($id);
        $application->client_id = $request->client_id;
        $application->name = $request->name;
        $application->area = $request->area;
        $application->time = $request->time;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $application->thumbnail = $request->oldImage;
            } else {
                $application->thumbnail = $newName;
            }
        } else {
            $application->thumbnail = $newName;
        }
        $application->save();

        Session::flash('application', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/application/'. $application->id .'/detail');
    }

    public function detail($id) {
        $application = Application::with(['product', 'client'])->find($id);
        $productsC = Product::count();
        $products = Product::get();
        $mediaApplicationsC = MediaApplication::where('application_id', $id)->count();
        $videoApplicationsC = VideoApplication::where('application_id', $id)->count();
        $clients = Client::get();

        return view('backoffice.application.detail', [
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

        return view('backoffice.product-variant.detailByProduct', [
            'product' => $product,
            'app$applications' => $applications
        ]);
    }

    public function productByApplication($id) {
        $applications = Application::with(['product'])->find($id);
        $products = Product::get();
        $productApps = ProductApplication::where('application_id', $id)->get();
        return view('backoffice.application.product.productByApplication', [
            'applications' => $applications,
            'products' => $products,
            'productApps' => $productApps
        ]);
    }

    public function delete($id) {

        $application = Application::find($id);
        $application->media()->delete();
        $application->video()->delete();
        $application->applicationPivot()->delete();
        $application->delete();

        Session::flash('application', 'success');
        Session::flash('message', 'Delete data success');
        
        return redirect('/backoffice/application');
    }
}
