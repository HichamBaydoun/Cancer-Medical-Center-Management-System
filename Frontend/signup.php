<html>

<head>
  <title>Hospital Management System</title>
  <style>
    #apDiv9 {
      position: absolute;
      width: 200px;
      height: 115px;
      z-index: 1;
    }

    #apDiv8 table tr td div {
      font-size: 18px;
      font-weight: bold;
      color: #000;
    }

    #apDiv14 {
      position: absolute;
      width: 1069px;
      height: 133px;
      z-index: 7;
      left: 0px;
      top: 1131px;
      background-color: #FFFFFF;
    }

    #apDiv7 {
      position: absolute;
      width: 606px;
      height: 585px;
      z-index: 8;
      left: 244px;
      top: 291px;
      border: 3px solid #033;
      background-color: #2e3196;
      border-radius: 7px;
      box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
    }

    #apDiv7 td {
      color: white;
      font-size: 16px;
    }

    .title div {
      font-size: 24px;
      font-weight: bold;
    }

    #apDiv7 tr input[type="text"] {
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

    #apDiv7 tr input[type="password"] {
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

    #apDiv7 tr input[type="text"]:focus {
      -webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      -moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
    }

    #apDiv7 tr input[type="text"]:focus {
      -moz-animation-name: pulse;
      -moz-animation-duration: 1.5s;
      -moz-animation-iteration-count: infinite;
      -moz-animation-timing-function: ease-in-out;
    }

    #apDiv7 tr input[type="password"]:focus {
      -webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      -moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
    }

    #apDiv7 tr input[type="password"]:focus {
      -moz-animation-name: pulse;
      -moz-animation-duration: 1.5s;
      -moz-animation-iteration-count: infinite;
      -moz-animation-timing-function: ease-in-out;
    }

    #apDiv7 tr textarea:focus {
      -webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      -moz-box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
      box-shadow: 0 0 12px rgba(51, 204, 255, 1.2);
    }

    #apDiv7 tr textarea:focus {
      -moz-animation-name: pulse;
      -moz-animation-duration: 1.5s;
      -moz-animation-iteration-count: infinite;
      -moz-animation-timing-function: ease-in-out;
    }

    #apDiv7 textarea {
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
  <script src="signup_script.js"></script>
</head>

<body vlink="#FFFFFF">
  <div id="apDiv1">
    <?php include('header.html'); ?>
    <?php include('footer.html'); ?>
    <div id="apDiv7">
      <form action="signup_com.php" method="post" enctype="multipart/form-data" name="signup" onSubmit="return(validate())">
        <table width="619" height="481" border="0">
          <tr>
            <td colspan="3" class="title">
              <div align="center">Patient Ragistration</div>
              <hr size="3px" color=gray>
            </td>
          </tr>
          <tr>
            <td width="294" height="39" align="center">
              <div align="right">Patient Name</div>
            </td>
            <td width="18">&nbsp;</td>
            <td width="293"><label for="pname"></label>
              <input type="text" name="pname" id="pname" required placeholder="Patient Name"></td>
          </tr>
          <tr>
            <td height="48" align="center">
              <div align="right">Email-ID</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="email"></label>
              <input type="text" name="email" id="email" placeholder="Email-ID"></td>
          </tr>
          <tr>
            <td height="48" align="center">
              <div align="right">Password</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="pass"></label>
              <input type="password" name="pass" id="pass" placeholder="Password"></td>
          </tr>
          <tr>
            <td height="48" align="center">
              <div align="right">Re-enter Password</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="repass"></label>
              <input type="password" name="repass" id="repass" placeholder="Re-enter Password"></td>
          </tr>
          <tr>
            <td height="45" align="center">
              <div align="right">Age</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="age"></label>
              <input name="age" type="text" id="age" size="5" placeholder="Age"></td>
          </tr>
          <tr>
            <td height="42" align="center">
              <div align="right">Phone Number</div>
            </td>
            <td>&nbsp;</td>
            <td><label for="phone"></label>
              <input type="text" name="phone" id="phone" placeholder="Phone Number"></td>
          </tr>
          <tr>
            <td height="34" align="center""><div align=" right">Gender
    </div>
    </td>
    <td>&nbsp;</td>
    <td><input type="radio" name="gender" id="radio" value="M">
      <label for="radio"></label>
      Male
      <input type="radio" name="gender" id="radio2" value="F">
      <label for="radio2"></label>
      Female</td>
    </tr>
    <tr>
      <td height="48" align="center">
        <div align="right">Address</div>
      </td>
      <td>&nbsp;</td>
      <td><label for="address"></label>
        <textarea name="add" id="address" cols="25" rows="3" placeholder="Enter Your Address"></textarea></td>
    </tr>
    <tr>
      <td height="48" align="center">
        <div align="right">Patient Image</div>
      </td>
      <td>&nbsp;</td>
      <td><label for="image"></label>
        <input type="file" name="image" size="40" id="image"><br><small>Must be less than 512kb. Only JPG PNG gif</small></td>
    </tr>
    <tr>
      <td colspan="3" height="48" align="center" style="font-size:18px; font-weight:bold;">
        <div align="center">
          <input type="submit" name="button" id="button" value="Sign Up">
          <input type="reset" name="button2" id="button2" value="Reset">
        </div>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    </table>
    </form>
  </div>
  </div>
</body>

</html>