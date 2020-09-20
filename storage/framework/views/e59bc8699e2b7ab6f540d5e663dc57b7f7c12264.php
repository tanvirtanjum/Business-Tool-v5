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
<html>
	<head>
		<meta charset="UTF-8">
		<title>Notice</title>
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/notice.css')); ?>">
	</head>
	<body>
		<div class="table">
			<h1>Notice</h1>
			<hr>
			<form method="POST">
				<input style="margin-top: 3px;width: 25%; margin-left: 10px;" type="text" name="subject" placeholder="Subject" value="">
				<input style="margin-top: 3px;width: 25%; margin-left: 180px;" type="text" name="noticeID" placeholder="Load Notice By ID">
        <input type="Submit" name="READ" value="READ"><br>
				<textarea style="margin-left: 11px;margin-top: 10px;" name="see" id="see" cols="40" rows="20" placeholder="Notice"></textarea>
				<table style="float: right;margin-right: 40px;" class="content-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Subject</th>
						</tr>
					</thead>
					<tbody>
					</tbody>

				</table>
        <br><input type="submit" name="REFRESH" value="REFRESH">
			</form>

		</div>
	</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/notice/index.blade.php ENDPATH**/ ?>