<?php
require_once('./check-admin.php');
require_once('../../config.php');
$vendor_id = mysqli_real_escape_string($conn, $_POST['vendorid']);
$status = mysqli_real_escape_string($conn, $_POST['stat']);
if ($status == 'Disable') {
    $val = 0;
} else if ($status == 'Active') {
    $val = 1;
} else if ($status == 'Confirmation') {
    $val = 2;
} else  if ($status == 'Reject') {
    $val = 3;
}

$query = "UPDATE `tbl_seller` SET seller_status = $val WHERE seller_id = $vendor_id";
if (mysqli_query($conn, $query)) {
    echo "1";
}
