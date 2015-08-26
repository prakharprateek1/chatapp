<?php namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class UsersController extends Controller {

	//
	public function login(){


		$input = Request::all();

		$email = $input[0];
		$password = $input[1];
		//$email = 'prakharprateek@prakharprateek.in';
		//$password = '123456';
		$user = User::where('email',$email)->where('password', $password)->get();
		
		if($user->count() > 0)
			return $user;
		else
			return 0;

	}

	public function getUserById($id){

		$user = User::find($id);

		return $user;

	}

	public function getUserInfo(){
		$input = Request::all();

		$email = $input[0];
		$password = $input[1];
		//$email = 'prakharprateek@prakharprateek.in';
		//$password = '123456';
		$user = User::where('email',$email)->where('password', $password)->get();
		
		return $user;
	}

	public function getAllUsers(){

		$users = User::all();

		return $users;
	}

	public function registerUser(){

		return view('users.register');
	}

	public function createUser(){
		
		$input = Request::all();

		$data['email'] = $input[0];
		$data['password'] = $input[1];
		

		if(User::create($data)){
			return 1;
		}
		else{
			return 0;
		}


	}

	public function checkUser(){
		$input = Request::all();

		$email = $input[0];
		//$email = 'prakharprateek@prakharprateek.in';
		//$password = '123456';
		$user = User::where('email',$email)->get();
		
		return $user->count();
	}
}
