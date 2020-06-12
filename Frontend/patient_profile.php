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
			width: 900px;
			height: 100px;
			left: 90px;
			top: 475px;
			border: 3px solid black;
			background-color: gray;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding: 10px;
		}

		#apDiv16 tr td {
			background-color: white;
			border: 1px solid black;
			text-align: center;
		}

		#apDiv16 tr th {
			background-color: #2e3196;
			color: white;
			border: 1px solid black;
		}
	</style>

</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('patient_header.php'); ?>
		<?php include('patient_header2.php'); ?>

		<div id="apDiv16">
			<form name="form1" method="post" action="">
				<table width="900" height="38" border="0">
					<tr>
						<th height="44">Patient ID</th>
						<th height="44">Name</th>
						<th height="44">Age</th>
						<th height="44">Gender</th>
						<th height="44">Email</th>
						<th height="44">Address</th>
						<th height="44">Phone Number</th>
					</tr>
					<tr>
						<?php
						include("connection.php");
						$uid = $_SESSION['id'];
						$querySelect = "select patientID, p_name, p_age, p_gender, p_email, p_address, p_phone from patient where patientID='$uid'";

						if (!($database = mysqli_connect("localhost", "root", "")))
							die("Could not connect to database </body></html>");

						if (!mysqli_select_db($database, "daisy_medical_center"))
							die("Could not open database </body></html>");

						if (!($result = mysqli_query($database, $querySelect))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						while ($row = mysqli_fetch_row($result)) {
							print "<tr height='39'>";
							print "<td>" . $row[0] . "</td>";
							print "<td>" . $row[1] . "</td>";
							print "<td>" . $row[2] . "</td>";
							print "<td>" . $row[3] . "</td>";
							print "<td>" . $row[4] . "</td>";
							print "<td>" . $row[5] . "</td>";
							print "<td>" . $row[6] . "</td>";
							print "</tr>";
						}
						mysqli_close($database);
						?>
					</tr>
				</table>
			</form>
		</div>

	</div>
</body>

</html>