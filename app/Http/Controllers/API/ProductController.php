<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\DetailProductResource;
use App\Http\Resources\Product\ListProductResource;
use App\Http\Resources\Product\ProductResource;

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


        $qProducts = Product::with(['category:id,name,slug,thumbnail,icon,created_at']);
        $qProducts->orderBy('created_at', 'desc');

        if ($request->search) {
            $qProducts->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->categoryId) {
            $qProducts->where('product_category_id', $request->categoryId);
        }

        // if ($request->categorySlug) {
        //     $qProducts->where('category.slug', $request->categorySlug);
        // }
        if ($request->categorySlug) {
            $qProducts->whereHas('category', function($query) use($request) {
                $query->where('slug', $request->categorySlug);
            });
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $products = $qProducts->paginate($perPage);

        $resource = ListProductResource::collection($products);

        return response()->json([
            "total" => $products->total(),
            "current_page" => $products->currentPage(),
            "per_page" => $products->perPage(),
            "total_pages" => $products->lastPage(),
            "data" => $resource,
            // "data" => $products->items(),
        ], 200);
    }

    public function detail($id) {
        $product = Product::with([
            'category:id,name,slug,thumbnail,icon,created_at', 
            'media:id,product_id,type_id,url,created_at', 
            'media.mediaType:id,name,created_at',
            'video', 
            'variant:id,product_id,name,created_at', 
            'variant.spec:id,product_variant_id,specification_id,value,created_at', 
            'variant.spec.specification:id,name,created_at', 
            'application:id,name,area,date,description,thumbnail,created_at',
            ])->find($id);

        if ($product) {

            return new DetailProductResource($product);

            // return response()->json([
            //     $product
            // ], 200);
        } else {
            return response()->json([
                'message' => 'No product found'
            ], 404);
        }
    }

    // findBySlug
    public function findBySlug($slug) {
        $product = Product::with([
            'category:id,name,slug,thumbnail,icon,created_at', 
            'media:id,product_id,type_id,url,created_at', 
            'media.mediaType:id,name,created_at',
            'video', 
            'variant:id,product_id,name,created_at', 
            'variant.spec:id,product_variant_id,specification_id,value,created_at', 
            'variant.spec.specification:id,name,created_at', 
            'application:id,name,area,date,description,thumbnail,created_at',
            ])->where('slug', $slug)->first();

        if ($product) {
            return new DetailProductResource($product);
        } else {
            return response()->json([
                'message' => 'No product found'
            ], 404);
        }
    }

    public function sorot() 
    {
        $productsSorot = Product::with(['category:id,name,slug,thumbnail,icon,created_at'])->
                                    where('sorot', 'sorot')->orderBy('id', 'desc')->get();
        $resource = ListProductResource::collection($productsSorot);
        return response()->json($resource, 200);

    }
}
