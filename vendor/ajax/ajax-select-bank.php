<?php
    include 'check-seller.php';
    
    $output = "<select>";
    
    $city_name = $_POST['City'];

    $query = "SELECT DISTINCT bank_name FROM `tbl_bank_details` where bank_city = '$city_name'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<option Disabled Selected value=''>Bank Name</option>";
        while($row = mysqli_fetch_assoc($res))
        {
            $output .= "<option>".$row['bank_name']."</option>";   
        }
    }
    $output .= "</select>";
    echo $output;
?>