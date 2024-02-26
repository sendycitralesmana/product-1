<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ContentAltController extends Controller
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

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $newname = "";
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/content/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newname = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/content/', str_replace(' ', '_', $newname));
        } else {
            $newname = $request->oldImage;
        }

        $content = Content::where('id', $id)->first();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->thumbnail = $newname;
        $content->save();

        Session::flash('content', 'success');
        Session::flash('message', 'Edit konten berhasil');
        // return redirect('/product-variant');
        return redirect('/backoffice/about/content');
    }
}
