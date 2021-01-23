<?php

include("connect.php");

$con = OpenCon();


$id = $_GET['id'];

$sql = "DELETE FROM admin WHERE admin_id = $id";

if (mysqli_query($con, $sql)) {
	mysqli_close($con);
	header('Location: admin_manages_admin.php');
	exit;
} else {
	echo "Error deleting record";
}

CloseCon($con);

?>