<?php
	include 'check-seller.php';
	$shop_id = $_SESSION['Shop_Id'];

	$query = "SELECT SUM(quantity) AS total_quantity , p.prod_name AS prod_name , o.prod_id AS prod_id FROM tbl_order o ,tbl_product p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id AND o.status = 1 AND o.order_date > now() - INTERVAL 7 day GROUP BY prod_id ORDER BY total_quantity DESC";
	$res=mysqli_query($conn,$query);
	$cnt=mysqli_num_rows($res);
	$output='';
	if($cnt > 0)
	{
		$i = 1;
		while ($row = mysqli_fetch_assoc($res)) {

			$output .= $row['prod_name'];

			if($i >= $cnt)
			{
				break;
			}
			else
			{
				$output .= ",";
				$i++;
			}
		}
	}
	echo $output;
?>