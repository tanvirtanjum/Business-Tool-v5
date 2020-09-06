@if(Session::get('SID') == 1)
      @include('adminDash.common')
@elseif(Session::get('SID') == 2)
      @include('managerDash.common')
@elseif(Session::get('SID') == 3)
      @include('salesmanDash.common')
@elseif(Session::get('SID') == 4)
      @include('DeliverymanDash.common')
@elseif(Session::get('SID') == 5)
      @include('customerDash.common')
@else
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/about.css">-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/about.css') }}">
    <script src="../assets/js/editProfile.js"></script>
</head>
<body>
  <div class="box">
    <form method="POST" autocomplete="off" name="myForm" onsubmit="return(validate());">
        <h1>Profile Info <i class="fas fa-users"></i></h1>
        <p></p>Username<br>
        <input type="text" name="username" value="@if(Session::get('SID')!='5'){{$info->EmpID}} @else{{$info->cusid}} @endif" readonly><br>
        <p>Full Name</p><br>
        <input type="text" name="fullname" value="@if(Session::get('SID')!='5'){{$info->E_NAME}} @else{{$info->name}} @endif"><br>
        <p>Designation</p><br>
        <input type="text" name="designation" value="@if(Session::get('SID')==1)ADMIN @elseif(Session::get('SID')==2)MANAGER @elseif(Session::get('SID')==3)SALESMAN @elseif(Session::get('SID')==4)DELIVERYMAN @else{{$info->design}} @endif" "@if(Session::get('SID')=='5')readonly @else @endif"><br>
        <p>Email<i class="far fa-envelope"></i></p><br>
        <input type="email" name="email" value="@if(Session::get('SID')!='5'){{$info->E_MAIL}} @else{{$info->email}} @endif"><br>
        <p>Mobile No.</p><br>
        <input type="text" name="mobile" value="@if(Session::get('SID')!='5'){{$info->E_MOB}} @else{{$info->mobile}} @endif"><br>
        <p>Join Date</p>
        <input type="text" name="joinDate" value="@if(Session::get('SID')!='5'){{$info->JOIN_DATE}} @else{{$info->reg_date}} @endif" readonly><br>
        <input type="submit" name="save" value="Save Edit">
    </form>
  </div>
</body>
</html>
