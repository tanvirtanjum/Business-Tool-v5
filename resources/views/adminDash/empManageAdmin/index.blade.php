<!-- sidebar Included -->


<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Employees</title>
      <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">
      <script src="assets/js/empvalid.js"></script>
  </head>

  <body>
      <div class="box">
        <form method="POST">
          <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
          <input id="btnSearch" type="submit" name="SEARCH" value="Search">

          <p>Employee ID</p>
          <input type="text" id="empId" name="empId" placeholder="Enter Employee Id" value="" >
          <p>Name</p>
          <input type="text" id="empName" name="empName" placeholder="Enter Employee Name" value="" >
          <p>Designation</p>
          <select id="designation" name="designation">
              <option value="0">--SELECT--</option>
              <option id="admin" value="1">Admin</option>
              <option id="manager" value="2">Manager</option>
              <option id="salesman" value="3">SalesMan</option>
              <option id="admin" value="4">DevileryMan</option>
          </select><br>
          <p>Salary</p>
          <input type="number" id="salary" name="empSalary" placeholder="Enter Employee Salary" value="" readonly>
          <p>Mobile No.</p>
          <input type="text" id="mob" name="empMobileNo" placeholder="Enter Employee Mobile No" value="" >
          <p>E-mail</p>
          <input type="email" id="em" name="empEmail" placeholder="Enter Employee Email" value="" >
          <p>Join Date</p>
          <input type="text" name="empJoinDate" value="" readonly>
          <p>Added By</p>
          <input type="text" name="empAddedBy"  value="" readonly><br>
          <input style="margin-left: 400px;" type="submit" name="REFRESH" value="REFRESH">
          <input type="submit" name="INSERT" id="INSERT" value="INSERT" >
          <input type="submit" name="UPDATE" value="UPDATE">
          <input type="submit" name="DELETE" value="DELETE">
        </form>
        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>EmpId</th>
                        <th>Name</th>
                        <th>Desig.</th>
                        <th>Salary</th>
                        <th>Mob.No.</th>
                        <th>Email</th>
                        <th>JoinDate</th>
                        <th>AddedBy</th>
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
