<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    public function index () {
        $messages = Message::orderBy('id', 'desc')->paginate(12);
        return view('backoffice.contact-us.index', [
            'messages' => $messages
        ]);
    }

    public function detail ($id) {
        $message = Message::find($id);
        return view('backoffice.contact-us.detail', [
            'message' => $message
        ]);
    }

    public function delete ($id) {
        $message = Message::find($id);
        $message->messageEmail()->delete();
        $message->delete();
        
        Session::flash('status', 'success');
        Session::flash('message', 'Hapus pesan berhasil');
        return redirect('/backoffice/feedback');
    }
}
