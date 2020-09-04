<!-- sidebar Included -->


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/customerOpt.css">
    <script src="../assets/js/printRecord.js"></script>
    <title>Recieved Order List</title>
</head>
<body>
  <div align="center" id="table" class="table">
      <table class="content-table">
        <thead>
            <tr>
                <th>Order#</th>
                <th>Date</th>
                <th>Paid Ammount</th>
                <th>Delivered By</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        
        </tbody>
    </table><hr>
    <input style="margin-top: 5px;float: left;" type="button" name="PRINT" id="PRINT" value="Print" onclick="savePDF()">
  </div>
</body>
</html>
