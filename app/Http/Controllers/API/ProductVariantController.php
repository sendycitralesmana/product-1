<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index( Request $request, $product_id )
    {
        $qPVariants = ProductVariant::with(['spec'])->where('product_id', $product_id);
        $qPVariants->orderBy('created_at', 'desc');

        if ($request->search) {
            $qPVariants->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $PVariants = $qPVariants->paginate($perPage);

        return response()->json([
            $PVariants
        ], 200);
    }
}
