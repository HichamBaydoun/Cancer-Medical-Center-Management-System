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

		#apDiv16 {
			position: absolute;
			width: 433px;
			height: 54px;
			z-index: 11;
			left: 318px;
			top: 475px;
			border: 3px solid black;
			background: gray;
			border-radius: 30px;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
		}

		#apDiv1 #apDiv16 form table tr td select {
			width: 195px;
			padding: 2px 5px;
			font-size: 16px;
			color: #666;
			border: none;
			background-image: -webkit-gradient(linear, » 0% 0%, 0% 12%, from(#999), to(#fff));
			background-image: -moz-linear-gradient(0% 12% » 90deg, #fff, #999);
			background-color: #fff;
		}

		.search {
			padding: 5 10 5 10;
			font-weight: bold;
			background-color: yellow;
			border: 2px solid black;
			cursor: pointer;
		}

		.search:hover {
			background-color: #00FF00;
		}

		#apDiv17 {
			position: absolute;
			width: 792px;
			height: 400px;
			z-index: 12;
			left: 150px;
			top: 580px;
			border: 3px solid black;
			background-color: gray;
			box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
			padding: 10px;
			padding-right: 30px;
			overflow: hidden;
			overflow-y: scroll;
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
				<table width="451" height="47" border="0">
					<tr>
						<td width="159">
							<div align="right">
								<input type="submit" name="submit" id="submit" value="Search by Speciality" class="search">
							</div>
						</td>
						<td width="14">&nbsp;</td>
						<td width="237"><label for="doctor"></label>
							<div class="select-style"><select name="doctor" size="1" id="doctor">
									<option value="">Select Speciality</option>
									<?php
									include("connection.php");
									$querySelect = "select specialtyID, s_name from specialty";
									if (!($database = mysqli_connect("localhost", "root", "")))
										die("Could not connect to database </body></html>");

									if (!mysqli_select_db($database, "daisy_medical_center"))
										die("Could not open database </body></html>");

									if (!($result = mysqli_query($database, $querySelect))) {
										print("<p>Could not execute query!</p>");
										die(mysqli_error() . "</body></html>");
									}
									if ($result) {
										while ($row = mysqli_fetch_row($result)) {
											print "<option value='" . $row[0] . "'>" . $row[1] . "</option>";
										}
									} else {
										print mysql_error();
									}
									?>
								</select></div>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div id="apDiv17">
			<table width="792" height="39" cellpadding="1" cellspacing="1" id="myTable">

				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Doctor by name.." title="Type in a name">
				<th height="44">Doctor Name</th>
				<th height="44">Email</th>
				<th height="44">Phone Number</th>
				<th height="44">Gender</th>
				</tr>
				<tr>
					<?php
					include("connection.php");
					$s = $_POST['doctor'];
					$querySelect = "select d_name, d_email, d_phone, d_gender from doctor where specialty='$s'";
					if (!($database = mysqli_connect("localhost", "root", "")))
						die("Could not connect to database </body></html>");

					if (!mysqli_select_db($database, "daisy_medical_center"))
						die("Could not open database </body></html>");

					if (!($result = mysqli_query($database, $querySelect))) {
						print("<p>Could not execute query!</p>");
						die(mysqli_error() . "</body></html>");
					}
					if ($result) {
						while ($row = mysqli_fetch_row($result)) {
							print "<tr height='39'>";
							print "<td>" . $row[0] . "</td>";
							print "<td>" . $row[1] . "</td>";
							print "<td>" . $row[2] . "</td>";
							print "<td>" . $row[3] . "</td>";
							print "</tr>";
						}
					}
					?>
				</tr>
			</table>
		</div>
	</div>
</body>

</html>