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
			width: 577px;
			height: 65px;
			z-index: 12;
			left: 233px;
			top: 466px;
			color: #000;
			font-size: 24px;
			font-weight: bold;
			border: 3px solid yellow;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding-top: 15px;
		}

		#apDiv1 #apDiv17 div {
			color: yellow;
			padding: 2px;
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
				include("connection.php");
				$did = $_SESSION['id'];
				$pid = $_POST['pid'];
				$date = $_POST['date'];
				$time = $_POST['time'];

				move_uploaded_file($_FILES['reportfile']['tmp_name'], "../Backend/reportfile/{$_FILES['reportfile']['name']}");
				$docfile = "{$_FILES['reportfile']['name']}";

				$queryInsert = "insert into report(patientID, doctorID, date, time, report_name) values('$pid','$did','$date','$time','$docfile')";

				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $queryInsert))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				if ($result)
					print "<b>Report Uploaded Successfully</b>;"
				?>
			</div>
		</div>
	</div>
</body>

</html>