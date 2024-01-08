<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MediaTypeController extends Controller
{
    public function index()
    {
        $mediaTypes = MediaType::all();
        return view('media-type.index', [
            'mediaTypes' => $mediaTypes
        ]);
    }

    public function add()
    {
        return view('media-type.add');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        if (count($request->name) > 0) {
            foreach ($request->name as $item => $value) {
                $data2 = array(
                    'name' => $request->name[$item]
                );
                MediaType::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/media-type');
    }
    
    public function edit($id)
    {
        $mediaType = MediaType::find($id);
        return view('media-type.edit', [
            'mediaType' => $mediaType
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required'
        ]);

        $mediaType = MediaType::find($id);
        $mediaType->name = $request->name;
        // dd($mediaType);
        $mediaType->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update data success');
        return redirect('/media-type');
    }

    public function delete($id)
    {
        $mediaType = MediaType::find($id);
        $mediaType->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/media-type');
    }

}
