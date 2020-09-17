
<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/signup.css">-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/signup.css') }}">
	<script src="assets/js/validSignup.js"></script>
</head>

<body>
	<div class="wrap">
		<h2>Social Media Sign Up</h2>
		<form method="post" name="myForm">
			<input type="submit" name="facebook" value="Facebook"><br>
			<p><b>Or Log In <a href="{{route('login.index')}}">here</a></b></p>
		</form>
	</div>
</body>

</html>
