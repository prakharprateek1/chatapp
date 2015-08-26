<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('register', 'UsersController@registerUser');

Route::post('login','UsersController@login');

Route::post('checkUser','UsersController@checkUser');

Route::post('checkChatroom','ChatroomsController@checkChatroom');

Route::get('home', 'HomeController@index');

Route::get('chatrooms', 'ChatroomsController@showChatRooms');

Route::get('chatrooms/get', 'ChatroomsController@getAllChatRooms');

Route::post('chatrooms/create', 'ChatroomsController@createChatRoom');

Route::get('chatrooms/show/{id}', 'ChatroomsController@getChatroomById');

Route::post('messages/create', 'MessagesController@createMessageNode');

Route::get('message/{id}', 'MessagesController@getMessagesByCid');

Route::post('users/getInfo', 'UsersController@getUserInfo');

Route::post('users/createUser', 'UsersController@createUser');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

