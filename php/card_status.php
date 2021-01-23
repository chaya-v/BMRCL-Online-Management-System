<?php

include("connect.php");

$con = OpenCon();

if(isset($_POST['submit']))
{
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	$user = mysqli_query($con,"SELECT S.Scard_no, S.card_status, U.Fname, U.Lname, S.balance FROM smartcard S NATURAL JOIN user U WHERE U.user_id = '$user_id' AND U.password = '$password' ");
	$row_cnt = mysqli_num_rows($user);
	$row = $user->fetch_array();
}

if($row_cnt > 0)
{
	session_start();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['Scard_no'] = $row['Scard_no'];
	$_SESSION['card_status'] = $row['card_status'];
	$_SESSION['Fname'] = $row['Fname'];
	$_SESSION['Lname'] = $row['Lname'];
	$_SESSION['balance'] = $row['balance'];
	header("Location: ../user_home.php");
}
else {
	session_start();
	$_SESSION['error_message']="Wrong Username or Password";
	header("Location: ../user_login.php");
}

$user->free();

CloseCon($con);

?>