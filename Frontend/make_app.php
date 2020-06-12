<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:patient.php");
}
?>
<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv16 {
			position: absolute;
			width: 597px;
			height: 274px;
			z-index: 11;
			left: 223px;
			top: 466px;
			border: 3px solid #00FF00;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv1 #apDiv16 form table tr th div {
			color: #000;
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 24px;
			color: white;
		}

		#apDiv1 #apDiv16 form table {
			font-family: Tahoma, Geneva, sans-serif;
		}

		#apDiv1 #apDiv16 form table tr td div {
			font-family: Tahoma, Geneva, sans-serif;
			color: white;
			font-weight: bold;
			font-size: 16px;
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
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('patient_header.php'); ?>
		<?php include('patient_header2.php'); ?>
		<div id="apDiv16">
			<form name="form1" method="post" action="confirm_app.php">
				<table width="596" border="0">
					<tr>
						<th height="47" colspan="3" style="font-size:20px; font-weight:bold;">
							<div align="center">Make Appointment</div>
							<hr />
						</th>
					</tr>

					<tr>
						<td width="258" height="43">
							<div align="right">Doctor Name</div>
						</td>
						<td width="29">&nbsp;</td>
						<td width="295"><label for="doctor"></label>
							<select name="doctor" size="1" id="doctor"">
          <option value="">Select Doctor</option>
          <?php
			include("connection.php");
			$querySelect = "select d_name, specialty, doctorID from doctor";
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
					$sid = $row[1];
					$querySelect1 = "select s_name from specialty where specialtyID='$sid'";
					if (!($result1 = mysqli_query($database, $querySelect1))) {
						print("<p>Could not execute query!</p>");
						die(mysqli_error() . "</body></html>");
					}
					$row1 = mysqli_fetch_row($result1);
					print "<option value='" . $row[2] . "'>" . $row[0] . " - " . $row1[0] . "</option>";
				}
			} else {
				print mysql_error();
			}
			?>
          </select></td>
      </tr>
      <tr>
        <td height=" 42">
								<div align="right">Select Day</div>
						</td>
						<td>&nbsp;</td>
						<td><label for="day1"></label>
							<div id="ajax1"><label for="days"></label>
								<input name="days" size="1" id="days" type="date"></input><small style="font-weight: normal;"> Monday till Fridays</small>
							</div>
							<div id="ajax2"></div>
						</td>
					</tr>
					<tr>
						<td height="53">
							<div align="right">Select time</div>
						</td>
						<td>&nbsp;</td>
						<td><label for="time"></label>
							<div id="time1"><label for="time"></label>
								<input name="time" size="1" id="input" type="time"></input><small style="font-weight: normal;"> 8:00 AM till 5:00 PM</small>
								</input><small style="font-weight: normal;">Appointments are 15 mins appart</small>
							</div>
							<div id="time2"></div>
						</td>
					</tr>
					<tr>
						<td height="35" colspan="3">
							<div align="center">
								<input type="submit" name="button" id="button" value="Confirm">
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