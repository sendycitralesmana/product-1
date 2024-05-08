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
            $fileExtension = $file->getClientOriginalExtension();
            $name = 'image-' . now()->timestamp . $key . '-' . str_replace(' ', '_', $fileName);
            // $url = 'image-' . now()->timestamp . $key . '.' . str_replace(' ', '_', $fileExtension);
            // $file->storeAs('image/gallery/', $name);

            $file = $request->file('image')[$key];
            $path = Storage::disk('s3')->put("", $file);

            $data2 = array(
                // 'name' => str_replace(' ', '_', $name),
                'image' => str_replace(' ', '_', $path),
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
                // Storage::delete('image/gallery/' . $request->oldImage);
                Storage::disk('s3')->delete($request->oldImage);
            }
            $filename = $request->file('image')->getClientOriginalName();
            $newName = 'image-' . now()->timestamp . '-' . $filename;
            // $request->file('image')->storeAs('image/gallery/', str_replace(' ', '_', $newName));

            $file = $request->file('image');
            $path = Storage::disk('s3')->put("", $file);
        }

        $gallery = Gallery::find($id);
        // $gallery->name = $filename;
        if ($request->oldImage != null) {
            if ($request->file('image') == "") {
                // $gallery->name = $request->oldName;
                $gallery->image = $request->oldImage;
            } else {
                // $gallery->name = $filename;
                $gallery->image = str_replace(' ', '_', $path);
            }
        } else {
            // $gallery->name = $filename;
            $gallery->image = str_replace(' ', '_', $path);
        }
        $gallery->save();

        Session::flash('gallery', 'success');
        Session::flash('message', 'Ubah gambar berhasil');

        return redirect('/backoffice/gallery');

    }

    public function delete($id) {
        $gallery = Gallery::find($id);
        if($gallery->image) {
            // Storage::delete('image/gallery/' . $gallery->image);
            Storage::disk('s3')->delete($gallery->image);
        }
        $gallery->delete();

        Session::flash('gallery', 'success');
        Session::flash('message', 'Hapus gambar berhasil');
        return redirect('/backoffice/gallery');
    }
}
