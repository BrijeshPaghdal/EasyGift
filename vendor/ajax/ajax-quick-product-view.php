<?php
	include 'check-seller.php';
	$shop_id = $_SESSION['Shop_Id'];
	$query = "SELECT prod_id , prod_name , price , prod_status , add_date FROM `tbl_product` WHERE shop_id = $shop_id AND prod_status != 2 ORDER BY add_date DESC LIMIT 5";
    $res=mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
      $output = '<table id="quick-product-table" class="table table-hover dashboard-task-infos">
                  <thead>
                    <tr align="center">
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Cost</th>
                      <th>Status</th>
                    </tr>
                  </thead><tbody>';
      $i = 0;
      while ($row = mysqli_fetch_assoc($res)) {
        $prod_id = $row['prod_id'];
        $prod_name=$row['prod_name'];
        $price=$row['price'];
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

        $output .= '<tr>
                      <td class="table-img center">
                          <img src="product-images/'.$image_name.'"  height=40px width=40px />
                      </td>
                      <td class="text-truncate center">'.$prod_name.'</td>
                      <td class="text-truncate center">'.$price.'</td>
                      <td class="text-truncate center">';
                      if ($prod_status == 1)
                      $output .='<span class="label bg-green shadow-style">Active</span>';
                    else
                      $output .= "<span class='label bg-red shadow-style'>Disable</span>";


                      $output .=  '</td>
                    </tr>';

      }
      $output .= "</tbody>
                </table>";
      echo $output;
    }
		else {
			$output = '<table id="quick-product-table" class="table table-hover dashboard-task-infos">
                  <thead>
                    <tr align="center">
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Cost</th>
                      <th>Status</th>
                    </tr>
                  </thead><tbody>
										<tr>
											<td colspan=10>No Record Found....</td>
										</tr>';
			$output .= "</tbody>
                </table>";
      echo $output;
		}

?>
