<!-- sidebar Included -->
<?php echo $__env->make('managerDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/manage.css')); ?>">
    <script src="<?php echo e(URL::to('js/printProduct.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/jquery.js')); ?>"></script>
</head>
<body>
    <div class="box">
            <form method="POST">
            <?php echo csrf_field(); ?>
            <span style="color: green"><?php echo e(Session('success')); ?></span>
                <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
                <span style='color: red;'> <?php echo html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8'); ?> </span>
                <input id="btnSearch"type="submit" name="SEARCH" value="Search">

                <p>Product ID <span style="color: red"><?php echo e($errors->first('proId')); ?></span></p>
                <input type="text" name="proId" placeholder="Enter Product Id" value="<?php echo e(Session::get('PID')); ?>" >
                <p>Product Name <span style="color: red"><?php echo e($errors->first('proName')); ?></span></p>
                <input type="text" name="proName" placeholder="Enter Product Name" value="<?php echo e(Session::get('P_NAME')); ?>" >
                <p>Type <span style="color: red"><?php echo e($errors->first('proType')); ?></span></p>
                <select id="proType" name="proType">
                  <option value="" <?php if(Session::get('T') == 0): ?><?php echo e('selected'); ?><?php endif; ?>>--SELECT--</option>
                  <option id="HDD/SSD" value="HDD/SSD" <?php if(Session::get('T') == 'HDD/SSD'): ?><?php echo e('selected'); ?><?php endif; ?>>HDD/SSD</option>
                  <option id="Keyboard" value="Keyboard" <?php if(Session::get('T') == 'Keyboard'): ?><?php echo e('selected'); ?><?php endif; ?>>Keyboard</option>
                  <option id="Laptop" value="Laptop" <?php if(Session::get('T') == 'Laptop'): ?><?php echo e('selected'); ?><?php endif; ?>>Laptop</option>
                  <option id="Mouse" value="Mouse" <?php if(Session::get('T') == 'Mouse'): ?><?php echo e('selected'); ?><?php endif; ?>>Mouse</option>
                  <option id="Printer" value="Printer" <?php if(Session::get('T') == 'Printer'): ?><?php echo e('selected'); ?><?php endif; ?>>Printer</option>
                  <option id="Ram" value="Ram" <?php if(Session::get('T') == 'Ram'): ?><?php echo e('selected'); ?><?php endif; ?>>Ram</option>
                  <option id="Scanner" value="Scanner" <?php if(Session::get('T') == 'Scanner'): ?><?php echo e('selected'); ?><?php endif; ?>>Scanner</option>
                  <option id="Software" value="Software" <?php if(Session::get('T') == 'Software'): ?><?php echo e('selected'); ?><?php endif; ?>>Software</option>
                  <option id="TV" value="TV" <?php if(Session::get('T') == 'TV'): ?><?php echo e('selected'); ?><?php endif; ?>>TV</option>
                </select><br>
                <p>Quantity <span style="color: red"><?php echo e($errors->first('proQuantity')); ?></span></p>
                <input type="number" name="proQuantity" placeholder="Enter Product Quantity" value="<?php echo e(Session::get('QUA')); ?>" >
                <p>Buying Price <span style="color: red"><?php echo e($errors->first('proBuyPrice')); ?></span></p>
                <input type="text" name="proBuyPrice" placeholder="Enter Product buying Price" value="<?php echo e(Session::get('BP')); ?>" >
                <p>Selling Price <span style="color: red"><?php echo e($errors->first('proSellPrice')); ?></span></p>
                <input type="text" name="proSellPrice" placeholder="Enter Product Selling Price" value="<?php echo e(Session::get('SP')); ?>" >
                <p>Modified By</p>
                <input type="text" name="by" value="<?php echo e(Session::get('MB')); ?>" readonly>
                <p>Adding Date</p>
                <input type="text" name="addingDate" value="<?php echo e(Session::get('APD')); ?>" readonly><br>
                <input style="margin-left: 400px;"type="submit" name="REFRESH" value="REFRESH">
                <input type="submit" name="INSERT" value="INSERT">
                <input type="submit" name="UPDATE"value="UPDATE" <?php echo e(Session::get('udBTN')); ?>>
                
                <input type="submit" name="PRINT" value="PRINT" onclick="savePDF()">
            </form>


        <div align="right" id="table" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Pro Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Availability</th>
                        <th>Quantity</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>ModifiedBy</th>
                        <th>Adding Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i=0; $i != count($info); $i++): ?>
						<tr>
							<td><?php echo e($info[$i]->PID); ?></td>
							<td><?php echo e($info[$i]->P_NAME); ?></td>
							<td><?php echo e($info[$i]->TYPE); ?></td>
							<td><?php echo e($info[$i]->AVAILABILITY); ?></td>
							<td><?php echo e($info[$i]->QUANTITY); ?></td>
							<td><?php echo e($info[$i]->BUY_PRICE); ?></td>
							<td><?php echo e($info[$i]->SELL_PRICE); ?></td>
							<td><?php echo e($info[$i]->MOD_BY); ?></td>
							<td><?php echo e($info[$i]->Add_PDate); ?></td>
						</tr>
           			<?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\AIUB Docs and Pogrammable soft\9th  semester\ATP 3\project final\trunk\resources\views/managerDash/prodManageManager/index.blade.php ENDPATH**/ ?>