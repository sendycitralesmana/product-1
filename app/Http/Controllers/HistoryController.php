<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index() {
        $histories = History::get();

        return view('backoffice.about.history.index', [
            'histories' => $histories
            ,
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'description' => 'required',
            'thumbnail' => 'image',
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/history/', $newName);
        }

        $history = new History();
        $history->title = $request->title;
        $history->year = $request->year;
        $history->description = $request->description;
        $history->thumbnail = str_replace(' ', '_', $newName);
        $history->save();

        Session::flash('history', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/backoffice/about/history');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'description' => 'required',
            'thumbnail' => 'image'
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/history/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/history/', $newName);
        }

        $history = History::find($id);
        $history->title = $request->title;
        $history->year = $request->year;
        $history->description = $request->description;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $history->thumbnail = $request->oldImage;
            } else {
                $history->thumbnail = str_replace(' ', '_', $newName);
            }
        } else {
            $history->thumbnail = str_replace(' ', '_', $newName);
        }
        $history->save();

        Session::flash('history', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/about/history');
    }

    public function delete($id) {
        $history = History::find($id);
        if ($history->thumbnail != "") {
            Storage::delete('image/history/' . $history->thumbnail);
        }
        $history->delete();

        Session::flash('history', 'success');
        Session::flash('message', 'Delete data success');
        
        return redirect('/backoffice/about/history');
    }
}