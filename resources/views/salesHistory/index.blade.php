@if(Session::get('SID') == 1)
      @include('adminDash.common')
@elseif(Session::get('SID') == 2)
      @include('managerDash.common')
@elseif(Session::get('SID') == 3)
      @include('salesmanDash.common')
@else
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales History</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/history.css') }}">
    <script src="{{ URL::to('js/printSalesHistory.js') }}"></script>
</head>
<body>
    <div class="table">
        <h1>Sales History</h1>
        <div class=tab1 id="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>SLID</th>
                        <th>PID</th>
                        <th>QUANT</th>
                        <th>OB_AMMOUNT</th>
                        <th>PROFIT</th>
                        <th>C_NAME</th>
                        <th>C_MOB</th>
                        <th>SOLD_BY</th>
                        <th>Sell_SDate</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0; $i != count($history); $i++)
						<tr>
							<td>{{$history[$i]->SLID}}</td>
							<td>{{$history[$i]->PID}}</td>
							<td>{{$history[$i]->QUANT}}</td>
							<td>{{$history[$i]->OB_AMMOUNT}}</td>
							<td>{{$history[$i]->PROFIT}}</td>
							<td>{{$history[$i]->C_NAME}}</td>
							<td>{{$history[$i]->C_MOB}}</td>
							<td>{{$history[$i]->SOLD_BY}}</td>
							<td>{{$history[$i]->Sell_SDate}}</td>
						</tr>
           			@endfor
                </tbody>

            </table>
        </div>
        <hr>
        <input style="margin-top: 5px;margin-left: 10px;" name="PRINT" id="PRINT" onclick="savePDF()" type="submit" value="Print PDF">
    </div>
</body>
</html>
