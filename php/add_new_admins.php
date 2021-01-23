<?php

include("connect.php");

$con = OpenCon();

session_start();

if(isset($_POST['submit']))
{
	$a_name = $_POST['a_name'];
	$a_age = $_POST['a_age'];
	$a_gender = $_POST['a_gender'];
	$a_email = $_POST['a_email'];
	$a_pass = $_POST['a_pass'];

	$sql = "INSERT INTO `admin`(`admin_name`, `age`, `gender`, `admin_email`, `admin_password`) VALUES ('$a_name','$a_age','$a_gender','$a_email','$a_pass')";
	if (mysqli_query($con, $sql)) {
		header('Location: admin_manages_admin.php');
		exit;
	} else {
		$_SESSION['error'] = mysqli_error($con);
		header('Location: admin_manages_admin.php');
	}
}

CloseCon($con);

?>