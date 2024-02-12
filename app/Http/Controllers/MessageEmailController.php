<?php

namespace App\Http\Controllers;

use App\Mail\FeedBackMessage;
use App\Models\Message;
use App\Models\MessageEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageEmailController extends Controller
{
    public function send(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $message = Message::find($id);

        $messageEmail = new MessageEmail();
        $messageEmail->user_id = auth()->user()->id;
        $messageEmail->message_id = $message->id;
        $messageEmail->message = $request->message;
        // dd($messageEmail);
        $messageEmail->save();

        Mail::to($message->email)->send(new FeedBackMessage($messageEmail));

        return redirect()->back();
    }
}
