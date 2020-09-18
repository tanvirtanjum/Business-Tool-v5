<?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Customer</title>
      <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">-->
      <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
      <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/manage.css')); ?>">
  </head>

  <body>
      <div class="box">
        <form method="POST">
          <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
          <input id="btnSearch" type="submit" name="SEARCH" value="Search">

          <p>Customer ID</p>
          <input type="text" name="Id" placeholder="Customer Id" value="<?php echo e(Session::get('a')); ?>" readonly>
          <p>Name</p>
          <input type="text" name="Name" placeholder="Customer Name" value="<?php echo e(Session::get('b')); ?>" readonly>
          <p>Designation</p>
          <input type="text" name="Designation" placeholder="Customer Designation" value="<?php echo e(Session::get('c')); ?>" readonly>
          <p>Mobile No.</p>
          <input type="text" name="MobileNo" placeholder="Customer Mobile No" value="<?php echo e(Session::get('d')); ?>" readonly>
          <p>E-mail</p>
          <input type="email" name="Email" placeholder="Customer Email" value="<?php echo e(Session::get('e')); ?>" readonly>
          <p>Join Date</p>
          <input type="text" name="JoinDate" value="<?php echo e(Session::get('f')); ?>" readonly>
          <!--<p>Added By</p>
          input type="text" name="AddedBy"  value="" disabled><br>-->
          <br>
          <input type="submit" name="REFRESH" value="REFRESH">
          <input type="submit" name="<?php echo e(Session::get('action')); ?>" value="<?php echo e(Session::get('action')); ?>" <?php echo e(Session::get('udBTN')); ?>>
      </form>
          <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DESIGN</th>
                        <th>CONATACT</th>
                        <th>EMAIL</th>
                        <th>REG DATE</th>
                        <th>ACCESS</th>
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
                      <td align='middle'><?php if($content->status == 1): ?><?php echo html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8'); ?><?php else: ?><?php echo html_entity_decode('&#9940;', ENT_QUOTES, 'UTF-8'); ?><?php endif; ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/adminDash/customerManageAdmin/index.blade.php ENDPATH**/ ?>