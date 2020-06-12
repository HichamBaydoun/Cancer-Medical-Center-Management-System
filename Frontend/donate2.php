<html>

<head>
  <title>Donation</title>
  <style>
    #apDiv3 {
      position: absolute;
      width: 655px;
      height: 200px;
      z-index: 8;
      left: 218px;
      top: 306px;
      font-size: 36px;
      border: 5px solid yellow;
      background: #2e3196;
      box-shadow: 6px 6px 20px rgba(0, 0, 0, 1);
    }

    #loader {
      position: absolute;
      left: 50%;
      top: 45%;
      z-index: 1;
      width: 170px;
      height: 170px;
      margin: -75px 0 0 -75px;
      border: 16px solid white;
      border-radius: 50%;
      border-top: 16px solid yellow;
      width: 140px;
      height: 140px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% {
        -webkit-transform: rotate(0deg);
      }

      100% {
        -webkit-transform: rotate(360deg);
      }
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /* Add animation to "page content" */
    .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 1s;
      animation-name: animatebottom;
      animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
      from {
        bottom: -100px;
        opacity: 0
      }

      to {
        bottom: 0px;
        opacity: 1
      }
    }

    @keyframes animatebottom {
      from {
        bottom: -100px;
        opacity: 0
      }

      to {
        bottom: 0;
        opacity: 1
      }
    }

    #myDiv {
      display: none;
      text-align: center;
    }
  </style>
  <script>
    var myVar;

    function myFunction() {
      myVar = setTimeout(showPage, 3500);
    }

    function showPage() {
      document.getElementById("loader").style.display = "none";
      document.getElementById("myDiv").style.display = "block";
    }
  </script>
</head>

<body vlink="#FFFFFF" onload="myFunction()">
  <div id="apDiv1">
    <?php include('header.html'); ?>
    <?php include('footer.html'); ?>

    <div id="apDiv3" align="center">
      <div id="loader"></div>
      <?php
      $name = $_POST['name'];
      $email = $_POST['email'];
      $cname = $_POST['nameCard'];
      $cnumber = $_POST['numberCard'];
      $amount = $_POST['amount'];
      $time = $_POST['time'];
      $date = $_POST['date'];

      $queryInsert = "insert into donation(fullName, email, cardName, cardNumber, amount, date, time) values('$name','$email','$cname','$cnumber','$amount','$date','$time')";
      if (!($database = mysqli_connect("localhost", "root", "")))
        die("Could not connect to database </body></html>");

      if (!mysqli_select_db($database, "daisy_medical_center"))
        die("Could not open database </body></html>");

      if (!($resultInsert = mysqli_query($database, $queryInsert))) {
        print("<p>Could not execute query!</p>");
        die(mysqli_error() . "</body></html>");
      }

      mysqli_close($database);

      if ($resultInsert) {
        print "<span><strong><h2><font style='color: yellow;' id='myDiv' class='animate-bottom'>Thank you very much for your Donation!</br><span><p><font style='color: black; font-size: 27px;'>... Transaction Successful ...</font></p></span></font></h2></strong></span>";
      } else {
        print mysql_error();
      }
      ?>
    </div>
  </div>
</body>

</html>