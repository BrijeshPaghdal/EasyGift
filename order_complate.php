<?php
require_once('config.php');
$o_id = $_GET["oid"];
session_start();
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$phone = $_SESSION['phone'];
$user_id = $_SESSION['user_id'];
if (!empty($_SESSION["shopping_cart"])) {
    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if (!empty($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                $prod_id = $values["product_id"];
                $prod_qty = $values["product_quantity"];
                $total_price  = $values["product_quantity"] * $values["product_price"];
                $query = "INSERT INTO `tbl_order` (order_id,cust_id,prod_id,first_name,last_name,phone_no,quantity,total_price,pay_id) VALUES ($o_id,$user_id,$prod_id,'$fname','$lname',$phone,$prod_qty,$total_price,'2')";
                $result = mysqli_query($conn, $query);
            }
        }
    }
    unset($_SESSION["shopping_cart"]);
    unset($_SESSION['fname']);
    unset($_SESSION['phone']);
    unset($_SESSION['lname']);
    header("location: http://localhost/EasyGift/myaccount.php");
}
