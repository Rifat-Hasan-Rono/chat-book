<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\Message;
use App\User;

class ChatController extends Controller
{
    public function __construct()
    {
        // $this->middleware('jwt.verify');
    }

    /**
     * Sent message to a friend.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $message = new Message();
        $message->message = $request->message;
        $message->sender = auth()->user()->id;
        $message->receiver = 6;
        $message->save();
        event(new ChatEvent($request->message, $user));
    }
}
