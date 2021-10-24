<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
	session_start();
	include '../../config.php';
	if(isset($_SESSION['Seller_Id']))
	{
		$seller_id = $_SESSION['Seller_Id'];

		$query = "SELECT * FROM `tbl_seller` WHERE seller_id = $seller_id";

		$res=mysqli_query($conn,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt > 0)
		{
			while($row=mysqli_fetch_assoc($res))
			{
				if($row['seller_status'] == 0)
				{
					header("Location:../login.php");
				}
				else
				{
					return true;
				}
			}
		}
	}
	else
	{
		header("Location:../login.php");
	}
?>
