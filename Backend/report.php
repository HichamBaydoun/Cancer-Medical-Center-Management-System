<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Patient|Report</title>
	<style type="text/css">
		#apDiv14 {
			position: absolute;
			width: 148px;
			height: 32px;
			z-index: 6;
			left: 947px;
			top: 85px;
			font-family: courier, monospace;
			text-align: center;
			color: white;
			font-size: 20px;
		}

		#apDiv15 {
			position: absolute;
			width: 427px;
			height: 230px;
			z-index: 1;
			left: 301px;
			top: 273px;
			background-color: #202124;
			border: 3px solid red;
		}

		#apDiv15 tr td {
			color: white;
			font-weight: normal;
		}

		#apDiv16 {
			position: absolute;
			width: 445px;
			height: 53px;
			z-index: 8;
			left: 303px;
			top: 230px;
			font-size: 24px;
			color: red;
			font-weight: bold;
		}

		#apDiv1 #apDiv15 form table {
			font-weight: bold;
		}

		#apDiv1 #apDiv16 div {
			font-weight: bold;
		}

		#button {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: #00FF00;
			border: 2px solid white;
		}

		#button2 {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: orange;
			border: 2px solid white;
		}
	</style>

	<script src="report_script.js"></script>
</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
		<div id="apDiv15">
			<form action="report_upload.php" method="post" enctype="multipart/form-data" name="form1">
				<table width="447" border="0">
					<tr>
						<td width="180" height="34">
							<div align="right">Patient ID</div>
						</td>
						<td width="8">&nbsp;</td>
						<td width="226"><label for="email"></label>
							<label for="email"></label>
							<select name="pid" size="1" id="pid">
								<option value="None">Select PatientID</option>
								<?php
								include("connection.php");
								$querySelect = "select * from patient";
								if (!($database = mysqli_connect("localhost", "root", "")))
									die("Could not connect to database </body></html>");

								if (!mysqli_select_db($database, "daisy_medical_center"))
									die("Could not open database </body></html>");

								if (!($result = mysqli_query($database, $querySelect))) {
									print("<p>Could not execute query!</p>");
									die(mysqli_error() . "</body></html>");
								}
								if ($result) {
									while ($row = mysqli_fetch_row($result)) {
										print "<option value='" . $row[0] . "'>" . $row[0] . " - " . $row[1] . "</option>";
									}
								} else {
									print mysql_error();
								}
								?>
							</select></td>
					</tr>
					<tr>
						<td width="180" height="34">
							<div align="right">Doctor ID</div>
						</td>
						<td width="8">&nbsp;</td>
						<td width="226"><label for="did"></label>
							<label for="=did"></label>
							<select name="did" size="1" id="pid">
								<option value="None">Select DoctorID</option>
								<?php
								include("connection.php");
								$querySelect = "select * from doctor";
								if (!($database = mysqli_connect("localhost", "root", "")))
									die("Could not connect to database </body></html>");

								if (!mysqli_select_db($database, "daisy_medical_center"))
									die("Could not open database </body></html>");

								if (!($result = mysqli_query($database, $querySelect))) {
									print("<p>Could not execute query!</p>");
									die(mysqli_error() . "</body></html>");
								}
								if ($result) {
									while ($row = mysqli_fetch_row($result)) {
										print "<option value='" . $row[0] . "'>" . $row[0] . " - " . $row[1] . "</option>";
									}
								} else {
									print mysql_error();
								}
								?>
							</select></td>
					</tr>
					<tr>
						<td height="34">
							<div align="right">Date <small>(YYYY-MM-DD)</small></div>
						</td>
						<td>&nbsp;</td>
						<td><label for="date"></label>
							<input type="text" name="date" id="date" value="<?php print date("Y/m/d"); ?>" onFocus="blur()"></td>
					</tr>
					<tr>
						<td height="34">
							<div align="right">Time <small>(HH:MM:MM)</small></div>
						</td>
						<td>&nbsp;</td>
						<td><label for="time"></label>
							<input type="text" name="time" id="time" value="<?php date_default_timezone_set('Asia/Calcutta');
																			print date("H:i:s"); ?>" onFocus="blur()"></td>
					</tr>
					<tr>
						<td height="34">
							<div align="right">Report File</div>
						</td>
						<td>&nbsp;</td>
						<td><label for="reportfile"></label>
							<input type="file" name="reportfile" id="reportfile"></td>
					</tr>
					<tr>
						<td height="34" colspan="3">
							<div align="center">
								<input type="submit" name="button" id="button" value="Upload">
								<input type="reset" name="button2" id="button2" value="Cancel">
							</div>
						</td>
						<td width="10">&nbsp;</td>
						<td width="10">&nbsp;</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="apDiv16">
			<div align="center">Upload Report</div>
		</div>
	</div>
	<div id="apDiv13" onMouseOver="show3()" onMouseOut="hide3()">
		<table width="156" height="71" border="0">
			<tr>
				<td width="131" height="31">
					<div align="left"><a href="profile.php">View Profile</a></div>
				</td>
			</tr>
			<tr>
				<td width="131" height="34">
					<div align="left"><a href="Ch_pass.php">Change Password</a></div>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>