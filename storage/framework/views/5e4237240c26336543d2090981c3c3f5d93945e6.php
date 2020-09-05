
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!--<title>Delivery-man Dashboard</title>-->
		<!--<link rel="stylesheet" type="text/css" href="assets/styles/common.css">-->
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	</head>
	<body>
		<form method='post'>
			<input type="checkbox" id="check">
			<label for="check">
			<i class="fas fa-bars" id="btn"></i>
			<i class="fas fa-times" id="cancel"></i>
			</label>
			<nav class="sidebar">
				<header>Deliveryman Dashb.</header>
				<ul class="pop">
					<li><a><i class="fas fa-user-circle"></i>Profile<span class="sub_arrow"></span></a>
						<ul>
							<li><a href="/aboutUser"><i class="fas fa-address-card"></i>About <?php echo e(session('LID')); ?></a></li>
							<li><a href="/changepassword" target='_blank'><i class="fas fa-key"></i>Change Password</a></li>
							<li><a href="/logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
						</ul>
					</li>
					<li><a href="/DeliverymanDash/pendingDeliveryList"><i class="fas fa-list-alt"></i>Pending Delivery list</a></li>
					<li><a href="/DeliverymanDash/deliveryRecords"><i class="fas fa-history"></i>Records</a></li>
					<li><a href="/notice"><i class="fas fa-flag"></i>Notices</a></li>
					<li><a href="/notes"><i class="far fa-clipboard"></i>Notes</a></li>
					<li><a href="/chatBox"><i class="fas fa-envelope"></i>Chatbox</a></li>
				</ul>
				<div class="social_media">
					<a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
					<a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
				</div>
			</nav>
		</form>
	</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/DeliverymanDash/common.blade.php ENDPATH**/ ?>