<?php
	session_start();
	include '../config.php';
	$session_id = session_id();
	$query = "DELETE FROM `tbl_seller_online` WHERE session = '$session_id'";
	$res = mysqli_query($conn, $query);
	session_destroy();
	header("Location:login.php");

?>
