<!DOCTYPE html>
<html>

<head>
	<title>Reset Password</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/signup.css">-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/signup.css')); ?>">
	<script src="assets/js/validSignup.js"></script>
</head>

<body>
	<div class="wrap">
		<h2>Reset Password</h2>
		<form method="post" name="myForm">
			<input type="text" name="a" placeholder="Username" value="" required>
			<input type="text" name="b" placeholder="Full Name" value="" required>
			<input type="text" name="c" placeholder="Designation" value="" required>
			<input type="email" name="d" placeholder="Email" value="" required>
      <input type="number" name="e" placeholder="Mobile Number" value="" required>
			<input type="text" name="f" placeholder="New Password" value="" required>
			<span id="err"></span>
			<input type="text" name="g" placeholder="Confirm New Password" value="" required>
			<span id="err1"></span>
			<input type="submit" value="SUBMIT">
		</form>
	</div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/resetPassword/index.blade.php ENDPATH**/ ?>