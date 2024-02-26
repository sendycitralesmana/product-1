<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    public function index() {
        $contents = Content::orderBy('id', 'asc')->get();

        return view('backoffice.about.content.index', [
            'contents' => $contents
        ]);
    }

    public function edit($id)
    {
        $content = Content::find($id);
        return view('backoffice.about.content.edit', [
            'content' => $content
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $application = new Content();
        $application->title = $request->title;
        $application->description = $request->description;
        $application->save();

        Session::flash('content', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/backoffice/about/content');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/content/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/content/', str_replace(' ', '_', $newName));
        }

        $content = Content::find($id);
        $content->title = $request->title;
        $content->description = $request->description;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $content->thumbnail = $request->oldImage;
            } else {
                $content->thumbnail = str_replace(' ', '_', $newName);
            }
        } else {
            $content->thumbnail = str_replace(' ', '_', $newName);
        }
        $content->save();

        Session::flash('content', 'success');
        Session::flash('message', 'Edit konten berhasil');
        
        return redirect('/backoffice/about/content');
    }

    public function delete($id) {
        $content = Content::find($id);
        $content->delete();

        Session::flash('content', 'success');
        Session::flash('message', 'Delete data success');
        
        return redirect('/backoffice/about/content');
    }
}
