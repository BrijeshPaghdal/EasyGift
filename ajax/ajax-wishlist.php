<?php
  require_once("../config.php");
  session_start();
  $cust_id = $_SESSION['user_id'];
	$prod_id = mysqli_real_escape_string($conn,$_POST['prod_id']);

  // echo $prod_id ." ".$cust_id;
  $query = "SELECT * FROM `tbl_wishlist` WHERE prod_id = $prod_id AND cust_id = $cust_id";

	$res=mysqli_query($conn,$query);
	$cnt=mysqli_num_rows($res);

	if($cnt > 0)
	{
    while($row=mysqli_fetch_assoc($res))
    {
        $status = $row['status'];
    }
    if($status == 0)
    {
      $query = "UPDATE `tbl_wishlist` SET  status = 1 WHERE prod_id = $prod_id AND cust_id = $cust_id";
    	if(mysqli_query($conn,$query))
    	{
    		echo "2";
    	}
    }
    else {
      $query = "UPDATE `tbl_wishlist` SET  status = 0 WHERE prod_id = $prod_id AND cust_id = $cust_id";
    	if(mysqli_query($conn,$query))
    	{
    		echo "1";
    	}
    }
	}
	else
	{
		$query = "INSERT INTO `tbl_wishlist` (prod_id,cust_id) values ($prod_id,$cust_id)";
  	if(mysqli_query($conn,$query))
  	{
  		echo "2";
  	}
	}
?>
