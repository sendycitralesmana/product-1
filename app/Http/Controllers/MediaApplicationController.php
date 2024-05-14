<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\MediaApplication;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use function Laravel\Prompts\alert;

class MediaApplicationController extends Controller
{
    public function imageCreate(Request $request, $application_id)
    {
        $validated = $request->validate([
            'media.*' => 'required',
        ]);

        foreach ($request->file('media') as $key => $file) {
            $fileName = now()->timestamp . $key . '-' . $file->getClientOriginalName();
            $fileUrl = $file->getClientOriginalExtension();
            $url = 'image-' . now()->timestamp . $key . '.' . $fileUrl;
            // $file->storeAs('image/application/media/', str_replace(' ', '_', $url));

            $file = $request->file('media')[$key];
            $path = Storage::disk('s3')->put("", $file);

            $data2 = array(
                'application_id' => $request->application_id,
                'type_id' => 1,
                'name' => str_replace(' ', '_', $fileName),
                'url' => str_replace(' ', '_', $path),
                
            );
            MediaApplication::create($data2);
        }

        Session::flash('media', 'success');
        Session::flash('message', 'Tambah gambar berhasil');
        // return redirect('/product-variant');
        return redirect()->back();
    }
    
    public function fileCreate(Request $request)
    {
        $validated = $request->validate([
            'media.*' => 'required',
        ]);

        foreach ($request->file('media') as $key => $file) {
            $fileName = $file->getClientOriginalName();
            $fileUrl = $file->getClientOriginalExtension();
            $url = 'file-' . now()->timestamp . $key . '.' . $fileUrl;
            // $file->storeAs('image/application/media/', str_replace(' ', '_', $url));

            $file = $request->file('media')[$key];
            $path = Storage::disk('s3')->put("", $file);

            $data2 = array(
                'application_id' => $request->application_id,
                'type_id' => 2,
                'name' => str_replace(' ', '_', $fileName),
                'url' => str_replace(' ', '_', $path),
                
            );
            MediaApplication::create($data2);
        }

        Session::flash('media', 'success');
        Session::flash('message', 'Tambah file berhasil');
        // return redirect('/product-variant');
        return redirect()->back();
    }

    public function imageUpdate(Request $request, $application_id, $media_id)
    {

        $request->validate([
            'application_id' => 'required',
        ]);

        if($request->file('media')) {
            if ($request->oldUrl) {
                // Storage::delete('image/application/media/' . $request->oldUrl);
                Storage::disk('s3')->delete($request->oldUrl);
            }
            $fileName = now()->timestamp . '-' . $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $url = 'image-' .  now()->timestamp . '.' . $extension;
            // $request->file('media')->storeAs('image/application/media/', str_replace(' ', '_', $url));

            $file = $request->file('media');
            $path = Storage::disk('s3')->put("", $file);
        }

        $media = MediaApplication::find($media_id);

        if ($request->file('media') == "") {
            $media->name = $request->oldName;
            $media->url = $request->oldUrl;
        } else {
            $media->name = str_replace(' ', '_', $fileName);
            $media->url = $path;
        }
        // if ($request->oldUrl != null) {
        // }
        $media->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Ubah gambar berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/media/'. $request->application_id);
    }
    
    public function fileUpdate(Request $request, $application_id, $media_id)
    {
        $validated = $request->validate([
            'application_id' => 'required',
        ]);

        if($request->file('media')) {
            if ($request->oldUrl) {
                // Storage::delete('image/application/media/' . $request->oldUrl);
                Storage::disk('s3')->delete($request->oldUrl);
            }
            $fileName = $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $url = 'file-' . now()->timestamp . '.' . $extension;
            // $request->file('media')->storeAs('image/application/media/', str_replace(' ', '_', $url));

            $file = $request->file('media');
            $path = Storage::disk('s3')->put("", $file);
        }

        $productCategory = MediaApplication::find($media_id);
        if ($request->oldName != null && $request->oldUrl != null) {
            if ($request->file('media') == "") {
                $productCategory->type_id = 2;
                $productCategory->name = $request->oldName;
                $productCategory->url = $request->oldUrl;
            } else {
                $productCategory->type_id = 2;
                $productCategory->name = str_replace(' ', '_', $fileName);
                $productCategory->url = $path;
            }
        }
        $productCategory->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Ubah file berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/media/'. $request->application_id);
    }

    public function mediaByApplication($application_id) {
        $application = Application::find($application_id);
        $images = MediaApplication::where('application_id', $application_id)->where('type_id', 1)->paginate(12);
        $mediaTypes = MediaType::get();

        return view('backoffice.application.media.mediaByApplication', [
            'application' => $application,
            'images' => $images,
            'mediaTypes' => $mediaTypes
        ]);
    }
    
    public function fileByApplication($application_id) {
        $application = Application::find($application_id);
        $files = MediaApplication::where('application_id', $application_id)->where('type_id', 2)->paginate(12);
        $mediaTypes = MediaType::get();

        return view('backoffice.application.file.fileByApplication', [
            'application' => $application,
            'files' => $files,
            'mediaTypes' => $mediaTypes
        ]);
    }

    public function delete($application_id, $media_id)
    {
        $mediaApplication = MediaApplication::find($media_id);
        // Storage::delete('image/application/media/' . $mediaApplication->url);
        Storage::disk('s3')->delete($mediaApplication->url);
        $mediaApplication->delete();

        Session::flash('media', 'success');
        Session::flash('message', 'Hapus berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/media/'. $mediaApplication->application_id);
    }

    public function downloadFile($application_id, $media_id) {
        $mediaApplication = MediaApplication::find($media_id);
        // $pathToFile = public_path('storage/application/media/'. $mediaApplication->url);
        // return response()->download($pathToFile);

        $pdf = public_path('storage/application/media/'. $mediaApplication->url);
        return response()->file($pdf);

    }
}
