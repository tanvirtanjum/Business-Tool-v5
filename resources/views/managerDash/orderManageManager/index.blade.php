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
                </tr>
            </thead>
            <tbody>
            
          </tbody>
        </table>
    </div>
</body>
</html>
