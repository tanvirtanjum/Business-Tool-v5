<?php if(Session::get('SID') == 1): ?>
      <?php echo $__env->make('adminDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 2): ?>
      <?php echo $__env->make('managerDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif(Session::get('SID') == 3): ?>
      <?php echo $__env->make('salesmanDash.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.$i">
    <title>Sales History</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/history.css')); ?>">
    <script src="<?php echo e(URL::to('js/printSalesHistory.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/excelPrint.js')); ?>"></script>
    <script src="<?php echo e(URL::to('js/jquery.js')); ?>"></script>
</head>
<body>
    <div class="table">
        <h1>Sales History</h1>
        <input type="text" name="search" id="search" onkeyup="search()" placeholder="Ajax Search">
        <div class=tab1 id="table">
            <table class="content-table" id="tblexportData" border="1">
                <thead>
                    <tr>
                        <th>SLID</th>
                        <th>PID</th>
                        <th>QUANT</th>
                        <th>OB_AMMOUNT</th>
                        <th>PROFIT</th>
                        <th>C_NAME</th>
                        <th>C_MOB</th>
                        <th>SOLD_BY</th>
                        <th>Sell_SDate</th>
                    </tr>
                </thead>
                <tbody id="">
                    <?php for($i=0; $i != count($history); $i++): ?>
                        <tr>
                            <td><?php echo e($history[$i]['SLID']); ?></td>
                            <td><?php echo e($history[$i]['PID']); ?></td>
                            <td><?php echo e($history[$i]['QUANT']); ?></td>
                            <td><?php echo e($history[$i]['OB_AMMOUNT']); ?></td>
                            <td><?php echo e($history[$i]['PROFIT']); ?></td>
                            <td><?php echo e($history[$i]['C_NAME']); ?></td>
                            <td><?php echo e($history[$i]['C_MOB']); ?></td>
                            <td><?php echo e($history[$i]['SOLD_BY']); ?></td>
                            <td><?php echo e($history[$i]['Sell_SDate']); ?></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

            </table>
        </div>
        <hr>
        <input style="margin-top: 5px;margin-left: 1$ipx;" name="PRINT" id="PRINT" onclick="savePDF()" type="submit" value="Export PDF">
        <input style="margin-top: 5px;margin-left: 1$ipx;" type="submit" name="excel" onclick="exportToExcel('tblexportData', 'user-data')" value="Export Excel">
        
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/salesHistory/index.blade.php ENDPATH**/ ?>