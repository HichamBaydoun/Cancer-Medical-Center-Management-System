<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv7 {
			position: absolute;
			width: 980px;
			height: 365px;
			left: 55px;
			top: 189px;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			background-image: url(Image/doctor.jpg);
		}

		#apDiv8 {
			position: absolute;
			width: 286px;
			height: 195px;
			left: 718px;
			top: 254px;
			background-color: #2e3196;
			float: right;
			border: 2px solid #033;
			box-shadow: 4px 4px 10px rgba(0, 0, 0, 1);
		}

		#apDiv9 {
			position: absolute;
			width: 200px;
			height: 115px;
			z-index: 1;
		}

		#apDiv8 table tr td div {
			font-size: 18px;
			font-weight: bold;
			color: white;
		}

		#apDiv10 {
			position: absolute;
			width: 998px;
			height: 573px;
			z-index: 6;
			left: 32px;
			top: 512px;
		}

		#apDiv1 #apDiv10 div {
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
			font-size: 36px;
			color: #000;
			font-weight: bold;
			text-align: justify;
		}

		#apDiv14 {
			position: absolute;
			width: 1069px;
			height: 133px;
			z-index: 7;
			left: 1px;
			top: 713px;
			background-color: #FFFFFF;
		}

		#apDiv8 tr input[type="text"] {
			width: 160px;
			padding: 2px 5px;
			font-size: 15px;
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

		#apDiv8 tr input[type="password"] {
			width: 160px;
			padding: 2px 5px;
			font-size: 15px;
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

		#apDiv8 tr input[type="text"]:focus {
			-webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			-moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
		}

		#apDiv8 tr input[type="text"]:focus {
			-moz-animation-name: pulse;
			-moz-animation-duration: 1.5s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-timing-function: ease-in-out;
		}

		#apDiv8 tr input[type="password"]:focus {
			-webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			-moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
		}

		#apDiv8 tr input[type="password"]:focus {
			-moz-animation-name: pulse;
			-moz-animation-duration: 1.5s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-timing-function: ease-in-out;
		}

		.login {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: #00FF00;
			border: 2px solid white;
			cursor: pointer;
		}
	</style>
	<script type="text/javascript">
		function validate() {
			var a = document.form1.email.value;
			var b = document.form1.pass.value;
			if (a == "") {
				alert("Email-id not entered");
				return false;
			}
			if (b == "") {
				alert("Password not entered");
				return false;
			}
			return true;
		}
	</script>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('header.html'); ?>
		<div id="apDiv7"></div>
		<div id="apDiv8">
			<table width="273" height="36" border="0">
				<tr>
					<td>
						<div align="center">Doctor Login</div>
						<hr>
					</td>
				</tr>
				<tr>
					<td>
						<div class="AccordionPanelContent">
							<form id="form1" name="form1" method="post" action="d_logincheck.php">
								<table width="270" border="0">
									<tr>
										<td width="102" height="40">
											<div align="right">Email-ID</div>
										</td>
										<td width="15">&nbsp;</td>
										<td width="139">
											<div align="left">
												<label for="textfield4"></label>
												<input type="text" name="email" id="textfield4" placeholder="Email-ID">
											</div>
										</td>
									</tr>
									<tr>
										<td height="34">
											<div align="right">Password</div>
										</td>
										<td>&nbsp;</td>
										<td>
											<div align="left">
												<label for="textfield5"></label>
												<input type="password" name="pass" id="textfield5" placeholder="Password">
											</div>
										</td>
									</tr>
									<tr>
										<td height="47" colspan="3">
											<div align="center">
												<input type="submit" name="button" id="button" value="Log in" onClick="return validate()" class="login">
											</div>
										</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td height="25" colspan="3">&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
								</table>
							</form>
						</div>
					</td>
				</tr>
			</table>
		</div>
		<?php include('footer.html'); ?>
	</div>
</body>

</html>