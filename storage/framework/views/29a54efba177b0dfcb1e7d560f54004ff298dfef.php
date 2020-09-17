<html>
  <head>
    <title> EMPLOYEE HOME </title>
    <script type="text/javascript" src="<?php echo e(URL::to('js/validate.js')); ?>"></script>
  </head>

  <body>
    <form method="post">
      <table>
        <td>
          <table>
            <tr>
              <td> Company Name: </td>
              <td><input type="text" name="a" id="a"> <td>
              <td><span id='at'> </span></td>
            </tr>

            <tr>
              <td> Job Title: </td>
              <td><input type="text" name="b" id="b"> <td>
              <td><span id='bt'> </span></td>
            </tr>
            <tr>
              <td> Job Location: </td>
              <td><input type="text" name="c" id="c"> <td>
              <td><span id='ct'> </span></td>
            </tr>
            <tr>
              <td> Salary: </td>
              <td><input type="text" name="d" id="d"> <td>
              <td><span id='dt'> </span></td>
            </tr>
            <tr>
              <td colspan="3" align="middle"><input type="submit" name="add" value="ADD JOB" onclick="return employee()"></td>
            </tr>
            <tr>
              <td colspan="3" align="middle"><button><a href="<?php echo e(route('logout.execute')); ?>">LOGOUT</a></button>
            </tr>
          </table>
        </td>
        <td>
          <table border="2">
            <thead>
              <td> SL </td>
              <td> COMPANY NAME </td>
              <td> JOB TITLE </td>
              <td> JOB LOCATION </td>
              <td> SALARY </td>
              <td> ACTION </td>
            </thead>
            <tbody>
              <?php for($i=0; $i != count($info); $i++): ?>
          		<tr>
          			<td><?php echo e($info[$i]->id); ?></td>
          			<td><?php echo e($info[$i]->name); ?></td>
                <td><?php echo e($info[$i]->title); ?></td>
          			<td><?php echo e($info[$i]->location); ?></td>
                <td><?php echo e($info[$i]->salary); ?></td>
          			<td>
          				<a href="<?php echo e(route('employee.edit', [$info[$i]->id])); ?>">Edit</a> |
          				<a href="<?php echo e(route('employee.delete', [$info[$i]->id])); ?>">Delete</a>
          			</td>
          		</tr>
          	  <?php endfor; ?>
            </tbody>
          </table>
        </td>
      </table>
    </form>
  </body>

</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Lab Exam\trunk\resources\views/employee/index.blade.php ENDPATH**/ ?>