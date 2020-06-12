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
		#apDiv18 {
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

		#apDiv18 tr td {
			background-color: white;
			border: 1px solid black;
			text-align: center;
		}

		#apDiv18 tr th {
			background-color: #2e3196;
			color: white;
			border: 1px solid black;
		}
	</style>

</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('doctor_header.php'); ?>
		<?php include('doctor_header2.php'); ?>

		<div id="apDiv18">
			<form name="form1" method="post" action="">
				<table width="900" height="38" border="0">
					<tr>
						<th height="44">Doctor ID</th>
						<th height="44">Name</th>
						<th height="44">Specialty</th>
						<th height="44">Gender</th>
						<th height="44">Email</th>
						<th height="44">Address</th>
						<th height="44">Phone Number</th>
					</tr>
					<tr>
						<?php
						include("connection.php");
						$uid = $_SESSION['id'];
						$querySelect1 = "select specialty from doctor where doctorID='$uid'";

						if (!($database = mysqli_connect("localhost", "root", "")))
							die("Could not connect to database </body></html>");

						if (!mysqli_select_db($database, "daisy_medical_center"))
							die("Could not open database </body></html>");

						if (!($result1 = mysqli_query($database, $querySelect1))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						$row1 = mysqli_fetch_row($result1);
						$sid = $row1[0];

						$querySelect2 = "select s_name from specialty where specialtyID='$sid'";
						if (!($result2 = mysqli_query($database, $querySelect2))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						$row2 = mysqli_fetch_row($result2);

						$querySelect = "select doctorID, d_name, d_gender, d_email, d_address, d_phone from doctor where doctorID='$uid'";

						if (!($result = mysqli_query($database, $querySelect))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						while ($row = mysqli_fetch_row($result)) {
							print "<tr height='39'>";
							print "<td>" . $row[0] . "</td>";
							print "<td>" . $row[1] . "</td>";
							print "<td>" . $row2[0] . "</td>";
							print "<td>" . $row[2] . "</td>";
							print "<td>" . $row[3] . "</td>";
							print "<td>" . $row[4] . "</td>";
							print "<td>" . $row[5] . "</td>";
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