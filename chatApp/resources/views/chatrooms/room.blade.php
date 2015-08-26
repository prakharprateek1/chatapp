@extends('app')

@section('content')
	<body ng-controller="MessageController as messages">
		<div class="sidebar">
			<a href="http://localhost/laravel/chatApp/public/chatrooms"><div class="sidebarItem">Chatrooms</div></a>
			<a href="#"><div class="sidebarItem" id="logout">Logout</div></a>
		</div>

		<div class="chatBox">
			<div class="chatroomHead">{{ $chatrooms->title }}</div>
			<div class="chatroomTitles">
				
			</div>
		</div>

		<div class="createChatRoomBox">
			<form method="post" class="form-inline" ng-submit="submit()">
				<div class="form-group">
					<label for="content">Send Chat Message</label>
					<input type="text" class="form-control input-lg" ng-model="content" id="content" name="content" placeholder="Enter Chat Message" rules="required" required="required">
				</div>
				<input type="submit" class="btn btn-large btn-success" value="Send"> &nbsp;&nbsp;
			</form>
		</div>
		<script>
		localStorage.setItem("crid","{{ $chatrooms->id}}");
		</script>
		<script src="{{ asset('/js/app.js') }}"></script>
		<script>
			if(localStorage.email == undefined){
				window.location.href = 'http://localhost/laravel/chatApp/public';
			}
		var pusher = new Pusher('86b7e1c9f40657708bf4');
		var channel = pusher.subscribe('my'+localStorage.getItem("crid"));
		channel.bind('my_event', function(data) {
			   $('.chatroomTitles').append('<div class="chatroomItem">' + data.uid + ': ' + data.message+'</div>');
			   $(".chatroomTitles").scrollTop($(".chatroomTitles").height());
			   console.log(data);
			});
		</script>
	</body>
</html>
@stop