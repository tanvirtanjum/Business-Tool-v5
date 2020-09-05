  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>User Profile</title>
      <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/about.css">-->
      <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::to('css/about.css') }}">
      <script src="../assets/js/editProfile.js"></script>
  </head>
  <body>
    <div class="box">
      <form method="POST" autocomplete="off" name="myForm" onsubmit="return(validate());">
          <h1>Profile Info <i class="fas fa-users"></i></h1>
          <p></p>Username<br>
          <input type="text" name="username" readonly value=""><br>
          <p>Full Name</p><br>
          <input type="text" name="fullname" value=""><br>
          <p>Designation</p><br>
          <input type="text" name="designation"><br>
          <p>Email<i class="far fa-envelope"></i></p><br>
          <input type="email" name="email" value=""><br>
          <p>Mobile No.</p><br>
          <input type="number" name="mobile" value=""><br>
          <p>Join Date</p>
          <input type="text" name="joinDate" readonly value=""><br>
          <input type="submit" name="save" value="Save Edit">
      </form>
    </div>
  </body>
  </html>
