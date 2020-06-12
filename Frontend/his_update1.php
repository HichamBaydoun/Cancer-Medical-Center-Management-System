<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:doctor.php");
}
?>
<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv17 {
			position: absolute;
			width: 485px;
			height: 305px;
			z-index: 11;
			left: 276px;
			top: 453px;
			border: 4px solid orange;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv1 #apDiv17 form table tr th div {
			color: #000;
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 20px;
		}

		#apDiv1 #apDiv17 form table {
			font-family: Tahoma, Geneva, sans-serif;
		}

		#apDiv1 #apDiv17 form table tr td div {
			font-family: Tahoma, Geneva, sans-serif;
			color: white;
			font-weight: bold;
			font-size: 16px;
		}

		#apDiv17 tr input[type="text"] {
			width: 165px;
			padding: 2px 5px;
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

		#apDiv17 tr input[type="text"]:focus {
			-webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			-moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
		}

		#apDiv17 tr input[type="text"]:focus {
			-moz-animation-name: pulse;
			-moz-animation-duration: 1.5s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-timing-function: ease-in-out;
		}

		#apDiv17 tr textarea:focus {
			-webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			-moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
			box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
		}

		#apDiv17 tr textarea:focus {
			-moz-animation-name: pulse;
			-moz-animation-duration: 1.5s;
			-moz-animation-iteration-count: infinite;
			-moz-animation-timing-function: ease-in-out;
		}

		#apDiv17 textarea {
			width: 185px;
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

		#button {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: #00FF00;
			border: 2px solid white;
			margin-top: 10px;
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
		<?php include('doctor_header.php'); ?>
		<?php include('doctor_header2.php'); ?>
		<div id="apDiv17">
			<form name="form1" method="post" action="his_update2.php">
				<table width="479" border="0">
					<tr>
						<td height="44" colspan="3">
							<div align="center" style="font-size:24px;">Patient History Update</div>
							<hr>
						</td>
					</tr>
					<tr>
						<td width="215" height="39">
							<div align="right">Patient Name</div>
						</td>
						<td width="13">&nbsp;</td>
						<td width="237"><label for="textfield4"></label>
							<input type="text" name="patient" id="patient" value="<?php
																					$h_id = $_GET['hid'];
																					$querySelect = "select patient_history.patientID, p_name, details, historyID from patient, patient_history where historyID='$h_id' and patient_history.patientID = patient.patientID";
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
																							print $row[1];
																							$details = $row[2];
																						}
																					} else {
																						print mysql_error();
																					}

																					?>" onFocus="blur()"><input type="hidden" name="hid" value="<?php print $hid = $_GET['hid'];; ?>"> </td>
					</tr>
					<tr>
						<td height="40">
							<div align="right">Date-</div>
						</td>
						<td>&nbsp;</td>
						<td><label for="pname"></label>
							<input type="text" name="date" id="date" value="<?php print date("Y/m/d"); ?>" onFocus="blur()"></td>
					</tr>
					<tr>
						<td height="36">
							<div align="right">Time-</div>
						</td>
						<td>&nbsp;</td>
						<td><label for="textfield2"></label>
							<input type="text" name="time" id="time" value="<?php date_default_timezone_set('Asia/Calcutta');
																			print date("H:i:s"); ?>" onFocus="blur()"></td>
					</tr>
					<tr>
						<td>
							<div align="right">Description</div>
						</td>
						<td>&nbsp;</td>
						<td><label for="description"></label>
							<?php
							print '<textarea name="description" cols="25" rows="3" id="description" placeholder="Enter patient diagnostic detail" required>' . $details . '</textarea></td>'
							?>
					</tr>
					<tr>
						<td colspan="3">
							<div align="center">
								<input type="submit" name="Submit" id="button" value="Update">
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