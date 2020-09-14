<?php if(Session::get('SID') == 1): ?>
      <?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 2): ?>
      <?php echo $__env->make('managerDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 3): ?>
      <?php echo $__env->make('salesmanDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 4): ?>
      <?php echo $__env->make('DeliverymanDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 5): ?>
      <?php echo $__env->make('customerDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/about.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/about.css')); ?>">
    <script src="../assets/js/editProfile.js"></script>
</head>
<body>
  <div class="box">
    <h1>Profile Info <i class="fas fa-users"></i></h1>

    <form method="POST" autocomplete="off" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        

        <p>Upload Profile Picture</p><input style="margin-top: 5px" type="file" name="avatar">
        <p style="margin-top:5px">Username</p><br>
        <input type="text" name="username" value="<?php if(Session::get('SID')!='5'): ?><?php echo e($info->EmpID); ?> <?php else: ?><?php echo e($info->cusid); ?> <?php endif; ?>" readonly><br>
        <p>Full Name</p><br>
        <input type="text" name="fullname" value="<?php if(Session::get('SID')!='5'): ?><?php echo e($info->E_NAME); ?> <?php else: ?><?php echo e($info->name); ?> <?php endif; ?>"><br>
        <?php $__currentLoopData = $errors->get('fullname'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span style="color: red"><?php echo e($err); ?></span> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p>Designation</p><br>
        <input type="text" name="designation" value="<?php if(Session::get('SID')==1): ?>ADMIN <?php elseif(Session::get('SID')==2): ?>MANAGER <?php elseif(Session::get('SID')==3): ?>SALESMAN <?php elseif(Session::get('SID')==4): ?>DELIVERYMAN <?php else: ?><?php echo e($info->design); ?> <?php endif; ?>" "<?php if(Session::get('SID')=='5'): ?>readonly <?php endif; ?>"><br>
        <p>Email<i class="far fa-envelope"></i></p><br>
        <input type="email" name="email" value="<?php if(Session::get('SID')!='5'): ?><?php echo e($info->E_MAIL); ?> <?php else: ?><?php echo e($info->email); ?> <?php endif; ?>"><br>
        <?php $__currentLoopData = $errors->get('email'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span style="color: red"><?php echo e($err); ?></span> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p>Mobile No.</p><br>
        <input type="text" name="mobile" value="<?php if(Session::get('SID')!='5'): ?><?php echo e($info->E_MOB); ?> <?php else: ?><?php echo e($info->mobile); ?> <?php endif; ?>"><br>
        <?php $__currentLoopData = $errors->get('mobile'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span style="color: red"><?php echo e($err); ?></span> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <p>Join Date</p>
        <input type="text" name="joinDate" value="<?php if(Session::get('SID')!='5'): ?><?php echo e($info->JOIN_DATE); ?> <?php else: ?><?php echo e($info->reg_date); ?> <?php endif; ?>" readonly><br>
        <input type="submit" name="save" value="Save Edit">
    </form>
  </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/aboutUser/edit.blade.php ENDPATH**/ ?>