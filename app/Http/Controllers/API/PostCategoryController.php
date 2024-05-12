<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\Category\DetailtPostCategoryResource;
use App\Http\Resources\Post\Category\ListPostCategoryResource;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index(Request $request) {
        $qPCategories = PostCategory::with([
            'post:id,post_category_id,title,content,thumbnail',
            'post.user'
        ]);
        $qPCategories->orderBy('created_at', 'desc');

        if ($request->search) {
            $qPCategories->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $pCategories = $qPCategories->paginate($perPage);

        $resources = ListPostCategoryResource::collection($pCategories);

        return response()->json([
            "total" => $pCategories->total(),
            "current_page" => $pCategories->currentPage(),
            "per_page" => $pCategories->perPage(),
            "total_pages" => $pCategories->lastPage(),
            "data" => $resources,
        ], 200);
    }

    public function detail($id) {
        $pCategory = PostCategory::with([
            'post:id,post_category_id,title,content,thumbnail,created_at',
            'post.user'
            ])->find($id);
        if ($pCategory) {

            return new DetailtPostCategoryResource($pCategory);

        } else {
            return response()->json([
                'message' => 'No post category found'
            ], 404);
        }
    }
}