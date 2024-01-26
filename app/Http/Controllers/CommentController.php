<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function comment(Request $request, $id) {

        $validate= $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'comment' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('comment', 'success');
        Session::flash('message', 'Add comment success');
        return redirect()->back();
    }

    public function index() {
        $comments = Comment::get();
        return view('admin.comment.index', [
            'comments' => $comments
        ]);
    }

    public function deleteComment($id) {

        $comment = Comment::find($id);
        $comment->delete();

        Session::flash('post', 'success');
        Session::flash('message', 'Delete comment success');
        return redirect()->back();
    }
}
