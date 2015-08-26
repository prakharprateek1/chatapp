<?php namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use App\Pusher;

class MessagesController extends Controller {

	//
	public function createMessageNode(){
		$input = Request::all();

		//return $input;
		$app_id = '137227'; // App ID
		$app_key = '86b7e1c9f40657708bf4'; // App Key
		$app_secret = '48a7047a11529259b2cc'; // App Secret
		$pusher = new Pusher($app_key, $app_secret, $app_id);

		$data['message'] = $input[2];
		$data['uid'] = $input[0];
		$data['crid'] = $input[1];

		$formdata['uid'] = $data['uid'];
		$formdata['crid'] = $data['crid'];
		$formdata['content'] = $data['message'];

		$channel = "my".$data['crid'];

		if($pusher->trigger($channel, 'my_event', $data)) {               
	        echo 'success'; 
	        Message::create($formdata);
	    } else {        
	        echo 'error';   
	    }
		//return $input;
	}

	public function getMessagesdByCid($id){

		$messages = Message::find($id);

		return $messages;
	}

	public function getMessagesByCid($id){

		$messages = Message::where('crid',$id)->get();

		return $messages;
	}
}
