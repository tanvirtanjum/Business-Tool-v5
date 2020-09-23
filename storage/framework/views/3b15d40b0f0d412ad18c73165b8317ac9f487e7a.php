
<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/signup.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/signup.css')); ?>">
	<script src="assets/js/validSignup.js"></script>
</head>

<body>
	<div class="wrap">
		<h2>Sign Up</h2>
		<form method="post" name="myForm">
			<input type="text" name="username" placeholder="Username" value="">
			<input type="Password" name="password" placeholder="Password"><br>
			<span id="err"></span>
			<input type="Password" name="confirmpassword" placeholder="Confirm Password"><br>
			<span id="err1"></span><br>
			<input type="text" name="fullname" placeholder="Full Name" value="">
			<input type="text" name="design" placeholder="Designation" value="">
			<input type="email" name="email" placeholder="Email" value="">
			<input type="number" name="mobilenumber" placeholder="Mobile Number" value="">
			<input type="submit" name="REGISTER" value="REGISTER"><br>
			<p><b>Or Log In <a href="<?php echo e(route('login.index')); ?>">here</a></b></p>
		</form>
	</div>
</body>

</html>
<?php /**PATH D:\AIUB Docs and Pogrammable soft\9th  semester\ATP 3\project final\trunk\resources\views/signup/index.blade.php ENDPATH**/ ?>