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
			height: 281px;
			z-index: 1;
			left: 301px;
			top: 273px;
			background: #f6f1d3;
			background: radial-gradient(#f6f1d3, #648880, #293f50);
			border: 2px solid #033;
			font-weight: bold;
		}

		#apDiv16 {
			position: absolute;
			width: 701px;
			height: 50px;
			background-color: #202124;
			z-index: 1;
			left: 220px;
			top: 304px;
			font-size: 25px;
			color: white;
			border: 3px solid #00FF00;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding-top: 20px;
		}

		#apDiv1 #apDiv15 form table {
			font-weight: bold;
		}

		#apDiv1 #apDiv16 div {
			font-weight: bold;
		}
	</style>

	<script src="report_script.js"></script>
</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
		<div id="apDiv16">
			<div align="center">
				<?php
				$pid = $_POST['pid'];
				$did = $_POST['did'];
				$date = $_POST['date'];
				$time = $_POST['time'];

				move_uploaded_file($_FILES['reportfile']['tmp_name'], "reportfile/{$_FILES['reportfile']['name']}");
				$docfile = "{$_FILES['reportfile']['name']}";

				$query = "insert into report(patientID, doctorID, date, time, report_name) values('$pid', '$did', '$date','$time','$docfile')";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $query))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				if ($result) {
					print "<b>Report Uploaded Successfully</b>&nbsp;";
				} else {
					print mysql_error();
				}
				?>
			</div>
		</div>
	</div>
	<?php include('admin_header2.html'); ?>
</body>

</html>