<?php
	include 'check-seller.php';

    $shop_id = $_SESSION['Shop_Id'];

	$id = mysqli_real_escape_string($conn,$_POST['id']);

  $query = "SELECT * FROM `tbl_order_complete` WHERE id = $id";

	$res=mysqli_query($conn,$query);
	$cnt=mysqli_num_rows($res);

	if($cnt > 0)
	{
		while($row=mysqli_fetch_assoc($res))
        {
						$o_c_id = $row['o_c_id'];
            $status = $row['o_c_status'];
            break;
        }
        if($status == 0)
        {
        	echo "wait till confirm";
        }
        else if($status == 1)
        {
        	$query = "UPDATE `tbl_order` SET status = 1 WHERE id = $id";
		    	if(mysqli_query($conn,$query))
		    	{
						$query = "DELETE FROM `tbl_order_complete` WHERE o_c_id = $o_c_id";
						if(mysqli_query($conn,$query))
			    	{
							$query = "SELECT quantity,prod_id FROM `tbl_order` WHERE id = $id";
							$res=mysqli_query($conn,$query);
							$cnt=mysqli_num_rows($res);
							if($cnt > 0)
							{
								while($row=mysqli_fetch_assoc($res))
				        {
									$quantity = $row['quantity'];
									$prod_id = $row['prod_id'];
				        }
								$query = "SELECT avai_qua FROM `tbl_product` WHERE prod_id = $prod_id";
								$res=mysqli_query($conn,$query);
								$cnt=mysqli_num_rows($res);
								if($cnt > 0)
								{
									while($row=mysqli_fetch_assoc($res))
					        {
										$avai_qua = $row['avai_qua'];
					        }

									$newQua = $avai_qua - $quantity;

									$query = "UPDATE `tbl_product` SET avai_qua = $newQua WHERE prod_id = $prod_id";
									if(mysqli_query($conn,$query))
						    	{
										echo "1";
									}
									else {
										echo "error";
									}
								}
								else {
									echo "error";
								}
							}
						}
		    	}
        }
	}
	else
	{
		$query = "INSERT INTO `tbl_order_complete` (id) values ($id)";
    	if(mysqli_query($conn,$query))
    	{
    		echo "2";
    	}

	}

?>
