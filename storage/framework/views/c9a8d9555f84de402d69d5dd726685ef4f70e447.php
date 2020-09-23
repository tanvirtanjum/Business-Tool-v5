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
                    <th>Order Total</th>
                    <th>Status</th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/DeliverymanDash/pendingDeliveryList/index.blade.php ENDPATH**/ ?>