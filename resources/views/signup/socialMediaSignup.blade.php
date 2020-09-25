
<!DOCTYPE html>
<html>

<head>
	<title>Registration</title>
	<!--<link rel="stylesheet" type="text/css" href="assets/styles/signup.css">-->
	<link rel="stylesheet" type="text/css" href="{{ URL::to('css/signup.css') }}">
    <script src="assets/js/validSignup.js"></script>
    <style>
        .myButton {
            box-shadow:inset 0px -3px 7px 0px #29bbff;
            background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
            background-color:#2dabf9;
            border-radius:3px;
            border:1px solid #0b0e07;
            display:inline-block;
            cursor:pointer;
            color:#ffffff;
            font-family:Arial;
            font-size:15px;
            padding:9px 23px;
            text-decoration:none;
            text-shadow:0px 1px 0px #263666;
            margin-left: 30%;
        }
        .myButton:hover {
            background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
            background-color:#0688fa;
        }
        .myButton:active {
            position:relative;
            top:1px;
        }
    </style>
</head>

<body>
	<div class="wrap">
		<h2>Social Media Sign Up</h2>
            <a class="myButton" href="/signup/socialMediaSignup/fbsub">Facebook</a><br><br>
            <a style="margin-left: 34%" class="myButton" href="/signup/socialMediaSignup/fbsub">Twitter</a>
			<p><b>Or Log In <a href="{{route('login.index')}}">here</a></b></p>
	</div>
</body>

</html>
