<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $posts = Post::with(['user', 'category']);

        if ($request->search) {
            $posts->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->paginate) {
            $list = $posts->paginate($request->paginate);
        } else {
            $list = $posts->get();
        }

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