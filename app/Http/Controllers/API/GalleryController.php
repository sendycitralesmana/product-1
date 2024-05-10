<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Gallery\DetailGalleryResource;
use App\Http\Resources\Gallery\ListGalleryResource;
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

        $resource = ListGalleryResource::collection($galleries);

        return response()->json([
            // $galleries
            "total" => $galleries->total(),
            "currentPage" => $galleries->currentPage(),
            "perPage" => $galleries->perPage(),
            "totalPages" => $galleries->lastPage(),
            "data" => $resource,
        ], 200);
    }

    public function detail($id) {
        $gallery = Gallery::find($id);
        if ($gallery) {

            $resource = new DetailGalleryResource($gallery);

            return response()->json([
                 $resource
            ], 200);
        } else {
            return response()->json([
                'message' => 'No gallery found'
            ], 404);
        }
    }
}