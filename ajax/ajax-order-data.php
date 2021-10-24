<?php
session_start();
require_once('../config.php');
$user_id = $_SESSION['user_id'];
$query = "SELECT o.total_price,p.prod_name,s.shop_name,o.quantity,o.order_date FROM `tbl_order` o , `tbl_product` p , `tbl_shop` s WHERE o.prod_id = p.prod_id AND s.shop_id = p.shop_id AND cust_id = $user_id";

$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {

    $output = '<table class="table table-wishlist table-mobile" id="order-details">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Shop Name</th>
            <th>Order Quantity</th>
            <th>total Price</th>
            <th>Order Date</th>
        </tr>
    </thead>';

    while ($row = mysqli_fetch_assoc($res)) {
        $prod_name = $row['prod_name'];
        $prod_quntity = $row['quantity'];
        $prod_total_price = $row['total_price'];
        $order_date = $row['order_date'];
        $shop_name = $row['shop_name'];
        $o_d = explode(" ", $order_date);


        $output .= "

        <tbody>
            <tr>
                <td class='product-col'>
                    <div class='product'>
                        <h3 class='product-title'>
                            <a>{$prod_name}</a>
                        </h3>
                    </div>
                </td>
                <td class='product-col'>
                <div class='product'>
                    <h3 class='product-title'>
                        <a>{$shop_name}</a>
                    </h3>
                </div>
                </td>
                <td class='product-col'>
                <div class='product'>
                    <h3 class='product-title'>
                        <a>{$prod_quntity}</a>
                    </h3>
                </div>
                </td>
                
                <td class='price-col'>{$prod_total_price}</td>
                <td class='product-col'>
                <div class='product'>
                    <h3 class='product-title'>
                        <a>{$o_d[0]}</a>
                    </h3>
                </div>
                </td>

            </tr>

        </tbody>
        </table>";
    }
    echo $output;
} else {
    echo "<p>No orders available yet.</p>";
}
