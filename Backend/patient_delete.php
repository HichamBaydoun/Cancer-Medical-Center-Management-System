<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Patient Delete</title>
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
			width: 701px;
			height: 150px;
			background-color: #202124;
			z-index: 1;
			left: 320px;
			top: 304px;
			font-size: 25px;
			color: white;
			border: 3px solid #0000FF;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>

	<script src="Admin_script.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
	</div>
	<div id="apDiv15" align="center">
		<?php
		$pid = $_GET['pid'];
		$query = "delete from patient where patientID='$pid'";
		if (!($database = mysqli_connect("localhost", "root", "")))
			die("Could not connect to database </body></html>");

		if (!mysqli_select_db($database, "daisy_medical_center"))
			die("Could not open database </body></html>");

		if (!($result = mysqli_query($database, $query))) {
			print("<p>Could not execute query!</p>");
			die(mysqli_error() . "</body></html>");
		}
		if ($result) {
			print "<h2 align='center'><strong>Patient Deleted Successfully!</strong></h2>";
		} else {
			print mysql_error();
		}
		$aid = $_SESSION['id'];
		$query1 = "INSERT INTO action_log_patient(username, patientID, action) VALUES('$aid', '$pid', 'Deleted')";
		if (!($database = mysqli_connect("localhost", "root", "")))
			die("Could not connect to database </body></html>");

		if (!mysqli_select_db($database, "daisy_medical_center"))
			die("Could not open database </body></html>");

		if (!($result1 = mysqli_query($database, $query1))) {
			print("<p>Could not execute query!</p>");
			die(mysqli_error() . "</body></html>");
		}
		?>
	</div>
	</div>
	<?php include('admin_header2.html'); ?>
</body>

</html>