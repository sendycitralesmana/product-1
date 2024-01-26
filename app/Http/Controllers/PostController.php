<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request) {
        $postCategories = PostCategory::get();
        $posts = Post::with(['category'])->orderBy('id', 'desc')->paginate(10);

        if ($request->title) {
            $posts = Post::with(['category'])->where('title', 'LIKE', '%' . $request->title . '%')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        }

        return view('backoffice.post.index', [
            'postCategories' => $postCategories,
            'posts' => $posts,
        ]);
    }

    public function postCategory(Request $request, $id) {
        $postCategories = PostCategory::get();
        $category = PostCategory::find($id);
        $posts = Post::with(['category'])->orderBy('id', 'desc')
                        ->where('post_category_id', $id)
                        ->paginate(10);

        if ($request->title) {
            $posts = Post::with(['category'])->where('title', 'LIKE', '%' . $request->title . '%')
                            ->where('post_category_id', $id)
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        }

        return view('backoffice.post.postCategory', [
            'postCategories' => $postCategories,
            'posts' => $posts,
            'category' => $category,
            'id' => $id
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $newName = null;
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalName();
            $newName = now()->timestamp . '-' . $fileName;
            $request->file('thumbnail')->storeAs('image/post/', $newName);
        }

        $application = new Post();
        $application->post_category_id = $request->post_category_id;
        $application->user_id = auth()->user()->id;
        $application->title = $request->title;
        $application->content = $request->content;
        $application->thumbnail = str_replace(' ', '_', $newName);
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
            // 'thumbnail' => 'image'
        ]);

        $newName = null;
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
                $post->thumbnail = str_replace(' ', '_', $newName);
            }
        } else {
            $post->thumbnail = str_replace(' ', '_', $newName);
        }
        $post->save();

        Session::flash('post', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/post');
    }

    public function detail($id) {
        $post = Post::with(['user', 'category'])->find($id);
        $postCategories = PostCategory::get();
        return view('backoffice.post.detail', [
            'post' => $post,
            'postCategories' => $postCategories,
        ]);
    }

    public function delete($id) {
        $post = Post::find($id);
        $post->delete();

        Session::flash('post', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/post');
    }
}
