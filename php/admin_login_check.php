<?php

include("connect.php");

$con = OpenCon();


if(isset($_POST['submit']))
{
	$admin_id = $_POST['admin_id'];
	$password = $_POST['password'];
	$admin = mysqli_query($con,"SELECT admin_id,admin_name FROM admin WHERE admin_email = '$admin_id' AND admin_password = '$password' ");
	$count = mysqli_num_rows($admin);
	$row = $admin->fetch_array();
}

if($count > 0)
{
	session_start();
	$_SESSION['admin_id'] = $row['admin_id'];
	$_SESSION['admin_name'] = $row['admin_name'];
	header("Location: admin_home.php");
}
else {
	session_start();
	$_SESSION['error_message']="Wrong Admin ID or Password";
	header("location: ../login.php");
}
$admin->free();

CloseCon($con);

?>