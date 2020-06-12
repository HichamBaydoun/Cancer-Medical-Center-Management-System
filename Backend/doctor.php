<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Admin|Doctor</title>
  <style type="text/css">
    #apDiv14 {
      position: absolute;
      width: 148px;
      height: 32px;
      z-index: 6;
      left: 947px;
      top: 85px;
      font-family: courier, monospace;
      text-align: center;
      color: white;
      font-size: 20px;
    }

    #apDiv15 {
      position: absolute;
      width: 598px;
      height: 427px;
      z-index: 1;
      left: 380px;
      top: 315px;
      border: 3px solid red;
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
      z-index: 1;
      left: 390px;
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

  <script src="doctor_script.js"></script>
  <script src="Validate/doctor.js"></script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
  <div id="apDiv1">
    <?php include('admin_header.html'); ?>
  </div>
  <div id="apDiv15">
    <form action="insert_doct.php" method="post" enctype="multipart/form-data" name="doctor">
      <table width="595" border="0">
        <tr>
          <td width="276" height="43">
            <div align="right">Doctor name</div>
          </td>
          <td width="22">&nbsp;</td>
          <td width="283"><label for="dname"></label>
            <input type="text" name="dname" id="dname" required></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Email-ID</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="email"></label>
            <input type="text" name="email" id="email"></td>
        </tr>
        <tr>
          <td height="31">
            <div align="right">Password</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="pass"></label>
            <input type="password" name="pass" id="pass"></td>
        </tr>
        <tr>
          <td height="37">
            <div align="right">Phone Number</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="phone"></label>
            <input type="text" name="phone" id="phone"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Address</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="add"></label>
            <textarea name="add" id="add" cols="40" rows="4"></textarea>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Gender</div>
          </td>
          <td>&nbsp;</td>
          <td><input type="radio" name="gender" id="r1" value="M">
            <label for="radio">Male
              <input type="radio" name="gender" id="r2" value="F">
              Female</label></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Specility</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="textfield"></label>
            <div class="select-style"><select name="sp" size="1" id="sp">
                <option value="">Select Speciality</option>
                <?php
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
        <tr>
          <td height="39">
            <div align="right">Doctor Image</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="fileField"></label>
            <input type="file" name="image" id="image"><br><small style="color:white;">Only .jpg .gif .png</small></td>
        </tr>
        <tr>
          <td height="39" colspan="3">
            <div align="center">
              <input type="submit" name="button" id="button" value="Add" onClick="return validate()">
              <input type="reset" name="button" id="button2" value="Cancel">
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
      <font color=red><strong>
          <h2>Doctor's Registration</h2>
        </strong></font>
    </div>
  </div>
  <?php include('admin_header2.html'); ?>
  </div>
</body>

</html>