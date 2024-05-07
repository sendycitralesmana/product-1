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
        // $products = Product::with(['category', 'media', 'video', 'variant']);
        
        // if ($request->search) {
        //     $products->where('name', 'like', '%'. $request->search . '%');
        // }

        // if ($request->product_category_id) {
        //     $products->where('product_category_id', $request->product_category_id);
        // }

        // if ($request->category) {
        //     $products->whereHas('category', function($query) use($request) {
        //         $query->where('name', 'like', '%' . $request->category . '%');
        //     });
        // }

        // if ($request->sortBy && in_array($request->sortBy ,['id', 'created_at'])) {
        //     $sortBy = $request->sortBy;
        // }   else {
        //     $sortBy = 'id';
        // }
        
        // if ($request->sortOrder && in_array($request->sortOrder ,['asc', 'desc'])) {
        //     $sortOrder = $request->sortOrder;
        // }   else {
        //     $sortOrder = 'asc';
        // }

        // if ($request->paginate) {
        //     $list = $products->orderBy($sortBy, $sortOrder)->paginate($request->paginate);
        // } else {
        //     $list = $products->orderBy($sortBy, $sortOrder)->get();
        // }


        $qProducts = Product::query();
        $qProducts->orderBy('created_at', 'desc');

        if ($request->search) {
            $qProducts->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->categoryId) {
            $qProducts->where('product_category_id', $request->categoryId);
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $products = $qProducts->paginate($perPage);

        return response()->json([
            "total" => $products->total(),
            "current_page" => $products->currentPage(),
            "per_page" => $products->perPage(),
            "total_pages" => $products->lastPage(),
            "data" => $products->items(),
        ], 200);
    }

    public function detail($id) {
        $product = Product::with(['category', 'media', 'video', 'variant', 'variant.spec', 'variant.spec.specification', 'application'])->find($id);
        if ($product) {
            return response()->json([$product
            ], 200);
        } else {
            return response()->json([
                'message' => 'No product found'
            ], 404);
        }
    }
}
