<?php
require_once('./check-admin.php');
require_once('../../config.php');
$prod_id = mysqli_real_escape_string($conn, $_POST['prodid']);
$status = mysqli_real_escape_string($conn, $_POST['stat']);
if ($status == 'Disable') {
    $val = 0;
} else if ($status == 'Enable') {
    $val = 1;
}

$query = "UPDATE `tbl_product` SET prod_status = $val WHERE prod_id = $prod_id";
if (mysqli_query($conn, $query)) {
    echo "1";
}
