<?php namespace App\Http\Controllers;

use App\Chatroom;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class ChatroomsController extends Controller {

	//
	public function cors(){
		header('Access-Control-Allow-Origin: *');
		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
			header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
			
			exit(0);
		}
	}

	public function getAllChatRooms(){
		//$this->cors();
		$chatrooms = Chatroom::all();
		
		return $chatrooms;
	}

	public function getChatroomById($id){
		$chatrooms = Chatroom::find($id);
		
		return view('chatrooms.room',compact('chatrooms'));	
	}

	public function createChatRoom(){
		$input = Request::all();

		$data['uid'] = $input[0];
		$data['title'] = $input[1];
		

		if(Chatroom::create($data)){
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkChatroom(){
		$input = Request::all();

		$title = $input[1];
		//$email = 'prakharprateek@prakharprateek.in';
		//$password = '123456';
		$result = Chatroom::where('title',$title)->get();
		
		return $result->count();
	}

	public function showChatRooms(){
		return view('chatrooms.show');
	}
}
