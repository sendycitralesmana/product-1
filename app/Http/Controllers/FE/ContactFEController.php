<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Mail\ContactMessage;
use App\Models\Message;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class ContactFEController extends Controller
{
    public function index () {
        $productCategories = ProductCategory::all();
        
        return view('front.contact.contactPage', [
            'productCategories' => $productCategories
        ]);
    }

    public function send(Request $request) {
        $data = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'message' => 'required'
        ]);

        $message = new Message();
        $message->email = $request->email;
        $message->name = $request->name;
        $message->message = $request->message;
        $message->save();

        // Mail::to('sendycitralesmana@gmail.com')->send(new ContactMessage( $data ));

        return redirect('/contact')->with('success', 'Your message has been sent. Thank you!');
    }
    
    public function indexEn () {
        $productCategories = ProductCategory::all();

        return view('front-en.contact.contactPage', [
            'productCategories' => $productCategories
        ]);
    }
}
