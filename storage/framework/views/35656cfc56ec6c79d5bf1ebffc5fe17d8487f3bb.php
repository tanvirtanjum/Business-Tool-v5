<?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notice</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/notice.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/notice.css')); ?>">
</head>
<body>
    <div class="table">
        <h1>Notice Manage</h1>
        <hr>
        <form method="POST">
            <input style="margin-top: 3px;width: 20%;" type="text" name="noteSub" placeholder="Enter Notice Subject" value="<?php echo e(Session::get('b')); ?>">
            <input type="hidden" name="unoteID" value="">
            <input style="width: 15%;" type="submit" name="SEND" value="SEND">
            <input style="margin-top: 3px;width: 20%;margin-left: 180px;" type="text" name="noticeID" placeholder="Load Notice By ID" value="<?php echo e(Session::get('a')); ?>" <?php echo e(Session::get('sfld')); ?>>
            <span style='color: red;'> <?php echo html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8'); ?> </span>
            <input style="width: 15%;" type="submit" name="LOAD" value="LOAD">
            <p>Your Notice <span style='color:red;'> <?php echo e(Session::get('upERR')); ?> </span> </p>
            <textarea style="margin-top: 10px;" name="noticetext" id="notice" placeholder="write your notice here" cols="42" rows="20"><?php echo e(Session::get('c')); ?></textarea>
            <table style="float: right;" class="content-table">
                <thead>
                    <th>Notice Id</th>
                    <th>Subject</th>
                </thead>
                <tbody id='tab'>
                  <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td align='middle'><?php echo e($content['noticeID']); ?></td>
                      <td align='middle'><?php echo e($content['noteSub']); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <input type="submit" name="REFRESH" value="REFRESH">
            <!--<span style='color:red;'> <?php echo e(Session::get('upERR')); ?> </span>--><br>
            <input type="submit" name="UPDATE" value="UPDATE" <?php echo e(Session::get('udBTN')); ?>>
            <input type="submit" name="DELETE" value="DELETE" <?php echo e(Session::get('udBTN')); ?>>
        </form>
    </div>
</body>
</html>>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/adminDash/noticeManageAdmin/index.blade.php ENDPATH**/ ?>