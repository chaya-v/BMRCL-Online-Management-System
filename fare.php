<?php

include("php/connect.php");

$con = OpenCon();

?>

<!DOCTYPE html>
<html>
<head>
  <title>DBMS Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <style type="text/css">
    h2.headertekst {
    text-align: center;
   }
 .demo-content{
          
          font-size: 18px;
          text-align: center;
          background-color: rgba(0,0,0,0.25);
          margin:70px 30em 70px 25em;
          border-radius: 10px;
          width: 400px;
          height: 300px;
        }
        .demo-content.bg-alt{
          background: #abb1b8;
        }
         body{
        background-image: url("images/travel2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
      }
  </style>
</head>
<body >
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="contact_us.php">Contact Us</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="smart_cardrequest.php">Smart Card Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="travel_info.php">Travel Info</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="fare.php"><strong>Fare</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stations.php">Stations</a>
      </li>
    </ul>
  </div>
</nav>


<div class = "demo-content">
    <form class="form-horizontal" method="POST" action="php/fareresult.php">
      <div class="form-group">
        <label class="control-label col-xs-2" style="color: black;"><strong>From</strong></label>
        <div class="col-xs-10">
          <select name="from" class="form-control" id="sel1">
           <?php

            $sql = "SELECT station_name FROM `station`";
            $stations = mysqli_query($con, $sql);
            while ($rows = mysqli_fetch_assoc($stations)) {
              foreach ($rows as $key => $value) {
                echo "<option>".$value."</option>";
              }
            }
            ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-2" style="color: black;"><strong>To</strong></label>
        <div class="col-xs-10">
          <select name="to" class="form-control" id="sel1">
           <?php
            $sql = "SELECT station_name FROM `station`";
            $stations = mysqli_query($con, $sql);
            while ($rows = mysqli_fetch_assoc($stations)) {
              foreach ($rows as $key => $value) {
                echo "<option>".$value."</option>";
              }
            }
            ?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-offset-2 col-xs-12">
          <button type="submit" name="submit" class="btn btn-primary">Get Fare Estimate</button>
        </div>
      </div>
    </form>
    <p class="bg-danger">
      <?php
      if(!empty($_SESSION['error_station']))
      {
        echo $_SESSION['error_station'];
        unset($_SESSION['error_station']);
      }

      ?>
    </p>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>