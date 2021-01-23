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

        .bs-example{
          margin: 10px;
        }
        .form-horizontal .control-label{
          padding-top: 7px;
        }
        
        input {
          float: left;

        }
        .bttn {
          margin-left: 5px;
          margin-right: 0px;
        }

        table {
          width:100%;
          padding: 0;
          margin: 0;
          border: 0;
          border-collapse: collapse;
        }

        td {
          width:176px;
          padding: 0 10px 0 0;
          margin: 0;
          border: 0;
        }
         .bttn {
          margin-left: 5px;
          margin-right: 0px;
        }
        </style>
  <script>
      document.addEventListener('DOMContentLoaded',function(e){

        /* Obtain a reference to the FORM element */
        var form=document.forms['status-updates'];

        /* Hidden fields which will be POSTed to php/issue_card.php */
        var id=form.querySelector('input[type="hidden"][name="id"]');
        var status=form.querySelector('input[type="hidden"][name="new_status"]');



        /* Create a nodelist collection of ALL buttons within table of class "bttn" */
        var col=Array.prototype.slice.call( form.querySelectorAll('input[type="button"].bttn') );

        /* Assign event handler to each button */
        col.forEach( function( bttn ){
          bttn.onclick=function(e){/* - event handler - */

            /* Assign values to hidden fields */
            id.value=this.dataset.id;
            status.value=this.parentNode.querySelector('input[type="text"]').value;

            /* submit the form with values for this row */
            form.submit();
          }.bind( bttn );
        });
      },false );
    </script>
    
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
  <?php

  $cards = mysqli_query($con,"SELECT user_id, Scard_no, card_status FROM smartcard WHERE card_status NOT IN (SELECT card_status FROM smartcard where card_status = 'Issued')");

  ?>


  <div class="container">
    <form name='status-updates' method='post' action='issue_card.php'>
      <!-- two hidden fields -->
      <input type='hidden' name='id' />
      <input type='hidden' name='new_status' />

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Username</th>
            <th>Smart Card Number</th>
            <th>Card Status</th>
            <th>New Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while( $row = mysqli_fetch_assoc( $cards ) ) {
            echo "<tr>";

            foreach( $row as $key => $value )
              echo "<td class='wrap' style=\"word-wrap: break-word;min-width: 10px;max-width: 100px;\">{$value}</td>";

            echo "<td>
            <input type='text' class='feild1 form-control' style=\"width: 200px;\" required='required' />
            <input type='button' value='Status Update' class='bttn btn' data-id='{$row['Scard_no']}' />
            </td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
</body>
</html>