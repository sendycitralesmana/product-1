<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index() {
        $applications = Application::with(['product', 'client', 'media', 'video'])->get();
        return response()->json(
            $applications, 200
        );
    }

}
