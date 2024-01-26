<?php

namespace App\Http\Controllers\API;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function index() {
        $comments = Comment::get();
        return response()->json([
            'comments' => $comments
        ]);
    }
}
