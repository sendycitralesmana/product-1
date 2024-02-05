<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class GoogleTranslateFEController extends Controller
{
    public function googleTranslate(Request $request)
    {
        App::setLocale($request->language);

        Session::put('locale',$request->language);

        return redirect()->back();
    }
}
