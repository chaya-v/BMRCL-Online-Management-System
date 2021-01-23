<?php

include("connect.php");

$con = OpenCon();

session_start();

$amount = $_POST['amount'];
$cardno = $_SESSION['Scard_no'];

if(isset($_POST['submit'])) {
	$balance = mysqli_query($con, "CALL recharge('$amount','$cardno');") or die(mysql_error()); 
	$row = $balance->fetch_array();
	$_SESSION['balance'] = $row['balance'];
}

$_SESSION['successfull']="Successfully Recharged your Card";
header("Location: ../user_home.php");
$balance->free();
CloseCon($con);
?>



