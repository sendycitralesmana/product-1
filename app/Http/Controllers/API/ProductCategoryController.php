<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\Category\DetailProductCategoryResource;
use App\Http\Resources\Product\Category\ListProductCategoryResource;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request) {
        $qPCategories = ProductCategory::with('product:id,product_category_id,name,slug,thumbnail,description,created_at');
        $qPCategories->orderBy('created_at', 'desc');

        if ($request->search) {
            $qPCategories->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->per_page) {
            $per_page = $request->per_page;
        } else {
            $per_page = 10;
        }

        $pCategories = $qPCategories->paginate($per_page);

        $resources = ListProductCategoryResource::collection($pCategories);

        return response()->json([
            "total" => $pCategories->total(),
            "current_page" => $pCategories->currentPage(),
            "per_page" => $pCategories->perPage(),
            "total_pages" => $pCategories->lastPage(),
            "data" => $resources,
        ], 200);
    }

    public function detail($id) {
        $pCategory = ProductCategory::with(['product:id,product_category_id,name,slug,thumbnail,description,created_at'])->find($id);
        if ($pCategory) {

            return new DetailProductCategoryResource($pCategory);

            // return response()->json([
            //     $pCategory
            // ], 200);
        } else {
            return response()->json([
                'message' => 'No product category found'
            ], 404);
        }
    }

    public function findBySlug($slug) {
        $pCategory = ProductCategory::with(['product:id,product_category_id,name,slug,thumbnail,description,created_at'])->where('slug', $slug)->first();
        if ($pCategory) {
            return new DetailProductCategoryResource($pCategory);
        } else {
            return response()->json([
                'message' => 'No product category found'
            ], 404);
        }
    }
}
