<html>
  <head>
    <title> EDIT </title>
    <script type="text/javascript" src="<?php echo e(URL::to('js/validate.js')); ?>"></script>
  </head>

  <body>
    <form method="post">
        <table>
          <tr>
            <td colspan="3" align="middle"><button><a href="<?php echo e(route('admin.index')); ?>">BACK</a></button>
          </tr>
          <tr>
            <td> Full Name: </td>
            <td><input type="text" name="a" id="a" value="<?php echo e($info[0]->ename); ?>"> <td>
            <td> <span id='at'> </span> </td>
          </tr>
          <tr>
            <td> Designation: </td>
            <td><input type="text" name="f" placeholder="1/2" id="f"  value="<?php echo e($info[0]->ename); ?>"> <td>
            <td> <span id='ft'> </span> </td>
          </tr>
          <tr>
            <td> Company Name: </td>
            <td><input type="text" name="b" id="b"  value="<?php echo e($info[0]->cname); ?>"> <td>
            <td> <span id='bt'> </span> </td>
          </tr>
          <tr>
            <td> Contact: </td>
            <td><input type="text" name="c" id="c"  value="<?php echo e($info[0]->num); ?>"> <td>
            <td> <span id='ct'> </span> </td>
          </tr>
          <tr>
            <td> Username: </td>
            <td><input type="text" name="d" id="d" value="<?php echo e($info[0]->uname); ?>"> <td>
            <td> <span id='dt'> </span> </td>
          </tr>
          <tr>
            <td> Password: </td>
            <td><input type="text" name="e" id="e" value="<?php echo e($info[0]->pass); ?>"> <td>
            <td> <span id='et'> </span> </td>
          </tr>
          <tr>
            <td colspan="3" align="middle"><input type="submit" name="add" value="PROCEED" onclick='return admin()'></td>
          </tr>
          <tr>
            <td colspan="3" align="middle"><button><a href="<?php echo e(route('logout.execute')); ?>">LOGOUT</a></button>
          </tr>
        </table>
    </form>
  </body>

</html>
<?php /**PATH C:\xampp\htdocs\ATP3\Final Lab Exam\trunk\resources\views/admin/edit.blade.php ENDPATH**/ ?>