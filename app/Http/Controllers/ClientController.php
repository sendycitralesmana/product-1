<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request) {
        $clients = Client::paginate(12);
        if ($request->search) {
            $clients = Client::where('name', 'like', '%' . $request->search . '%')->paginate(12);
        }

        return view('backoffice.client.index', [
            'clients' => $clients,
            'search' => $request->search
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'image',
        ]);

        $newName = "";
        if($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $newName = 'image-' . now()->timestamp . '-' . $fileName;
            // $request->file('image')->storeAs('image/client/', str_replace(' ', '_', $newName));

            $file = $request->file('image');
            $path = Storage::disk('s3')->put("", $file);
        }

        $client = new Client();
        $client->name = $request->name;
        $client->image = str_replace(' ', '_', $path);
        $client->link = $request->link;
        $client->is_hidden = "0";
        $client->save();

        Session::flash('client', 'success');
        Session::flash('message', 'Tambah klien berhasil');
        // return redirect('/product-variant');
        return redirect('/backoffice/client');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);

        $newName = "";
        if($request->file('image')) {
            if ($request->oldImage) {
                // Storage::delete('image/client/' . $request->oldImage);
                Storage::disk('s3')->delete($request->oldImage);
            }
            $fileName = $request->file('image')->getClientOriginalName();
            $newName = 'image-' . now()->timestamp . '-' . $fileName;
            // $request->file('image')->storeAs('image/client/', str_replace(' ', '_', $newName));

            $file = $request->file('image');
            $path = Storage::disk('s3')->put("", $file);
        }

        $client = Client::find($id);
        $client->name = $request->name;
        if ($request->oldImage != null) {
            if ($request->file('image') == "") {
                $client->image = $request->oldImage;
            } else {
                $client->image = str_replace(' ', '_', $path);
            }
        } else {
            $client->image = str_replace(' ', '_', $path);
        }
        $client->link = $request->link;
        $client->is_hidden = $request->is_hidden;
        $client->update();

        Session::flash('client', 'success');
        Session::flash('message', 'Ubah klien berhasil');
        
        return redirect()->back();
        // return redirect('/backoffice/client/'. $client->id .'/detail');
    }

    public function detail($id) {
        $client = Client::with(['application'])->find($id);

        return view('backoffice.client.detail', [
            'client' => $client,
        ]);
    }

    public function delete($id) {

        $client = Client::find($id);
        if ($client->image) {
            // Storage::delete('image/client/' . $client->image);
            Storage::disk('s3')->delete($client->image);
        }

        $applications = Application::where('client_id', $client->id)->get();
        foreach ($applications as $application) {
            $application->client_id = null;
            $application->save();
        }
        $client->delete();
        
        Session::flash('client', 'success');
        Session::flash('message', 'Hapus klien berhasil');
        return redirect('/backoffice/client');
    }
}