<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail</title>
</head>
<body>
    <h1><?php echo e($details['title']); ?></h1>
    <p><?php echo e($details['body']); ?></p>
    <p>
        Please Click on reset Password Link.
        <a href="<?php echo e(url('resetPassword/resetPage/'.$details['email'].'/'.$details['token'].'/')); ?>">RESET PASSWORD</a>
    </p>
    <p>Thank you</p>
</body>
</html><?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/resetPassword/TestMail.blade.php ENDPATH**/ ?>