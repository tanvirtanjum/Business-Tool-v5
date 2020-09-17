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
		<title>Notes</title>
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/common.css')); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo e(URL::to('css/notes.css')); ?>">
    	<script src="<?php echo e(URL::to('js/saveNotes.css')); ?>"></script>
    	
	</head>
	<body>
		<div class="box">
			<h1>Take your Note</h1>
			<form method='post'>
				<?php echo csrf_field(); ?>
			<input type="text" name="name" id="name" placeholder="Note name" value="<?php echo e($info[0]->NoteName); ?>">
        <input type="Submit" name="PUSH" value="PUSH">
				<input style="margin-left: 80px;width: 20%;" type="text" placeholder="Search by id" name="search">
			<input type="hidden" name="NoteID" value="<?php echo e($info[0]->NoteID); ?>">
				<input style="margin-left: 5px;width: 15%;" type="Submit" name="SEE" value="SEE"><br>
			<textarea placeholder="write here..." name="notes" id="notes" cols="46" rows="20"><?php echo e($info[0]->Text); ?></textarea><br>
				<input type="submit" name="REFRESH" value="REFRESH">
        <input style="margin-left: 30px;" type="submit" name="PRINT" value="PRINT" onclick="return saveFile()">
				<br><br>
				<input type="submit" name="UPDATE" value="UPDATE" >
        <input style="margin-left: 30px;" type="submit" name="DELETE" value="DELETE"><br><br>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<span style="color: red"><?php echo e($err); ?> <br></span>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php if(session('success')): ?>
			<span style="color: green"> <?php echo e(session('success')); ?></span>
		<?php endif; ?>
      		</form>
			<div align="right" class="table">
				<table class="content-table">
					<thead>
						<tr>
							<th>Note Id</th>
							<th>Note Name</th>
						</tr>
					</thead>
					<tbody class="tab" id="tab">
						<?php for($i=0; $i != count($info); $i++): ?>
						<tr>
							<td><?php echo e($info[$i]->NoteID); ?></td>
							<td><?php echo e($info[$i]->NoteName); ?></td>
						</tr>
           				<?php endfor; ?>
					</tbody>

				</table>
			</div>
		</div>
	</body>
</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Project\Business Tool v5\trunk\resources\views/notes/index.blade.php ENDPATH**/ ?>