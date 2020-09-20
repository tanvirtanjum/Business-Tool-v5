
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
			<?php echo csrf_field(); ?>
			<input type="text" name="username" placeholder="Username" value="">
			<?php $__currentLoopData = $errors->get('username'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="Password" name="password" placeholder="Password"><br>
			<?php $__currentLoopData = $errors->get('password'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="Password" name="confirmpassword" placeholder="Confirm Password"><br>
			<?php $__currentLoopData = $errors->get('confirmpassword'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="text" name="fullname" placeholder="Full Name" value="">
			<?php $__currentLoopData = $errors->get('fullname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="text" name="design" placeholder="Designation" value="">
			<?php $__currentLoopData = $errors->get('design'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="email" name="email" placeholder="Email" value="">
			<?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="number" name="mobile" placeholder="Mobile Number" value="">
			<?php $__currentLoopData = $errors->get('mobilenumber'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        	<span style="color: red"><?php echo e($err); ?></span> <br>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<input type="submit" name="REGISTER" value="REGISTER"><br><br>


			<p><b>Or Signup with Social Media <a href="<?php echo e(route('signup.socialMediaSignup')); ?>">here</a></b></p>
			<p><b>Or Log In <a href="<?php echo e(route('login.index')); ?>">here</a></b></p>
		</form>
	</div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/signup/index.blade.php ENDPATH**/ ?>