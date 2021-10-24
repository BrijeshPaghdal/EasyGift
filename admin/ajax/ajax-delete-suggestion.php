<?php
  include 'check-admin.php';
  function deleteSubCate($sugg_id,$conn)
  {
        $query = "DELETE FROM `tbl_suggestion` WHERE sugg_id = $sugg_id";
        if (mysqli_query($conn, $query)) {
            echo "1";
        } else {
            echo "3";
        }
  }

    if(isset($_POST['sugg_id']))
    {
        $sugg_id = $_POST['sugg_id'];
        deleteSubCate($sugg_id,$conn);
    }
    else {
      echo "2";
    }
?>
