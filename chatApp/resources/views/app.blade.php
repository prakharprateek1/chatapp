<!DOCTYPE html>
<html ng-app="chatApp">
	<head>
		<title>Chat Application</title>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript" ></script> 
		<script src="//js.pusher.com/2.2/pusher.min.js" type="text/javascript" type="text/javascript" ></script>    
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript" ></script>   
		<script src="//cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js" type="text/javascript" ></script>
		
		
		<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
		<style>
			body { 
			  background: url("{{ asset('/imgs/back.jpg') }}") no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			  color:white;
			}
			.login-box{
				width: 50%;
			    position: absolute;
			    margin-top: 6%;
			    margin-left: 25%;
			    background-color: rgba(0,0,0,0.75);
			    padding: 1%;
			    border-radius: 25px;
			}
			.form-group label{
				color:white;
			}
			.sidebar{
				background-color: rgba(0,0,0,0.85);
			    width: 20%;
			    height: 100%;
			    position: fixed;
			}
			.sidebarItem{
				height: 50px;
			    background-color: rgba(255,255,255,0.25);
			    border-top: 1px solid white;
			    border-bottom: 1px solid white;
			    margin-top: 10px;
			    padding: 5%;
			    padding-left: 50px;
			    font-family: serif;
			    font-size: larger;
			    color:white;
			}
			.active{
				background-color: rgba(0,220,150,0.25);
			}
			.chatroomsBox{
				position: absolute;
			    width: 65%;
			    background-color: rgba(0,0,45,0.85);
			    left: 25%;
			    top: 10%;
			    padding: 1%;
			    border-radius: 10px;
			}
			.chatroomHead{
				font-size: x-large;
			    font-style: italic;
			    background-color: rgba(0,0,0,0.35);
			    padding-left: 15px;
    			border-radius: inherit;
			}
			.chatroomTitles{
				padding-left: 5px;
			    padding-top: 10px;
			    border: 1px solid;
			    border-radius: 5px
			}
			.chatroomItem{
				    padding: 10px;
				    border-bottom: 1px solid;
			}
			a {
			    color: white;
			    text-decoration: none;
			}
			a:hover{
				color: white;
			    text-decoration: none;
			}
			.createChatRoomBox{
				position: fixed;
			    width: 100%;
			    padding: 20px;
			    background-color: rgba(0,0,0,0.75);
			    bottom: 0px;
			    left: 20%;
			    color: white;
			}
			.chatBox{
				position: absolute;
			    width: 80%;
			    height: 80%;
			    background-color: rgba(0,0,45,0.85);
			    left: 20%;
			    top: 0%;
			    padding: 1%;
			    border-radius: 10px;
			}
		</style>
	</head>
	@yield('content')