<!DOCTYPE html>
<html>
<head>
	<title>DBMS Project</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <style type="text/css">
  	h2.headertekst {
  text-align: center;
	}
	.demo-content{
        	padding: 8px;
        	font-size: 18px;
        	min-height: 25px;
        	background: #DCEAE5;
        	margin-bottom: 10px;
        }
        .demo-content.bg-alt{
        	background: #abb1b8;
        }
        .bs-example{
        	margin: 100px;
        }
        .form-horizontal .control-label{
        	padding-top: 100px;
        }
        .padding {
        	padding-left: 15em;
        	padding-bottom: 10px;
        }
		img.two {
			  float:right;
			  height: 50%;
			  width: 50%;
		}
		body{
        background-image: url("images/sc2.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-attachment: fixed;
      }
  </style>

<script>
function myFunction() {
  alert("Your request has been sent successfully login to check the status");
}
</script>

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
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="smart_cardrequest.php"><strong>Smart Card Request</strong></a>
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
<section class="my-2"></section>
<h2 class="padding">Smart Card User Information</h2>

	<div class="container">
		
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<form id="contact-form" method="post" action="php/new_customer_request_card.php">
					<div class="controls">
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label><strong>First Name *</strong></label>
									<input type="text" name="Fname" class="form-control" placeholder="Please enter your First Name" required="required" data-error="First Name is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label><strong>Last Name</strong></label>
									<input type="text" name="Lname" class="form-control" placeholder="Please enter your Last Name" required="required" data-error="Last Name is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label><strong>Email *</strong></label>
									<input type="email" name="email" class="form-control" placeholder="Please enter your email" required="required" data-error="Enter a valid email.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label><strong>Phone *</strong></label>
									<input type="tel" name="phone" class="form-control" placeholder="Please enter your phone number">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">
								<div class="form-group">
									<label><strong>Username *</strong></label>
									<input type="text" name="user_id" class="form-control" placeholder="Please enter username" required="required" data-error="Valid username is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label><strong>Password *</strong></label>
									<input type="password" name="password" class="form-control" placeholder="Please enter password" required="required" data-error="Enter valid password">
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<div class="form-group">
									<label><strong>Address *</strong></label>
									<textarea name="address" class="form-control" placeholder="Smart Card will be delivered to this address" rows="2" required="required" data-error="Please enter your address"></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col-md-6">
								<input type="submit" name="submit" class="btn btn-success btn-send" value="Send Request" onclick="myFunction()">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<p class="text-muted"><strong>*</strong> <strong>These fields are required.</strong></p>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
