<?php
    include 'check-admin.php';
    $time = time();
    $time_out_in_sec = 180;
    $time_out = $time - $time_out_in_sec;

    $query = "SELECT * FROM `tbl_user_online` WHERE time > '$time_out'";
    $res = mysqli_query($conn, $query);
    $cnt = mysqli_num_rows($res);
    echo $cnt;
?>
