@include('adminDash.common')

<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Employees</title>
      <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">-->
      <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::to('css/manage.css') }}">
      <script src="assets/js/empvalid.js"></script>
  </head>

  <body>
      <div class="box">
        <form method="POST">
          <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="{{Session::get('a')}}">
          <span style='color: red;'> {!! html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8') !!} </span>
          <input id="btnSearch" type="submit" name="SEARCH" value="Search">

          <p>Employee ID</p>
          <input type="text" id="empId" name="empId" placeholder="Enter Employee Id" value="{{Session::get('a')}}" {{Session::get('iFLD')}}>
          <p>Name</p>
          <input type="text" id="empName" name="empName" placeholder="Enter Employee Name" value="{{Session::get('b')}}">
          <p>Designation</p>
          <select id="designation" name="designation">
              <option value="0" @if(Session::get('c') == 0){{'selected'}}@endif>--SELECT--</option>
              <option id="admin" value="1" @if(Session::get('c') == 1){{'selected'}}@endif>Admin</option>
              <option id="manager" value="2" @if(Session::get('c') == 2){{'selected'}}@endif>Manager</option>
              <option id="salesman" value="3" @if(Session::get('c') == 3){{'selected'}}@endif>SalesMan</option>
              <option id="admin" value="4" @if(Session::get('c') == 4){{'selected'}}@endif>DevileryMan</option>
          </select><br>
          <p>Salary</p>
          <input type="number" id="salary" name="empSalary" placeholder="Enter Employee Salary" value="{{Session::get('d')}}">
          <p>Mobile No.</p>
          <input type="text" id="mob" name="empMobileNo" placeholder="Enter Employee Mobile No" value="{{Session::get('e')}}" >
          <p>E-mail</p>
          <input type="email" id="em" name="empEmail" placeholder="Enter Employee Email" value="{{Session::get('f')}}" >
          <p>Join Date</p>
          <input type="text" name="empJoinDate" value="{{Session::get('g')}}" readonly>
          <p>Added By</p>
          <input type="text" name="empAddedBy"  value="{{Session::get('h')}}" readonly><br>
          <input style="margin-left: 400px;" type="submit" name="REFRESH" value="REFRESH">
          <input type="submit" name="INSERT" id="INSERT" value="INSERT" {{Session::get('iBTN')}}>
          <input type="submit" name="UPDATE" value="UPDATE" {{Session::get('udBTN')}}>
          <input type="submit" name="DELETE" value="DELETE" {{Session::get('udBTN')}}>
        </form>
        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>EmpId</th>
                        <th>Name</th>
                        <th>Active As</th>
                        <th>Salary</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Join Date</th>
                        <th>Added By</th>
                    </tr>
                </thead>

                <tbody>
                  @foreach($table as $content)
                    <tr>
                      <td align='middle'>{{$content->EmpID }}</td>
                      <td align='middle'>{{$content->E_NAME}}</td>
                      <td align='middle'>@if($content->DID == 1){{'ADMIN'}}@elseif($content->DID == 2){{'MANAGER'}}@elseif($content->DID == 3){{'SALESMAN'}}@elseif($content->DID == 4){{'DELIVERYMAN'}}@else{!! html_entity_decode('&#9940;', ENT_QUOTES, 'UTF-8') !!}@endif</td>
                      <td align='middle'>{{$content->SAL}}</td>
                      <td align='middle'>{{$content->E_MOB}}</td>
                      <td align='middle'>{{$content->E_MAIL}}</td>
                      <td align='middle'>{{$content->JOIN_DATE}}</td>
                      <td align='middle'>{{$content->ADDED_BY}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
