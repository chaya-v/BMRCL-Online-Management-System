<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  
  <style type="text/css">
    .demo-content{
          padding: 30px;
          font-size: 18px;
          text-align: center;
          min-height: 100px;
          background: #8eccc6;
          margin-bottom: 30px;
        }
        .demo-content.bg-alt{
          background: #abb1b8;
        }
        .bs-example{
          margin: 10px;
        }
        .form-horizontal .control-label{
          padding-top: 7px;
        }
        .btn{
          font-size: 16px;
        }
        .margins {
            margin-right: 15px;
            margin-top: 12px;
        }
        .top_padding {
            padding-top: 40px;
        }
        .img{
          padding: 50px;
        }

        .container{
        margin:100px;
        padding: 40px;
        border-radius: 5px;
        position: absolute;
        top: 5px;
        bottom: 0;
        left: 0;
        right: 0;
        width: 400px;
        height: 400px;
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
        <a class="nav-link" href="index.html">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="user_home.php"><strong>Smart Card</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="complaint.php">Complaint</a>
      </li>
      </ul>
      <div class="navbar-right margins">
        <a href="php/logout_user.php" class="btn btn-info btn-lg">Log out</a>
      </div>
  </div>
</nav>
<section class="my-3"></section>
<img src="images/userhome.jpg" alt="userimg" align="right" style="height: 450px;"> 
	<div class="container">
    <div class="col-md-12">
        <h4>Card Number : <?php echo $_SESSION['Scard_no']; ?> </h4>

    </div>

    <div class="col-md-12">
        <h4>Name : <?php echo $_SESSION['Fname']," ", $_SESSION['Lname'];?> </h4>
    </div>
    <div class="col-md-12">
        <h4>Card Status : <?php echo $_SESSION['card_status']; ?> </h4>
    </div>

    <div class="col-md-12">
        <h4>Balance : <?php echo $_SESSION['balance']; ?> </h4>
    </div>
    <div class = "top_padding">
    <form action="payment.php" method="POST">
        <div class="col-md-8">
            <input type="submit" name="submit" class="btn btn-success btn-send" value="Recharge">
        </div>
    </form>
</div>
</div>



<div style="margin-left: 9em; margin-right: 50em;">
    <p class="bg-success" style="margin-top: 20px;">
        <?php
        if(!empty($_SESSION['successfull']))
        {
            echo $_SESSION['successfull'];
            unset($_SESSION['successfull']);
        }

        ?>
    </p>
</div>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>
</html>