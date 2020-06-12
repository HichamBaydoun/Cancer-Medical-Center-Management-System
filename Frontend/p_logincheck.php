<?php
include("connection.php");
$uid = $_POST['email'];
$pass = $_POST['pass'];

// Login user if not already logged-in
if (isset($_POST['email'])) {
	$querySelect = "SELECT p_email, p_password FROM patient WHERE p_email='{$_POST['email']}'";
	$querySelectID = "SELECT patientID FROM patient WHERE p_email='{$_POST['email']}'";

	if (!($database = mysqli_connect("localhost", "root", "")))
		die("Could not connect to database </body></html>");

	if (!mysqli_select_db($database, "daisy_medical_center"))
		die("Could not open database </body></html>");

	if (!($result = mysqli_query($database, $querySelect))) {
		print("<p>Could not execute query!</p>");
		die(mysqli_error() . "</body></html>");
	}
	if (!($resultID = mysqli_query($database, $querySelectID))) {
		print("<p>Could not execute query!</p>");
		die(mysqli_error() . "</body></html>");
	}

	mysqli_close($database);

	$flag = 0;

	$row = mysqli_fetch_row($result);
	// If no recored returned by the query
	if (!$row) die("User does not exist!");

	// If password does not match
	if ($_POST['pass'] !== $row[1]) die("Invalid email/password combination !");

	$rowID = mysqli_fetch_row($resultID);
	// If no recored returned by the query
	if (!$rowID) die("User does not exist!");

	$pid = $rowID[0];

	$flag = 1;

	if ($flag == 1) {
		session_start();
		$_SESSION['id'] = $pid;
		header("Location:patient_profile.php");
	} elseif ($flag == 0) {
		header("Location:login_inc.php");
	}
}
