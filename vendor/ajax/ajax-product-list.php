<?php
	include 'check-seller.php';

    	$shop_id = $_SESSION['Shop_Id'];
		$query="SELECT  p.prod_id , p.sub_c_id , c.cate_id , c.cate_name , p.prod_name  , p.price , p.avai_qua  , p.prod_status FROM `tbl_product` p , `tbl_sub_category` s , `tbl_category` c  where s.sub_c_id = p.sub_c_id  AND p.prod_status != 2 AND c.cate_id = s.cate_id AND p.shop_id = $shop_id Order BY p.add_date DESC";

		$res=mysqli_query($conn,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt > 0)
		{
			$output = "<div class='table-responsive' id = 'product-list'>
              <table class='table table-hover js-basic-example contact_list js-sweetalert' >
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>QTY</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>";
			$i=1;
			while($row=mysqli_fetch_assoc($res))
			{
				$prod_id = $row['prod_id'];
				$cate_name = $row['cate_name'];
        $cate_id = $row['cate_id'];
				$sub_c_id = $row['sub_c_id'];
				$prod_name=$row['prod_name'];
				$price=$row['price'];
				$avai_qua=$row['avai_qua'];
				$prod_status=$row['prod_status'];

                $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
                $res1=mysqli_query($conn,$query);
                $cnt1=mysqli_num_rows($res);
                if($cnt1 > 0)
                {
                  $image_name ="";
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                        $image_name = $row1['image_name'];
                        break;
                    }
                }

				$output .="
				<tr>
                    <td class='table-img'>";

                $output .="<img src='product-images/{$image_name}' height = '40px' width= '40px' />
                    </td>
                    <input type='hidden' id='prod_id' name='prod_id' value='{$prod_id}'>
                    <td>{$prod_name}</td>";
										if($cate_name == '')
										{
											$output .='<td><span class="label bg-amber shadow-style">Select Cateogry</span></td>';
										}
										else{
											$output .="<td>{$cate_name}</td>";
										}
                  $output .= "<td>{$price}</td>
                    <td>{$avai_qua}</td>
                    <td>";
                    if ($prod_status == 1)
                      $output .='<span class="label bg-green shadow-style">Active</span>';
                  	else
                      $output .= "<span class='label bg-red shadow-style'>Disable</span>";

                 $output .= "</td>
                    <td>
                      <button class='btn tblActnBtn' onclick=\"window.location.href='./product-detail.php?prod_id=$prod_id'\">
                        <i class='material-icons'>visibility</i>
                      </button>
                      <button class='btn tblActnBtn' onclick=\"window.location.href='./edit-product.php?prod_id=$prod_id'\">
                        <i class='material-icons'>mode_edit</i>
                      </button>
                      <button class='btn tblActnBtn' data-type='confirm' id='btnProdDelete' data-id='$prod_id' >
                        <i class='material-icons'>delete</i>
                      </button>
                    </td>
                  </tr>";

			}

				$output .= "</tbody></table></div>";
				echo $output;
		}
		else
		{
			echo "<center>No Records Found.....</center>";
		}
?>
<script src="assets/js/table.min.js"></script>
<!-- Custom Js -->

<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/pages/ui/dialogs.js"></script>
<!-- <script src="assets/js/pages/ui/sweetalert.min.js"></script> -->
