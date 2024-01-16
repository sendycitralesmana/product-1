<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\VideoApplication;
use Illuminate\Support\Facades\Session;

class VideoApplicationController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'application_id.*' => 'required',
            'url.*' => 'required',
        ]);

        if (count($request->application_id) > 0) {
            foreach ($request->application_id as $item => $value) {
                $data2 = array(
                    'application_id' => $request->application_id[$item],
                    'url' => $request->url[$item],
                );
                VideoApplication::create($data2);
            }
        }

        Session::flash('video', 'success');
        Session::flash('message', 'Add data success');
        // return redirect('/product-variant');
        return redirect('/backoffice/application/video/'. $request->application_id[0]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'application_id' => 'required',
            'url' => 'required',
        ]);

        $application = VideoApplication::find($id);
        $application->application_id = $request->application_id;
        $application->url = $request->url;
        // dd($application);
        $application->save();

        Session::flash('video', 'success');
        Session::flash('message', 'Update data success');
        
        return redirect('/backoffice/application/video/'. $request->application_id);
    }

    public function videoByApplication($id) {
        $application = Application::find($id);
        $videoApplications = VideoApplication::where('application_id', $id)->get();

        return view('backoffice.application.video.videoByApplication', [
            'application' => $application,
            'videoApplications' => $videoApplications,
        ]);
    }

    public function delete($id)
    {
        $videoApplication = VideoApplication::find($id);
        $videoApplication->delete();

        Session::flash('video', 'success');
        Session::flash('message', 'Delete data success');
        return redirect('/backoffice/application/video/'. $videoApplication->application_id);
    }
}
