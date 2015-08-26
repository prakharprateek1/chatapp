@extends('app')

@section('content')
	<body>
		<div class="login-box">
			<form method="post" ng-submit="submit()" ng-controller="registerController">
				<h2 style="font-style: italic">My Chat - User Registration</h2><br>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" ng-model="email" id="email" name="email" placeholder="Email" rules="required" required="required">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" ng-model="password" id="password" placeholder="Password" rules="required" required="required">
				</div>
				<input type="submit" class="btn btn-large btn-primary" value="Register Now"> &nbsp;&nbsp;
				<a href="http://localhost/laravel/chatApp/public">Back to Home</a>
				<br><div class="alert alert-success" id="registerSuccess" role="alert" style="display: none;">Successfully Registered</div>
				<br><div class="alert alert-danger" id="alreadyExists" role="alert" style="display: none;">User Already Exists</div>
			</form>
		</div>

		<script src="{{ asset('/js/app.js') }}"></script>
	</body>
</html>
@stop