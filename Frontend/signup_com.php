<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv14 {
			position: absolute;
			width: 1069px;
			height: 133px;
			z-index: 7;
			left: 0px;
			top: 1131px;
			background-color: #FFFFFF;
		}

		#apDiv7 {
			position: absolute;
			width: 700px;
			height: 130px;
			z-index: 8;
			left: 180px;
			top: 363px;
			border: 3px solid red;
			background-color: #2e3196;
			color: white;
			font-weight: bold;
			font-size: 25px;
			padding: 5px;
		}
	</style>
	<script src="signup_script.js"></script>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('header.html'); ?>
		<?php include('footer.html'); ?>
		<div id="apDiv7">
			<div align="center">
				<?php
				include("connection.php");
				$queryCheck = "SELECT p_email FROM patient WHERE p_email='{$_POST['email']}'";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $queryCheck))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}

				mysqli_close($database);

				$row = mysqli_fetch_row($result);
				// If record returned by the query
				if ($row) {
					die("Email already exists!");
				}

				move_uploaded_file($_FILES['image']['tmp_name'], "imge/{$_FILES['image']['name']}");
				$image = "{$_FILES['image']['name']}";
				$queryInsert = "INSERT INTO patient(p_name,p_age,p_phone,p_email,p_address,p_gender,p_password,p_image) 	VALUES('$_POST[pname]','$_POST[age]','$_POST[phone]','$_POST[email]','$_POST[add]','$_POST[gender]','$_POST[pass]','$image')";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($resultInsert = mysqli_query($database, $queryInsert))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}

				mysqli_close($database);

				if ($resultInsert) {
					print "<span><strong><h2><font style='color: white;'>Thank you for Registering with us!</font></h2></strong></span>";
				} else {
					print mysql_error();
				}

				?>
			</div>
		</div>
	</div>
</body>

</html>