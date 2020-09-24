@include('DeliverymanDash.common')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/Delivery.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/Delivery.css') }}">
    <title>Pending Delivery List</title>
</head>
<body>
    <div align="center" class="table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Order#</th>
                    <th>Date</th>
                    <th>Ship to</th>
                    <th>Product ID</th>
                    <th>Quantity</th>
                    <th>Order Total</th>
                    <th>Status</th>
                    <th> </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody id='tab'>
              @foreach($table as $content)
                <tr>
                  <td align='middle'>{{$content->orderid }}</td>
                  <td align='middle'>{{$content->ord_date}}</td>
                  <td align='middle'>{{$content->orderby}}</td>
                  <td align='middle'>{{$content->prodid}}</td>
                  <td align='middle'>{{$content->quant}}</td>
                  <td align='middle'>{{$content->ammout}}</td>
                  <td align='middle'>Pending Recieve</td>
                  <td align='middle'><a href="{{route('deliveryDash.pendingOrder.accept', [$content->orderid])}}">&#9989;</a></td>
                  <td align='middle'><a href="{{route('deliveryDash.pendingOrder.reject', [$content->orderid])}}">&#128683;</a></td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
