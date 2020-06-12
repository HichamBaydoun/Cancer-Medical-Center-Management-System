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
      height: 328px;
      z-index: 12;
      left: 280px;
      top: 459px;
      border: 3px solid yellow;
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
      <form action="p_report_upload.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="472" border="0">
          <tr>
            <td colspan="3" width="208" height="34">
              <div align="center">
                <h2>Upload Report</h2>
                <hr>
              </div>
            </td>
          </tr>
          <tr>
            <td width="208" height="34">
              <div align="right">Patient Name</div>
            </td>
            <td width="23">&nbsp;</td>
            <td width="227"><label for="pid"></label>
              <label for="email"></label>
              <div class="select-style"><select name="pid" size="1" id="email">
                  <option value="None">Select Patient Name</option>
                  <?php
                  include("connection.php");
                  $uid = $_SESSION['id'];
                  $querySelect = "select patientID, p_name from patient";

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
            <td height="34">
              <div align="right">Date <small>(YYYY-MM-DD)</small></div>
            </td>
            <td>&nbsp;</td>
            <td><label for="date"></label>
              <input type="text" name="date" id="date" value="<?php print date("Y/m/d"); ?>" onFocus="blur()"></td>
          </tr>
          <tr>
            <td height="34">
              <div align="right">Time <small>(HH:MM:SS)</small></div>
            </td>
            <td>&nbsp;</td>
            <td><label for="time"></label>
              <input type="text" name="time" id="time" value="<?php date_default_timezone_set('Asia/Beirut');
                                                              print date("H:i:s"); ?>" onFocus="blur()"></td>
          </tr>
          <tr>
            <td height="50">
              <div align="right">Report File</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="reportfile"></label>
              <input type="file" name="reportfile" id="reportfile"></td>
          </tr>
          <tr>
            <td height="34" colspan="3">
              <div align="center">
                <input type="submit" name="button" id="button" value="Upload">
                <input type="reset" name="button2" id="button2" value="Cancel">
              </div>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</body>

</html>