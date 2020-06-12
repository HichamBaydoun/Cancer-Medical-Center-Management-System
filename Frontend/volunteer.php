<html>

<head>
	<title>Feedback</title>
	<style>
		#apDiv7 {
			position: absolute;
			width: 300px;
			height: 300px;
			right: 650px;
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
			height: 590px;
			z-index: 8;
			right: 50px;
			top: 252px;
			font-size: 36px;
			border: 5px solid yellow;
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

		#button {
			margin-top: 10px;
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: #00FF00;
			border: 2px solid white;
			cursor: pointer;
		}

		#button2 {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: orange;
			border: 2px solid white;
			cursor: pointer;
		}
	</style>
	<script src="feedback_validate.js"></script>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('header.html'); ?>
		<?php include('footer.html'); ?>
		<div id="apDiv7">
			<div align="left">
				<p style="font-size:36px; height: 100px; color: #2e3196;">A Special Message to Our Volunteers</p>
				<hr color=yellow size="4px">
				<p style="font-size:18px; font-family:'Times New Roman', Times, serif; font-weight:600;color: black">
					Thank you so much for your volunteer work. May all your efforts be repaid to you in good fortune. Thank you
					for the wonderful job that you do, and for the making fun memories with our cancer patients.
					You inspire all of us to work even harder everyday.</p>
				<p style="font-size:18px; font-family:'Times New Roman', Times, serif; font-weight:600;color: black">By volunteering, you are helping our
					community by drawing a smile on patients' faces. You can volunteer by reading stories, playing video games, and doing fun activities for children with cancer.
				</p>

			</div>
		</div>
		<div id="apDiv3">
			<form name="feedback" method="post" action="f_comment.php">
				<table width="511" height="391" border="0">
					<tr>
						<td height="69">
							<div align="center">VOLUNTEER FORM</div>
							<hr>
						</td>
					</tr>
					<tr>
						<td>
							<p>Your Name:</p>
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
						<td>
							<p>Tell us about your self:</p>
							<p>
								<label for="comment"></label>
								<textarea name="comment" id="comment" cols="45" rows="6" placeholder="Comments here (Only 250 Characters)" required></textarea>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Tell us why would you like to volunteer:</p>
							<p>
								<label for="why"></label>
								<textarea name="why" id="why" cols="45" rows="6" placeholder="Comments here (Only 250 Characters)" required></textarea>
							</p>
						</td>
					</tr>
					<tr>
						<td>
							<div align="left">
								<input type="submit" name="Submit" id="button" value="Submit" onClick="return validate()">
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