<?php

namespace App\Http\Controllers\FE;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class PostFEController extends Controller
{
    public function index(Request $request) {
        $postC = Post::with(['category'])->get();
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        if ($request->title) {
            $posts = Post::with(['category'])->where('title', 'LIKE', '%' . $request->title . '%')
                            ->orderBy('id', 'desc')
                            ->paginate(4);
        }
        $postCategories = PostCategory::get();
        $productCategories = ProductCategory::get();

        return view('front.blog.blogPage', [
            'postC' => $postC,
            'posts' => $posts,
            'postCategories' => $postCategories,
            'productCategories' => $productCategories
        ]);
    }

    public function category(Request $request, $id) {
        $postC = Post::with(['category'])->get();
        $posts = Post::orderBy('id', 'desc')
                        ->where('post_category_id', $id)
                        ->paginate(8);
        if ($request->title) {
            $posts = Post::with(['category'])
                            ->where('post_category_id', $id)
                            ->where('title', 'LIKE', '%' . $request->title . '%')
                            ->orderBy('id', 'desc')
                            ->paginate(8);
        }
        $postCategory = PostCategory::find($id);
        $postCategories = PostCategory::get();
        $productCategories = ProductCategory::get();

        return view('front.blog.categoryPage', [
            'postC' => $postC,
            'posts' => $posts,
            'postCategory' => $postCategory,
            'postCategories' => $postCategories,
            'productCategories' => $productCategories
        ]);
    }

    public function detail($id) {
        $post = Post::with(['user', 'category'])->find($id);
        $postC = Post::with(['category'])->get();
        $postRecents = Post::orderBy('id', 'desc')->take(3)->get();
        $postCategories = PostCategory::get();
        $productCategories = ProductCategory::get();
        return view('front.blog.detailPage', [
            'post' => $post,
            'postC' => $postC,
            'postCategories' => $postCategories,
            'postRecents' => $postRecents,
            'productCategories' => $productCategories
        ]);
    }
}
