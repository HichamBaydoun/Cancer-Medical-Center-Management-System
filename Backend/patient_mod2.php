<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Patient Modify</title>
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
			width: 625px;
			height: 75px;
			z-index: 1;
			left: 255px;
			top: 293px;
			font-size: 25px;
			color: white;
			background-color: #202124;
			padding-bottom: 30px;
			border: 3px solid #00FF00;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv16 {
			position: absolute;
			width: 597px;
			height: 56px;
			z-index: 7;
			left: 258px;
			top: 239px;
		}

		#apDiv1 #apDiv15 form table tr td div strong {
			color: #000;
		}
	</style>

	<script src="Patient_script.js"></script>
	<script src="Validate/patient.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
		<div id="apDiv15">
			<div align="center">
				<?php
				include("connection.php");
				$pid = $_POST['pid'];
				$pname = $_POST['pname'];
				$email = $_POST['email'];
				$address = $_POST['add'];
				$phone = $_POST['phone'];
				$password = $_POST['pass'];
				$query = "update patient set p_name='$pname',p_phone='$phone',p_address='$address',p_password='$password', p_email='$email'  where patientID='$pid'";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $query))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				if ($result) {
					print "<h2><strong>Patient Updated Successfully</strong></h2>";
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