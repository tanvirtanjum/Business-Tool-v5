<!-- sidebar Included -->
@include('managerDash.common')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Product</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/common.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('css/manage.css') }}">
</head>
<body>
    <div class="box">
            <form method="POST">
                <input style="width: 20%; margin-left: 530px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
                <input id="btnSearch"type="submit" name="SEARCH" value="Search">

                <p>Product ID</p>
                <input type="text" name="proId" placeholder="Enter Product Id" value="" >
                <p>Product Name</p>
                <input type="text" name="proName" placeholder="Enter Product Name" value="" >
                <p>Type</p>
                <select id="proType" name="proType">
                  <option value="" selected>--SELECT--</option>
                  <option id="HDD/SSD" value="HDD/SSD" selected>HDD/SSD</option>
                  <option id="Keyboard" value="Keyboard" selected<>Keyboard</option>
                  <option id="Laptop" value="Laptop" selected>Laptop</option>
                  <option id="Mouse" value="Mouse" selected>Mouse</option>
                  <option id="Printer" value="Printer" selected>Printer</option>
                  <option id="Ram" value="Ram" selected>Ram</option>
                  <option id="Scanner" value="Scanner" selected>Scanner</option>
                  <option id="Software" value="Software" selected>Software</option>
                  <option id="TV" value="TV" selected>TV</option>
                </select><br>
                <p>Quantity</p>
                <input type="number" name="proQuantity" placeholder="Enter Product Quantity" value="" >
                <p>Buying Price</p>
                <input type="text" name="proBuyPrice" placeholder="Enter Product buying Price" value="" >
                <p>Selling Price</p>
                <input type="text" name="proSellPrice" placeholder="Enter Product Selling Price" value="" >
                <p>Modified By</p>
                <input type="text" name="by" value="" readonly>
                <p>Adding Date</p>
                <input type="text" name="addingDate" value="" readonly><br>
                <input style="margin-left: 400px;"type="submit" name="REFRESH" value="REFRESH">
                <input type="submit" name="INSERT" value="INSERT">
                <input type="submit" name="UPDATE"value="UPDATE">
                <input type="submit" name="DELETE" value="DELETE">
            </form>


        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Pro Id</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Availability</th>
                        <th>Quantity</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>ModifiedBy</th>
                        <th>Adding Date</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
