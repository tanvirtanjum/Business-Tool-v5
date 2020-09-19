<!-- sidebar Included -->
@include('managerDash.common')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/buy.css') }}">
    <title>Select Delivery Man</title>
</head>
<body>
  <form method="post">
    @csrf
    <div class="box">
        <h1>Confirm Order</h1>
        <hr>
        <p>Order ID</p>
        <input type="text" name="a" value="{{$info[0]->orderid}}" readonly>
        <p>Product ID</p>
        <input type="text" name="n" value="{{$info[0]->prodid}}" readonly>
        <p>Quantity</p>
        <input type="text" name="t" value="{{$info[0]->quant}}" readonly>
        <p>Cash</p>
        <input type="text" name="am" value="{{$info[0]->ammout}}" readonly>
        <p>Order Date</p>
        <input type="text" name="od" value="{{$info[0]->ord_date}}" readonly>
        <p>Delivery By <span style="color: red">{{$errors->first('db')}}</span></p>
        <input type="text" placeholder="Enter Delivery Man ID." name="db"><br>
        <input type="submit" value="CONFIRM">
    </div>
  </form>
</body>
</html>
