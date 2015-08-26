@extends('app')

@section('content')
	<body ng-controller="ChatroomController as chatroom">
		<div class="sidebar">
			<a href="#"><div class="sidebarItem active">Chatrooms</div></a>
			<a href="#"><div class="sidebarItem" id="logout">Logout</div></a>
		</div>

		<div class="chatroomsBox">
			<div class="chatroomHead">ChatRooms List</div>
			<div class="chatroomTitles">
				<div class="chatroomItem" ng-repeat="room in chatroom.lists">
					<a href="http://localhost/laravel/chatApp/public/chatrooms/show/<% room.id%>"><% room.title %></a>
				</div>
			</div>
		</div>

		<div class="createChatRoomBox">
			<form method="post" class="form-inline" ng-submit="submit()">
				<div class="form-group">
					<label for="title">Create New Chatroom</label>
					<input type="text" class="form-control" ng-model="title" id="title" name="title" placeholder="Chatroom Title" rules="required" required="required">
				</div>
				<input type="submit" class="btn btn-large btn-success" value="Create"> &nbsp;&nbsp;
				<br><div class="alert alert-danger" id="passError" role="alert" style="display: none;">ChatRoom already Exists</div>
			</form>
		</div>

		<script src="{{ asset('/js/app.js') }}"></script>
		<script>
			if(localStorage.email == undefined){
				window.location.href = 'http://localhost/laravel/chatApp/public';
			}
			$(".chatroomTitles").css('overflow-y','auto');
			$(".chatroomTitles").css('height','300px');
			$(".chatroomTitles").scrollTop($(".chatroomTitles").height());
		</script>
	</body>
</html>
@stop