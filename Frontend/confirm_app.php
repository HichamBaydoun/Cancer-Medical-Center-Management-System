<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:patient.php");
}
?>
<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv16 {
			position: absolute;
			width: 750px;
			height: 80px;
			z-index: 11;
			left: 183px;
			top: 481px;
			border: 5px solid orange;
			background: #2e3196;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			font-size: 25px;
			color: white;
			padding-top: 15px;
		}

		#apDiv1 #apDiv16 form table tr th div {
			color: #000;
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 24px;
		}

		#apDiv1 #apDiv16 form table {
			font-family: Tahoma, Geneva, sans-serif;
		}

		#apDiv1 #apDiv16 form table tr td div {
			font-family: Tahoma, Geneva, sans-serif;
			color: #000;
			font-weight: bold;
			font-size: 16px;
		}
	</style>
	<script type="text/javascript">
		function show() {
			document.getElementById("apDiv11").style.visibility = "visible";
		}

		function hide() {
			document.getElementById("apDiv11").style.visibility = "hidden";
		}
	</script>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('patient_header.php'); ?>
		<?php include('patient_header2.php'); ?>
		<div id="apDiv16">
			<div align="center">
				<?php
				include("connection.php");
				$pid = $_SESSION['id'];
				$did = $_POST['doctor'];
				$date = $_POST['days'];
				$time = $_POST['time'];

				$querySelect = "select * from appointment where date='$date' and time='$time'";
				$querySelect3 = "select p_name from patient where patientID='$pid'";
				$querySelect4 = "select d_name from doctor where doctorID='$did'";
				if (!($database = mysqli_connect("localhost", "root", "")))
					die("Could not connect to database </body></html>");

				if (!mysqli_select_db($database, "daisy_medical_center"))
					die("Could not open database </body></html>");

				if (!($result = mysqli_query($database, $querySelect))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				$row = mysqli_fetch_row($result);
				// If no recored returned by the query
				if ($row) {
					die("Appointment already exists! Select another one.");
				}
				if (!($result3 = mysqli_query($database, $querySelect3))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				if (!($result4 = mysqli_query($database, $querySelect4))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				$row3 = mysqli_fetch_row($result3);
				$row4 = mysqli_fetch_row($result4);
				$p_name = $row3[0];
				$d_name = $row4[0];
				$querySelect1 = "insert into appointment(patientID, doctorID, p_name, d_name, date, time) values('$pid','$did','$p_name','$d_name','$date','$time')";

				if (!($result1 = mysqli_query($database, $querySelect1))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				$querySelect5 = "select app_no from appointment where patientID ='$pid'and doctorID= '$did' and date='$date'and time = '$time'";

				if (!($result5 = mysqli_query($database, $querySelect5))) {
					print("<p>Could not execute query!</p>");
					die(mysqli_error() . "</body></html>");
				}
				$row5 = mysqli_fetch_row($result5);
				if ($result1) {
					print "<h3><font color='white'>Appointment registered - Your appointment no. is $row5[0]</font></h3>";
				} else {
					print mysql_error();
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>