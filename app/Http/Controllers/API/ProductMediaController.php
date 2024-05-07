<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MediaProduct;
use Illuminate\Http\Request;

class ProductMediaController extends Controller
{
    public function index( Request $request, $product_id )
    {
        $qPMedia = MediaProduct::with(['product', 'mediaType'])->where('product_id', $product_id)->where('type_id', 1);
        $qPMedia->orderBy('created_at', 'desc');

        if ($request->search) {
            $qPMedia->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $PMedia = $qPMedia->paginate($perPage);

        return response()->json([
            $PMedia
        ], 200);
    }
}
