<?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/manage.css')); ?>">

</head>
<body>
    <div class="box">
            <form method="POST">
                <span style='color:red;'><?php echo e(Session::get('dbERR')); ?></span>
                <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
                <span style='color: red;'> <?php echo html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8'); ?> </span>
                <input id="btnSearch"type="submit" name="SEARCH" value="Search">

                <p>Product ID</p>
                <input type="text" name="proId" placeholder="Enter Product Id" value="<?php echo e(Session::get('a')); ?>" <?php echo e(Session::get('iFLD')); ?>>
                <p>Product Name</p>
                <input type="text" name="proName" placeholder="Enter Product Name" value="<?php echo e(Session::get('b')); ?>" >
                <p>Type</p>
                <select id="proType" name="proType">
                  <option value="" <?php if(Session::get('c') == ''): ?><?php echo e('selected'); ?><?php endif; ?>>--SELECT--</option>
                  <option id="HDD/SSD" value="HDD/SSD" <?php if(Session::get('c') == 'HDD/SSD'): ?><?php echo e('selected'); ?><?php endif; ?>>HDD/SSD</option>
                  <option id="Keyboard" value="Keyboard" <?php if(Session::get('c') == 'Keyboard'): ?><?php echo e('selected'); ?><?php endif; ?>>Keyboard</option>
                  <option id="Laptop" value="Laptop" <?php if(Session::get('c') == 'Laptop'): ?><?php echo e('selected'); ?><?php endif; ?>>Laptop</option>
                  <option id="Mouse" value="Mouse" <?php if(Session::get('c') == 'Mouse'): ?><?php echo e('selected'); ?><?php endif; ?>>Mouse</option>
                  <option id="Printer" value="Printer" <?php if(Session::get('c') == 'Printer'): ?><?php echo e('selected'); ?><?php endif; ?>>Printer</option>
                  <option id="Ram" value="Ram" <?php if(Session::get('c') == 'Ram'): ?><?php echo e('selected'); ?><?php endif; ?>>Ram</option>
                  <option id="Scanner" value="Scanner" <?php if(Session::get('c') == 'Scanner'): ?><?php echo e('selected'); ?><?php endif; ?>>Scanner</option>
                  <option id="Software" value="Software" <?php if(Session::get('c') == 'Software'): ?><?php echo e('selected'); ?><?php endif; ?>>Software</option>
                  <option id="TV" value="TV">TV</option>
                </select><br>
                <p>Quantity</p>
                <input type="number" name="proQuantity" placeholder="Enter Product Quantity" value="<?php echo e(Session::get('d')); ?>" >
                <p>Buying Price</p>
                <input type="text" name="proBuyPrice" placeholder="Enter Product buying Price" value="<?php echo e(Session::get('e')); ?>" >
                <p>Selling Price</p>
                <input type="text" name="proSellPrice" placeholder="Enter Product Selling Price" value="<?php echo e(Session::get('f')); ?>" >
                <p>Modified By</p>
                <input type="text" name="by" value="<?php echo e(Session::get('g')); ?>" readonly>
                <p>Adding Date</p>
                <input type="text" name="addingDate" value="<?php echo e(Session::get('h')); ?>" readonly><br>
                <input style="margin-left: 400px;"type="submit" name="REFRESH" value="REFRESH">
                <input type="submit" name="INSERT" value="INSERT" <?php echo e(Session::get('iBTN')); ?>>
                <input type="submit" name="UPDATE"value="UPDATE" <?php echo e(Session::get('udBTN')); ?>>
                <input type="submit" name="<?php echo e(Session::get('action')); ?>" value="<?php echo e(Session::get('action')); ?>" <?php echo e(Session::get('udBTN')); ?>>
            </form>


        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <th>STOCK</th>
                        <th>BUYING PRICE</th>
                        <th>SELLING PRICE</th>
                        <th>MODIFIED BY</th>
                        <th>ADDING DATE</th>
                    </tr>
                </thead>
                <tbody id='tab'>
                  <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td align='middle'><?php echo e($content->PID); ?></td>
                      <td align='middle'><?php echo e($content->P_NAME); ?></td>
                      <td align='middle'><?php echo e($content->TYPE); ?></td>
                      <td align='middle'><?php if($content->AVAILABILITY == 'AVAILABLE'): ?><?php echo html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8'); ?><?php else: ?><?php echo html_entity_decode('&#10060;', ENT_QUOTES, 'UTF-8'); ?><?php endif; ?></td>
                      <td align='middle'><?php echo e($content->QUANTITY); ?></td>
                      <td align='middle'><?php echo e($content->BUY_PRICE); ?></td>
                      <td align='middle'><?php echo e($content->SELL_PRICE); ?></td>
                      <td align='middle'><?php echo e($content->MOD_BY); ?></td>
                      <td align='middle'><?php echo e($content->Add_PDate); ?></td>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/adminDash/prodManageAdmin/index.blade.php ENDPATH**/ ?>