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
		#apDiv17 {
			position: absolute;
			width: 800px;
			height: 362px;
			z-index: 12;
			left: 150px;
			top: 493px;
			border: 3px solid black;
			background-color: gray;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding: 10px;
		}

		#apDiv17 tr td {
			background-color: white;
			border: 1px solid black;
			text-align: center;
		}

		#apDiv17 tr th {
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
	<div id="apDiv1">
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
		<?php include('doctor_header.php'); ?>
		<?php include('doctor_header2.php'); ?>
		<div id="apDiv17">
			<table width="800" height="39" border="0" cellpadding="1" cellspacing="1" id="myTable">
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search History by Patient name or ID.." title="Type in a name">
				<tr>
					<th width="300" height="44">Patient</th>
					<th width="250" height="44">Doctor</th>
					<th width="300" height="44">Details</th>
					<th width="63" height="44">Date</th>
					<th width="66" height="44">Time</th>
				</tr>
				<tr>
					<?php
					$uid = $_SESSION['id'];
					$querySelect1 = "select patient_history.patientID ,p_name, patient_history.doctorID,d_name, details, date, time from patient_history, doctor, patient where patient_history.doctorID='$uid' and patient.patientID = patient_history.patientID and doctor.doctorID = patient_history.doctorID";


					if (!($database = mysqli_connect("localhost", "root", "")))
						die("Could not connect to database </body></html>");

					if (!mysqli_select_db($database, "daisy_medical_center"))
						die("Could not open database </body></html>");

					if (!($result1 = mysqli_query($database, $querySelect1))) {
						print("<p>Could not execute query!</p>");
						die(mysqli_error() . "</body></html>");
					}

					while ($row1 = mysqli_fetch_row($result1)) {

						print "<tr height='39'>";
						print "<td>" . $row1[0] . " - " . $row1[1] . "</td>";
						print "<td>" . $row1[2] . " - " . $row1[3] . "</td>";
						print "<td>" . $row1[4] . "</td>";
						print "<td>" . $row1[5] . "</td>";
						print "<td>" . $row1[6] . "</td>";
						print "</tr>";
					}
					?>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>