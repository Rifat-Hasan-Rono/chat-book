<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Social;
use App\Conversation;
use App\Message;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validator = \Validator::make(request(['email', 'password']), [
            'email' => 'required|string|email|max:50',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        User::where('email', request(['email']))->update(['last_seen' => date('Y-m-d H:i:s')]);
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 600
        ]);
    }

    /**
     * Register new user & login.
     */
    public function register(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required|string|max:25',
            'last_name' => 'required|string|max:25',
            'email' => 'required|string|email|max:50|unique:users',
            'mobile' => 'required|string|min:11|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();
        Social::create(['user_id' => $user->id]);
        $conversation_id = Conversation::create(['last_message' => 'Welcome to ChatBook Application', 'sender_id' => 1, 'receiver_id' => $user->id])->id;
        Message::create(['message' => 'Welcome to ChatBook Application', 'conversation_id' => $conversation_id, 'user_id' => 1]);
        $token = $this->login($request->email, $request->password);
        return response()->json($token->original);
    }

    /**
     * Update existing user profile.
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        if ($request->picture) {
            if (!is_dir(USER_MEDIA . $user->id)) {
                mkdir(USER_MEDIA . $user->id, 0777, true);
            }
            $target_dir = USER_MEDIA . $user->id . "/";

            if (!empty($user->picture)) {
                unlink($target_dir . $user->picture);
            }

            $unique_name = time() . uniqid() . '.jpg';
            $target_file = $target_dir . basename($unique_name);
            $data = str_replace('data:image/jpeg;base64,', '', $request->picture);
            $data = base64_decode($data);
            file_put_contents($target_file, $data);
            User::where('id', $user->id)->update(['picture' => $unique_name]);
            return response()->json(['image' => $unique_name, 'type' => 'success', 'title' => 'Profile picture updated successfully']);
        } else {
            $validator = \Validator::make($request->data, [
                'first_name' => 'required|string|max:25',
                'last_name' => 'required|string|max:25',
                'email' => 'required|string|email|max:50|unique:users,email,' . $user->id,
                'mobile' => 'required|string|min:11|unique:users,mobile,' . $user->id,
                'password' => 'string|min:8',
                'city' => 'string|max:50',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }

            $type = 0;
            if ($request->data['type'] == true) {
                $type = 1;
            }

            User::where('id', $user->id)->update([
                'first_name' => $request->data['first_name'],
                'last_name' => $request->data['last_name'],
                'email' => $request->data['email'],
                'mobile' => $request->data['mobile'],
                'city' => $request->data['city'],
                'type' => $type
            ]);
            Social::where('user_id', $user->id)->update([
                'website' => $request->data['social']['website'],
                'facebook' => $request->data['social']['facebook'],
                'twitter' => $request->data['social']['twitter'],
                'instagram' => $request->data['social']['instagram'],
                'linkedin' => $request->data['social']['linkedin'],
                'dribbble' => $request->data['social']['dribbble'],
                'youtube' => $request->data['social']['youtube'],
                'google' => $request->data['social']['google'],
                'whatsapp' => $request->data['social']['whatsapp'],
                'about' => $request->data['social']['about']
            ]);
            return response()->json(['type' => 'success', 'title' => 'Profile updated successfully']);
        }
    }

    /**
     * Store user media file.
     */
    public function storeMedia(Request $request)
    {
        $user = auth()->user();
        if (!is_dir(USER_MEDIA . $user->id)) {
            mkdir(USER_MEDIA . $user->id, 0777, true);
        }
        $target_dir = USER_MEDIA . $user->id . "/";
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move($target_dir, $imageName);

        $social = Social::where('user_id', $user->id)->first();
        if (!$social->media) {
            $media_array = json_encode([$imageName]);
        } else {
            $social_media = array_merge([$imageName], json_decode($social->media));
            $media_array = json_encode($social_media);
        }
        $social->media = $media_array;
        $social->save();
        return response()->json(['media' => $media_array]);
    }

    /**
     * Remove the specified file from media.
     */
    public function removeMedia(Request $request)
    {
        $user = auth()->user();
        $social = Social::where('user_id', $user->id)->first();
        $social_media = array_diff(json_decode($social->media), [$request->file]);
        $social_media_values = array_values($social_media);
        $social->media = Null;
        if ($social_media_values) {
            $social->media = json_encode($social_media_values);
        }
        $social->save();
        $path = USER_MEDIA . $user->id . "/" . $request->file;
        if (file_exists($path)) {
            unlink($path);
        }
        return response()->json(['type' => 'success', 'title' => 'Removed successfully']);
    }
}
