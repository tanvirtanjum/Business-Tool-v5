@include('adminDash.common')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/manage.css">-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/manage.css') }}">
    <script src="{{ URL::to('js/printSalesHistory.js') }}"></script>
    <script src="{{ URL::to('js/excelPrint.js') }}"></script>
    <script src="{{ URL::to('js/jquery.js') }}"></script>

</head>
<body>
    <div class="box">
            <form method="POST">
                <span style='color:red;'>{{Session::get('dbERR')}}</span>
                <input style="width: 15%; margin-left: 330px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
                <span style='color: red;'> {!! html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8') !!} </span>
                <input id="btnSearch"type="submit" name="SEARCH" value="Search">
                <input type="submit" name="PRINT" id="PRINT" onclick="savePDF()" value="Export PDF">
                <input type="submit" name="excel" onclick="exportToExcel('tblexportData', 'user-data')" value="Export Excel">

                <p>Product ID</p>
                <input type="text" name="proId" placeholder="Enter Product Id" value="{{Session::get('a')}}" {{Session::get('iFLD')}}>
                <p>Product Name</p>
                <input type="text" name="proName" placeholder="Enter Product Name" value="{{Session::get('b')}}" >
                <p>Type</p>
                <select id="proType" name="proType">
                  <option value="" @if(Session::get('c') == ''){{'selected'}}@endif>--SELECT--</option>
                  <option id="HDD/SSD" value="HDD/SSD" @if(Session::get('c') == 'HDD/SSD'){{'selected'}}@endif>HDD/SSD</option>
                  <option id="Keyboard" value="Keyboard" @if(Session::get('c') == 'Keyboard'){{'selected'}}@endif>Keyboard</option>
                  <option id="Laptop" value="Laptop" @if(Session::get('c') == 'Laptop'){{'selected'}}@endif>Laptop</option>
                  <option id="Mouse" value="Mouse" @if(Session::get('c') == 'Mouse'){{'selected'}}@endif>Mouse</option>
                  <option id="Printer" value="Printer" @if(Session::get('c') == 'Printer'){{'selected'}}@endif>Printer</option>
                  <option id="Ram" value="Ram" @if(Session::get('c') == 'Ram'){{'selected'}}@endif>Ram</option>
                  <option id="Scanner" value="Scanner" @if(Session::get('c') == 'Scanner'){{'selected'}}@endif>Scanner</option>
                  <option id="Software" value="Software" @if(Session::get('c') == 'Software'){{'selected'}}@endif>Software</option>
                  <option id="TV" value="TV">TV</option>
                </select><br>
                <p>Quantity</p>
                <input type="number" name="proQuantity" placeholder="Enter Product Quantity" value="{{Session::get('d')}}" >
                <p>Buying Price</p>
                <input type="text" name="proBuyPrice" placeholder="Enter Product buying Price" value="{{Session::get('e')}}" >
                <p>Selling Price</p>
                <input type="text" name="proSellPrice" placeholder="Enter Product Selling Price" value="{{Session::get('f')}}" >
                <p>Modified By</p>
                <input type="text" name="by" value="{{Session::get('g')}}" readonly>
                <p>Adding Date</p>
                <input type="text" name="addingDate" value="{{Session::get('h')}}" readonly><br>
                <input style="margin-left: 400px;"type="submit" name="REFRESH" value="REFRESH">
                <input type="submit" name="INSERT" value="INSERT" {{Session::get('iBTN')}}>
                <input type="submit" name="UPDATE"value="UPDATE" {{Session::get('udBTN')}}>
                <input type="submit" name="{{Session::get('action')}}" value="{{Session::get('action')}}" {{Session::get('udBTN')}}>
            </form>


        <div align="right" class="table" id="table">
            <table class="content-table" id="tblexportData">
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
                  @foreach($table as $content)
                    <tr>
                      <td align='middle'>{{$content->PID }}</td>
                      <td align='middle'>{{$content->P_NAME}}</td>
                      <td align='middle'>{{$content->TYPE}}</td>
                      <td align='middle'>@if($content->AVAILABILITY == 'AVAILABLE'){!! html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') !!}@else{!! html_entity_decode('&#10060;', ENT_QUOTES, 'UTF-8') !!}@endif</td>
                      <td align='middle'>{{$content->QUANTITY}}</td>
                      <td align='middle'>{{$content->BUY_PRICE}}</td>
                      <td align='middle'>{{$content->SELL_PRICE}}</td>
                      <td align='middle'>{{$content->MOD_BY}}</td>
                      <td align='middle'>{{$content->Add_PDate}}</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
