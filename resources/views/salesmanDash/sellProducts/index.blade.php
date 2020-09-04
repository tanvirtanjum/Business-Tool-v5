<!-- sidebar Included -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles/Sellmanage.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
</head>
<body>
    <div class="box">
        <form method="POST" name="manage">
            <input style="width: 20%; margin-left: 580px;" id="search" type="text" name="SearchID" placeholder="Search By ID" value="">
            <input id="btnSearch"type="submit" value="Search" name="SEARCH">
            <p style="">Product ID</p>
            <input type="text" name="proId" placeholder="Enter Product Id" value="" readonly>
            <p>Product name</p>
            <input type="text" name="proName" placeholder="Enter Product Name" value="" readonly>
            <!-- <p>Type</p> -->
            <select id="proType" name="proType" hidden>
                <option value="" selected>--SELECT--</option>
                <option id="HDD/SSD" value="HDD/SSD" selected>HDD/SSD</option>
                <option id="Keyboard" value="Keyboard" selected>Keyboard</option>
                <option id="Laptop" value="Laptop" selected>Laptop</option>
                <option id="Mouse" value="Mouse" selected>Mouse</option>
                <option id="Printer" value="Printer" selected>Printer</option>
                <option id="Ram" value="Ram" selected>Ram</option>
                <option id="Scanner" value="Scanner" selected>Scanner</option>
                <option id="Software" value="Software" selected>Software</option>
                <option id="TV" value="TV" selected>TV</option>
            </select><br>
            <p>Quantity</p>
            <input type="number" name="proQuantity" placeholder="Enter Quantity" min='1' max="" ><br>
            <input type="number" name="preQuantity" placeholder="Enter Quantity"  value="" hidden>
            <input type="text" name="proBuyPrice" value=" " hidden>
            <p>Sell Price</p>
            <input type="number" name="proSellPrice" min='' placeholder="Price" value="">
            <p>Customer Name</p>
            <input type="text" name="customerName" placeholder="Customer Name" value="">
            <p>Customer Number</p>
            <input type="text" name="customerNo" placeholder="Customer Number" value=""><br>
            <!-- <p>Seller ID</p> -->
            <input type="text" name="sellerID" placeholder="Type ID" value="" readonly hidden>
            <!-- <p>Sell Date</p> -->
            <input type="text" name="SellDate" placeholder="Date" value="" readonly hidden>
            <input type="submit" name="refresh" value="Refresh">
            <input type="submit" name="SELL" id="SELL" value="Sell">
        </form>
        <div align="right" class="table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Prod. ID</th>
                        <th>Prod. Name</th>
                        <th>Type</th>
                        <th>Availability</th>
                        <th>Quantity</th>
                        <th>Buy Price</th>
                        <th>Sell Price</th>
                        <th>Mod_By</th>
                        <th>add_PDate</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
