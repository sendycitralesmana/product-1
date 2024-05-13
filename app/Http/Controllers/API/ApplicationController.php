<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Application\DetailApplicationResource;
use App\Http\Resources\Application\ListApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(Request $request) {
        $qApplications = Application::query();

        if ($request->search) {
            $qApplications->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->per_page) {
            $per_page = $request->per_page;
        } else {
            $per_page = 10;
        }

        $applications = $qApplications->paginate($per_page);
        $resource = ListApplicationResource::collection($applications);

        return response()->json([
            // $applications
            "total" => $applications->total(),
            "current_page" => $applications->currentPage(),
            "per_page" => $applications->perPage(),
            "total_pages" => $applications->lastPage(),
            // "data" => $applications->items(),
            "data" => $resource,
        ], 200);
    }

    public function detail($id) {
        $application = Application::with(
            ['media:id,application_id,type_id,created_at', 
            'media.type:id,name,created_at',
            'video', 
            'product', 
            'client:id,name,image,link,is_hidden,created_at']
            )->find($id);
        if ($application) {

            $resource = new DetailApplicationResource($application);

            return response()->json([
                $resource
            ], 200);
        } else {
            return response()->json([
                'message' => 'No application found'
            ], 404);
        }
    }

}
