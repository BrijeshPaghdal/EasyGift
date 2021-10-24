<?php
  include 'config.php';
  session_start();
  $session_id = session_id();
  $time = time();
  $time_out_in_sec = 120;
  $time_out = $time - $time_out_in_sec;

  $query = "SELECT * FROM `tbl_user_online` WHERE session = '$session_id'";
  $res = mysqli_query($conn, $query);
  $cnt = mysqli_num_rows($res);
  if ($cnt == NULL)
  {
    $query = "INSERT INTO `tbl_user_online` (session , time) VALUES('$session_id','$time')";
    $res = mysqli_query($conn, $query);
  }
  else{
    $query = "UPDATE `tbl_user_online` SET time = '$time' WHERE session = '$session_id'";
    $res = mysqli_query($conn, $query);
  }
?>
