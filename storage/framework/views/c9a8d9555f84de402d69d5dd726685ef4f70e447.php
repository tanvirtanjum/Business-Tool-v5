<?php echo $__env->make('DeliverymanDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/Delivery.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/Delivery.css')); ?>">
    <title>Pending Delivery List</title>
</head>
<body>
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Order#</th>
                    <th>Date</th>
                    <th>Ship to</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Order Total</th>
                    <th>Status</th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody id='tab'>
              <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td align='middle'><?php echo e($content->orderid); ?></td>
                  <td align='middle'><?php echo e($content->ord_date); ?></td>
                  <td align='middle'><?php echo e($content->orderby); ?></td>
                  <td align='middle'><?php echo e($content->prodid); ?></td>
                  <td align='middle'><?php echo e($content->quant); ?></td>
                  <td align='middle'><?php echo e($content->ammout); ?></td>
                  <td align='middle'>Pending Recieve</td>
                  <td align='middle'><a href="<?php echo e(route('deliveryDash.pendingOrder.accept', [$content->orderid])); ?>">&#9989;</a></td>
                  <td align='middle'><a href="<?php echo e(route('deliveryDash.pendingOrder.reject', [$content->orderid])); ?>">&#128683;</a></td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/DeliverymanDash/pendingDeliveryList/index.blade.php ENDPATH**/ ?>