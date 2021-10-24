<?php
    include 'check-seller.php';
    
    $output = "<select>";
    
    $bank_name = mysqli_real_escape_string($conn,$_POST['B_NAME']);
    $bank_state = mysqli_real_escape_string($conn,$_POST['State']);
    $bank_city = mysqli_real_escape_string($conn,$_POST['City']);

    $query = "SELECT bank_branch FROM `tbl_bank_details` where  bank_city = '$bank_city' AND bank_name = '$bank_name' AND bank_state = '$bank_state'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<option disabled Selected value=''>Bank Branch</option>";
        while($row = mysqli_fetch_assoc($res))
        {
            $output .= "<option>".$row['bank_branch']."</option>";   
        }
    }
    $output .= "</select>";
    echo $output;
?>