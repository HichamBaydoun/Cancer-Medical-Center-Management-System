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
		#apDiv3 {
			position: absolute;
			width: 746px;
			height: 84px;
			z-index: 12;
			left: 169px;
			top: 497px;
			border: 3px solid #00FF00;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv3 tr td {
			background: #569C94;
			border: 1px solid #033;
			background: linear-gradient(#569C94 30%, #0F374A);
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			font-weight: bold;
			font-family: "Times New Roman", Times, serif;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv3 tr th {
			background: #0C0;
			border: 2px solid #033;
			background: linear-gradient(#0C0 30%, #030);
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
		}
	</style>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('doctor_header.php'); ?>
		<?php include('doctor_header2.php'); ?>
		<div id="apDiv3" align="center">
			<?php
			$did = $_SESSION['id'];
			$appno = $_GET['h1'];
			$query = "delete from appointment where app_no = '$appno' ";
			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $query))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			if ($query) {
				print "<h2><strong style='color: #00FF00;'>Appointment Canceled Successfully</strong></h2>";
			} else {
				print mysql_error();
			}
			?>
		</div>
	</div>
</body>

</html>