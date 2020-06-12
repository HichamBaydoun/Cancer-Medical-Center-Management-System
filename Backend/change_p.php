<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Change Password</title>
	<style type="text/css">
		#apDiv16 {
			position: absolute;
			width: 601px;
			height: 50px;
			background-color: #202124;
			z-index: 1;
			left: 220px;
			top: 304px;
			font-size: 20px;
			color: white;
			border: 3px solid #00FF00;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding-bottom: 20px;
		}
	</style>
	<script src="Admin_script.js"></script>
</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
		<div id="apDiv16">
			<?php
			$a = $_POST['o_pass'];
			$b = $_POST['new_pass'];
			$c = $_POST['conf_pass'];
			$uid = $_SESSION['id'];
			$querySelect = "select password from admin where Username='$uid'";

			if (!($database = mysqli_connect("localhost", "root", "")))
				die("Could not connect to database </body></html>");

			if (!mysqli_select_db($database, "daisy_medical_center"))
				die("Could not open database </body></html>");

			if (!($result = mysqli_query($database, $querySelect))) {
				print("<p>Could not execute query!</p>");
				die(mysqli_error() . "</body></html>");
			}
			$row = mysqli_fetch_row($result);

			$flag = 0;

			if ($result) {
				if ($a == $row[0]) {
					$flag = 1;
				}
			}
			if ($flag == 1) {
				$query = "update admin set Password='$b' where Username='$uid'";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $query))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				print "<h2 align='center'><strong>Password changed successfully</strong></h2>";
			} else {
				print "<h2 align='center'><strong>Old password is incorrect</strong></h2>";
			}
			?>
		</div>
		<?php include('admin_header2.html'); ?>
</body>

</html>