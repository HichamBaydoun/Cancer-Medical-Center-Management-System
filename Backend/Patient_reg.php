<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Patient Registration</title>
	<link rel="stylesheet" href="Style/Patient_style.css" />
	<style type="text/css">
		#apDiv18 {
			position: absolute;
			width: 701px;
			height: 150px;
			background-color: #202124;
			z-index: 1;
			left: 238px;
			top: 304px;
			font-size: 25px;
			color: white;
			border: 3px solid #0000FF;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>

	<script src="Patient_script.js"></script>
	<script src="Validate/patient.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
		<div id="apDiv18">
			<?php
			move_uploaded_file($_FILES['image']['tmp_name'], "../Frontend/imge/{$_FILES['image']['name']}");
			$imagef = "{$_FILES['image']['name']}";

			$query = "INSERT INTO patient(p_name,p_age,p_phone,p_email,p_address,p_gender,p_password,p_image) VALUES('$_POST[pname]','$_POST[age]','$_POST[phone]','$_POST[email]','$_POST[add]','$_POST[gender]','$_POST[pass]','$imagef')";
			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $query))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			if ($result) {
				print "<span><strong><h2 align='center'>Patient Registered Successfully!</h2></strong></span>";
			} else {
				print mysql_error();
			}

			$querySelect = "select patientID from patient where p_email ='$_POST[email]' ";
			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($resultS = mysqli_query($database, $querySelect))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			$rowS = mysqli_fetch_row($resultS);

			$aid = $_SESSION['id'];
			$query1 = "INSERT INTO action_log_patient(username, patientID, action) VALUES('$aid', '$rowS[0]', 'Added')";
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
</body>

</html>