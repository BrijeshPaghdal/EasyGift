<?php
if (isset($_POST['subcatename'])) {

    require("../config.php");

    $cate_id = mysqli_real_escape_string($conn, $_POST['Cate_Id']);
    $sub_c_name = mysqli_real_escape_string($conn, $_POST['subcatename']);

    $query = "SELECT COUNT(cate_id) FROM `tbl_sub_category` WHERE sub_c_name = '$sub_c_name'";
    $res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($res)) {
        $count = $row['COUNT(cate_id)'];
        break;
    }
    if ($count == 0) {
          $query = "INSERT INTO `tbl_sub_category`(cate_id,sub_c_name) VALUES";
          $query .= "($cate_id,'$sub_c_name')";
          if (mysqli_query($conn, $query)) {
              echo "success";
          } else {
              echo "2";
          }
    } else {
        echo "1";
    }
} else {
    header("Location:404.php");
}
