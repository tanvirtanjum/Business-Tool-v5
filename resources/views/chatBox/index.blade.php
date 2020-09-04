
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Chat Box</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles/common.css">
		<link rel="stylesheet" type="text/css" href="../assets/styles/chatBox.css">
	</head>
	<body>
		<form method="POST">
			<div class="table">
				<h1>ChatBox</h1>
				<input checked="chechked" id="tab1" type="radio" name="history">
				<input id="tab2" type="radio" name="history">
				<nav>
					<ul>
						<li class="tab1"><label for="tab1">Inbox</label></li>
						<li class="tab2"><label for="tab2">Send Message</label></li>
					</ul>
				</nav>
				<section>
					<div class=tab1>

						<table style="" class="content-table">
							<caption>Unseen</caption>
							<thead>

								<tr>
									<th>Message ID</th>
									<th>Sender</th>
									<th>Subject</th>
									<th>Date</th>
								</tr>
							</thead>
              <tbody>
                
              </tbody>
							<table style="" class="content-table">
								<caption>Seen</caption>
								<thead>
									<tr>
										<th>Message ID</th>
										<th>Sender</th>
										<th>Subject</th>
										<th>Date</th>
									</tr>
								</thead>
                <tbody>
                
                </tbody>
							</table>
						</table>
						
						<p>Sender</p>
						<input style="margin-left:10px;margin-top: 3px;" type="text" placeholder="Sender" value="" readonly><br>
						<p>Subject</p>
						<input style="margin-left:10px;" type="text" placeholder="Subject" value="" readonly><br>


						<textarea style="margin-top: 5px;margin-left: 10px;" placeholder="Message Body" name="see" id="see" cols="42" rows="20" readonly></textarea><br>
						<input style="margin-top: 5px;margin-left: 10px;" type="submit" value="REFRESH" name="REFRESH">
					</div>
					<div class="tab2">
						<table style="" class="content-table">
							<thead>
								<tr>
									<th>Message ID</th>
									<th>Reciever</th>
									<th>Subject</th>
									<th>Date</th>
								</tr>
							</thead>
              <tbody>
                
              </tbody>
						</table>
						<p>Reciever</p>
						<input type="text" placeholder="Enter valid user Id" name="reciever" id=""><br>

						<p>Subject</p><input type="text" placeholder="Enter your message Subject" name="subject"><br>
						<textarea name="stext" id="" cols="42" rows="20" placeholder="Write your message here...."></textarea><br>
						<input style="margin-left: 7px;" type="submit" name="SEND" value="SEND">
					</div>
				</section>
			</div>
		</form>
	</body>
</html>
