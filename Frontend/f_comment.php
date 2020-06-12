<html>

<head>
	<title>Feedback</title>
	<style>
		#apDiv14 {
			position: absolute;
			width: 1069px;
			height: 133px;
			z-index: 7;
			left: 0px;
			top: 1063px;
			background-color: #FFFFFF;
		}

		#apDiv3 {
			position: absolute;
			width: 655px;
			height: 200px;
			z-index: 8;
			left: 218px;
			top: 306px;
			font-size: 36px;
			border: 5px solid yellow;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}
	</style>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('header.html'); ?>
		<div id="apDiv14">
			<div id="copyright">
				<div class="wrapper">
					<p align="center" style="color:#000;">Copyright &copy; 2015 - All Rights Reserved - <a href="#" style="color:#000;">AD Hospital</a></p>
					<p align="center" style="color:#000;">Powered By AD Hospital</p>
					<p align="center" style="color:#000;">Developed by - Divyanshu Sharma &amp; Adnan Arif - B.Sc (6th Semester)</p>
					<br class="clear" />
				</div>
			</div>
		</div>
		<div id="apDiv3" align="center">
			<?php
			include("connection.php");
			$name = $_POST['name'];
			$email = $_POST['email'];
			$com = $_POST['comment'];
			$why = $_POST['why'];

			$queryInsert = "insert into volunteer(v_name, v_email, v_comment, v_why) values('$name','$email','$com','$why')";
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
				print "<span><strong><h2><font style='color: yellow;'>Thank you for the help!</font></h2></strong></span>";
				print "<span><p><font style='color: black; font-size: 27px;'>We will contact you soon via Email for further details</font></p></span>";
			} else {
				print mysql_error();
			}
			?>
		</div>
	</div>
</body>

</html>