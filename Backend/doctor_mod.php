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
    #apDiv15 {
      position: absolute;
      width: 838px;
      height: 425px;
      z-index: 1;
      left: 145px;
      top: 242px;
      border: 3px solid black;
      background-color: gray;
      box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
      padding: 10px;
    }

    #apDiv15 tr td {
      background-color: white;
      border: 1px solid black;
      text-align: center;
    }

    #apDiv15 tr th {
      background-color: #202124;
      color: white;
      border: 1px solid black;
    }

    #apDiv15 #edit {
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: #00FF00;
      border: 2px solid white;
    }

    #apDiv15 #delete {
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: red;
      border: 2px solid white;
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

  <script src="doctor_script.js"></script>
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
    <div id="apDiv15">
      <table width="840" height="39" cellpadding="10" cellspacing="2" id="myTable">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search Doctor by ID.." title="Type in a ID">
        <tr>
          <th width="150">Doctor ID</th>
          <th width="221">Doctor Name</th>
          <th width="143">Email-ID</th>
          <th width="168">Address</th>
          <th width="110">Phone No.</th>
          <th width="300" colspan="2" bgcolor="#CCCCCC">Modify</th>
        </tr>
        <tr>
          <?php
          include("connection.php");
          $querySelect = "SELECT doctorID, d_name, d_email, d_address, d_phone FROM doctor";
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
              $did = $row[0];
              print "<td align='center' id='edit'>";
              print "<a href='doctor_mod1.php?did=" . $did . "'>Edit</a>";
              print "</td>";
              print "<td align='center' id='delete'>";
              print "<a href='doc_delete.php?did=" . $did . "'>Delete</a>";
              print "</td>";
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