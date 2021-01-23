<?php

session_start();
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
        *{box-sizing: border-box;}

        body{
        background-image: url("images/login1.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        font-size: 16;
        background-position: center center;
        background-attachment: fixed;
      }

      .wrapper{
        background-color: rgba(0,0,0,0.5);
        margin:auto;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0 0 10px #000;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 500px;
        height: 430px;
      }
      .wrapper:before{
       width: 100%;
       height: 100%;
       -webkit-background-size:cover;
       background-size: cover;
       content: '';
       position: fixed;
       left: 0;
       right: 0;
       top: 0;
       bottom: 0;
       z-index: -1;
       display: block;
       filter: blur(3px);
      }
      .wrapper .header-input{
        font-size: 32px;
        font-weight: 600;
        padding-bottom: 30px;
        text-align: center;
      }
      .wrapper input[type=checkbox]{
        display: none;
      }

      .wrapper input{
        margin: 10px 0;
        border: none;
        padding: 10px;
        border-radius: 5px;
        width: 100%;
        font-size: 16px;
      }

      .wrapper label{
        position: relative;
        margin-left: 5px;
        margin-right: 10px;
        top: 5px;
        display: inline-block;
        width: 20px;
        height: 20px;
        cursor: pointer;
      }

      .wrapper label:before{
        content: '';
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 5px;
        position: absolute;
        left: 0;
        bottom: 1px;
        background-color: #ddd;
      }
      .wrapper input[type=checkbox]:checked + label:before{
        content: '\2713';
        font-size: 20px;
        color: #262626;
        text-align: center;
        line-height: 20px;
      }
      .wrapper span{
        font-size: 14px;
      }
      .wrapper button{
        background-color: #fb5a2f;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        padding: 10px;
        margin: 20px 0;
      }
      span a{
        color: #ddd;
      }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="contact_us.php">Contact Us</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.html">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="smart_cardrequest.php">Smart Card Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="travel_info.php">Travel Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fare.php">Fare</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stations.php">Stations</a>
      </li>
    </ul>
  </div>
</nav>

  <div class = "wrapper">
    <h3 style="text-align: center; color: white;"><strong>User Login</strong></h3>
   <form action="php/card_status.php" id="loginForm" method="POST">
    <input type="text" name="user_id" placeholder="Enter your ID">
    <input type="password" name="password" placeholder="Enter your password">
    <input type="checkbox" id="terms">
    <label for="terms"></label><span>Agree with <a href="#">Terms & Conditions</a></span>
    <button type="submit" name="submit" class="btn btn-primary">Login</button>
  </form>

  <p class="bg-danger">
        <?php

        if(!empty($_SESSION['error_message']))
        {
          echo $_SESSION['error_message'];
          unset($_SESSION['error_message']);
        }

        ?></p></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
</body>
</html>
