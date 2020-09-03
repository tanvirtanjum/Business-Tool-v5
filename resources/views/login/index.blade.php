
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/styles/login.css">
	<script src="assets/js/validLogin.js"></script>
</head>

<body>
	<div class="loginbox">
		<img src="assets/images/user.png" class="avatar">
		<h1>Login Here</h1>
		<form method="post" name="login" onsubmit="return(validate());">
			<p>Username</p>
			<input type="text" name="username" id="username" placeholder="Enter Username"><br><span></span>
			<p>Password</p>
			<input type="password" name="password" id="password" placeholder="Enter Password"><br><span id="err"></span>
			<span style="color:red"> </span>
			<input type="submit" name="submit" value="Login">
			<a href="/resetPassword">Forget password?</a><br>
			<a href="/signup">Don't have an account?</a>
		</form>
	</div>
</body>

</html>
