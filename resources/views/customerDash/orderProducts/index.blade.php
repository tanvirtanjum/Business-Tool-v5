<!-- sidebar Included -->
@include('customerDash.common')
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/orderProducts.css">
    <title>Order Products</title>
</head>
<body>
    <div class="box">
        <h1>Order Products</h1>
        <hr>
          <div class="cart" style="margin-left: 25px;">
          <table>
            <tr>
              <th>Product ID </th>
              <th>Product Name </th>
              <th>Available Quantity</th>
              <th>Price </th>
              <th>Type </th>
            </tr>
          </table>
            <tbody>
                @for($i=0; $i != count($info); $i++)
            <table>
            <tr>

              <td><input type="checkbox" value=""> {{$info[$i]->PID}}</td>
              <td>{{$info[$i]->P_NAME}}</td>
              <td>{{$info[$i]->AVAILABILITY}}</td>
              <td>{{$info[$i]->SELL_PRICE}}</td>
              <td>{{$info[$i]->TYPE}}</td>
            </tr>
          </table>
            @endfor
            </tbody>
          <hr>
              <a style="padding-left: 20px;" href=""><input type="submit" value="Buy"></a>
          </div>
    </div>
</body>
</html>
