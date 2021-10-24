<?php
  include 'check-admin.php';
  function deleteCate($cate_id,$conn)
  {
    $query  = "SELECT * FROM `tbl_category` WHERE cate_id = $cate_id";
    $res = mysqli_query($conn, $query);
    $cnt = mysqli_num_rows($res);
    if ($cnt > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $image_name = $row['cate_image_name'];

            $filePath = "../category-image/" . $image_name;
            if (file_exists($filePath)) {
                unlink($filePath);
            }else {
                echo "2";
            }
        }
        $query = "DELETE FROM `tbl_category` WHERE cate_id = $cate_id";
        if (mysqli_query($conn, $query)) {
            echo "1";
        } else {
            echo "3";
        }
    }
  }

    if(isset($_POST['cate_id']))
    {
      $cate_id = $_POST['cate_id'];


      $query = "SELECT COUNT(sub_c_id) FROM `tbl_sub_category` WHERE cate_id = ".$cate_id;
      $res = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($res)) {
            $count = $row['COUNT(sub_c_id)'];
            break;
      }
      if($count == 0){
          deleteCate($cate_id,$conn);
      }
      else
      {
        $temp = 0;
        $query1 = "SELECT sub_c_id FROM `tbl_sub_category` WHERE cate_id = ".$cate_id;
        $res1 = mysqli_query($conn, $query1);
        $cnt1 = mysqli_num_rows($res1);
        if ($cnt1 > 0) {
          while ($row1 = mysqli_fetch_assoc($res1)) {
              $sub_c_id = $row1['sub_c_id'];

              $query2 = "SELECT prod_id FROM `tbl_product` WHERE sub_c_id = ".$sub_c_id;
              $res2 = mysqli_query($conn, $query2);
              $cnt2 = mysqli_num_rows($res2);
              if ($cnt2 > 0) {
                while ($row2 = mysqli_fetch_assoc($res2)) {
                    $prod_id = $row2['prod_id'];
                    $prod_status = $row2['prod_status'];

                    $query3 = "UPDATE `tbl_product` SET prod_status = 0 , sub_c_id = 0 WHERE prod_id = ".$prod_id;
                    if(mysqli_query($conn, $query3))
                    {
                      $temp = 1;
                    }
                    else {
                      $temp =0;
                      echo "2";
                    }
                }
              }
              else {
                $temp = 1;
              }
          }
        }
        if($temp == 1)
        {
          deleteCate($cate_id,$conn);
        }
      }

    }
?>
