<?php
session_start();
if (!$_SESSION['id']) {
  header("Location:index.html");
}
?>
<html>

<head>
  <title>Change Password</title>
  <style type="text/css">
    #apDiv15 {
      position: absolute;
      width: 424px;
      height: 211px;
      z-index: 1;
      left: 335px;
      top: 334px;
      font-weight: bold;
      background-color: #202124;
      border: 3px solid blue;
      padding: 10px;
    }

    #apDiv15 table tr td {
      color: white;
    }

    #form1 tr input[type="password"] {
      width: 215px;
      padding: 5px 8px;
      font-size: 18px;
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

    #form1 input[type="submit"] {
      padding: 5 10 5 10;
      font-weight: bold;
      background-color: blue;
      border: 2px solid white;
      color: white;
    }

    #form1 input[type="password"]:focus {
      -webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.0);
      -moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.0);
      box-shadow: 0 0 12px rgba(51, 204, 255, 1.0);
    }

    #form1 input[type="password"]:focus {
      -moz-animation-name: pulse;
      -moz-animation-duration: 1.5s;
      -moz-animation-iteration-count: infinite;
      -moz-animation-timing-function: ease-in-out;
    }
  </style>
  <script src="Admin_script.js"></script>
</head>

<body vlink="#ffffff" onLoad="startTime()">
  <div id="apDiv1">
    <?php include('admin_header.html'); ?>
    <div id="apDiv15">
      <form id="form1" name="f1" method="post" action="change_p.php">
        <table width="426" height="186" border="0">
          <tr>
            <td width="213" height="44">
              <div align="right"><b>Enter Current Password</b></div>
            </td>
            <td width="13">&nbsp;</td>
            <td width="186"><label for="textfield"></label>
              <input type="password" name="o_pass" id="textfield"></td>
          </tr>
          <tr>
            <td height="44">
              <div align="right"><b>Enter New Password</b></div>
            </td>
            <td>&nbsp;</td>
            <td><label for="textfield2"></label>
              <input type="password" name="new_pass" id="textfield2"></td>
          </tr>
          <tr>
            <td height="44">
              <div align="right"><b>Re-enter New Password</b></div>
            </td>
            <td>&nbsp;</td>
            <td><label for="textfield3"></label>
              <input type="password" name="conf_pass" id="textfield3"></td>
          </tr>
          <tr>
            <td height="44" colspan="3">
              <div align="center">
                <input type="submit" name="button" id="button" value="Change Password" onClick="return(validate())">
              </div>
            </td>
          </tr>
        </table>
      </form>
    </div>
  </div>
  <?php include('admin_header2.html'); ?>
</body>

</html>