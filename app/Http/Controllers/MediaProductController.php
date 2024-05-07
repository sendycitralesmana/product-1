<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaType;
use App\Models\MediaProduct;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MediaProductController extends Controller
{   
    // public function create(Request $request)
    // {
    //     $validated = $request->validate([
    //         'product_id.*' => 'required',
    //         'type_id.*' => 'required',
    //         'media.*' => 'required',
    //     ]);

    //     foreach ($request->file('media') as $key => $file) {
    //         $type = $request->type_id[$key];
    //         $fileName = $file->getClientOriginalName();
    //         $url = now()->timestamp . '-' . str_replace(' ', '_', $fileName);
    //         $file->storeAs('product/media/', $url);
    //         $data2 = array(
    //             'product_id' => $request->product_id,
    //             'type_id' => $type,
    //             'name' => $fileName,
    //             'url' => str_replace(' ', '_', $url),
    //         );
    //         MediaProduct::create($data2);
    //     }


    //     Session::flash('media', 'success');
    //     Session::flash('message', 'Add data success');
    //     // return redirect('/media-product');
    //     return redirect('/backoffice/product/media/'. $request->product_id[0]);

    // }
    public function imageCreate(Request $request)
    {
        $validated = $request->validate([
            'media.*' => 'required',
        ]);

        foreach ($request->file('media') as $key => $file) {
            // $type = $request->type_id[$key];
            $fileName = $file->getClientOriginalName();
            $fileUrl = $file->getClientOriginalExtension();
            $name = 'image-' . now()->timestamp . $key . '-' . str_replace(' ', '_', $fileName);
            $url = 'image-' . now()->timestamp . $key . '.' . str_replace(' ', '_', $fileUrl);
            $file->storeAs('image/product/media/', $url);
            $data2 = array(
                'product_id' => $request->product_id,
                'type_id' => 1,
                'name' => str_replace(' ', '_', $name),
                'url' => str_replace(' ', '_', $url),
            );
            MediaProduct::create($data2);
        }


        Session::flash('media', 'success');
        Session::flash('message', 'Tambah gambar berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/media/'. $request->product_id[0]);

    }
    
    public function fileCreate(Request $request)
    {
        $validated = $request->validate([
            'media.*' => 'required',
        ]);

        foreach ($request->file('media') as $key => $file) {
            // $type = $request->type_id[$key];
            $fileName = $file->getClientOriginalName();
            $fileUrl = $file->getClientOriginalExtension();
            $name = 'file-' . now()->timestamp . $key . '-' . str_replace(' ', '_', $fileName);
            $url = 'file-' . now()->timestamp . $key . '.' . str_replace(' ', '_', $fileUrl);
            $file->storeAs('image/product/media/', $url);
            $data2 = array(
                'product_id' => $request->product_id,
                'type_id' => 2,
                'name' => str_replace(' ', '_', $name),
                'url' => str_replace(' ', '_', $url),
            );
            MediaProduct::create($data2);
        }


        Session::flash('media', 'success');
        Session::flash('message', 'Tambah berkas berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/media/'. $request->product_id[0]);

    }

    public function imageUpdate(Request $request, $id)
    {
        if($request->file('media')) {
            if ($request->oldName && $request->oldUrl) {
                Storage::delete('image/product/media/' . $request->oldUrl);
            }
            $fileName = $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $name = 'image-' . now()->timestamp . '-' . $fileName;
            $url = 'image-' . now()->timestamp . '.' . $extension;
            $request->file('media')->storeAs('image/product/media/', str_replace(' ', '_', $url));
        }

        $productCategory = MediaProduct::find($id);
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
                $productCategory->name = str_replace(' ', '_', $name);
                $productCategory->url = str_replace(' ', '_', $url);
            }
        }
        $productCategory->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Ubah gambar berhasil');
        // return redirect('/backoffice/product/media/'. $request->product_id);
        return redirect()->back();
    }

    public function fileUpdate(Request $request, $id)
    {
        if($request->file('media')) {
            if ($request->oldName && $request->oldUrl) {
                Storage::delete('image/product/media/' . $request->oldUrl);
            }
            $fileName = $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $name = 'file-' . now()->timestamp . '.' . $fileName;
            $url = 'file-' . now()->timestamp . '.' . $extension;
            $request->file('media')->storeAs('image/product/media/', str_replace(' ', '_', $url));
        }

        $productCategory = MediaProduct::find($id);
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
                $productCategory->name = str_replace(' ', '_', $name);
                $productCategory->url = str_replace(' ', '_', $url);
            }
        }
        $productCategory->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Ubah berkas berhasil');
        // return redirect('/backoffice/product/media/'. $request->product_id);
        return redirect()->back();
    }

    // public function update(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'type_id' => 'required',
    //     ]);

    //     if($request->file('media')) {
    //         if ($request->oldName && $request->oldUrl) {
    //             Storage::delete('product/media/' . $request->oldUrl);
    //         }
    //         $fileName = $request->file('media')->getClientOriginalName();
    //         $extension = $request->file('media')->getClientOriginalExtension();
    //         $url = now()->timestamp . '-' . $fileName;
    //         $request->file('media')->storeAs('product/media/', str_replace(' ', '_', $url));
    //     }

    //     $productCategory = MediaProduct::find($id);
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
    //     // return redirect('/backoffice/product/media/'. $request->product_id);
    //     return redirect()->back();


    // }

    // public function delete($id)
    // {
    //     $mediaProduct = MediaProduct::find($id);
    //     Storage::delete('product/media/' . $mediaProduct->url);
    //     $mediaProduct->delete();

    //     Session::flash('media', 'success');
    //     Session::flash('message', 'Delete data success');
    //     return redirect('/backoffice/product/media/'. $mediaProduct->product_id);
    // }
    public function delete($id)
    {
        $mediaProduct = MediaProduct::find($id);
        Storage::delete('image/product/media/' . $mediaProduct->url);
        $mediaProduct->delete();

        Session::flash('media', 'success');
        Session::flash('message', 'Hapus berhasil');
        return redirect()->back();
        // return redirect('/backoffice/product/media/'. $mediaProduct->product_id);
    }

    public function mediaByProduct($id) {
        $product = Product::find($id);
        $mediaTypes = MediaType::get();
        $images = MediaProduct::where('product_id', $id)
                            ->where('type_id', 1)
                            ->orderBy('id', 'desc')
                            ->with(['product'])
                            ->paginate(12);
        return view('backoffice.product.media.mediaByProduct', [
            'product' => $product,
            'mediaTypes' => $mediaTypes,
            'images' => $images,
        ]);
    }
    
    public function fileByProduct($id) {
        $product = Product::find($id);
        $mediaTypes = MediaType::get();
        $files = MediaProduct::where('product_id', $id)->where('type_id', 2)->with(['product'])->paginate(12);
        return view('backoffice.product.file.fileByProduct', [
            'product' => $product,
            'mediaTypes' => $mediaTypes,
            'files' => $files,
        ]);
    }

    public function downloadFile($id) {
        $mediaProduct = MediaProduct::find($id);
        // $pathToFile = public_path('storage/product/media/'. $mediaProduct->url);
        // return response()->download($pathToFile);

        $pdf = public_path('storage/product/media/'. $mediaProduct->url);
        return response()->file($pdf);

        // return $pdf->stream($mediaProduct->name . '.pdf');

    }

}
