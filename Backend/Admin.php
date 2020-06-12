<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:index.html");
}
?>
<html>

<head>
	<title>Admin|Home</title>
	<style type="text/css">
		#apDiv25 {
			position: absolute;
			width: 350px;
			height: 500px;
			right: 700px;
			top: 200px;
			background-image: url(../Frontend/Image/daisy2.png);
			background-repeat: no-repeat;
		}

		#apDiv15 {
			position: absolute;
			width: 501px;
			height: 150px;
			background-color: #202124;
			z-index: 1;
			left: 448px;
			top: 304px;
			font-size: 36px;
			color: white;
			border: 3px solid #00FF00;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv17 {
			margin-top: 10px;
		}
	</style>

	<script src="Admin_script.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
	<div id="apDiv1">
		<?php include('admin_header.html'); ?>
		<div id="apDiv25"></div>
		<div id="apDiv15">
			<div align="center">
				<div align="right"></div>
			</div>
			<div id="apDiv17">
				<?php
				$aid = $_SESSION['id'];
				$querySelect = "select username from admin where username='$aid'";

				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $querySelect))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				$row = mysqli_fetch_row($result);
				print '<div align="center">Welcome Admin: <p>' . $row[0] . '</p> </div>'
				?>
			</div>
		</div>
	</div>
	<div id="apDiv13" onMouseOver="show3()" onMouseOut="hide3()">
		<table width="140" height="71" border="0">
			<tr>
				<td width="120" height="31">
					<div align="left"><a href="profile.php">View Profile</a></div>
				</td>
			</tr>
			<tr>
				<td width="190" height="34">
					<div align="left"><a href="Ch_pass.php">Change Password</a></div>
				</td>
			</tr>
		</table>
	</div>
</body>

</html>