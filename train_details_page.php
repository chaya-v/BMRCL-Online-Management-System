<?php

include("php/connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$route = $_POST['route'];
	$from_addr = $_POST['from'];
	$to_addr = $_POST['to'];
	$details = mysqli_query($con,"CALL train_details('$route','$from_addr','$to_addr')");
	$row_cnt = mysqli_num_rows($details);
}
if($row_cnt == 0)
{
	session_start();
	$_SESSION['error_station'] = "No Station Found";
	header("Location: travel_info.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> BMRCL DBMS Project</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet"
  >
        <style type="text/css">
        .demo-content{
        	padding: 50px;
        	font-size: 18px;
        	text-align: center;
        	background: #8eccc6;
        	margin:50px 22em 50px 22em;

        }
        .demo-content.bg-alt{
        	background: #abb1b8;
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
      <li class="nav-item active">
        <a class="nav-link" href="travel_info.php"><strong>Travel Info</strong></a>
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
<section class="my-5"></section>
	<div class="container">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Train Number</th>
					<th>From</th>
					<th>Departure</th>
					<th>To</th>
					<th>Arrival</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysqli_fetch_assoc($details) )
				{
					echo '<tr>';
					foreach ($row as $key => $value) {
						echo '<td>',$value,'</td>';
					}
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$details->free();
CloseCon($con);
?>