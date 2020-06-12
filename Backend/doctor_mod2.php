<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Doctor Modify</title>
	<style type="text/css">
		#apDiv16 {
			position: absolute;
			width: 701px;
			height: 150px;
			background-color: #202124;
			z-index: 1;
			left: 350px;
			top: 304px;
			font-size: 25px;
			color: white;
			border: 3px solid #00FF00;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>

	<script src="doctor_script.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
	</div>
	<div id="apDiv16">
		<div align="center">
			<?php
			include("connection.php");
			$did = $_POST['did'];
			$dname = $_POST['dname'];
			$email = $_POST['email'];
			$address = $_POST['add'];
			$phone = $_POST['phone'];
			$password = $_POST['pass'];

			$query = "update doctor set d_name='$dname',d_phone='$phone',d_address='$address',d_password='$password',d_email='$email' where doctorID='$did'";

			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $query))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			if ($result) {
				print "<h2><strong>Doctor Updated successfully</strong></h2>";
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