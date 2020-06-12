<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Admin|Profile</title>
  <style type="text/css">
    #apDiv16 {
      position: absolute;
      width: 801px;
      height: 100px;
      z-index: 1;
      left: 145px;
      top: 342px;
      border: 3px solid black;
      background-color: gray;
      box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
      padding: 10px;
    }

    #apDiv16 tr td {
      background-color: white;
      border: 1px solid black;
      text-align: center;
    }

    #apDiv16 tr th {
      background-color: #202124;
      color: white;
      border: 1px solid black;
    }
  </style>
  <script src="profile_script.js"></script>
</head>

<body vlink="#ffffff" onLoad="startTime()">
  <div id="apDiv1">
    <?php include('admin_header.html'); ?>
    <div id="apDiv16">
      <table width="792" height="39" cellpadding="10" cellspacing="2">
        <tr>
          <th>Username</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Address</th>
          <th>Phone No.</th>
          <th>Email</th>
        </tr>
        <tr>
          <?php
          include("connection.php");
          $querySelect = "SELECT username, a_name, a_gender, a_address, a_phone, a_email FROM admin";
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
              print "<tr>";
              print "<td>" . $row[0] . "</td>";
              print "<td>" . $row[1] . "</td>";
              print "<td>" . $row[2] . "</td>";
              print "<td>" . $row[3] . "</td>";
              print "<td>" . $row[4] . "</td>";
              print "<td>" . $row[5] . "</td>";
              print "</tr>";
            }
          }
          ?>
        </tr>
      </table>
    </div>
  </div>
  <div id="apDiv13" onMouseOver="show3()" onMouseOut="hide3()">
    <table width="156" height="71" border="0">
      <tr>
        <td width="131" height="31">
          <div align="left"><a href="profile.php">View Profile</a></div>
        </td>
      </tr>
      <tr>
        <td width="131" height="34">
          <div align="left"><a href="Ch_pass.php">Change Password</a></div>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>