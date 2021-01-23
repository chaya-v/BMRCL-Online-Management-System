<?php

include("connect.php");

$con = OpenCon();


if(isset($_POST['submit']))
{
	$t_id = $_POST['train_id'];
	$a_id = $_POST['admin_id'];
	$r_id = $_POST['route_id'];
	$sql = "INSERT INTO `train`(`train_id`, `admin_id`, `route_id`) VALUES ('$t_id','$a_id','$r_id')";

	if (mysqli_query($con, $sql)) {
		header('Location: admin_manage_trains.php');
		exit;
	}
	else {
		$_SESSION['error'] = mysqli_error($con);
		header('Location: admin_manage_trains.php');
	}
}

CloseCon($con);
?>