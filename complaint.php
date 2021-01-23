<?php
include("php/connect.php");
$con = OpenCon();
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
      <li class="nav-item ">
        <a class="nav-link" href="user_home.php">Smart Card</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="complaint.php"><strong>Complaint</strong></a>
      </li>
      </ul>
      <div class="navbar-right margins">
        <a href="php/logout_user.php" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-log-out"></span> Log out
      	</a>
      </div>
  </div>
</nav>
<section class="my-3"></section>
 <h2 class="text-center">Complaint</h2>
 <div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form id="contact-form" method="post" action="php/send_complaint.php">
                <div class="messages"></div>
                <div class="controls">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" class="form-control" placeholder="Please enter the subject" required="required" data-error="Please enter subject">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Complaint Message </label>
                                <textarea name="message" class="form-control" placeholder="Type your complaint" rows="4" required="required"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" name="submit" class="btn btn-success btn-send" value="Send Complaint">
                        </div>
                    </div>
                </div>

            </form>

        </div>

    </div>
    <div style="margin-left: 13em; margin-right: 35em;">
        <p class="bg-success" style="margin-top: 20px;">
            <?php

            if(!empty($_SESSION['comp_sent']))
            {
                echo $_SESSION['comp_sent'];
                unset($_SESSION['comp_sent']);
            }

            ?>
        </p>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
</body>
</html>