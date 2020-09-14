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
    <div class="box">
        <h1>Confirm Order</h1>
        <hr>
        <p>Order ID</p>
        <input type="text" name="a" value="" readonly>
        <p>Product ID</p>
        <input type="text" name="name" value="" readonly>
        <p>Quantity</p>
        <input type="text" name="type" value="" readonly>
        <p>Cash</p>
        <input type="text" name="aq" value="" readonly>
        <p>Order Date</p>
        <input type="text" name="c" value="" readonly>
        <p>Delivery By</p>
        <input type="text" placeholder="Enter Delivery Man ID." name="b"><br>
        <input type="submit" value="CONFIRM">
    </div>
  </form>
</body>
</html>
