<?php
require_once('./check-admin.php');
require_once('../../config.php');
$user_id = mysqli_real_escape_string($conn, $_POST['userid']);
$status = mysqli_real_escape_string($conn, $_POST['stat']);
if ($status == 'Disable') {
    $val = 0;
} else {
    $val = 1;
}
$query = "UPDATE `tbl_customer` SET cust_status = $val WHERE cust_id = $user_id";
if (mysqli_query($conn, $query)) {
    echo "1";
}
