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
			width: 620px;
			height: 97px;
			z-index: 12;
			left: 190px;
			top: 493px;
			font-size: 23px;
			padding-left: 40px;
			color: yellow;
			border: 5px solid yellow;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('doctor_header.php'); ?>
		<?php include('doctor_header2.php'); ?>
		<div id="apDiv17">
			<?php
			include("connection.php");
			$h_id = $_GET['hid'];
			$querySelect = "delete from patient_history where historyID='$h_id'";

			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $querySelect))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			if ($result) {
				print "<h2><strong>Patient history deleted successfully</strong></h2>";
			} else {
				print mysql_error();
			}
			?>
		</div>
	</div>
</body>

</html>