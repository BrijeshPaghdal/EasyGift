<?php
  session_start();
  require_once('../config.php');

  $o_c_id = mysqli_real_escape_string($conn, $_POST['o_c_id']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);

  $query = "UPDATE `tbl_order_complete` SET o_c_status = $status WHERE o_c_id = $o_c_id";

  if (mysqli_query($conn, $query)) {
    echo "Order Complete";
  }
  else {
    echo "An error Occured";
  }
  echo $output;
?>
