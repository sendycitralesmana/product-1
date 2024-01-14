<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::get();
        return response()->json();
    }

    public function detail($id) {
        $client = Client::find($id);
        if ($client) {
            return response()->json([
                'message' => 'clients successfully fetched',
                'data' => $client
            ], 200);
        } else {
            return response()->json([
                'message' => 'No client found'
            ], 404);
        }
    }
}
