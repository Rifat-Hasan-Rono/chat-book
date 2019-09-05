<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Events\SeenEvent;
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
        // $conversation_list = DB::select("SELECT U.id as id,U.picture,C.id as conv_id,C.last_message,U.first_name,U.last_name FROM users U,conversations C WHERE (CASE WHEN C.sender_id = " . $id . " THEN C.receiver_id = U.id WHEN C.receiver_id = " . $id . " THEN C.sender_id= U.id END) AND (C.sender_id =" . $id . " OR C.receiver_id =" . $id . ") ORDER BY C.updated_at DESC");
        $conversation_list = DB::select("SELECT U.id as id,U.picture,C.id as conv_id,U.first_name,U.last_name,messages.message,c_max.unseen FROM users U,conversations C JOIN ( SELECT MAX(messages.id) max_id, COUNT(case when messages.seen = 0 AND messages.user_id  != " . $id . " then messages.seen end) unseen,messages.conversation_id FROM messages GROUP BY messages.conversation_id ) c_max ON (c_max.conversation_id = C.id) JOIN messages ON (messages.id = c_max.max_id) WHERE (CASE WHEN C.sender_id = " . $id . " THEN C.receiver_id = U.id WHEN C.receiver_id = " . $id . " THEN C.sender_id= U.id END) AND (C.sender_id =" . $id . " OR C.receiver_id =" . $id . ") ORDER BY C.updated_at DESC");
        return response()->json($conversation_list);
    }

    /**
     * Get messages of a friend.
     */
    public function getMessage(Request $request)
    {
        $conversations = [];
        if ($request->conv_id != 0) {
            $updated = '';
            if ($request->unseen != 0) {
                $updated = Message::where(['conversation_id' => $request->conv_id, 'seen' => 0])->update(['seen' => 1]);
            }
            $conversations = Message::where('conversation_id', $request->conv_id)->orderBy('created_at', 'asc')->get();
            if ($updated) {
                $last = sizeof($conversations);
                for ($i = 0; $i < $updated; $i++) {
                    $id = ($last + $i) - $updated;
                    event(new SeenEvent($conversations[$id], $request->id));
                }
            }
        }
        return response()->json($conversations);
    }

    /**
     * Sent message to a friend.
     */
    public function sendMessage(Request $request)
    {
        $id = auth()->user()->id;
        if ($request->conv_id == 0) {
            $conversation_id = Conversation::create(['sender_id' => $id, 'receiver_id' => $request->receiver_id])->id;
        } else {
            // Conversation::where('id', $request->conv_id)->update(['last_message' => $request->message]);
            $conversation_id = $request->conv_id;
        }
        $message = new Message();
        $message->message = $request->message;
        $message->conversation_id = $conversation_id;
        $message->user_id = $id;
        $message->seen = 0;
        $message->save();
        event(new ChatEvent($message, $request->receiver_id));
        return response()->json($message);
    }


    /**
     * Seen message by friend.
     */
    public function seenMessage(Request $request)
    {
        // $id = auth()->user()->id;
        $message = Message::find($request->id);
        $message->seen = 1;
        $message->save();
        event(new SeenEvent($message, $request->receiver_id));
    }
}
