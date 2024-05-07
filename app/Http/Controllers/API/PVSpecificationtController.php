<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PVSpecification;
use Illuminate\Http\Request;

class PVSpecificationtController extends Controller
{
    public function index( Request $request, $product_id, $variant_id )
    {
        $qPVSpec = PVSpecification::with(['productVariant', 'specification'])->where('product_variant_id', $variant_id);
        $qPVSpec->orderBy('created_at', 'desc');

        if ($request->search) {
            $qPVSpec->where('name', 'like', '%'. $request->search . '%');
        }

        if ($request->perPage) {
            $perPage = $request->perPage;
        } else {
            $perPage = 10;
        }

        $PVSpec = $qPVSpec->paginate($perPage);

        return response()->json([
            $PVSpec
        ], 200);
    }
}
