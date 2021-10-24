<?php
	include 'check-seller.php';
	$shop_id = $_SESSION['Shop_Id'];

	$order_id = mysqli_real_escape_string($conn,$_POST['order_id']);
	$prod_id = mysqli_real_escape_string($conn,$_POST['prod_id']);
	$query = "INSERT INTO `tbl_order_complete` (order_id,prod_id,o_c_status) values ($order_id,$prod_id,2)";
	if(mysqli_query($conn,$query))
	{
		$query = "UPDATE `tbl_order` SET status = 2 WHERE order_id = $order_id AND prod_id = $prod_id	";
    	if(mysqli_query($conn,$query))
    	{
    		echo "1";
    	}
	}
	else
	{
		echo "2";
	}
?>
