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
			width: 700px;
			height: 65px;
			left: 233px;
			top: 466px;
			font-size: 23px;
			padding-left: 30px;
			padding-bottom: 20px;
			color: #00FF00;
			border: 5px solid #00FF00;
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
			<div align="center">
				<?php
				$did = $_SESSION['id'];
				$pid = $_POST['patient'];
				$detail = $_POST['description'];
				$date = $_POST['date'];
				$time = $_POST['time'];
				$queryInsert = "Insert into patient_history(patientID, doctorID, details, date, time) values('$pid','$did','$detail','$date','$time')";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $queryInsert))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				if ($result) {
					print "<h2><strong>Patient History Uploaded Successfully</strong></h2>";
				} else {
					print mysql_error();
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>