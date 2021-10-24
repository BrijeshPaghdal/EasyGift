<?php
	include 'check-seller.php';

    	$shop_id = $_SESSION['Shop_Id'];
		$query = "SELECT  o.id , o.order_id , o.cust_id , p.prod_id , p.prod_name ,c.cate_name , p.comp_name , o.first_name , o.last_name , o.phone_no , o.quantity , o.total_price , o.order_date,  o.status FROM `tbl_product` p , `tbl_sub_category` s , `tbl_category` c , `tbl_order` o where s.sub_c_id = p.sub_c_id AND o.prod_id = p.prod_id AND c.cate_id = s.cate_id AND p.shop_id = $shop_id ORDER by o.order_date DESC LIMIT 7";

		$res=mysqli_query($conn,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt > 0)
		{
			$output = "
              <table id='quick-product-table' class='table table-hover dashboard-task-infos'>
               	<thead>
				<tr align = 'center'>
					<th>#</th>
					<th>Product Name</th>
					<th>Customer Name</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>";


			$i=1;
			while($row=mysqli_fetch_assoc($res))
			{
				$cust_id = $row['cust_id'];
				$prod_id = $row['prod_id'];

				$id = $row['id'];
				$order_id = $row['order_id'];
				$prod_name = $row['prod_name'];
				$comp_name=$row['comp_name'];
				$cust_name = $row['first_name']." ".$row['last_name'];
				$phone_no = $row['phone_no'];
				$quantity = $row['quantity'];
				$total_price = $row['total_price'];
				$order_date = $row['order_date'];
				$status=$row['status'];

				$output .="<tr>
				<td>$i</td>
				<td>{$prod_name}</td>
				<td>{$cust_name}</td>
				<td>{$quantity}</td>
				<td>{$total_price}</td>";
					if ($status == 0){
						$output .= "<td>
					<center><select  class='form-control custom-select label bg-orange'
							style='border-radius: 12px 12px 12px 12px;
							height: 25px;
							width: 90px;
							font-size : 12px;
							align : center;'

							name='Order_Status_2' id = 'Order_Status_2'>";
						$output .= "<option selected>Panding </option>";
						$output .= "<option value = 'Complete/$id'>Complete</option>";
						$output .= "<option value = 'Reject/$id'>Reject</option>";
						$output .= "</select></center>
						</td>";
					}
              		else if($status == 1){
              			$output .= "<td><center><span class='label bg-green shadow-style'>Complete</span></center></td>";
              		}else if($status == 2){
              			$output .= "<td><center><span class='label bg-red shadow-style' >Rejected</span></center></td>";
              		}



				$output.="</tr>";
				$i++;
			}

				$output .= "</tbody>
                </table>";
				echo $output;
		}
		else
		{
			echo "
			<table id='quick-product-table' class='table table-hover dashboard-task-infos'>
				<thead>
				<tr align = 'center'>
					<th>#</th>
					<th>Product Name</th>
					<th>Customer Name</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<tr><td colspan = '15'><center> No Record Found</center> </td></tr>
				</tbody>

				</table>
				";
		}

?>
