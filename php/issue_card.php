<?php

include("connect.php");

$con = OpenCon();

session_start();

$smartcard_no = $_POST['id'];
$admin_id = $_SESSION['admin_id'];
$new_status = $_POST['new_status'];
echo $smartcard_no."<br>".$admin_id."<br>".$new_status;
$sql = "UPDATE `smartcard` SET `card_status` = '$new_status', `admin_id` = '$admin_id' WHERE `smartcard`.`Scard_no` = '$smartcard_no'";

if(mysqli_query($con, $sql))
{
	header('Location: admin_approve_cards.php');
}

CloseCon($con);
?>













