<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\DetailtUserResource;
use App\Http\Resources\User\ListUserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $qUser = User::with([
            'role:id,name,created_at',
        ]);

        if ($request->search) {
            $qUser->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->per_page) {
            $per_page = $request->per_page;
        } else {
            $per_page = 10;
        }

        $User = $qUser->paginate($per_page);

        $resource = ListUserResource::collection($User);

        return response()->json([
            // $User
            "total" => $User->total(),
            "current_page" => $User->currentPage(),
            "per_page" => $User->perPage(),
            "total_pages" => $User->lastPage(),
            "data" => $resource,
        ], 200);
    }

    public function detail($id) {
        $user = User::with([
            'role:id,name,created_at',
            'post:id,post_category_id,user_id,title,content,thumbnail,created_at',
            'post.category:id,name,created_at',
        ])->find($id);
        if ($user) {

            $resource = new DetailtUserResource($user);

            return response()->json([
                 $resource
            ], 200);
        } else {
            return response()->json([
                'message' => 'No user found'
            ], 404);
        }
    }
}