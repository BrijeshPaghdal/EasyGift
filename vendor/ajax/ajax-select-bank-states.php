<?php
    include 'check-seller.php';
    
    $output = '<select <select class="form-control custom-select" name="bank_state" id ="bank_state">';
    
    $country_name = $_POST['Country'];

    $query = "SELECT DISTINCT bank_state FROM `tbl_bank_details` WHERE bank_country = '$country_name'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<option Disabled Selected value=''>Bank State</option>";
        while($row = mysqli_fetch_assoc($res))
        {
            $output .= "<option>".$row['bank_state']."</option>";   
        }
    }
    $output .= "</select>";
    echo $output;
?>