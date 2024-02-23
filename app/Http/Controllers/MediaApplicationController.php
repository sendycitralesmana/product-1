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

    // public function create(Request $request)
    // {
    //     $validated = $request->validate([
    //         'application_id.*' => 'required',
    //         'type_id.*' => 'required',
    //         'media.*' => 'required',
    //     ]);

    //     foreach ($request->file('media') as $key => $file) {
    //         $type = $request->type_id[$key];
    //         $fileName = $file->getClientOriginalName();
    //         $url = now()->timestamp . '-' . $fileName;
    //         $file->storeAs('application/media/', str_replace(' ', '_', $url));
    //         $data2 = array(
    //             'application_id' => $request->application_id,
    //             'type_id' => $type,
    //             'name' => str_replace(' ', '_', $fileName),
    //             'url' => str_replace(' ', '_', $url),
                
    //         );
    //         MediaApplication::create($data2);
    //     }

    //     Session::flash('media', 'success');
    //     Session::flash('message', 'Add data success');
    //     // return redirect('/product-variant');
    //     return redirect()->back();
    // }
    public function imageCreate(Request $request)
    {
        $validated = $request->validate([
            'media.*' => 'required',
        ]);

        foreach ($request->file('media') as $key => $file) {
            $fileName = $file->getClientOriginalName();
            $url = now()->timestamp . '-' . $fileName;
            $file->storeAs('application/media/', str_replace(' ', '_', $url));
            $data2 = array(
                'application_id' => $request->application_id,
                'type_id' => 1,
                'name' => str_replace(' ', '_', $fileName),
                'url' => str_replace(' ', '_', $url),
                
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
            $url = now()->timestamp . '-' . $fileName;
            $file->storeAs('application/media/', str_replace(' ', '_', $url));
            $data2 = array(
                'application_id' => $request->application_id,
                'type_id' => 2,
                'name' => str_replace(' ', '_', $fileName),
                'url' => str_replace(' ', '_', $url),
                
            );
            MediaApplication::create($data2);
        }

        Session::flash('media', 'success');
        Session::flash('message', 'Tambah file berhasil');
        // return redirect('/product-variant');
        return redirect()->back();
    }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'application_id' => 'required',
    //     ]);

    //     if($request->file('media')) {
    //         if ($request->oldName && $request->oldUrl) {
    //             Storage::delete('application/media/' . $request->oldUrl);
    //         }
    //         $fileName = $request->file('media')->getClientOriginalName();
    //         $extension = $request->file('media')->getClientOriginalExtension();
    //         $url = now()->timestamp . '-' . $fileName;
    //         $request->file('media')->storeAs('application/media/', str_replace(' ', '_', $url));
    //     }

    //     $productCategory = MediaApplication::find($id);
    //     if ($request->oldName != null && $request->oldUrl != null) {
    //         if ($request->file('media') == "") {
    //             $productCategory->type_id = $request->type_id;
    //             $productCategory->name = $request->oldName;
    //             $productCategory->url = $request->oldUrl;
    //         } else {
    //             if (($extension == "jpeg") || ($extension == "jpg") || ($extension == "png") ) {
    //                 $productCategory->type_id = 1;
    //             } else if (($extension == "pdf") || ($extension == "xls") || ($extension == "doc"))  {
    //                 $productCategory->type_id = 2;
    //             }
    //             $productCategory->name = $fileName;
    //             $productCategory->url = str_replace(' ', '_', $url);
    //         }
    //     }
    //     $productCategory->save();

    //     Session::flash('media', 'success');
    //     Session::flash('message', 'Update data success');
        
    //     return redirect('/backoffice/application/media/'. $request->application_id);
    // }
    public function imageUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'application_id' => 'required',
        ]);

        if($request->file('media')) {
            if ($request->oldName && $request->oldUrl) {
                Storage::delete('application/media/' . $request->oldUrl);
            }
            $fileName = $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $url = now()->timestamp . '-' . $fileName;
            $request->file('media')->storeAs('application/media/', str_replace(' ', '_', $url));
        }

        $productCategory = MediaApplication::find($id);
        if ($request->oldName != null && $request->oldUrl != null) {
            if ($request->file('media') == "") {
                $productCategory->type_id = 1;
                $productCategory->name = $request->oldName;
                $productCategory->url = $request->oldUrl;
            } else {
                // if (($extension == "jpeg") || ($extension == "jpg") || ($extension == "png") ) {
                //     $productCategory->type_id = 1;
                // } else if (($extension == "pdf") || ($extension == "xls") || ($extension == "doc"))  {
                //     $productCategory->type_id = 2;
                // }
                $productCategory->type_id = 1;
                $productCategory->name = $fileName;
                $productCategory->url = str_replace(' ', '_', $url);
            }
        }
        $productCategory->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Edit gambar berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/media/'. $request->application_id);
    }
    
    public function fileUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'application_id' => 'required',
        ]);

        if($request->file('media')) {
            if ($request->oldName && $request->oldUrl) {
                Storage::delete('application/media/' . $request->oldUrl);
            }
            $fileName = $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $url = now()->timestamp . '-' . $fileName;
            $request->file('media')->storeAs('application/media/', str_replace(' ', '_', $url));
        }

        $productCategory = MediaApplication::find($id);
        if ($request->oldName != null && $request->oldUrl != null) {
            if ($request->file('media') == "") {
                $productCategory->type_id = 2;
                $productCategory->name = $request->oldName;
                $productCategory->url = $request->oldUrl;
            } else {
                // if (($extension == "jpeg") || ($extension == "jpg") || ($extension == "png") ) {
                //     $productCategory->type_id = 1;
                // } else if (($extension == "pdf") || ($extension == "xls") || ($extension == "doc"))  {
                //     $productCategory->type_id = 2;
                // }
                $productCategory->type_id = 2;
                $productCategory->name = $fileName;
                $productCategory->url = str_replace(' ', '_', $url);
            }
        }
        $productCategory->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Edit file berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/media/'. $request->application_id);
    }

    public function mediaByApplication($id) {
        $application = Application::find($id);
        $images = MediaApplication::where('application_id', $id)->where('type_id', 1)->paginate(12);
        $mediaTypes = MediaType::get();

        return view('backoffice.application.media.mediaByApplication', [
            'application' => $application,
            'images' => $images,
            'mediaTypes' => $mediaTypes
        ]);
    }
    
    public function fileByApplication($id) {
        $application = Application::find($id);
        $files = MediaApplication::where('application_id', $id)->where('type_id', 2)->paginate(12);
        $mediaTypes = MediaType::get();

        return view('backoffice.application.file.fileByApplication', [
            'application' => $application,
            'files' => $files,
            'mediaTypes' => $mediaTypes
        ]);
    }

    public function delete($id)
    {
        $mediaApplication = MediaApplication::find($id);
        // dd($mediaApplication);
        Storage::delete('application/media/' . $mediaApplication->url);
        $mediaApplication->delete();

        Session::flash('media', 'success');
        Session::flash('message', 'Hapus berhasil');
        return redirect()->back();
        // return redirect('/backoffice/application/media/'. $mediaApplication->application_id);
    }

    public function downloadFile($id) {
        $mediaApplication = MediaApplication::find($id);
        // $pathToFile = public_path('storage/application/media/'. $mediaApplication->url);
        // return response()->download($pathToFile);

        $pdf = public_path('storage/application/media/'. $mediaApplication->url);
        return response()->file($pdf);

    }
}
