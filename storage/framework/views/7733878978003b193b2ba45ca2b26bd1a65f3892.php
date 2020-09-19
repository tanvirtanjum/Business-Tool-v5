<?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pending Registrations</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" href="../assets/styles/pendingReg.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/pendingReg.css')); ?>">
    <!-- <link rel="stylesheet" href="../assets/styles/manage.css"> -->

</head>
<body>
    <div class="box">
        <form method="POST">
            <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="Search" placeholder="Search By ID" value="">
            <input id="btnSearch" type="submit" name="SEARCH" value="Search">

            <!--<p>Customer ID</p>
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
            <!--<input style="margin-top:120px;margin-left: 400px;" type="submit" name="REFRESH" value="REFRESH">
            <input type="submit" name="APPROVE" value="APPROVE">
            <input type="submit" name="REJECT" value="REJECT"> -->
        </form>
        <div align="right" class="table">
            <table class="content-table">
                <thead>
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>NAME</th>
                          <th>DESIGN</th>
                          <th>CONTACT</th>
                          <th>EMAIL</th>
                          <th>REG. DATE</th>
                          <th>ACCEPT</th>
                          <th>REJECT</th>
                      </tr>
                  </thead>
                  <tbody id='tab'>
                    <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td align='middle'><?php echo e($content->cusid); ?></td>
                        <td align='middle'><?php echo e($content->name); ?></td>
                        <td align='middle'><?php echo e($content->design); ?></td>
                        <td align='middle'><?php echo e($content->email); ?></td>
                        <td align='middle'><?php echo e($content->mobile); ?></td>
                        <td align='middle'><?php echo e($content->reg_date); ?></td>
                        <td align='middle'><a href="<?php echo e(route('adminDash.regManageAdmin.accept', [$content->cusid])); ?>">&#9989;</a></td>
                        <td align='middle'><a href="<?php echo e(route('adminDash.regManageAdmin.reject', [$content->cusid])); ?>">&#128683;</a></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/adminDash/regManageAdmin/index.blade.php ENDPATH**/ ?>