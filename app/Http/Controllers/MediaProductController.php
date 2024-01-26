<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\MediaType;
use App\Models\MediaProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MediaProductController extends Controller
{   
    public function create(Request $request)
    {
        $validated = $request->validate([
            'product_id.*' => 'required',
            'type_id.*' => 'required',
            'media.*' => 'required',
        ]);

        foreach ($request->file('media') as $key => $file) {
            $type = $request->type_id[$key];
            $fileName = $file->getClientOriginalName();
            $url = now()->timestamp . '-' . str_replace(' ', '_', $fileName);
            $file->storeAs('product/media/', $url);
            $data2 = array(
                'product_id' => $request->product_id,
                'type_id' => $type,
                'name' => $fileName,
                'url' => str_replace(' ', '_', $url),
            );
            MediaProduct::create($data2);
        }


        Session::flash('media', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/media-product');
        return redirect('/backoffice/product/media/'. $request->product_id[0]);

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'type_id' => 'required',
        ]);

        if($request->file('media')) {
            if ($request->oldName && $request->oldUrl) {
                Storage::delete('product/media/' . $request->oldUrl);
            }
            $fileName = $request->file('media')->getClientOriginalName();
            $extension = $request->file('media')->getClientOriginalExtension();
            $url = now()->timestamp . '-' . $fileName;
            $request->file('media')->storeAs('product/media/', str_replace(' ', '_', $url));
        }

        $productCategory = MediaProduct::find($id);
        if ($request->oldName != null && $request->oldUrl != null) {
            if ($request->file('media') == "") {
                $productCategory->type_id = $request->type_id;
                $productCategory->name = $request->oldName;
                $productCategory->url = $request->oldUrl;
            } else {
                if (($extension == "jpeg") || ($extension == "jpg") || ($extension == "png") ) {
                    $productCategory->type_id = 1;
                } else if (($extension == "pdf") || ($extension == "xls") || ($extension == "doc"))  {
                    $productCategory->type_id = 2;
                }
                $productCategory->name = $fileName;
                $productCategory->url = str_replace(' ', '_', $url);
            }
        }
        $productCategory->save();

        Session::flash('media', 'success');
        Session::flash('message', 'Update data success');
        // return redirect('/backoffice/product/media/'. $request->product_id);
        return redirect()->back();


    }

    public function delete($id)
    {
        $mediaProduct = MediaProduct::find($id);
        Storage::delete('product/media/' . $mediaProduct->url);
        $mediaProduct->delete();

        Session::flash('media', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/product/media/'. $mediaProduct->product_id);
    }

    public function mediaByProduct($id) {
        $product = Product::find($id);
        $mediaTypes = MediaType::get();
        $mediaProducts = MediaProduct::where('product_id', $id)->with(['product'])->get();
        return view('backoffice.product.media.mediaByProduct', [
            'product' => $product,
            'mediaTypes' => $mediaTypes,
            'mediaProducts' => $mediaProducts,
        ]);
    }

    public function downloadFile($id) {
        $mediaProduct = MediaProduct::find($id);
        $pathToFile = public_path('storage/product/media/'. $mediaProduct->url);
        // dd($pathToFile);
        return response()->download($pathToFile);
    }

}
