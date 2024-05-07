<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $qPosts = Post::query();

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
            // $posts
            "total" => $posts->total(),
            "current_page" => $posts->currentPage(),
            "per_page" => $posts->perPage(),
            "total_pages" => $posts->lastPage(),
            "data" => $posts->items(),
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