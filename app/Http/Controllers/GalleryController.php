<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index() {
        $galleries = Gallery::paginate(12);

        return view('backoffice.gallery.index', [
            'galleries' => $galleries
        ]);
    }

    public function create(Request $request) {
        $request->validate([
            'name*' => ['required', 'string', 'max:255'],
            'image*' => ['required', 'image']
        ]);

        foreach ($request->file('image') as $key => $file) {
            $fileName = $file->getClientOriginalName();
            $url = now()->timestamp . '-' . str_replace(' ', '_', $fileName);
            $file->storeAs('image/gallery/', $url);
            $data2 = array(
                'name' => $fileName,
                'image' => str_replace(' ', '_', $url),
            );
            // dd($data2);
            Gallery::create($data2);
        }

        // $filename = $request->file('image')->getClientOriginalName();
        // $newName = now()->timestamp . '-' . $filename;
        // $request->file('image')->storeAs('image/gallery/', str_replace(' ', '_', $newName));

        // $gallery = new Gallery();
        // $gallery->title = $request->input('title');
        // $gallery->image = str_replace(' ', '_', $newName);
        // $gallery->save();
        Session::flash('gallery', 'success');
        Session::flash('message', 'Tambah gambar berhasil');
        // return redirect('/product-variant');
        return redirect()->back();

        // return redirect('/backoffice/gallery');
    }

    public function update(Request $request, $id) {
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            'image' => ['image']
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete('image/gallery/' . $request->oldImage);
            }
            $filename = $request->file('image')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $filename;
            $request->file('image')->storeAs('image/gallery/', str_replace(' ', '_', $newName));
        }

        $gallery = Gallery::find($id);
        // $gallery->name = $filename;
        if ($request->oldImage != null) {
            if ($request->file('image') == "") {
                $gallery->name = $request->oldName;
                $gallery->image = $request->oldImage;
            } else {
                $gallery->name = $filename;
                $gallery->image = str_replace(' ', '_', $newName);
            }
        } else {
            $gallery->name = $filename;
            $gallery->image = str_replace(' ', '_', $newName);
        }
        $gallery->save();

        Session::flash('gallery', 'success');
        Session::flash('message', 'Edit gambar berhasil');

        return redirect('/backoffice/gallery');

    }

    public function delete($id) {
        $gallery = Gallery::find($id);
        if($gallery->image) {
            Storage::delete('image/gallery/' . $gallery->image);
        }
        $gallery->delete();

        Session::flash('gallery', 'success');
        Session::flash('message', 'Hapus gambar berhasil');
        return redirect('/backoffice/gallery');
    }
}
