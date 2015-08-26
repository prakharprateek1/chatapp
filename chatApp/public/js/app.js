(function(){
	


	var app = angular.module('chatApp', [], function($interpolateProvider){
		$interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
	});

	app.controller('loginController', ['$scope', '$http', function($scope, $http){
		$scope.submit = function(){
			var data = [];
			var details = this;
			details.userDetails = [];
			if($scope){
				var URL = 'http://localhost/laravel/chatApp/public/login';
				var email = this.email;
				var password = this.password;
				data.push(email);
				data.push(password);
				$http.post(URL, data).
				  then(function(response) {
				   	if(response.data != 0){
				   		$("#passError").css("display", "none");
				   		console.log(response.data[0].email);
				   		localStorage.setItem("email", response.data[0].email);
				   		localStorage.setItem("login", "true");
				   		details.email = '';
				   		details.password = '';
				   		window.location.href = 'http://localhost/laravel/chatApp/public/chatrooms';
				   	}
				   	else{
				   		console.log("Incorrect Username/Password");
				   		$("#passError").css("display", "block");
				   	}

				  }, function(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    
				  });
			}
			
		};
	}]);

	app.controller('registerController', ['$scope', '$http', function($scope, $http){
		$scope.submit = function(){
			var data = [];
			var details = this;
			details.userDetails = [];
			if($scope){
				var URL = 'http://localhost/laravel/chatApp/public/checkUser';
				var URL2 = 'http://localhost/laravel/chatApp/public/users/createUser';
				var email = this.email;
				var password = this.password;
				data.push(email);
				data.push(password);
				$http.post(URL, data).
				  then(function(response) {
				  	if(response.data == 0){
				   		$("#registerSuccess").css("display", "none");
				   		//console.log(response.data[0].email);
				   		//localStorage.setItem("email", response.data[0].email);
				   		//localStorage.setItem("login", "true");
				   		//window.location.href = 'http://localhost/laravel/chatApp/public/chatrooms';
				   		$http.post(URL2, data).success(function(response){
				   			localStorage.setItem("email", details.email);
					   		localStorage.setItem("login", "true");
					   		details.email = '';
					   		details.password = '';
					   		$("#registerSuccess").css("display", "block");
					   		$("#alreadyExists").css("display", "none");
					   		$(location).attr('href', 'http://localhost/laravel/chatApp/public/chatrooms').delay(3000);
				   		});
				   	}
				   	else{
				   		$("#registerSuccess").css("display", "none");
				   		$("#alreadyExists").css("display", "block");
				   	}

				  }, function(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    
				  });
			}
			
		};
	}]);


	app.controller('ChatroomController', ['$scope','$http', function($scope, $http){

		var chatroom = this;

		chatroom.lists = [];

		var URL = 'http://localhost/laravel/chatApp/public/chatrooms/get';

		$http.get(URL).success(function(response){
			chatroom.lists = response;
		});
		var height = $(".chatroomTitles").height();
		if(height>300){
			$(".chatroomTitles").css('overflow-y','auto');
			$(".chatroomTitles").css('height','300px');
			$(".chatroomTitles").scrollTop($(".chatroomTitles").height());
		}

		$scope.submit = function(){
			var data = [];
			var details = this;
			details.userDetails = [];
			if($scope){

				var URL3 = 'http://localhost/laravel/chatApp/public/checkChatroom'
				var uid =localStorage.getItem("email");
				var title = this.title;
				data.push(uid);
				data.push(title);


				var URL2 = 'http://localhost/laravel/chatApp/public/chatrooms/create';
				$http.post(URL3, data).
				  then(function(response) {
				  	//console.log(response);
				   	if(response.data <= 0){
				   		$http.post(URL2, data).
						  then(function(response) {
						  	console.log(response);
						   	if(response.data != 0){
						   		$http.get(URL).success(function(response){
									chatroom.lists = response;
								});
								details.title = '';
								var height = $(".chatroomTitles").height();
								if(height>300){
									$(".chatroomTitles").css('overflow-y','auto');
									$(".chatroomTitles").css('height','300px');
									$(".chatroomTitles").scrollTop($(".chatroomTitles").height());
								}
								$("#passError").css("display", "none");
						   	}
						   	else{
						   		console.log("Cannot Create");
						   		$("#passError").css("display", "block");
						   	}

						  }, function(response) {
						    // called asynchronously if an error occurs
						    // or server returns response with an error status.
						    
						  });
				   	}
				   	else{
				   		console.log("Cannot Create");
				   		$("#passError").css("display", "block");
				   	}

				  }, function(response) {
				    // called asynchronously if an error occurs
				    // or server returns response with an error status.
				    
				  });
				
			}
		};

	}]);

	app.controller('MessageController',['$scope','$http', function($scope, $http){

		var ref = this;

		ref.messages = [];

		var URL = 'http://localhost/laravel/chatApp/public/message/'+localStorage.getItem("crid");

		$http.get(URL).success(function(response){
			ref.messages = response;
		});

		ref.messages = [];

		var data = [];

		

		$scope.submit = function(){
			var uid =localStorage.getItem("email");
			var crid = localStorage.getItem("crid");
			var content = this.content;
			data.push(uid);
			data.push(crid);
			data.push(content);
			var URL = 'http://localhost/laravel/chatApp/public/messages/create';
			$http.post(URL, data).success(function(response){
							console.log($(".chatroomTitles").height());
							var height = $(".chatroomTitles").height();
							if(height>300){
								$(".chatroomTitles").css('overflow-y','auto');
								$(".chatroomTitles").css('height','300px');
								$(".chatroomTitles").scrollTop($(".chatroomTitles").height());
							}
						});
			this.content='';
			data = [];
		};

	}]);
	
	$("#logout").click(function(){
		localStorage.removeItem("email");
		localStorage.removeItem("login");
		window.location.href = 'http://localhost/laravel/chatApp/public';
	});

	function addScroll(){
		$(".chatroomsBox").css('overflow-y','auto');
		$(".chatroomsBox").css('height','300px');
	}

	var height = $(".chatroomsBox").height();
	if(height>300){
		addScroll();
	}
})();