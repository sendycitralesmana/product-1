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
        $postCategories = PostCategory::paginate(10);
        $posts = Post::with(['category'])->orderBy('id', 'desc')->paginate(10);

        if ($request->title) {
            $posts = Post::with(['category'])->where('title', 'LIKE', '%' . $request->title . '%')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        }

        return view('backoffice.post.index', [
            'postCategories' => $postCategories,
            'posts' => $posts,
            'title' => $request->title
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
            'title' => $request->title
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Artikel harus diisi',
        ]);

        $path = null;
        if($request->file('thumbnail')) {
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            // $request->file('thumbnail')->storeAs('image/post/', str_replace(' ', '_', $newName));
            $file = $request->file('thumbnail');
            $path = Storage::disk('s3')->put("", $file);
        }

        $application = new Post();
        $application->post_category_id = $request->post_category_id;
        $application->user_id = auth()->user()->id;
        $application->title = $request->title;
        $application->content = $request->content;
        $application->thumbnail = str_replace(' ', '_', $path);
        $application->save();

        Session::flash('post', 'success');
        Session::flash('message', 'Tambah artikel berhasil');
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
                // Storage::delete('image/post/' . $request->oldImage);
                Storage::disk('s3')->delete($request->oldImage);
            }
            $fileName = $request->file('thumbnail')->getClientOriginalExtension();
            $newName = 'thumbnail-' . now()->timestamp . '.' . $fileName;
            // $request->file('thumbnail')->storeAs('image/post/', str_replace(' ', '_', $newName));
            $file = $request->file('thumbnail');
            $path = Storage::disk('s3')->put("", $file);
        }

        $post = Post::find($id);
        $post->post_category_id = $request->post_category_id;
        $post->title = $request->title;
        $post->content = $request->content;
        if ($request->oldImage != null) {
            if ($request->file('thumbnail') == "") {
                $post->thumbnail = $request->oldImage;
            } else {
                $post->thumbnail = str_replace(' ', '_', $path);
            }
        } else {
            $post->thumbnail = str_replace(' ', '_', $path);
        }
        $post->save();

        Session::flash('post', 'success');
        Session::flash('message', 'Ubah artikel berhasil');
        
        return redirect()->back();
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
        if($post->thumbnail) {
            // Storage::delete('image/post/' . $post->thumbnail);
            Storage::disk('s3')->delete($post->thumbnail);
        }
        $post->delete();

        Session::flash('post', 'success');
        Session::flash('message', 'Hapus artikel berhasil');
        return redirect()->back();
    }
}
