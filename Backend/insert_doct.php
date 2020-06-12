<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Admin|Doctor</title>
	<style type="text/css">
		#apDiv18 {
			position: absolute;
			width: 701px;
			height: 150px;
			background-color: #202124;
			z-index: 1;
			left: 348px;
			top: 304px;
			font-size: 25px;
			color: white;
			border: 3px solid #FF0000;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>

	<script src="doctor_script.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
	</div>
	<div id="apDiv18">
		<?php
		move_uploaded_file($_FILES['image']['tmp_name'], "../Frontend/imge/{$_FILES['image']['name']}");
		$imagef = "{$_FILES['image']['name']}";

		$query = "INSERT INTO doctor(d_email,d_name,d_password,d_phone,d_address,d_gender,specialty,d_image) VALUES('$_POST[email]','$_POST[dname]','$_POST[pass]','$_POST[phone]','$_POST[add]','$_POST[gender]','$_POST[sp]','$imagef')";
		if (!($database = mysqli_connect("localhost", "root", "")))
			die("Could not connect to database </body></html>");

		if (!mysqli_select_db($database, "daisy_medical_center"))
			die("Could not open database </body></html>");

		if (!($result = mysqli_query($database, $query))) {
			print("<p>Could not execute query!</p>");
			die(mysqli_error() . "</body></html>");
		}
		if ($result) {
			print "<strong><h2 align='center'>Doctor Registered Successfully!</h2></strong>";
		} else {
			print mysql_error();
		}

		$querySelect = "select doctorID from doctor where d_email ='$_POST[email]' ";
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
		$query1 = "INSERT INTO action_log_doctor(username, doctorID, action) VALUES('$aid', '$rowS[0]', 'Added')";
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