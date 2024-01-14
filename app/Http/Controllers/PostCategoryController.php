<?php

namespace App\Http\Controllers;

use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostCategoryController extends Controller
{
    public function index()
    {
        $postsCategories = PostCategory::all();
        return view('post.category.index', [
            'postsCategories' => $postsCategories
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name.*' => 'required'
        ]);

        if (count($request->name) > 0) {
            foreach ($request->name as $item => $value) {
                $data2 = array(
                    'name' => $request->name[$item]
                );
                PostCategory::create($data2);
            }
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Add data success');
        return redirect('/post/category');
    }

    public function update(Request $request, $id)
    {   
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $postCategory = PostCategory::find($id);
        $postCategory->name = $request->name;
        $postCategory->save();

        Session::flash('status', 'success');
        Session::flash('message', 'Update data success');
        return redirect('/post/category/' . $postCategory->id . '/detail');
    }

    public function delete($id)
    {
        
        $postCategory = PostCategory::find($id);
        $postCategory->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/post/category');
    }

    public function detail($id) {
        $postCategory = PostCategory::with(['post'])->find($id);
        return view('post.category.detail', [
            'postCategory' => $postCategory
        ]);
    }

    public function postByCategory($id) 
    {
        $posts = PostCategory::find($id);

        return view('post.category.post.postByCategory', [
            'posts' => $posts,
        ]);
    }
}
