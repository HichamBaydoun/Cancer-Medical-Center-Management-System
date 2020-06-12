<html>

<head>
	<title>Donation</title>
	<style>
		#apDiv7 {
			position: absolute;
			width: 300px;
			height: 300px;
			left: 700px;
			top: 189px;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
		}

		#apDiv14 {
			position: absolute;
			width: 1069px;
			height: 133px;
			z-index: 7;
			left: 0px;
			top: 1063px;
			background-color: #FFFFFF;
		}

		#apDiv3 {
			position: absolute;
			width: 503px;
			height: 680px;
			z-index: 8;
			left: 50px;
			top: 252px;
			font-size: 36px;
			border: 5px solid #00FF00;
			background-color: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding-left: 30px;
			padding-right: 30px;
		}

		#apDiv3 tr input[type="text"] {
			width: 313px;
			padding: 3px 6px;
			font-size: 16px;
			color: #666;
			border: none;
			background-image: -webkit-gradient(linear, » 0% 0%, 0% 12%, from(#999), to(#fff));
			background-image: -moz-linear-gradient(0% 12% » 90deg, #fff, #999);
			background-color: #fff;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			-o-border-radius: 4px;
			border-radius: 4px;
		}

		#apDiv3 tr input[type="text"]:focus {
			-webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			-moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
		}

		#apDiv3 tr input[type="text"]:focus {
			-moz-animation-name: pulse;
			-moz-animation-duration: 1.5s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-timing-function: ease-in-out;
		}

		#apDiv3 tr textarea:focus {
			-webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			-moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
		}

		#apDiv3 tr textarea:focus {
			-moz-animation-name: pulse;
			-moz-animation-duration: 1.5s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-timing-function: ease-in-out;
		}

		#apDiv3 textarea {
			width: 313px;
			padding: 3px 6px;
			font-size: 16px;
			color: #666;
			border: none;
			background-image: -webkit-gradient(linear, » 0% 0%, 0% 12%, from(#999), to(#fff));
			background-image: -moz-linear-gradient(0% 12% » 90deg, #fff, #999);
			background-color: #fff;
			-webkit-border-radius: 4px;
			-moz-border-radius: 4px;
			-o-border-radius: 4px;
			border-radius: 4px;
		}

		#apDiv1 #apDiv3 form table tr td div {
			font-weight: bold;
			color: white;
		}

		#apDiv1 #apDiv3 form p {
			color: white;
		}

		table tr td .title {
			font-size: 20px;
		}

		#button {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: #00FF00;
			border: 2px solid white;
			cursor: pointer;
		}

		#button2 {
			margin-top: 10px;
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: orange;
			border: 2px solid white;
			cursor: pointer;
		}
	</style>

	<script src="donation_validate.js"></script>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('header.html'); ?>
		<?php include('footer.html'); ?>
		<div id="apDiv7">
			<div align="left">
				<p style="font-size:36px; height: 100px; color: #2e3196;">A Special Message to Our Supporters</p>
				<hr color="#00FF00" size="4px">
				<p style="font-size:18px; font-family:'Times New Roman', Times, serif; font-weight:600;color: black">
					Thank you for your generous gift to help cancer patients in their journey to recovery. We are thrilled to have your support.
					Through your donation we are are able fund our medical center and continue working towards helping patients fight Cancer.
					You truly make the difference for us, and we are extremely grateful!
				</p>
			</div>
			<tr>
				<td><img src="Image/card1.png"></td>
				<td><img src="Image/card2.png"></td>
			</tr>
		</div>
		<div id="apDiv3">
			<form name="feedback" method="post" action="donate2.php">
				<table width="511" height="391" border="0">
					<tr>
						<td height="69">
							<div align="center">DONATE FORM</div>
							<hr>
						</td>
					</tr>
					<tr>
						<td>
							<p>Your Full Name:</p>
							<p>
								<label for="name"></label>
								<input name="name" type="text" id="name" size="45" placeholder="Your Name (Required)" required>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Your Email-ID:</p>
							<p>
								<label for="email"></label>
								<input name="email" type="text" id="email" size="45" placeholder="Your Email-ID (Required)" required>
							</p>
						</td>
					</tr>
					<tr>
						<td height="34">
							<p>Date <small>(YYYY-MM-DD)</small>
								<p>
									<label for="date"></label>
									<input type="text" name="date" id="date" value="<?php print date("Y/m/d"); ?>" onFocus="blur()">
						</td>
					</tr>
					<tr>
						<td height="34">
							<p>Time <small>(HH:MM:SS)</small></p>
							<label for="time"></label>
							<input type="text" name="time" id="time" value="<?php date_default_timezone_set('Asia/Beirut');
																			print date("H:i:s"); ?>" onFocus="blur()">
						</td>
					</tr>
					<tr>
					<tr>
						<td>
							<hr />
							<div style="color: red; margin-top: 5px;" class="title">Credit Card Information:</div>
						</td>
					</tr>
					<tr>
						<td>
							<p>Name on Card:</p>
							<p>
								<label for="nameCard"></label>
								<input name="nameCard" type="text" id="nameCard" size="45" placeholder="Your name on card (Required)" required>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Card Number (front of the card):</p>
							<p>
								<label for="numberCard"></label>
								<input name="numberCard" type="number" id="numberCard" size="45" placeholder="Card Number (Required)" required>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Security Code (back of the card):</p>
							<p>
								<label for="code"></label>
								<input name="code" type="number" id="code" size="45" placeholder="3-digit code (Required)" max="999" required>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Donation Amount:</p>
							<p>
								<input type="number" id="quantity" name="amount" min="1" placeholder="Enter Amount"> $
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<div align="left">
								<input type="submit" name="Submit" id="button" value="Submit Donation" onClick="return validate()">
								<input type="reset" name="button2" id="button2" value="Reset">
							</div>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>