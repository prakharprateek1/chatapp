@extends('app')

@section('content')
	<body>
		<div class="login-box">
			<form method="post" ng-submit="submit()" ng-controller="loginController">
				<h2 style="font-style: italic">My Chat - Login</h2><br>
				<div class="form-group">
					<label for="email">Email address</label>
					<input type="email" class="form-control" ng-model="email" id="email" name="email" placeholder="Email" rules="required" required="required">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" ng-model="password" id="password" placeholder="Password" rules="required" required="required">
				</div>
				<input type="submit" class="btn btn-large btn-primary" value="Login"> &nbsp;&nbsp;
				<a href="register">New User? Register Here</a>
				<div class="alert alert-danger" id="passError" role="alert" style="display: none;">Incorrect Username/Password</div>
			</form>
		</div>

		<script src="{{ asset('/js/app.js') }}"></script>
	</body>
</html>
@stop