<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Doctor Modify</title>
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
      height: 310px;
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
  <script language="javascript">
    function validate() {
      var phoneno = /^\d{10}$/;
      if (!(d.match(phoneno))) {
        alert("Not a valid Phone Number");
        return false;
      }
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      if (f.match(mailformat)) {
        document.doctor.email.focus();
        return true;
      } else {
        alert("You have entered an invalid email address!");
        document.doctor.email.focus();
        return false;
      }
      if (document.patient.texts.value == "") {
        alert("Address Not Entered");
        document.patient.texts.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body vlink="#ffffff" onLoad="startTime()">
  <div id="apDiv1">
    <?php include('admin_header.html'); ?>
  </div>
  <div id="apDiv15">
    <form action="doctor_mod2.php" method="post" enctype="multipart/form-data" name="doctor">
      <table width="595" border="0">
        <tr>
          <td width="276" height="43">
            <div align="right"><strong>Doctor name</strong></div>
          </td>
          <td width="22">&nbsp;</td>
          <td width="283"><label for="dname"></label>
            <input type="text" name="dname" id="dname" required value="<?php
                                                                        include("connection.php");
                                                                        $did = $_GET['did'];
                                                                        $query = "select * from doctor where doctorID='$did'";
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
            <div align="right"><strong>Doctor ID</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="did"></label>
            <input type="text" name="did" id="did" value="<?php print $row[0]; ?> " readonly> (read-only)</td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Email-ID</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="email"></label>
            <input type="text" name="email" id="email" value="<?php print $row[5]; ?>"></td>
        </tr>
        <tr>
          <td height="37">
            <div align="right"><strong>Phone Number</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="phone"></label>
            <input type="text" name="phone" id="phone" value="<?php print $row[4]; ?>"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right">Password</div>
          </td>
          <td>&nbsp;</td>
          <td><label for="pass"></label>
            <input type="password" name="pass" id="pass" value="<?php print $row[7]; ?>"></td>
        </tr>
        <tr>
          <td height="39">
            <div align="right"><strong>Address</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><label for="add"></label>
            <input name="add" id="add" cols="40" rows="4" value="<?php print $row[3]; ?>"></input>
        </tr>
        <tr>
          <td height="39" colspan="3">
            <div align="center">
              <input type="submit" name="button" id="button" value="Update" onClick="return (validate())">
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
          <h2>Modify Doctor</h2>
        </strong></font>
    </div>
  </div>
  </div>
  <div id="apDiv13" onMouseOver="show3()" onMouseOut <?php include('admin_header2.html'); ?> </body> </html>