<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContentController extends Controller
{
    public function index() {
        $contents = Content::get();

        return view('backoffice.about.content.index', [
            'contents' => $contents
            ,
        ]);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $application = new Content();
        $application->title = $request->title;
        $application->description = $request->description;
        $application->save();

        Session::flash('content', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/backoffice/about/content');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $content = Content::find($id);
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();

        Session::flash('content', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/about/content');
    }

    public function delete($id) {
        $content = Content::find($id);
        $content->delete();

        Session::flash('content', 'success');
        Session::flash('message', 'Delete data success');
        
        return redirect('/backoffice/about/content');
    }
}
