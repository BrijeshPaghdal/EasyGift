<?php
  include "../config.php";
  session_start();

  $cust_name = mysqli_real_escape_string($conn,$_POST['cust_name']);
  $email_id = mysqli_real_escape_string($conn,$_POST['email_id']);
  $mobile_no = mysqli_real_escape_string($conn,$_POST['mobile_no']);
  $cust_id = $_SESSION['user_id'];

  $curr_passwd = mysqli_real_escape_string($conn,$_POST['curr_passwd']);
  $hash_curr_passwd = md5($curr_passwd);
  $new_passwd = mysqli_real_escape_string($conn,$_POST['new_passwd']);
  $hash_passwd = md5($new_passwd);

  $query = "SELECT cust_login_id FROM `tbl_customer` WHERE cust_id = $cust_id";
  $res = mysqli_query($conn, $query);
  $cnt = mysqli_num_rows($res);
  if ($cnt > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $cust_login_id = $row['cust_login_id'];
    }
  }

  $query = "SELECT passwd FROM `tbl_cust_login` WHERE cust_login_id = $cust_login_id";
  $res = mysqli_query($conn, $query);
  $cnt = mysqli_num_rows($res);
  if ($cnt > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $passwd = $row['passwd'];
    }
  }

  if($cust_name == "" || $email_id == "" || $mobile_no == "" )
  {
    echo "0";
  }
  else if($cust_name != "" && $mobile_no != "" && $email_id != "")
  {
    $query = "UPDATE `tbl_customer` SET cust_name = '$cust_name' , mobile_no = '$mobile_no'  WHERE cust_id = $cust_id";
    if (mysqli_query($conn, $query)) {

      $query = "UPDATE `tbl_cust_login` SET email_id = '$email_id'  WHERE cust_login_id = $cust_login_id";
      if (mysqli_query($conn, $query)) {

        if($curr_passwd != "")
        {
          if($hash_curr_passwd == $passwd)
          {
            $query = "UPDATE `tbl_cust_login` SET passwd = '$hash_passwd' WHERE cust_login_id = $cust_login_id";
            if(mysqli_query($conn,$query))
            {
                echo "2";
            }
          }
          else {
            echo "3";
          }
        }
        else {
          echo "1";
        }
      }
      else {
        echo "Data is not updated";
      }
    }
    else {
      echo "Data is not updated";
    }
  }

?>
