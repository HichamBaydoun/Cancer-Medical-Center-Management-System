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
		#apDiv14 {
			position: absolute;
			width: 1069px;
			height: 133px;
			z-index: 7;
			left: 0px;
			top: 1131px;
			background-color: #FFFFFF;
		}

		#apDiv12 {
			position: absolute;
			width: 1019px;
			height: 891px;
			z-index: 10;
			left: 26px;
			top: 203px;
		}

		#apDiv13 {
			position: absolute;
			width: 321px;
			height: 51px;
			z-index: 4;
			left: 404px;
			top: 28px;
		}

		#apDiv15 {
			position: absolute;
			width: 225px;
			height: 225px;
			z-index: 5;
			left: 793px;
			top: 14px;
		}

		#apDiv16 {
			position: absolute;
			width: 557px;
			height: 379px;
			z-index: 11;
			left: 245px;
			top: 455px;
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

		#apDiv16 td a {
			color: black;
			font-weight: normal;
		}

		#apDiv16 .download {
			background-color: #00FF00;
			color: white;
			background-image: url('Image/download.png');
			background-position: 10px 7px;
			background-repeat: no-repeat;
		}

		#apDiv16 .download a:hover {
			cursor: pointer;
			background-color: yellow;
		}

		#apDiv16 .download:hover {
			cursor: pointer;
			background-color: yellow;
			background-image: url('Image/download2.png');
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
				td = tr[i].getElementsByTagName("td")[1];
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
				<table width="560" height="38" border="0" id="myTable">
					<input type="date" id="myInput" onkeyup="myFunction()" placeholder="Search Report by date.." title="Search Report by date..">
					<tr>
						<th height="44">Doctor</th>
						<th height="44">Date</th>
						<th height="44">time</th>
						<th height="44">Download Report</th>
					</tr>
					<tr>
						<?php
						include("connection.php");
						$uid = $_SESSION['id'];
						$querySelect = "select patientID, date, time, report_name, d_name from report, doctor where patientID='$uid' and report.doctorID = doctor.doctorID ";

						if (!($database = mysqli_connect("localhost", "root", "")))
							die("Could not connect to database </body></html>");

						if (!mysqli_select_db($database, "daisy_medical_center"))
							die("Could not open database </body></html>");

						if (!($result = mysqli_query($database, $querySelect))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						while ($row = mysqli_fetch_row($result)) {
							print "<tr height='39'>";
							print "<td>" . $row[4] . "</td>";
							print "<td>" . $row[1] . "</td>";
							print "<td>" . $row[2] . "</td>";
							print "<td class='download'>";
							print "<a href='../Backend/reportfile/" . $row[3] . "'>Download</a>";
							print "</td>";
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