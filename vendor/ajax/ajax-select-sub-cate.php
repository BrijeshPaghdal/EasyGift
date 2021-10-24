<?php
    include 'check-seller.php';

    $output = "<select>";

    $cate_name = $_POST['cate_name'];

    $query = "SELECT * FROM `tbl_category` WHERE cate_name = '$cate_name'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $cate_id = $row['cate_id'];
        }
    }
    $query = "SELECT sub_c_name FROM `tbl_sub_category` where cate_id = $cate_id";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<select class='form-control select2' data-placeholder='Select' >";
        while($row = mysqli_fetch_assoc($res))
        {
            $output .= "<option>".$row['sub_c_name']."</option>";
        }
    }
    $output .= "</select>";
    echo $output;



?>
