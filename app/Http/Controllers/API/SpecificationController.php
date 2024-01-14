<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    public function index(Request $request) {
        $specifications = Specification::with([]);
        
        if ($request->search) {
            $specifications->where('name', 'like', '%'. $request->search . '%');
        }

        $list = $specifications->get();


        // if ($request->perPage) {
        //     $perPage = $request->perPage;
        // } else {
        //     $perPage = 2;
        // }

        // if ($request->paginate) {
        //     $specifications = Specification::paginate($perPage);
        // } else {
        //     $specifications = Specification::get();
        // }

        return response()->json(
            $list, 200
        );
    }
    
    public function detail($id) {
        $specification = Specification::find($id);
        return response()->json(
            $specification, 200
        );
    }
}
