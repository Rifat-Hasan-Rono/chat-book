<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class FriendController extends Controller
{

    /**
     * Sent friend request.
     */
    public function addFriend(Request $request)
    {
        $sender = auth()->user();
        if (!$sender->sent_request) {
            $sender->sent_request = json_encode([$request->id]);
        } else {
            $sent_request = array_merge([$request->id], json_decode($sender->sent_request));
            $sender->sent_request = json_encode($sent_request);
        }
        $sender->save();

        $receiver = User::find($request->id);
        if (!$receiver->get_request) {
            $receiver->get_request = json_encode([$sender->id]);
        } else {
            $get_request = array_merge([$sender->id], json_decode($receiver->get_request));
            $receiver->get_request = json_encode($get_request);
        }
        $receiver->save();
        return response()->json(['type' => 'success', 'title' => 'Friend request sent successfully']);
    }

    /**
     * Confirm friend request.
     */
    public function confirmFriend(Request $request)
    {
        $receiver = auth()->user();
        $sender = User::find($request->id);

        if (!$receiver->friend_list) {
            $receiver->friend_list = json_encode([$request->id]);
        } else {
            $receiver_friend_list = array_merge([$request->id], json_decode($receiver->friend_list));
            $receiver->friend_list = json_encode($receiver_friend_list);
        }
        $get_request = array_diff(json_decode($receiver->get_request), [$sender->id]);
        if (!$get_request) {
            $receiver->get_request = Null;
        } else {
            $receiver->get_request = json_encode($get_request);
        }
        $receiver->save();

        if (!$sender->friend_list) {
            $sender->friend_list = json_encode([$receiver->id]);
        } else {
            $sender_friend_list = array_merge([$receiver->id], json_decode($sender->friend_list));
            $sender->friend_list = json_encode($sender_friend_list);
        }
        $sent_request = array_diff(json_decode($sender->sent_request), [$receiver->id]);
        if (!$sent_request) {
            $sender->sent_request = Null;
        } else {
            $sender->sent_request = json_encode($sent_request);
        }
        $sender->save();

        return response()->json(['type' => 'success', 'title' => 'Friend request accepted']);
    }

    /**
     * Get all whom get friend request by user.
     */
    public function sentRequest()
    {
        $user = auth()->user();
        if ($user->sent_request) {
            $users = User::whereIn('id', json_decode($user->sent_request))->orderBy('created_at', 'desc')->get();
        } else {
            $users = '';
        }
        return response()->json($users);
    }

    /**
     * Get all whom sent friend request to user.
     */
    public function getRequest()
    {
        $user = auth()->user();
        if ($user->get_request) {
            $users = User::whereIn('id', json_decode($user->get_request))->orderBy('created_at', 'desc')->get();
        } else {
            $users = '';
        }
        return response()->json($users);
    }

    /**
     * Get all user whom are not connected.
     */
    public function findFriends()
    {
        $user = auth()->user();
        $except_users = [$user->id];
        if ($user->friend_list) {
            $except_users = array_merge($except_users, json_decode($user->friend_list));
        }
        if ($user->sent_request) {
            $except_users = array_merge($except_users, json_decode($user->sent_request));
        }
        if ($user->get_request) {
            $except_users = array_merge($except_users, json_decode($user->get_request));
        }
        $users = User::whereNotIn('id', $except_users)->orderBy('created_at', 'desc')->get();
        return response()->json($users);
    }

    /**
     * Get all friends whom are connected.
     */
    public function getFriends()
    {
        $user = auth()->user();
        if ($user->friend_list) {
            $friends = User::whereIn('id', json_decode($user->friend_list))->orderBy('created_at', 'desc')->get();
        } else {
            $friends = '';
        }
        return response()->json($friends);
    }

    /**
     * Cancel friend request sent to an user.
     */
    public function cancelRequest(Request $request)
    {
        $sender = auth()->user();
        $sent_request = array_diff(json_decode($sender->sent_request), [$request->id]);
        if (!$sent_request) {
            $sender->sent_request = Null;
        } else {
            $sender->sent_request = json_encode($sent_request);
        }
        $sender->save();

        $receiver = User::find($request->id);
        $get_request = array_diff(json_decode($receiver->get_request), [$sender->id]);
        if (!$get_request) {
            $receiver->get_request = Null;
        } else {
            $receiver->get_request = json_encode($get_request);
        }
        $receiver->save();

        return response()->json(['type' => 'success', 'title' => 'Friend request cancelled']);
    }

    /**
     * Delete friend request sent by an user.
     */
    public function deleteRequest(Request $request)
    {
        $receiver = auth()->user();
        $get_request = array_diff(json_decode($receiver->get_request), [$request->id]);
        if (!$get_request) {
            $receiver->get_request = Null;
        } else {
            $receiver->get_request = json_encode($get_request);
        }
        $receiver->save();

        $sender = User::find($request->id);
        $sent_request = array_diff(json_decode($sender->sent_request), [$receiver->id]);
        if (!$sent_request) {
            $sender->sent_request = Null;
        } else {
            $sender->sent_request = json_encode($sent_request);
        }
        $sender->save();

        return response()->json(['type' => 'success', 'title' => 'Friend request deleted']);
    }
}
