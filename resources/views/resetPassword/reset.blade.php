<!DOCTYPE html>
<html>

<head>
	<title>Reset Password</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/signup.css">-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/signup.css') }}">
	<script src="assets/js/validSignup.js"></script>
</head>

<body>
	<div class="wrap">
		<h2>Reset Password</h2>
		<form method="post" name="myForm">
			@csrf
			<input type="email" name="email" placeholder="Email" value="{{$details['email']}}" readonly>
			<input type="text" name="newpass" placeholder="New Password" value="">
			<input type="text" name="connewpass" placeholder="Confirm New Password" value="">
			<span id="err1"></span>
			<input type="submit" value="SUBMIT">
		</form>
	</div>
</body>

</html>
