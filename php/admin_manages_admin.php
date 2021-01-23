<?php

include("connect.php");

$con = OpenCon();

session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>DBMS Project</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
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
        </style>
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../contact_us.php">Contact Us</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.html">Home</a>
      </li>
      <li class="active"><a class="nav-link" href="admin_home.php"><strong><?php echo $_SESSION['admin_name']; ?></strong></a></li>
      </ul>
				<div class="navbar-right margins">
					<a href="logout_admin.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
					</a>
				</div>
			</div>
		</nav>
		<section class="my-5"></section>
		<?php

	$admins = mysqli_query($con,"SELECT admin_id,admin_name,age,gender,admin_email FROM admin ");

	?>


	<div class="container">

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Admin ID</th>
					<th>Admin Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Admin Email</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row = mysqli_fetch_assoc($admins))
				{
					echo '<tr>';
					foreach ($row as $key => $value) {
						echo '<td>',$value,'</td>';
					}
					echo "<td><a href='delete_admins.php?id=".$row['admin_id']."'><button type=\"button\" class=\"btn btn-link\">Delete</button></a></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="container">
		<h2>Add New Admins</h2>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Admin Name</th>
					<th>Age</th>
					<th>Gender</th>
					<th>Admin Email</th>
					<th>Password</th>
					<th>Operation</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<form action="add_new_admins.php" method="POST">
						<td><input name="a_name" type="text" class="form-control" required="required" data-error="Enter name" /></td>
						<td><input name="a_age" type="number" class="form-control" required="required" data-error="enter valid age"/></td>
						<td><input name="a_gender" type="text" class="form-control" required="required" data-error="Enter valid gender M,F,Male,Female "/></td>
						<td><input name="a_email" type="email" class="form-control" required="required" data-error="valid email is required"/></td>
						<td><input name="a_pass" type="password" class="form-control" required="required" data-error="enter valid password"/></td>
						<td><input type="submit" name="submit" class="btn btn-link" value="Add" /></td>
					</form>
				</tr>
			</tbody>
		</table>
	</div>
	<div style="margin-left: 9em; margin-right: 50em;">
		<p class="bg-danger">
			<?php

			if(!empty($_SESSION['error']))
			{
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}

			?>
		</p>
	</div>

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
				

</body>
</html>

