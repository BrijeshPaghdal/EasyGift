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
  $query = "SELECT p.prod_id , c.cate_id , c.cate_name , p.prod_name , p.price , p.avai_qua , p.prod_status,v.shop_name FROM `tbl_product` p , `tbl_sub_category` s , `tbl_category` c, `tbl_shop` v where s.sub_c_id = p.sub_c_id AND c.cate_id = s.cate_id AND v.shop_id = p.shop_id AND v.shop_id  = $shop_id ORDER BY p.add_date DESC";
  $res = mysqli_query($conn, $query);
  $cnt = mysqli_num_rows($res);
  if ($cnt > 0) {
    $output = "<div class='table-responsive' id ='product-list'>
                <table class='table table-hover js-basic-example contact_list js-sweetalert' >
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Product Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>QTY</th>
                      <th>Shop Name</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>";
    $i = 1;
    while ($row = mysqli_fetch_assoc($res)) {
      $prod_id = $row['prod_id'];
      $cate_name = $row['cate_name'];
      $cate_id = $row['cate_id'];
      $prod_name = $row['prod_name'];
      $price = $row['price'];
      $avai_qua = $row['avai_qua'];
      $shop_name = $row['shop_name'];
      $prod_status = $row['prod_status'];

      $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
      $res1 = mysqli_query($conn, $query);
      $cnt1 = mysqli_num_rows($res1);
      if ($cnt1 > 0) {
        $image_name = "";
        while ($row1 = mysqli_fetch_assoc($res1)) {
          $image_name = $row1['image_name'];
          break;
        }
      }

      $output .= "
          <tr>
                      <td class='table-img'>";

      $output .= "<img src='../vendor/product-images/{$image_name}' height = '40px' width= '40px' />
                      </td>
                      <td>{$prod_name}</td>
                      <td>{$cate_name}</td>
                      <td>{$price}</td>
                      <td>{$avai_qua}</td>
                      <td>{$shop_name}</td>
                      ";
      if ($prod_status == 1) {
        $output .= "<td>  <select  class='form-control custom-select label bg-green'
                                                                    style='border-radius: 12px 12px 12px 12px;
                                                                    height: 25px;
                                                                    width: 90px;
                                                                    font-size : 14px'
                                                                    name='prod_Status' id = 'prod_Status'>";
        $output .= "<option selected value = 'Enable/$prod_id'>Enable</option>";
        $output .= "<option value = 'Disable/$prod_id'>Disable</option>";
        $output .= "</select>
           </td>";
      } else {
        $output .= "<td>
                                             <select  class='form-control custom-select label bg-orange'
                                                        style='border-radius: 12px 12px 12px 12px;
                                                        height: 25px;
                                                        width: 90px;
                                                        font-size : 14px'
                                                        name='prod_Status' id ='prod_Status'>";
        $output .= "<option  value = 'Enable/$prod_id'>Enable</option>";
        $output .= "<option selected value = 'Disable/$prod_id'>Disable</option>";
        $output .= "</select>
                                                    </td>";
      }

      $output .= "</td>
              <td>
              <button class='btn tblActnBtn' onclick=\"window.location.href='./product-details.php?prod_id=$prod_id'\">
                <i class='material-icons'>visibility</i>
              </button>
              </td></tr>";
    }

    $output .= "</tbody></table></div>";
    echo $output;
  } else {
    echo "<center>No Product Found.....</center>";
  }
?><script src="assets/js/table.min.js"></script>
  <!-- Custom Js -->

  <script src="assets/js/pages/tables/jquery-datatable.js"></script>
  <script src="assets/js/pages/ui/dialogs.js"></script>
<?php
} else {
  echo "2";
}
?>
