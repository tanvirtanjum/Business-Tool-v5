
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/about.css">
</head>
<body>
  <div class="box">
    <form method="POST">
        <h1>Profile Info <i class="fas fa-users"></i></h1>
        <p></p>Username<br>
        <input type="text" name="username" readonly value=""><br>
        <p>Full Name</p><br>
        <input type="text" name="fullname" readonly value=""><br>
        <p>Designation</p><br>
        <input type="text" name="designation" readonly value=""><br>
        <p>Email<i class="far fa-envelope"></i></p><br>
        <input type="email" name="email" readonly value=""><br>
        <p>Mobile No.</p><br>
        <input type="number" name="mobile" readonly value=""><br>
        <p>Join Date</p>
        <input type="text" name="joinDate" readonly value=""><br>
    </form>
    <a href='/aboutUser/editProfile'> <input type="submit" value="Edit Profile"> </a>
  </div>
</body>
</html>
