<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $postCategories = PostCategory::get();
        $posts = Post::get();

        return view('backoffice.post.index', [
            'postCategories' => $postCategories,
            'posts' => $posts
            ,
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/post', $newName);
        }

        $application = new Post();
        $application->post_category_id = $request->post_category_id;
        $application->user_id = auth()->user()->id;
        $application->title = $request->title;
        $application->content = $request->content;
        $application->thumbnail = $newName;
        $application->save();

        Session::flash('post', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/backoffice/post');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'image'
        ]);

        $newName = "";
        if($request->file('thumbnail')) {
            if ($request->oldImage) {
                Storage::delete('image/post/' . $request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/post/', $newName);
        }

        $post = Post::find($id);
        $post->post_category_id = $request->post_category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $post->thumbnail = $request->oldImage;
            } else {
                $post->thumbnail = $newName;
            }
        } else {
            $post->thumbnail = $newName;
        }
        $post->save();

        Session::flash('post', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/post/'. $post->id .'/detail');
    }

    public function detail($id) {
        $post = Post::with(['user', 'category'])->find($id);
        $postCategories = PostCategory::get();

        return view('backoffice.post.detail', [
            'post' => $post,
            'postCategories' => $postCategories
        ]);
    }
}
