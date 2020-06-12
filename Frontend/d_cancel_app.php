<?php
session_start();
if (!$_SESSION['id']) {
	header("Location:doctor.php");
}
?>
<html>

<head>
	<title>Hospital Management System</title>
	<style>
		#apDiv3 {
			position: absolute;
			width: 792px;
			height: 362px;
			z-index: 12;
			left: 166px;
			top: 459px;
			border: 3px solid black;
			background-color: gray;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding: 10px;
		}

		#apDiv3 tr td {
			background-color: white;
			border: 1px solid black;
			text-align: center;
		}

		#apDiv3 tr th {
			background-color: #2e3196;
			color: white;
			border: 1px solid black;
		}

		#apDiv3 .cancel {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: red;
			border: 2px solid white;
		}

		#myInput {
			background-image: url('Image/search.png');
			background-position: 10px 7px;
			background-repeat: no-repeat;
			width: 100%;
			font-size: 15px;
			padding: 12px 20px 12px 40px;
			border: 1px solid #ddd;
			margin-bottom: 12px;
		}
	</style>
	<script>
		function myFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[2];
				if (td) {
					txtValue = td.textContent || td.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}
			}
		}
	</script>
</head>

<body vlink="#FFFFFF">
	<div id="apDiv1">
		<?php include('doctor_header.php'); ?>
		<?php include('doctor_header2.php'); ?>
		<div id="apDiv3">
			<form name="form1" method="post" action="">
				<table width="792" height="51" cellpadding="1" cellspacing="1" id="myTable">
					<input type="date" id="myInput" onkeyup="myFunction()" placeholder="Search History by Patient name or ID.." title="Type in a name">
					<tr>
						<th height="44">Doctor</th>
						<th height="44">Patient</th>
						<th height="44">Date</th>
						<th height="44">Time</th>
						<th height="44">Cancel</th>
					</tr>
					<tr>
						<?php
						include("connection.php");
						$uid = $_SESSION['id'];
						$querySelect = "select doctorID, d_name,patientID, p_name, date, time, app_no from appointment where doctorID='$uid'";
						if (!($database = mysqli_connect("localhost", "root", "")))
							die("Could not connect to database </body></html>");

						if (!mysqli_select_db($database, "daisy_medical_center"))
							die("Could not open database </body></html>");

						if (!($result = mysqli_query($database, $querySelect))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						while ($row = mysqli_fetch_row($result)) {
							print "<form name='f1' method='post' action='d_cancel_app1.php'>";
							print "<tr height='39'>";
							print "<td>" . $row[0] . " - " . $row[1] . "</td>";
							print "<td>" . $row[2] . " - " . $row[3] . "</td>";
							print "<td>" . $row[4] . "</td>";
							print "<td>" . $row[5] . "</td>";
							print "<td align='center' class='cancel'>";
							print "<a href='d_cancel_app1.php?h1=" . $row[6] . "'>Cancel</a>";
							print "</td>";
							print "</tr>";
							print "</form>";
						}
						?>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>