<!-- sidebar Included -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="/../assets/styles/buy.css">
    <title>Order Products</title>
</head>
<body>
  <form method="post">
    <div class="box">
        <h1>Confirm Order</h1>
        <hr>
        <p>Product ID</p>
        <input type="text" name="a" value="" readonly>
        <p>Product Name</p>
        <input type="text" name="name" value="" readonly>
        <p>Type</p>
        <input type="text" name="type" value="" readonly>
        <p>Available Quantity</p>
        <input type="text" name="aq" value="" readonly>
        <p>Price</p>
        <input type="number" name="c" value="" readonly>
        <p>Quantity</p>
        <input type="number" placeholder="Enter Quantity that you need" min="1" max="" name="b"><br>
        <input type="submit" value="CONFIRM">
    </div>
  </form>
</body>
</html>
