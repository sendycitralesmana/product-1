<?php

namespace App\Http\Controllers;

use App\Models\ManagementContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManagementContentController extends Controller
{
    public function index()
    {
        $mContents = ManagementContent::orderBy('id', 'asc')->get();

        return view('backoffice.management-content.index', compact('mContents'));
    }

    public function edit(Request $request, $id)
    {
        $mContent = ManagementContent::find($id);
        $mContent->description = $request->description;
        
        // created_at 

        $mContent->update();

        Session::flash('status', 'success');
        Session::flash('message', 'Management content has been updated');
        return redirect()->back();
    }
}
