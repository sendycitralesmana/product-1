<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index(Request $request) {
        $qApplications = Application::query();

        if ($request->search) {
            $qApplications->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $applications = $qApplications->paginate($perPage);

        return response()->json([
            $applications
        ], 200);
    }

    public function detail($id) {
        $application = Application::find($id);
        if ($application) {
            return response()->json([
                $application
            ], 200);
        } else {
            return response()->json([
                'message' => 'No application found'
            ], 404);
        }
    }

}
