<!-- sidebar Included -->
@include('DeliverymanDash.common')

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" type="text/css" href="../assets/styles/history.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/history.css') }}">
    <title>Delivery Records</title>
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
                      <td align='middle'>Delivered</td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

    </div>
  </body>
  </html>
