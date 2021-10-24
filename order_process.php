<?php
require_once('config.php');
if ($_POST['payment-group'] == 'paytm') {
    session_start();
    $sub_total = $_SESSION['total_price'];
    $_SESSION['fname'] = $_POST['fname'];
    $_SESSION['lname'] = $_POST['lname'];
    $_SESSION['phone'] = $_POST['phone'];
    header("location:checkout_paytm.php?sub_total=$sub_total");
} else {
    session_start();
    $o_id = rand(10000, 99999999);
    $sub_total = $_SESSION['total_price'];
    $user_id = $_SESSION['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            $prod_id = $values["product_id"];
            $prod_qty = $values["product_quantity"];
            $total_price  = $values["product_quantity"] * $values["product_price"];
            $query = "INSERT INTO `tbl_order` (order_id,cust_id,prod_id,first_name,last_name,phone_no,quantity,total_price,pay_id) VALUES ($o_id,$user_id,$prod_id,'$fname','$lname',$phone,$prod_qty,$total_price,'1')";
            $result = mysqli_query($conn, $query);
        }
    }
    unset($_SESSION["shopping_cart"]);
    header("location:myaccount.php");
}
