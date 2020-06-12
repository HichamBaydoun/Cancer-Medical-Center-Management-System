<style>
	body {
		height: 1400px;
		background-image: linear-gradient(white, grey, grey);
		font-family: Arial, Helvetica, sans-serif;
		margin: 0 auto;
		padding: 0px;
	}

	#apDiv1 {
		position: absolute;
		width: 1070px;
		height: 1297px;
		z-index: 1;
		left: 142px;
		top: 9px;
		color: #CCC;
		background-color: white;
		border: 5px solid #2e3196;
	}

	#apDiv2 {
		position: absolute;
		width: 1071px;
		height: 119px;
		z-index: 1;
		left: 0px;
		top: -1px;
		color: #D6D6D6;
		background-color: #FFFFFF;
	}

	#apDiv4 {
		position: absolute;
		width: 151px;
		height: 120px;
		z-index: 2;
		background-image: url(Image/logo.png);
		background-repeat: no-repeat;
	}

	#apDiv5 {
		position: absolute;
		width: 785px;
		height: 74px;
		z-index: 1;
		left: 157px;
		top: 27px;
		font-size: 45px;
		color: black;
		font-weight: bold;
	}

	#apDiv6 {
		position: absolute;
		width: 1071px;
		height: px;
		z-index: 3;
		top: 118px;
		background-color: #2e3196;
		font-weight: bold;
		color: #FFF;
		left: 0px;
	}

	a:link {
		text-decoration: none;
		color: white;
		font-weight: bold;
		font-size: 21px;
	}

	a {
		text-decoration: none;
		color: white;
		font-weight: bold;
		font-size: 21px;
	}

	#apDiv5 .patient {
		position: absolute;
		font-size: 15px;
		left: 635px;
	}
</style>
<div id="apDiv2">
	<div id="apDiv4"></div>
	<div id="apDiv5">
		<div align="left">Daisy Cancer Medical Center <img src="Image/ribbon.png" align="top"></div>
		<div align="left" class="patient">Patient</div>
	</div>
</div>
<div id="apDiv6">
	<table width="1071" height="54" border="0">
		<tr>
			<td width="145">
				<div align="center" id="ap6"><a>Hello Patient,
						<?php
						include("connection.php");
						$uid = $_SESSION['id'];
						$querySelect = "select p_name from patient where patientID= '$uid'";

						if (!($database = mysqli_connect("localhost", "root", "")))
							die("Could not connect to database </body></html>");

						if (!mysqli_select_db($database, "daisy_medical_center"))
							die("Could not open database </body></html>");

						if (!($result = mysqli_query($database, $querySelect))) {
							print("<p>Could not execute query!</p>");
							die(mysqli_error() . "</body></html>");
						}
						$row = mysqli_fetch_row($result);
						print "<font style='font-size:22px;'><strong>" . $row[0] . "</strong></font>";

						?>
					</a></div>
			</td>
		</tr>
	</table>
</div>
<?php include('footer.html'); ?>