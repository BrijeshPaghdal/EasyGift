<?php
	include 'check-seller.php';

    $shop_id = $_SESSION['Shop_Id'];
    $status = mysqli_real_escape_string($conn,$_POST['status']);

		$query="SELECT  p.prod_id , c.cate_id , c.cate_name , p.prod_name  , p.price , p.avai_qua  , p.prod_status FROM `tbl_product` p , `tbl_sub_category` s , `tbl_category` c  where s.sub_c_id = p.sub_c_id  AND p.prod_status  = $status AND c.cate_id = s.cate_id AND p.shop_id = $shop_id";

		$res=mysqli_query($conn,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt > 0)
		{
			$output = '
              <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
										<th>Orders</th>
                    <th>Status</th>
                  </tr>
                </thead>';
			$i=1;
			while($row=mysqli_fetch_assoc($res))
			{
				$prod_id = $row['prod_id'];
				$cate_name = $row['cate_name'];
        $cate_id = $row['cate_id'];
				$prod_name=$row['prod_name'];
				$price=$row['price'];
				$avai_qua=$row['avai_qua'];
				$prod_status=$row['prod_status'];

				$query="SELECT  COUNT(*) As orders FROM `tbl_order`  where prod_id = $prod_id And status = 1";
				$orders = 0;
				$res2=mysqli_query($conn,$query);
				$cnt2=mysqli_num_rows($res2);
				while($row2 = mysqli_fetch_assoc($res2))
				{
						$orders = $row2['orders'];
				}
				$output .="
				      <tr>
                    <td>{$i}</td>
                    <td>{$prod_name}</td>
                    <td>{$cate_name}</td>
                    <td>{$price}</td>
                    <td>{$avai_qua}</td>
										<td>{$orders}</td>
                    <td>";
                    if ($prod_status == 1)
                      $output .='<span class="label bg-green shadow-style">Active</span>';
                  	else
                      $output .= "<span class='label bg-red shadow-style'>Disable</span>";

        $output .= "</td>
                </tr>";
                  $i++;

			}

				$output .= "</tbody></table></div>";
				echo $output;
		}
		else
		{
			echo '
              <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
										<th>Orders</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan=10><center>No Record Available</center></td>
                </tr>
                </tbody>
                ';
								
		}
?>
