<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index() {
        $histories = History::get();
        return response()->json(
            $histories, 200
        );
    }
    
    public function detail($id) {
        $history = History::find($id);
        if ($history) {
            return response()->json([
                'message' => 'histories successfully fetched',
                'data' => $history
            ], 200);
        } else {
            return response()->json([
                'message' => 'No history found'
            ], 404);
        }
    }
}
