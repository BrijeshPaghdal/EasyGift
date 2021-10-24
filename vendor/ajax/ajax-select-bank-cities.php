<?php
    include 'check-seller.php';
    
    $output =' <select class="form-control custom-select" name="bank_city" id ="bank_city"> ';
    
    $state_name = $_POST['State'];

    $query = "SELECT DISTINCT bank_city FROM `tbl_bank_details` where bank_state = '$state_name'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<option Disabled Selected value=''>Bank City</option>";
        while($row = mysqli_fetch_assoc($res))
        {
            $output .= "<option>".$row['bank_city']."</option>";   
        }
    }
    $output .= "</select>";
    echo $output;
?>