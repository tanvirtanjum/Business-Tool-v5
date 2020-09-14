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
		<span style="color: red">
			<?php if(session('error')): ?>
				<?php echo e(session('error')); ?>

			<?php endif; ?>
		</span>
		<span style="color: green">
			<?php if(session('success')): ?>
				<?php echo e(session('success')); ?>

			<?php endif; ?>
		</span>
		<h2>Reset Password</h2>
		<form method="post" name="myForm">
			<input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">
			<input type="email" name="email" placeholder="Enter your Email" value="" required>
			<input type="submit" value="SUBMIT">
		</form>
	</div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/resetPassword/index.blade.php ENDPATH**/ ?>