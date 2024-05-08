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
        $qPCategories = ProductCategory::with('product:id,product_category_id,name,thumbnail,created_at');
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

        $resources = ListProductCategoryResource::collection($pCategories);

        return response()->json([
            "total" => $pCategories->total(),
            "currentPage" => $pCategories->currentPage(),
            "perPage" => $pCategories->perPage(),
            "totalPages" => $pCategories->lastPage(),
            "data" => $resources,
        ], 200);
    }

    public function detail($id) {
        $pCategory = ProductCategory::with(['product:id,product_category_id,name'])->find($id);
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
}
