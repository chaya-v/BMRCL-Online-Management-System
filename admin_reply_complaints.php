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
  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.js"></script>
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
      <li class="active"><a class="nav-link" href="php/admin_home.php"><strong><?php echo $_SESSION['admin_name']; ?></strong></a></li>
      </ul>
				<div class="navbar-right margins">
					<a href="php/logout_admin.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
					</a>
				</div>
			</div>
		</nav>
		<section class="my-5"></section>

  <?php
  $query = "SELECT complaint_id, complaint_subject, complaint_description FROM complaint WHERE complaint_status = 'Not Replied'";
  $query_run = mysqli_query($con, $query);
  if($query_run){
    echo '<div class="container">
    <table class="table table-bordered">
    <thead>
    <tr>
    <th>Complaint ID</th>
    <th>Subject</th>
    <th>Description</th>
    <th>Operation</th>
    </tr>
    </thead>
    <tbody>';

    while($row = mysqli_fetch_assoc($query_run)){
      echo '<tr class="trCompID_' .$row['complaint_id']. '">';
      echo '<td class="td_CompID">' . $row['complaint_id'] . '</td>';
      echo '<td class="td_compsubject">' . $row['complaint_subject'] . '</td>';
      echo '<td class="td_complaint_description">' . $row['complaint_description'] . '</td>';
      echo "<td><button class='td_btn btn btn-link btn-custom dis'>Reply</button> </td>";
      echo '</tr>';
    }
    echo '</tbody></table></div>';

  }?>

  <script>
    $(document).ready(function(){
      $('.td_btn').click(function(){
        var $row = $(this).closest('tr');
        var compID = $row.attr('class').split('_')[1];
        $('#complaint_id').val(compID);
        $('#myModal').modal('show');
      });
    });
  </script>

  <div class="modal fade" id="myModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title" id="myModalLabel">Enter Reply Message</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <form id="updateValues" action="php/reply_to_complaints.php" method="POST" class="form">
            <div class="form-group">
              <label for="name">Reply</label>
              <textarea type="text" class="form-control" name="reply_message" id="frm_name"></textarea>
            </div>

            <input type="hidden" id="complaint_id" name="complaint_id">
            <input type="submit" class="btn btn-primary btn-custom" value="Reply">
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>




