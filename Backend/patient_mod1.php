<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Patient Modify</title>
  <style type="text/css">
    #apDiv15 {
      position: absolute;
      width: 598px;
      height: 427px;
      z-index: 1;
      left: 380px;
      top: 315px;
      border: 3px solid blue;
      box-shadow: 4px 4px 10px rgba(0, 0, 0, 1);
      background-color: #202124;
    }

    #apDiv15 tr td {
      color: white;
    }

    #apDiv16 {
      position: absolute;
      width: 597px;
      height: 52px;
      z-index: 7;
      left: 380px;
      top: 250px;
    }

    #button {
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: #00FF00;
      border: 2px solid white;
    }

    #button2 {
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: orange;
      border: 2px solid white;
    }
  </style>

  <script src="Patient_script.js"></script>
  <script src="Validate/patient.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
  <div id="apDiv1">
    <?php include('admin_header.html'); ?>
  </div>
  <div id="apDiv15">
    <form action="patient_mod2.php" method="post" enctype="multipart/form-data" name="patient">
      <table width="595" border="0">
        <tr>
          <td width="276" height="43">
            <div align="right"><strong>Patient Name</strong></div>
          </td>
          <td width="22">&nbsp;</td>
          <td width="283"><label for="doctor"></label>
            <input type="text" name="pname" id="textfield" required value="<?php
                                                                            $pid = $_GET['pid'];

                                                                            $query = "select * from patient where patientID='$pid'";
                                                                            if (!($database = mysqli_connect("localhost", "root", "")))
                                                                              die("Could not connect to database </body></html>");

                                                                            if (!mysqli_select_db($database, "daisy_medical_center"))
                                                                              die("Could not open database </body></html>");

                                                                            if (!($result = mysqli_query($database, $query))) {
                                                                              print("<p>Could not execute query!</p>");
                                                                              die(mysqli_error() . "</body></html>");
                                                                            }

                                                                            $row = mysqli_fetch_row($result);

                                                                            print $row[1];
                                                                            ?>"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Patient ID</strong></div>
          </td>
          <td></td>
          <td><label for="email"></label>
            <input type="text" name="pid" id="pid" required value="<?php print $row[0]; ?>" readonly> (read-only)</td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Email-ID</strong></div>
          </td>
          <td></td>
          <td><label for="email"></label>
            <input type="text" name="email" id="email" required value="<?php print $row[6]; ?>"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Password</strong></div>
          </td>
          <td>&nbsp;</td>
          <td width="283"><label for="doctor"></label>
            <input type="password" name="pass" id="doctor" required value="<?php print $row[7]; ?>"></td>

        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Age</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="age"></label>
            <input name="age" type="text" id="age" size="5" required value="<?php print $row[2]; ?>"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Phone Number</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="age"></label>
            <input type="text" name="phone" id="phone" required value="<?php print $row[5]; ?>"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Address</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="address"></label>
            <input name="add" cols="30" rows="3" id="texts" required value="<?php print $row[4]; ?>"></input></td>
        </tr>

        <tr>
          <td height="39" colspan="3">
            <div align="center">
              <input type="submit" name="submit" id="button" value="Update" onClick="validate()">
            </div>
          </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </form>
  </div>
  <div id="apDiv16">
    <div align="center">
      <font color="blue"><strong>
          <h2>Modify Patient</h2>
        </strong></font>
    </div>
  </div>
  <?php include('admin_header2.html'); ?>
  </div>
</body>

</html>