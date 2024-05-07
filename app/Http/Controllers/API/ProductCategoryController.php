<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index(Request $request) {
        $qPCategories = ProductCategory::query();
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

        return response()->json([
            $pCategories
        ], 200);
    }

    public function detail($id) {
        $pCategory = ProductCategory::with(['product'])->find($id);
        if ($pCategory) {
            return response()->json([
                $pCategory
            ], 200);
        } else {
            return response()->json([
                'message' => 'No product category found'
            ], 404);
        }
    }
}
