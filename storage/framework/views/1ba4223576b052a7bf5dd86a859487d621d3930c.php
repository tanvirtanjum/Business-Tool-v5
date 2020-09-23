<?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Employees</title>
      <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">
      <script src="assets/js/empvalid.js"></script>-->
      <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/manage.css')); ?>">
      <script src="<?php echo e(URL::to('js/printSalesHistory.js')); ?>"></script>
      <script src="<?php echo e(URL::to('js/excelPrint.js')); ?>"></script>
      <script src="<?php echo e(URL::to('js/jquery.js')); ?>"></script>
  </head>

  <body>
      <div class="box">
        <form method="POST">
          <span style='color:red;'><?php echo e(Session::get('dbERR')); ?></span>
          <input style="width: 15%; margin-left: 330px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="<?php echo e(Session::get('a')); ?>">
          <span style='color: red;'> <?php echo html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8'); ?> </span>
          <input id="btnSearch" type="submit" name="SEARCH" value="Search">
          <input type="submit" name="PRINT" id="PRINT" onclick="savePDF()" value="Export PDF">
          <input type="submit" name="excel" onclick="exportToExcel('tblexportData', 'user-data')" value="Export Excel">

          <p>Employee ID</p>
          <input type="text" id="empId" name="empId" placeholder="Enter Employee Id" value="<?php echo e(Session::get('a')); ?>" <?php echo e(Session::get('iFLD')); ?>>
          <p>Name</p>
          <input type="text" id="empName" name="empName" placeholder="Enter Employee Name" value="<?php echo e(Session::get('b')); ?>">
          <p>Designation</p>
          <select id="designation" name="designation">
              <option value="" <?php if(Session::get('c') == 0): ?><?php echo e('selected'); ?><?php endif; ?>>--SELECT--</option>
              <option id="admin" value="1" <?php if(Session::get('c') == 1): ?><?php echo e('selected'); ?><?php endif; ?>>Admin</option>
              <option id="manager" value="2" <?php if(Session::get('c') == 2): ?><?php echo e('selected'); ?><?php endif; ?>>Manager</option>
              <option id="salesman" value="3" <?php if(Session::get('c') == 3): ?><?php echo e('selected'); ?><?php endif; ?>>SalesMan</option>
              <option id="admin" value="4" <?php if(Session::get('c') == 4): ?><?php echo e('selected'); ?><?php endif; ?>>DevileryMan</option>
          </select><br>
          <p>Salary</p>
          <input type="number" id="salary" name="empSalary" placeholder="Enter Employee Salary" value="<?php echo e(Session::get('d')); ?>">
          <p>Mobile No.</p>
          <input type="text" id="mob" name="empMobileNo" placeholder="Enter Employee Mobile No" value="<?php echo e(Session::get('e')); ?>" >
          <p>E-mail</p>
          <input type="email" id="em" name="empEmail" placeholder="Enter Employee Email" value="<?php echo e(Session::get('f')); ?>" >
          <p>Join Date</p>
          <input type="text" name="empJoinDate" value="<?php echo e(Session::get('g')); ?>" readonly>
          <p>Added By</p>
          <input type="text" name="empAddedBy"  value="<?php echo e(Session::get('h')); ?>" readonly><br>
          <input style="margin-left: 400px;" type="submit" name="REFRESH" value="REFRESH">
          <input type="submit" name="INSERT" id="INSERT" value="INSERT" <?php echo e(Session::get('iBTN')); ?>>
          <input type="submit" name="UPDATE" value="UPDATE" <?php echo e(Session::get('udBTN')); ?>>
          <input type="submit" name="DELETE" value="DELETE" <?php echo e(Session::get('udBTN')); ?>>
        </form>
        <div align="right" class="table" id="table">
            <table class="content-table" id="tblexportData">
                <thead>
                    <tr>
                        <th>EmpId</th>
                        <th>Name</th>
                        <th>Active As</th>
                        <th>Salary</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Join Date</th>
                        <th>Added By</th>
                    </tr>
                </thead>

                <tbody id='tab'>
                  <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td align='middle'><?php echo e($content->EmpID); ?></td>
                      <td align='middle'><?php echo e($content->E_NAME); ?></td>
                      <td align='middle'><?php if($content->DID == 1): ?><?php echo e('ADMIN'); ?><?php elseif($content->DID == 2): ?><?php echo e('MANAGER'); ?><?php elseif($content->DID == 3): ?><?php echo e('SALESMAN'); ?><?php elseif($content->DID == 4): ?><?php echo e('DELIVERYMAN'); ?><?php else: ?><?php echo html_entity_decode('&#9940;', ENT_QUOTES, 'UTF-8'); ?><?php endif; ?></td>
                      <td align='middle'><?php echo e($content->SAL); ?></td>
                      <td align='middle'><?php echo e($content->E_MOB); ?></td>
                      <td align='middle'><?php echo e($content->E_MAIL); ?></td>
                      <td align='middle'><?php echo e($content->JOIN_DATE); ?></td>
                      <td align='middle'><?php echo e($content->ADDED_BY); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/adminDash/empManageAdmin/index.blade.php ENDPATH**/ ?>