<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>DBMS BMRCL Project</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link rel="stylesheet" href="css/payment.css" type="text/css">
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
        <a class="nav-link" href="user_home.php">Smart Card Details</a></li>
      <li class="nav-item active">
        <a class="nav-link" href="payment.php"><strong>Payment Details</strong></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="complaint.php">Complaint</a>
      </li>
    </ul>
  </div>
  <div class="navbar-right margins">
    <a href="php/logout_user.php" class="btn btn-info btn-lg">Log out</a>
  </div>
</nav>
<section class="my-3"></section>
<form action="php/recharge.php" method="POST"> 
  <div class="container">
    <div class="col-md-10">
        <h5>Smart Card Number : <?php echo $_SESSION['Scard_no']; ?> </h5>
        <div class="col-md-12">
        <h5>Balance : <?php echo $_SESSION['balance']; ?> </h5>
    </div>
    </div>
<div class="col-md-3">
    <div class="form-group">
        <label><strong>Recharge Amount</strong></label>
        <input type="number" name="amount" class="form-control" placeholder="Please enter amount">
        <div class="help-block with-errors"></div>
    </div>
</div>
</div> 
    <div class="row">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-sm-5 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <span>CREDIT/DEBIT CARD PAYMENT</span> </div>
                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png">  </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 350px">
                        <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVC</label> <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" required> </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
                        <div class="form-group"> 
                        <input type="submit" name="submit" class="btn btn-success btn-send" value="Pay Now" style="font-size: .8rem;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</form>
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
<script type="text/javascript">
  $(function($) {
  $('[data-numeric]').payment('restrictNumeric');
  $('.cc-number').payment('formatCardNumber');
  $('.cc-exp').payment('formatCardExpiry');
  $('.cc-cvc').payment('formatCardCVC');
  $('form').submit(function(e) {
  e.preventDefault();
  var cardType = $.payment.cardType($('.cc-number').val());
  $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
  $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
  $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
  $('.validation').removeClass('text-danger text-success');
  $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
  });
  });
</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>