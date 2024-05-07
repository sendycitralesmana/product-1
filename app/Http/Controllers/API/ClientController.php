<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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

        return response()->json([
            // $clients
            "total" => $clients->total(),
            "current_page" => $clients->currentPage(),
            "per_page" => $clients->perPage(),
            "total_pages" => $clients->lastPage(),
            "data" => $clients->items(),
        ], 200);
    }

    public function detail($id) {
        $client = Client::find($id);
        if ($client) {
            return response()->json([
                $client
            ], 200);
        } else {
            return response()->json([
                'message' => 'No client found'
            ], 404);
        }
    }
}
