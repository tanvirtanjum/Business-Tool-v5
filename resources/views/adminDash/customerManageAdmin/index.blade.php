
<!-- sidebar Included -->


<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Customer</title>
      <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">
  </head>

  <body>
      <div class="box">
        <form method="POST">
          <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="Search" placeholder="Search By ID" value="">
          <input id="btnSearch" type="submit" name="SEARCH" value="Search">

          <p>Customer ID</p>
          <input type="text" name="Id" placeholder="Customer Id" value="" readonly>
          <p>Name</p>
          <input type="text" name="Name" placeholder="Customer Name" value="" readonly>
          <p>Designation</p>
          <input type="text" name="Designation" placeholder="Customer Designation" value="" readonly>
          <p>Mobile No.</p>
          <input type="text" name="MobileNo" placeholder="Customer Mobile No" value="" readonly>
          <p>E-mail</p>
          <input type="email" name="Email" placeholder="Customer Email" value="" readonly>
          <p>Join Date</p>
          <input type="text" name="JoinDate" value="" readonly>
          <!--<p>Added By</p>
          input type="text" name="AddedBy"  value="" disabled><br>-->
          <br>
          <input type="submit" name="REFRESH" value="REFRESH">
          <input type="submit" name="">
      </form>
          <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Customer Id</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Mob.No.</th>
                        <th>Email</th>
                        <th>JoinDate</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
