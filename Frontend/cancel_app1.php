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
			width: 667px;
			height: 71px;
			z-index: 12;
			left: 222px;
			top: 504px;
			border: 3px solid red;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv16 tr td {
			background: #46FFF8;
			background: linear-gradient(to right, #46FFF8 20%, #569C94);
			font-weight: bold;
			border: 1px solid #300;
			border-radius: 10px;
			font-family: "Times New Roman", Times, serif;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv16 tr th {
			background: #569C94;
			background: linear-gradient(to right, #569C94 30%, #0F374A);
			font-weight: bold;
			border: 2px solid #300;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('patient_header.php'); ?>
		<div id="apDiv14">
			<div id="copyright">
				<div class="wrapper">
					<p align="center" style="color:#000; font-size:18px;">Copyright &copy; 2015 - All Rights Reserved - <a href="#" style="color:#000; font-size:18px;">AD Hospital</a></p>
					<p align="center" style="color:#000; font-size:18px;">Powered By AD Hospital</p>
					<p align="center" style="color:#000; font-size:18px;">Developed by Divyanshu Sharma &amp; Adnan Arif - B.Sc (6th Semester)</p>
					<br class="clear" />
				</div>
			</div>
		</div>
		<?php include('patient_header2.php'); ?>
		<div id="apDiv16" align="center">
			<?php
			include("connection.php");
			$appno = $_POST['app_no'];
			$query = "delete from appointment where app_no='$appno'";
			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $query))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			if ($result) {
				print "<h2><strong style='color:white;'>Appointment Canceled Successfully</strong></h2>";
			} else {
				print mysql_error();
			}
			?>
		</div>
	</div>
</body>

</html>