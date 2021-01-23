<?php

include("connect.php");

$con = OpenCon();

session_start();

$compid = $_POST['complaint_id'];
$admin_id = $_SESSION['admin_id'];
$replymsg = $_POST['reply_message'];

$sql = "UPDATE complaint SET complaint_status = 'Replied' WHERE complaint.complaint_id = $compid";

if (mysqli_query($con, $sql)) {
	mysqli_query($con, "INSERT INTO `reply`(`reply_message`, `admin_id`, `complaint_id`) VALUES ('$replymsg','$admin_id','$compid')");
	unset($_SESSION['complaint_id']);
	header('Location: ../admin_reply_complaints.php');
	exit;
}
else {
	echo "Error updating values";
}

CloseCon($con);

?>