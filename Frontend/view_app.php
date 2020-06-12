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
			width: 792px;
			height: 450px;
			z-index: 12;
			left: 166px;
			top: 530px;
			border: 3px solid black;
			background-color: gray;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding: 10px;
			padding-right: 30px;
			overflow: hidden;
			overflow-y: scroll;
		}

		#apDiv16 tr td {
			background-color: white;
			border: 1px solid black;
			text-align: center;
		}

		#apDiv16 tr th {
			background-color: #2e3196;
			color: white;
			border: 1px solid black;
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
</head>

<body vlink="#FFFFFF">
	<script>
		function myFunction() {
			var input, filter, table, tr, td, i, txtValue;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("myTable");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
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
	<div id="apDiv1">
		<?php include('patient_header.php'); ?>
		<?php include('patient_header2.php'); ?>
		<div id="apDiv16">
			<form name="form1" method="post" action="">
				<table width="792" height="39" cellpadding="1" cellspacing="1" id="myTable">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Appointment by App no.." title="Type in a name">
					<tr>
						<th height="44">App NO.</th>
						<th height="44">Patient</th>
						<th height="44">Doctor</th>
						<th height="44">Date</th>
						<th height="44">Time</th>
					</tr>
					<tr>
						<?php
						include("connection.php");
						$uid = $_SESSION['id'];
						$querySelect = "select app_no, patientID, p_name, doctorID, d_name, date, time from appointment where patientID='$uid' ";
						if (!($database = mysqli_connect("localhost", "root", "")))
							die("Could not connect to database </body></html>");

						if (!mysqli_select_db($database, "daisy_medical_center"))
							die("Could not open database </body></html>");

						if (!($result = mysqli_query($database, $querySelect))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						while ($row = mysqli_fetch_row($result)) {
							$did = $row[3];
							$querySelect0 = "select specialty from doctor where doctorID='$did'";
							if (!($result0 = mysqli_query($database, $querySelect0))) {
								print("<p>Could not execute query!</p>");
								die(mysqli_error() . "</body></html>");
							}
							$row0 = mysqli_fetch_row($result0);
							$s_id = $row0[0];
							$querySelect1 = "select s_name from specialty where specialtyID='$s_id'";
							if (!($result1 = mysqli_query($database, $querySelect1))) {
								print("<p>Could not execute query!</p>");
								die(mysqli_error() . "</body></html>");
							}
							$row1 = mysqli_fetch_row($result1);
							print "<tr height='39'>";
							print "<td>" . $row[0] . "</td>";
							print "<td>" . $row[1] . " - " . $row[2] . "</td>";
							print "<td>" . $row[4] . " - " . $row1[0] . "</td>";
							print "<td>" . $row[5] . "</td>";
							print "<td>" . $row[6] . "</td>";
							print "</tr>";
						}
						?>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>

</html>