<?php
	include 'check-seller.php';
	if(isset($_SESSION['Seller_Name']))
	{
		if(isset($_GET['prod_id']))
		{
			$prod_id = $_GET['prod_id'];

			$query="SELECT i.image_name FROM `tbl_product` p , `tbl_image` i where i.prod_id = p.prod_id";

			$res=mysqli_query($conn,$query);
			$cnt=mysqli_num_rows($res);
			if($cnt > 0)
			{
				$i=1;
				while($row=mysqli_fetch_assoc($res))	
				{
					$image_name = $row['image_name'];
				}
			}
			$filePath = "../../../../product-images/".$image_name;
			if (file_exists($filePath)) 
            {
            	unlink($filePath);
            }
             else
        	{
        		header("Location:product-view.php?msg=ErrorOccured");
            }


			$query = "DELETE FROM `tbl_product` WHERE prod_id = $prod_id ";

			if(mysqli_query($conn,$query) or die("error"))
			{
				header("Location:product-view.php");
			}
			else
			{
				header("Location:product-view.php?msg=ErrorOccured");
			}
		}
	}
?>