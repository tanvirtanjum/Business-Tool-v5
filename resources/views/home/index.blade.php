<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!--<link rel="stylesheet" type="text/css" href="../styles/homepage.css">-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/homepage.css') }}">

  </head>

  <body>
    <form method='post'>
      <div class="main">
          <img src="{{ URL::to('css/images/logo.png') }}" alt="" style= "width:100px; height: 100px">
          <input type="submit" name="Signup" id="signup" value="Signup">
          <input type="submit" name="Login" id="login" value="Login">
      </div>
    </form>
  </body>
</html>
