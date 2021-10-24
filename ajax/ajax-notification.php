<?php
session_start();
require_once('../config.php');

$user_id = $_SESSION['user_id'];
$query = "SELECT p.prod_name , c.o_c_id FROM `tbl_order_complete` c , `tbl_order` o , `tbl_product` p , `tbl_shop` s WHERE  o.id = c.id AND o.prod_id = p.prod_id AND s.shop_id = p.shop_id AND o.cust_id = $user_id";

$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);

if ($cnt > 0) {
  $output = "";
  while ($row = mysqli_fetch_assoc($res)) {
    $output .= '<div class="product">
            <div >
                <h4 class="product-title">
                    <b>' . $row["prod_name"] . '</b>
                </h4>
                <span class="cart-product-info">
                    Did You Receive this Item??
                </span>
                <div class="dropdown-cart-action">
                    <button class="btn btn-outline-primary-2" id="ord_comp" value = ' . $row["o_c_id"] . '>Yes I did</button>
                    <button class="btn btn-outline-primary-2" id="ord_not_comp">No I didn\'t</button>
                </div>
            </div>
        </div>';
  }
} else {
  $output = "No notification Available";
}
echo $output;
