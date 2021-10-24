<?php
require_once('./check-admin.php');
require_once('../../config.php');
$shop_id = mysqli_real_escape_string($conn, $_POST['shopid']);
function checkShopid($input)
{
	$vale = preg_match("/^(0|[1-9][0-9]*)$/", $input);
	if (!$vale) {
		return "2";
	}
}
$v = checkShopid($shop_id);
if ($v != "2") {
	$query = "SELECT o.order_id , o.cust_id , p.prod_id , p.prod_name ,c.cate_name , p.comp_name , o.first_name , o.last_name , o.phone_no , o.quantity , o.total_price  , y.pay_type , o.order_date,  o.status FROM `tbl_product` p , `tbl_sub_category` s , `tbl_category` c , `tbl_order` o ,`tbl_payment_type` y where s.sub_c_id = p.sub_c_id AND o.prod_id = p.prod_id AND c.cate_id = s.cate_id AND  o.pay_id = y.pay_id AND p.shop_id = $shop_id ORDER by 13 DESC";

	$res = mysqli_query($conn, $query);
	$cnt = mysqli_num_rows($res);
	if ($cnt > 0) {
		$output = "
              <table class='table table-bordered table-hover js-basic-example dataTable' Style='border-top:1px;border-bottom:1px;border-left:1px;border-right:1px;border-top:1px'>
               	<thead>
				<tr>
					<th>No</th>
					<th>Product Name</th>
					<th>Company Name</th>
					<th>Customer Name</th>
					<th>Phone no</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Payment</th>
					<th>Order Date</th>
					<th>image</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>";


		$i = 1;
		while ($row = mysqli_fetch_assoc($res)) {
			$cust_id = $row['cust_id'];
			$prod_id = $row['prod_id'];

			$order_id = $row['order_id'];
			$prod_name = $row['prod_name'];
			$comp_name = $row['comp_name'];
			$cust_name = $row['first_name'] . " " . $row['last_name'];
			$phone_no = $row['phone_no'];
			$quantity = $row['quantity'];
			$total_price = $row['total_price'];
			$pay_type = $row['pay_type'];
			$order_date = $row['order_date'];
			$status = $row['status'];

			$output .= "<tr>
				<td>{$i}</td>
				<td>{$prod_name}</td>
				<td>{$comp_name}</td>
				<td>{$cust_name}</td>
				<td>{$phone_no}</td>
				<td>{$quantity}</td>
				<td>{$total_price}</td>
				<td>{$pay_type}</td>
				<td>{$order_date}</td>";
			$i++;
			$query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
			$res1 = mysqli_query($conn, $query);
			$cnt1 = mysqli_num_rows($res);
			if ($cnt1 > 0) {
				while ($row1 = mysqli_fetch_assoc($res1)) {
					$image_name = $row1['image_name'];
					break;
				}
			}

			$output .= "<td class='table-img'><center><img src='../vendor/product-images/{$image_name}' height = '40px' width = '40px'></center></td>";
			if ($status == 0) {
				$output .= "<td><span class='label bg-orange shadow-style'>Pending</span></td>";
			} else if ($status == 1) {
				$output .= "<td><span class='label bg-green shadow-style'>Complete</span></td>";
			} else if ($status == 2) {
				$output .= "<td><span class='label bg-red shadow-style'>Rejected</span></td>";
			}



			$output .= "
     			</tr>";
		}

		$output .= "</tbody>
				<thead>
                  <tr>
                    <th>No</th>
					<th>Product Name</th>
					<th>Company Name</th>
					<th>Customer Name</th>
					<th>Phone no</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Payment</th>
					<th>Order Date</th>
					<th>Image</th>
					<th>Status</th>
                  </tr>
                </thead>
                </table>";
		echo $output;
		//echo "<input type = 'hidden' id = 'cust_id' value = ". $cust_id .">";
		//echo "<input type = 'hidden' id = 'prod_id' value = ". $prod_id .">";
	} else {
		echo "
              <table class='table table-bordered table-hover js-basic-example dataTable' Style='border-top:1px;border-bottom:1px;border-left:1px;border-right:1px;border-top:1px'>
               	<thead>
				<tr>
					<th>#</th>
					<th>Product Name</th>
					<th>Company Name</th>
					<th>Customer Name</th>
					<th>Phone no</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Payment</th>
					<th>Order Date</th>
					<th>image</th>
					<th>Status</th>
				</tr>
				</thead>
				<tbody>
				<tr><td colspan = '10'><center> No Record Found</center> </td></tr>
				</tbody>

				</table>
				";
	}
?><script src="assets/js/table.min.js"></script>
	<!-- Custom Js -->
	<script src="assets/js/pages/ui/dialogs.js"></script>
	<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<?php } else {
	echo "2";
}
?>