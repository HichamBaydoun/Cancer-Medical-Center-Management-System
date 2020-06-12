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
    .select-style {
      border: 1px solid #ccc;
      width: 185px;
      border-radius: 3px;
      overflow: hidden;
      background: #fafafa no-repeat 90% 50%;
    }

    .select-style select {
      padding: 5px 8px;
      width: 100%;
      border: none;
      box-shadow: none;
      background: transparent;
      background-image: none;
      -webkit-appearance: none;
    }

    .select-style select:focus {
      outline: none;
    }

    #apDiv17 {
      position: absolute;
      width: 475px;
      height: 300px;
      z-index: 12;
      left: 280px;
      top: 459px;
      border: 3px solid red;
      background: #2e3196;
      box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
    }

    #apDiv1 #apDiv17 form table {
      color: white;
    }

    #apDiv1 #apDiv17 form table tr td div {
      color: white;
    }

    #apDiv1 #apDiv17 form table h2 {
      font-weight: bold;
    }

    #apDiv17 tr input[type="text"] {
      width: 185px;
      padding: 3px 6px;
      font-size: 16px;
      color: #666;
      border: none;
      background-image: -webkit-gradient(linear, » 0% 0%, 0% 12%, from(#999), to(#fff));
      background-image: -moz-linear-gradient(0% 12% » 90deg, #fff, #999);
      background-color: #fff;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      -o-border-radius: 4px;
      border-radius: 4px;
    }

    #apDiv17 tr input[type="text"]:focus {
      -webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      -moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
    }

    #apDiv17 tr input[type="text"]:focus {
      -moz-animation-name: pulse;
      -moz-animation-duration: 1.5s;
      -moz-animation-iteration-count: infinite;
      -moz-animation-timing-function: ease-in-out;
    }

    #button {
      margin-top: 10px;
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: #00FF00;
      border: 2px solid white;
      cursor: pointer;
    }

    #button2 {
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: orange;
      border: 2px solid white;
      cursor: pointer;
    }
  </style>
</head>

<body vlink="#FFFFFF">
  <div id="apDiv1">
    <?php include('doctor_header.php'); ?>
    <?php include('doctor_header2.php'); ?>
    <div id="apDiv17">
      <form name="form1" method="post" action="his_upload1.php">
        <table width="479" border="0">
          <tr>
            <td height="44" colspan="3">
              <div align="center" style="font-size:24px;">Upload Diagnosis</div>
              <hr>
            </td>
          </tr>
          <tr>
            <td width="215" height="39">
              <div align="right">Patient Name</div>
            </td>
            <td width="13">&nbsp;</td>
            <td width="237"><label for="patient"></label>
              <div class="select-style"><select name="patient" size="1" id="patient">
                  <option value="">Select Patient Name</option>
                  <?php
                  include("connection.php");
                  $uid = $_SESSION['id'];
                  $querySelect = "select patient.patientID, patient.p_name from patient,appointment where patient.patientID=appointment.patientID and appointment.doctorID='$uid' group by p_name";
                  if (!($database = mysqli_connect("localhost", "root", "")))
                    die("Could not connect to database </body></html>");

                  if (!mysqli_select_db($database, "daisy_medical_center"))
                    die("Could not open database </body></html>");

                  if (!($result = mysqli_query($database, $querySelect))) {
                    print("<p>Could not execute query!</p>");
                    die(mysqli_error() . "</body></html>");
                  }
                  while ($row = mysqli_fetch_row($result)) {
                    print "<option value='" . $row[0] . "'>" . $row[0] . " - " . $row[1] . "</option>";
                  }
                  ?>
                </select></div>
            </td>
          </tr>
          <tr>
            <td height="40">
              <div align="right">Date-</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="textfield"></label>
              <input type="text" name="date" id="date" value="<?php print date("Y/m/d"); ?>" onFocus="blur()"></td>
          </tr>
          <tr>
            <td height="36">
              <div align="right">Time-</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="textfield2"></label>
              <input type="text" name="time" id="time" value="<?php date_default_timezone_set('Asia/Beirut');
                                                              print date("H:i:s"); ?>" onFocus="blur()"></td>
          </tr>
          <tr>
            <td>
              <div align="right">Description</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="description"></label>
              <textarea name="description" cols="25" rows="3" id="description" placeholder="Enter patient diagnostic detail" required></textarea></td>
          </tr>
          <tr>
            <td colspan="3">
              <div align="center">
                <input type="submit" name="Submit" id="button" value="Upload">
                <input type="reset" name="button2" id="button2" value="Reset">
              </div>
            </td>

          </tr>
        </table>
      </form>
    </div>
  </div>
</body>

</html>