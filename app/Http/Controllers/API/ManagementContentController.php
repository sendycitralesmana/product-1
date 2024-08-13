<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ManagementContent;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManagementContent\DetailManagementContentResource;
use App\Http\Resources\ManagementContent\ListManagementContentResource;

class ManagementContentController extends Controller
{
    public function index(Request $request)
    {
        try {
            $qMContents = ManagementContent::orderBy('id', 'asc');
            if ($request->slug) {
                $qMContents->where('slug', $request->slug);
            }
            $mContents = $qMContents->get();
            $resources = ListManagementContentResource::collection($mContents);

            return response()->json([
                'data' => $resources
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findBySlug($slug)
    {
        try {
            $mContent = ManagementContent::where('slug', $slug)->first();
            $resource = new DetailManagementContentResource($mContent);

            return response()->json([
                'data' => $resource
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
