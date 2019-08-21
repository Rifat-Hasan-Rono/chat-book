<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', 'Auth\AuthController@register');
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');
});

Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'auth'], function () {
    //--------------Handle friend request
    Route::post('find-friends', 'FriendController@findFriends');
    Route::post('get-friends', 'FriendController@getFriends');
    Route::post('add-friend', 'FriendController@addFriend');
    Route::post('confirm-friend', 'FriendController@confirmFriend');
    Route::post('get-request', 'FriendController@getRequest');
    Route::post('sent-request', 'FriendController@sentRequest');
    Route::post('cancel-request', 'FriendController@cancelRequest');
    Route::post('delete-request', 'FriendController@deleteRequest');

    //--------------Handle chat request    
    Route::post('send-message', 'ChatController@store');
});