<?php
  include 'check-admin.php';
  function deleteSubCate($sub_c_id,$conn)
  {
        $query = "DELETE FROM `tbl_sub_category` WHERE sub_c_id = $sub_c_id";
        if (mysqli_query($conn, $query)) {
            echo "1";
        } else {
            echo "3";
        }
  }

    if(isset($_POST['sub_c_id']))
    {
      $sub_c_id = $_POST['sub_c_id'];

        $temp = 0;
        $query1 = "SELECT COUNT(sub_c_id) FROM `tbl_product` WHERE sub_c_id = ".$sub_c_id;
        $res1 = mysqli_query($conn, $query1);
        while ($row = mysqli_fetch_assoc($res1)) {
              $count = $row['COUNT(sub_c_id)'];
              break;
        }
        if($count == 0){
            deleteSubCate($sub_c_id,$conn);
        }
        else {
          $query3 = "UPDATE `tbl_product` SET prod_status = 0 , sub_c_id = 0 WHERE sub_c_id = ".$sub_c_id;
          if(mysqli_query($conn, $query3))
          {
            $temp = 1;
          }
          else {
            $temp =0;
            echo "2";
          }
        }
        if($temp == 1)
        {
          deleteSubCate($sub_c_id,$conn);
        }
    }
    else {
      echo "2";
    }
?>
