<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Client\DetailClientResource;
use App\Http\Resources\Client\ListClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request) {
        $qClients = Client::query();

        if ($request->search) {
            $qClients->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $clients = $qClients->paginate($perPage);
        $resource = ListClientResource::collection($clients);

        return response()->json([
            // $clients
            "total" => $clients->total(),
            "current_page" => $clients->currentPage(),
            "per_page" => $clients->perPage(),
            "total_pages" => $clients->lastPage(),
            // "data" => $clients->items(),
            "data" => $resource,
        ], 200);
    }

    public function detail($id) {
        $client = Client::with([
            'application:id,client_id,name,area,time,created_at',
        ])->find($id);
        if ($client) {

            $resource = new DetailClientResource($client);

            return response()->json([
                // $client
                $resource
            ], 200);
        } else {
            return response()->json([
                'message' => 'No client found'
            ], 404);
        }
    }
}
