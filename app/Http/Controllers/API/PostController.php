<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::with(['category']);

        $list = $posts->get();

        return response()->json(
            $list, 200
        );
    }

    public function detail($id) {
        $post = Post::with(['category'])->find($id);
        if ($post) {
            return response()->json([
                'message' => 'Post successfully fetched',
                'data' => $post
            ], 200);
        } else {
            return response()->json([
                'message' => 'No post found'
            ], 404);
        }
    }
}