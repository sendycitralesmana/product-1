<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request) {
        $qGalleries = Gallery::query();

        if ($request->search) {
            $qGalleries->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $galleries = $qGalleries->paginate($perPage);

        return response()->json([
            $galleries
        ], 200);
    }

    public function detail($id) {
        $gallery = Gallery::find($id);
        if ($gallery) {
            return response()->json([
                 $gallery
            ], 200);
        } else {
            return response()->json([
                'message' => 'No gallery found'
            ], 404);
        }
    }
}