@include('adminDash.common')

<!DOCTYPE html>
<html>
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Customer</title>
      <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
      <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">-->
      <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ URL::to('css/manage.css') }}">
  </head>

  <body>
      <div class="box">
        <form method="POST">
          <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
          <input id="btnSearch" type="submit" name="SEARCH" value="Search">

          <p>Customer ID</p>
          <input type="text" name="Id" placeholder="Customer Id" value="{{Session::get('a')}}" readonly>
          <p>Name</p>
          <input type="text" name="Name" placeholder="Customer Name" value="{{Session::get('b')}}" readonly>
          <p>Designation</p>
          <input type="text" name="Designation" placeholder="Customer Designation" value="{{Session::get('c')}}" readonly>
          <p>Mobile No.</p>
          <input type="text" name="MobileNo" placeholder="Customer Mobile No" value="{{Session::get('d')}}" readonly>
          <p>E-mail</p>
          <input type="email" name="Email" placeholder="Customer Email" value="{{Session::get('e')}}" readonly>
          <p>Join Date</p>
          <input type="text" name="JoinDate" value="{{Session::get('f')}}" readonly>
          <!--<p>Added By</p>
          input type="text" name="AddedBy"  value="" disabled><br>-->
          <br>
          <input type="submit" name="REFRESH" value="REFRESH">
          <input type="submit" name="{{Session::get('action')}}" value="{{Session::get('action')}}" {{Session::get('udBTN')}}>
      </form>
          <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>DESIGN</th>
                        <th>CONATACT</th>
                        <th>EMAIL</th>
                        <th>REG DATE</th>
                        <th>ACCESS</th>
                    </tr>
                </thead>
                <tbody id='tab'>
                  @foreach($table as $content)
                    <tr>
                      <td align='middle'>{{$content->cusid }}</td>
                      <td align='middle'>{{$content->name}}</td>
                      <td align='middle'>{{$content->design}}</td>
                      <td align='middle'>{{$content->email}}</td>
                      <td align='middle'>{{$content->mobile}}</td>
                      <td align='middle'>{{$content->reg_date}}</td>
                      <td align='middle'>@if($content->status == 1){!! html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') !!}@else{!! html_entity_decode('&#9940;', ENT_QUOTES, 'UTF-8') !!}@endif</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </body>
</html>
