<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use Illuminate\Http\Request;
use App\Conversation;
use App\Message;
use App\User;
use DB;

class ChatController extends Controller
{
    public function __construct()
    {
        // $this->middleware('jwt.verify');
    }

    /**
     * Get conversation list of all friend.
     */
    public function conversationList(Request $request)
    {
        $id = auth()->user()->id;
        // $messages = Message::where('receiver_id', $id)->distinct()->orderBy('created_at', 'desc')->get(['sender_id']);
        // $friends_id = [];
        // foreach ($messages as $message) {
        //     array_push($friends_id, $message['sender_id']);
        // }
        // $friends = User::whereIn('id', $friends_id)->get();
        $conversation_list = DB::select("SELECT U.id as id,U.picture,C.id as conv_id,C.last_message,U.first_name,U.last_name FROM users U,conversations C WHERE (CASE WHEN C.sender_id = " . $id . " THEN C.receiver_id = U.id WHEN C.receiver_id = " . $id . " THEN C.sender_id= U.id END) AND (C.sender_id =" . $id . " OR C.receiver_id =" . $id . ") ORDER BY C.updated_at DESC");
        // $chat_friend_list = Conversion::with('user')->get();
        return response()->json($conversation_list);
    }

    /**
     * Get messages of a friend.
     */
    public function getMessage(Request $request)
    {
        $friend = User::find($request->id);
        $conversations = [];
        if ($request->conv_id != 0) {
            $conversations = Message::select('user_id', 'conversation_id', 'message', 'created_at')->where('conversation_id', $request->conv_id)->orderBy('created_at', 'asc')->get();
        }
        return response()->json(['friend' => $friend, 'conversations' => $conversations]);
    }

    /**
     * Sent message to a friend.
     */
    public function sendMessage(Request $request)
    {
        $id = auth()->user()->id;
        if ($request->conv_id == 0) {
            $conversation_id = Conversation::create(['last_message' => $request->message, 'sender_id' => $id, 'receiver_id' => $request->receiver_id])->id;
        } else {
            $conversation_id = Conversation::update(['id' => $request->conv_id], ['last_message' => $request->message])->id;
        }
        $message = new Message();
        $message->message = $request->message;
        $message->conversation_id = $conversation_id;
        $message->user_id = $id;
        $message->save();
        event(new ChatEvent($message, $request->receiver_id));
    }
}
