<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Admin|Patient</title>
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
    <form action="patient_reg.php" method="post" enctype="multipart/form-data" name="patient">
      <table width="595" border="0">
        <tr>
          <td width="276" height="43">
            <div align="right">Patient Name</div>
          </td>
          <td width="22">&nbsp;</td>
          <td width="283"><label for="doctor"></label>
            <input type="text" name="pname" id="textfield" required></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Age</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="age"></label>
            <input name="age" type="text" id="age" size="5" required></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Phone Number</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="age"></label>
            <input type="text" name="phone" id="phone" required></td>
        </tr>

        <tr>
          <td height="39">
            <div align="right">Gender</div>
          </td>
          <td>&nbsp;</td>
          <td><input type="radio" name="gender" id="r1" value="M">
            <label for="gender">
              <font color=white>Male</font>
              <input type="radio" name="gender" id="r2" value="F">
              <font color=white>Female</font>
            </label></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Email-ID</div>
          </td>
          <td></td>
          <td><label for="email"></label>
            <input type="text" name="email" id="email" required></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Password</div>
          </td>
          <td>&nbsp;</td>
          <td width="283"><label for="doctor"></label>
            <input type="password" name="pass" id="pass" required></td>

        </tr>
        <tr>
          <td height="39">
            <div align="right">Address</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="address"></label>
            <textarea name="add" cols="30" rows="3" id="texts" required></textarea></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Patient Image</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="fileField"></label>
            <input type="file" name="image" id="image"><br><small style="color:white;">Only .jpg .gif .png</small></td>
        </tr>
        <tr>
          <td height="39" colspan="3">
            <div align="center">
              <input type="submit" name="submit" id="button" value="Add Patient" onClick="validate()">
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
      <font color="blue"><strong>
          <h2>Patient's Registration</h2>
        </strong></font>
    </div>
  </div>
  </div>
  <?php include('admin_header2.html'); ?>
</body>

</html>