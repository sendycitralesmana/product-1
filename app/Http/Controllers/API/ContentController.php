<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index() {
        $contents = Content::get();
        return response()->json([
            'message' => 'contents successfully fetched',
            'data' => $contents
        ], 200);
    }
    
    public function detail($id) {
        $content = Content::find($id);
        if ($content) {
            return response()->json([
                'message' => 'content successfully fetched',
                'data' => $content
            ], 200);
        } else {
            return response()->json([
                'message' => 'No content found'
            ], 404);
        }
    }
}
