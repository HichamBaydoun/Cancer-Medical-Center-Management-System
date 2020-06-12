<?php
$days = $_GET['q'];
include("connection.php");
print "<select name='days'  onChange='time1(this.value)'>";
$querySelect = "select * from docdays group by days";
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
		print "<option value='" . $row[1] . "'>";
		print $row[1];
		print "</option>";
	}
} else {
	print "<option value=''>";

	print "</option>";
}

print "</select>";
