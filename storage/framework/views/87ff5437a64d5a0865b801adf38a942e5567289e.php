
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/login.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/login.css')); ?>">
	<script src="assets/js/validLogin.js"></script>
</head>

<body>
	<div class="loginbox">
		<img src="<?php echo e(URL::to('css/images/user.png')); ?>" class="avatar">
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
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/login/index.blade.php ENDPATH**/ ?>