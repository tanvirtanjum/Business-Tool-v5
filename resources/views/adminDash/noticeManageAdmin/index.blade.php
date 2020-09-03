

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notice</title>
    <link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
    <link rel="stylesheet" type="text/css" href="../assets/styles/notice.css">
</head>
<body>
    <div class="table">
        <h1>Notice Manage</h1>
        <hr>
        <form method="POST">
            <input style="margin-top: 3px;width: 20%;" type="text" name="noteSub" placeholder="Enter Notice Subject" value="">
            <input type="hidden" name="unoteID" value="">
            <input style="width: 15%;" type="submit" name="SEND" value="SEND">
            <input style="margin-top: 3px;width: 20%;margin-left: 180px;" type="text" name="noticeID" placeholder="Load Notice By ID">
            <input style="width: 15%;" type="submit" name="LOAD" value="LOAD">
            <p>Your Notice</p>
            <textarea style="margin-top: 10px;" name="noticetext" id="notice" placeholder="write your notice here" cols="42" rows="20"></textarea>
            <table style="float: right;" class="content-table">
                <thead>
                    <th>Notice Id</th>
                    <th>Subject</th>
                </thead>
                <tbody>
                </tbody>
            </table>
            <input type="submit" name="REFRESH" value="REFRESH"><br>
            <input type="submit" name="UPDATE" value="UPDATE">
            <input type="submit" name="DELETE" value="DELETE">
        </form>
    </div>
</body>
</html>>
