<!-- sidebar Included -->
@include('managerDash.common')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/manage.css') }}">
    <script src="{{ URL::to('js/printProduct.js') }}"></script>
</head>
<body>
    <div class="box">
            <form method="POST">
            <span style="color: green">{{Session('success')}}</span>
                <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
                <span style='color: red;'> {!! html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8') !!} </span>
                <input id="btnSearch"type="submit" name="SEARCH" value="Search">

                <p>Product ID <span style="color: red">{{$errors->first('proId')}}</span></p>
                <input type="text" name="proId" placeholder="Enter Product Id" value="{{Session::get('PID')}}" >
                <p>Product Name <span style="color: red">{{$errors->first('proName')}}</span></p>
                <input type="text" name="proName" placeholder="Enter Product Name" value="{{Session::get('P_NAME')}}" >
                <p>Type <span style="color: red">{{$errors->first('proType')}}</span></p>
                <select id="proType" name="proType">
                  <option value="" @if(Session::get('T') == 0){{'selected'}}@endif>--SELECT--</option>
                  <option id="HDD/SSD" value="HDD/SSD" @if(Session::get('T') == 'HDD/SSD'){{'selected'}}@endif>HDD/SSD</option>
                  <option id="Keyboard" value="Keyboard" @if(Session::get('T') == 'Keyboard'){{'selected'}}@endif>Keyboard</option>
                  <option id="Laptop" value="Laptop" @if(Session::get('T') == 'Laptop'){{'selected'}}@endif>Laptop</option>
                  <option id="Mouse" value="Mouse" @if(Session::get('T') == 'Mouse'){{'selected'}}@endif>Mouse</option>
                  <option id="Printer" value="Printer" @if(Session::get('T') == 'Printer'){{'selected'}}@endif>Printer</option>
                  <option id="Ram" value="Ram" @if(Session::get('T') == 'Ram'){{'selected'}}@endif>Ram</option>
                  <option id="Scanner" value="Scanner" @if(Session::get('T') == 'Scanner'){{'selected'}}@endif>Scanner</option>
                  <option id="Software" value="Software" @if(Session::get('T') == 'Software'){{'selected'}}@endif>Software</option>
                  <option id="TV" value="TV" @if(Session::get('T') == 'TV'){{'selected'}}@endif>TV</option>
                </select><br>
                <p>Quantity <span style="color: red">{{$errors->first('proQuantity')}}</span></p>
                <input type="number" name="proQuantity" placeholder="Enter Product Quantity" value="{{Session::get('QUA')}}" >
                <p>Buying Price <span style="color: red">{{$errors->first('proBuyPrice')}}</span></p>
                <input type="text" name="proBuyPrice" placeholder="Enter Product buying Price" value="{{Session::get('BP')}}" >
                <p>Selling Price <span style="color: red">{{$errors->first('proSellPrice')}}</span></p>
                <input type="text" name="proSellPrice" placeholder="Enter Product Selling Price" value="{{Session::get('SP')}}" >
                <p>Modified By</p>
                <input type="text" name="by" value="{{Session::get('MB')}}" readonly>
                <p>Adding Date</p>
                <input type="text" name="addingDate" value="{{Session::get('APD')}}" readonly><br>
                <input style="margin-left: 400px;"type="submit" name="REFRESH" value="REFRESH">
                <input type="submit" name="INSERT" value="INSERT">
                <input type="submit" name="UPDATE"value="UPDATE" {{Session::get('udBTN')}}>
                {{-- <input type="submit" name="DELETE" value="DELETE" {{Session::get('udBTN')}}> --}}
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
                    @for($i=0; $i != count($info); $i++)
						<tr>
							<td>{{$info[$i]->PID}}</td>
							<td>{{$info[$i]->P_NAME}}</td>
							<td>{{$info[$i]->TYPE}}</td>
							<td>{{$info[$i]->AVAILABILITY}}</td>
							<td>{{$info[$i]->QUANTITY}}</td>
							<td>{{$info[$i]->BUY_PRICE}}</td>
							<td>{{$info[$i]->SELL_PRICE}}</td>
							<td>{{$info[$i]->MOD_BY}}</td>
							<td>{{$info[$i]->Add_PDate}}</td>
						</tr>
           			@endfor
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
