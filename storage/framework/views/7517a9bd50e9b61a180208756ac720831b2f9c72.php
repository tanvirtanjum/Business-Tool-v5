<?php if(Session::get('SID') == 1): ?>
      <?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 2): ?>
      <?php echo $__env->make('managerDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 3): ?>
      <?php echo $__env->make('salesmanDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 4): ?>
      <?php echo $__env->make('DeliverymanDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 5): ?>
      <?php echo $__env->make('customerDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php endif; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Change Password</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/changepassword.css">
	<script src="assets/js/changePass.js"></script>-->
	<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/changepassword.css')); ?>">
</head>

<body>
	<div class="loginbox">
		<h1>Password Change</h1>
		<form method="POST" name="myForm">
			<p>Old Password</p>
			<input type="password" name="oldpassword" placeholder="Enter Old Password" value=""><br>
			<p>New Password</p>
			<input type="password" name="newpassword" placeholder="Enter New password" value=""><br>
			<span id="err"></span>
			<p>Confirm New Password</p>
			<input type="password" name="confirmnewpassword" placeholder="Confirm New password" value=""><br>
			<div align='middle'> <span id="err1"><?php echo e(Session::get('err')); ?></span> </div> <br>
			<input type="submit" name="PROCEED" value="Proceed"><span></span>
		</form>
	</div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/changepassword/index.blade.php ENDPATH**/ ?>