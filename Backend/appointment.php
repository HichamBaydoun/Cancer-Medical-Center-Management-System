<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Appointment Lists</title>
  <style type="text/css">
    #apDiv18 {
      position: absolute;
      width: 801px;
      height: 425px;
      z-index: 1;
      left: 145px;
      top: 242px;
      border: 3px solid black;
      background-color: gray;
      box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
      padding: 10px;
    }

    #apDiv18 tr td {
      background-color: white;
      border: 1px solid black;
      text-align: center;
    }

    #apDiv18 tr th {
      background-color: #202124;
      color: white;
      border: 1px solid black;
    }

    #myInput {
      background-image: url('Image/search.png');
      background-position: 10px 7px;
      background-repeat: no-repeat;
      width: 100%;
      font-size: 15px;
      padding: 12px 20px 12px 40px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
    }
  </style>

  <script src="Admin_script.js"></script>
  <script>
    function myFunction() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

</head>

<body vlink="#ffffff" onLoad="startTime()">
  <div id="apDiv1">
    <?php include('admin_header.html'); ?>
    <div id="apDiv18">
      <table width="806" height="39" cellpadding="10" cellspacing="2" id="myTable">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Appointment by No.." title="Type in a No">
        <tr>
          <th width="140">Appointment No.</th>
          <th width="160">Patient</th>
          <th width="160">Doctor</th>
          <th width="63">Date</th>
          <th width="66">Time</th>
        </tr>
        <tr>
          <?php
          include("connection.php");
          $querySelect = "SELECT app_no, patientID, p_name, doctorID, d_name, date, time FROM appointment";
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
              print "<td>" . $row[1] . " - " . $row[2] . "</td>";
              print "<td>" . $row[3] . " - " . $row[4] . "</td>";
              print "<td>" . $row[5] . "</td>";
              print "<td>" . $row[6] . "</td>";
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