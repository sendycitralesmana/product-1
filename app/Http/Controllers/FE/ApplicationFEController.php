<?php

namespace App\Http\Controllers\FE;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Models\MediaApplication;

class ApplicationFEController extends Controller
{
    public function index(Request $request) {
        $applications = Application::paginate(8);
        if ($request->name) {
            $applications = Application::where('name', 'like', '%' . $request->name . '%')->paginate(8);
        }
        $productCategories = ProductCategory::get();
        return view ('front.application.applicationPage', [
            'applications' => $applications,
            'productCategories' => $productCategories
        ]);
    }

    public function detail($id) {
        $application = Application::find($id);
        $images = MediaApplication::where('type_id', 1)->where('application_id', $application->id)->get();
        $videos = MediaApplication::where('type_id', 2)->where('application_id', $application->id)->get();
        $productCategories = ProductCategory::get();

        return view ('front.application.detail', [
            'application' => $application,
            'productCategories' => $productCategories,
            'images' => $images,
            'videos' => $videos
        ]);
    }
}
