<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv7 {
			position: absolute;
			width: 700px;
			height: 300px;
			z-index: 4;
			left: 335px;
			top: 189px;
			border-bottom-left-radius: 5px;
			border-bottom-right-radius: 5px;
			border-top-left-radius: 5px;
			border-top-right-radius: 5px;
			background-image: url(img/patients-visitors.jpg);
		}

		#apDiv9 {
			position: absolute;
			width: 200px;
			height: 115px;
			z-index: 1;
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
			left: 0px;
			top: 1131px;
			background-color: #FFFFFF;
		}

		#apDiv8 {
			position: absolute;
			width: 191px;
			height: 235px;
			left: 2px;
			top: 16px;
			background-color: #2e3196;

		}

		#apDiv8 tr td {
			background-color: #2e3196;
		}

		#apDiv11 {
			position: absolute;
			width: 203px;
			height: 110px;
			left: 192px;
			top: 111px;
			visibility: hidden;
		}

		#apDiv11 tr td {
			background-color: #2e3196;
		}

		#apDiv12 {
			position: absolute;
			width: 1019px;
			height: 891px;
			z-index: 10;
			left: 26px;
			top: 203px;
		}

		#apDiv15 {
			position: absolute;
			width: 225px;
			height: 225px;
			z-index: 5;
			left: 793px;
			top: 14px;
		}

		#apDiv8 div:hover a {
			display: block;
			background-color: red;
			border: 11px solid red;
		}

		#apDiv8 div:hover {
			background-color: red;
		}

		#apDiv11 div:hover {
			background-color: red;
		}

		#apDiv8 td {
			border-bottom: 1px solid white;
		}

		#apDiv8 .logout {
			border-bottom: 0px solid white;
			background-color: orange;
		}

		</
	</style>
	<script type="text/javascript">
		function show() {
			document.getElementById("apDiv11").style.visibility = "visible";
		}

		function hide() {
			document.getElementById("apDiv11").style.visibility = "hidden";
		}
	</script>
	<div id="apDiv12">
		<div id="apDiv15">
			<?php
			include("connection.php");
			$uid = $_SESSION['id'];
			$querySelect = "select p_image from patient where patientID= '$uid'";

			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $querySelect))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			$row = mysqli_fetch_row($result);
			// If no recored returned by the query
			if (!$row) die("Image does not exist!");
			$img = $row[0];
			print "<img src='imge/";
			print $img;
			print "' height='225px' width='225px'>";
			?>
		</div>
		<div id="apDiv8">
			<table width="191" height="235" border="0">
				<tr>
					<td width="195">
						<div align="center"><a href="patient_profile.php">Profile</a></div>
					</td>
				</tr>
				<tr>
					<td>
						<div align="center"><a href="doctor_src.php">Doctors</a></div>
					</td>
				</tr>
				<tr>
					<td onmouseover="show()" onMouseOut="hide()">
						<div align="center"><a href="#">Appointment</a></div>
					</td>
				</tr>
				<tr>
					<td>
						<div align="center"><a href="report_download.php"> Report</a></div>
					</td>
				</tr>
				<tr>
					<td class="logout">
						<div align="center"><a href="p_logout.php">Logout</a></div>
					</td>
				</tr>
			</table>
		</div>
		<div id="apDiv11" onMouseOver="show()" onMouseOut="hide()">
			<table width="250" height="110" border="0">
				<tr>
					<td>
						<div align="center"><a href="make_app.php">Make Appointment</a></div>
					</td>
				</tr>
				<tr>
					<td>
						<div align="center"><a href="view_app.php">View Appointment</a></div>
					</td>
				</tr>
				<tr>
					<td>
						<div align="center"><a href="cancel_app.php">Cancel Appointment</a></div>
					</td>
				</tr>
			</table>
		</div>
	</div>