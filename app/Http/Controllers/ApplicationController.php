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
    public function index(Request $request) {
        $applications = Application::orderBy('id', 'desc')->paginate(9);
        if ($request->title) {
            $applications = Application::where('name', 'LIKE', '%' . $request->title . '%')->paginate(9);
        }
        $products = Product::get();
        $clients = Client::get();

        return view('backoffice.application.index', [
            'applications' => $applications,
            'products' => $products,
            'clients' => $clients,
            'title' => $request->title
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'area' => 'required',
            'date' => 'required',
        ], [
            'name.required' => 'Proyek harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'area.required' => 'Area harus diisi',
            'date.required' => 'Waktu harus diisi',
        ]);

        // $newName = null;
        // if($request->file('thumbnail')) {
        //     $fileName = $request->file('thumbnail')->getClientOriginalExtension();
        //     $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
        //     $request->file('thumbnail')->storeAs('image/application/', str_replace(' ', '_', $newName));
        //     $file = $request->file('thumbnail');
        //     $path = Storage::disk('s3')->put("", $file);
        // }

        $application = new Application;
        $application->client_id = $request->client_id;
        $application->name = $request->name;
        $application->description = $request->description;
        $application->area = $request->area;
        $application->date = $request->date;
        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $path = Storage::disk('s3')->put("", $file);
            $application->thumbnail = $path;
        }
        // $application->thumbnail = str_replace(' ', '_', $path);
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
        Session::flash('message', 'Tambah proyek berhasil');
        // return redirect('/product-variant');
        return redirect('/backoffice/application');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'area' => 'required',
            'date' => 'required',
        ]);

        $newName = null;
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                // Storage::delete('image/application/' . $request->oldImage);
                Storage::disk('s3')->delete($request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            // $request->file('thumbnail')->storeAs('image/application/', str_replace(' ', '_', $newName));
            $file = $request->file('thumbnail');
            $path = Storage::disk('s3')->put("", $file);
        }

        $application = Application::find($id);
        $application->client_id = $request->client_id;
        $application->name = $request->name;
        $application->description = $request->description;
        $application->area = $request->area;
        $application->date = $request->date;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $application->thumbnail = $request->oldImage;
            } else {
                $application->thumbnail = str_replace(' ', '_', $path);
            }
        } else {
            $application->thumbnail = str_replace(' ', '_', $path);
        }
        $application->save();

        Session::flash('application', 'success');
        Session::flash('message', 'Ubah proyek berhasil');
        
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
        if ($application->thumbnail) {
            Storage::disk('s3')->delete($application->thumbnail);
        }
        $application->media()->delete();
        $application->video()->delete();
        $application->applicationPivot()->delete();
        $application->delete();

        Session::flash('application', 'success');
        Session::flash('message', 'Hapus proyek berhasil');
        
        return redirect('/backoffice/application');
    }
}
