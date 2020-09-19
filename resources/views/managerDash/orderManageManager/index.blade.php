@include('managerDash.common')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Pending Orders</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/orderManage.css') }}">

</head>
<body>
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Order#</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Cash</th>
                    <th>Date</th>
                    <th>By</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i != count($info); $i++)
					<tr>
					    <td>{{$info[$i]->orderid}}</td>	
					    <td>{{$info[$i]->prodid}}</td>	
					    <td>{{$info[$i]->quant}}</td>	
					    <td>{{$info[$i]->ammout}}</td>	
					    <td>{{$info[$i]->ord_date}}</td>	
                        <td>{{$info[$i]->orderby}}</td>
                        <td><a href="{{url('managerDash/orderManageManager/approve/'.$info[$i]->orderid.'/')}}"><input type="submit" value="Approve"></a><td>	
					</tr>
                @endfor
                @if(count($info)==0)
                    <tr>
                        <td colspan="7" align="center">NO DATA</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
