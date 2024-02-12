<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::paginate(12);

        return view('backoffice.client.index', [
            'clients' => $clients
            ,
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
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('image')->storeAs('image/client/', str_replace(' ', '_', $newName));
        }

        $client = new Client();
        $client->name = $request->name;
        $client->image = str_replace(' ', '_', $newName);
        $client->link = $request->link;
        $client->save();

        Session::flash('client', 'success');
        Session::flash('message', 'Add data success');
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
                Storage::delete('image/client/' . $request->oldImage);
            }
            $fileName = $request->file('image')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('image')->storeAs('image/client/', str_replace(' ', '_', $newName));
        }

        $client = Client::find($id);
        $client->name = $request->name;
        if ($request->oldImage != null) {
            if ($request->file('image') == "") {
                $client->image = $request->oldImage;
            } else {
                $client->image = str_replace(' ', '_', $newName);
            }
        } else {
            $client->image = str_replace(' ', '_', $newName);
        }
        $client->link = $request->link;
        $client->save();

        Session::flash('client', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/client/'. $client->id .'/detail');
    }

    public function detail($id) {
        $client = Client::with(['application'])->find($id);

        return view('backoffice.client.detail', [
            'client' => $client,
        ]);
    }

    public function delete($id) {

        dd('hello');

        $client = Client::find($id);
        $client->application()->update();
        $client->delete(); 
        
        Session::flash('client', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/client');
    }
}