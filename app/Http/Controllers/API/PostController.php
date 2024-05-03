<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $qPosts = Post::with(['user', 'category']);

        if ($request->search) {
            $qPosts->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $posts = $qPosts->paginate($perPage);

        return response()->json([
            $posts
        ], 200);
    }

    public function detail($id) {
        $post = Post::with(['category', 'user'])->find($id);
        if ($post) {
            return response()->json([
                $post
            ], 200);
        } else {
            return response()->json([
                'message' => 'No post found'
            ], 404);
        }
    }
}