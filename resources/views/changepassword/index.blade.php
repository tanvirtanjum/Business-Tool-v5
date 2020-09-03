

<!DOCTYPE html>
<html>

<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="assets/styles/changepassword.css">
	<script src="assets/js/changePass.js"></script>
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
			<span id="err1"></span><br>
			<input type="submit" name="save" value="Proceed"><span></span>
		</form>
	</div>
</body>
</html>
