<!-- sidebar Included -->
@include('salesmanDash.common')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Sellmanage.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <script src="{{ URL::to('js/printProduct.js') }}"></script>
</head>
<body>
    <div class="box">
        <form method="POST" name="manage">
            <span style="color: green">{{session('fail')}}</span>
            <span style="color: green">{{session('success')}}</span><br>
            <input style="width: 20%; margin-left: 580px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
            <span style='color: red;'> {!! html_entity_decode(Session::get('srchERR'), ENT_QUOTES, 'UTF-8') !!} </span>
            <input id="btnSearch"type="submit" value="Search" name="SEARCH">
            <p style="">Product ID <span style="color: red">{{$errors->first('proId')}}</span></p>
            <input type="text" name="proId" placeholder="Enter Product Id" value="{{Session::get('PID')}}" readonly>
            <p>Product name <span style="color: red">{{$errors->first('proName')}}</span></p>
            <input type="text" name="proName" placeholder="Enter Product Name" value="{{Session::get('P_NAME')}}" readonly>
            {{-- <p>Type <span style="color: red">{{$errors->first('proType')}}</span></p> --}}
            <select id="proType" name="proType" hidden>
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
            <input type="number" name="proQuantity" placeholder="Enter Quantity" min='1' max="" ><br>
            <input type="number" name="preQuantity" placeholder="Enter Quantity"  value="{{Session::get('Q')}}" hidden>
            <input type="text" name="proBuyPrice" value="{{Session::get('BP')}}" hidden>
            <p>Sell Price <span style="color: red">{{$errors->first('proSellPrice')}}</span></p>
            <input type="number" name="proSellPrice" min='' placeholder="Price" value="{{Session::get('SP')}}">
            <p>Customer Name <span style="color: red">{{$errors->first('customerName')}}</span></p>
            <input type="text" name="customerName" placeholder="Customer Name" value="">
            <p>Customer Number <span style="color: red">{{$errors->first('customerNo')}}</span></p>
            <input type="text" name="customerNo" placeholder="Customer Number" value=""><br>
            <!-- <p>Seller ID</p> -->
            <input type="text" name="sellerID" placeholder="Type ID" value="" readonly hidden>
            <!-- <p>Sell Date</p> -->
            <input type="text" name="SellDate" placeholder="Date" value="" readonly hidden>
            <input type="submit" name="REFRESH" value="Refresh">
            <input type="submit" name="SELL" id="SELL" value="Sell"><br><br>
            <input style="margin-left: 80px" type="submit" name="PRINT" id="PRINT" onclick="savePDF()" value="Print">
        </form>
        <div align="right" class="table" id="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Prod. ID</th>
                        <th>Prod. Name</th>
                        <th>Type</th>
                        <th>Availability</th>
                        <th>Quantity</th>
                        <th>Buy Price</th>
                        <th>Sell Price</th>
                        <th>Mod_By</th>
                        <th>add_PDate</th>
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
