
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Notice</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/notice.css">
	</head>
	<body>
		<div class="table">
			<h1>Notice</h1>
			<hr>
			<form method="POST">
				<input style="margin-top: 3px;width: 25%; margin-left: 10px;" type="text" name="subject" placeholder="Subject" value="">
				<input style="margin-top: 3px;width: 25%; margin-left: 180px;" type="text" name="noticeID" placeholder="Load Notice By ID">
        <input type="Submit" name="READ" value="READ"><br>
				<textarea style="margin-left: 11px;margin-top: 10px;" name="see" id="see" cols="40" rows="20" placeholder="Notice"></textarea>
				<table style="float: right;margin-right: 40px;" class="content-table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Subject</th>
						</tr>
					</thead>
					<tbody>
					</tbody>

				</table>
        <br><input type="submit" name="REFRESH" value="REFRESH">
			</form>

		</div>
	</body>
</html>
