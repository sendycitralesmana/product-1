<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['category', 'media', 'video', 'variant']);
        
        if ($request->search) {
            $products->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->product_category_id) {
            $products->where('product_category_id', $request->product_category_id);
        }

        if ($request->category) {
            $products->whereHas('category', function($query) use($request) {
                $query->where('name', 'like', '%' . $request->category . '%');
            });
        }

        if ($request->sortBy && in_array($request->sortBy ,['id', 'created_at'])) {
            $sortBy = $request->sortBy;
        }   else {
            $sortBy = 'id';
        }
        
        if ($request->sortOrder && in_array($request->sortOrder ,['asc', 'desc'])) {
            $sortOrder = $request->sortOrder;
        }   else {
            $sortOrder = 'asc';
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 2;
        }

        if ($request->paginate) {
            $list = $products->orderBy($sortBy, $sortOrder)->paginate($perPage);
        } else {
            $list = $products->orderBy($sortBy, $sortOrder)->get();
        }

        $total = $products->count();
        
        return response()->json([
            'total' => $total,
            'data' => $list,
        ], 200);
    }

    public function detail($id) {
        $product = Product::with(['category', 'media', 'video', 'variant'])->find($id);
        if ($product) {
            return response()->json([
                'message' => 'products successfully fetched',
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'message' => 'No product found'
            ], 404);
        }
    }
}
