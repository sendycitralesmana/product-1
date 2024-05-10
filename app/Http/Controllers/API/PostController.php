<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\DetailPostResource;
use App\Http\Resources\Post\ListPostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request) {
        $qPosts = Post::with(['category:id,name']);

        if ($request->search) {
            $qPosts->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('content', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $posts = $qPosts->paginate($perPage);

        $resource = ListPostResource::collection($posts);

        return response()->json([
            // $posts
            "total" => $posts->total(),
            "current_page" => $posts->currentPage(),
            "per_page" => $posts->perPage(),
            "total_pages" => $posts->lastPage(),
            "data" => $resource,
            // "data" => $posts->items(),
        ], 200);
    }

    public function detail($id) {
        $post = Post::with([
            'category:id,name,created_at', 
            'user:id,name,email,avatar,role_id,created_at',
            'user.role:id,name',
            ])->find($id);
        if ($post) {

            $resource = new DetailPostResource($post);

            return response()->json([
                $resource
            ], 200);
        } else {
            return response()->json([
                'message' => 'No post found'
            ], 404);
        }
    }
}