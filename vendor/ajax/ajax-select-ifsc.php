<?php
	include 'check-seller.php';

	$bank_name = mysqli_real_escape_string($conn,$_POST['B_Name']);
    $bank_branch = mysqli_real_escape_string($conn,$_POST['Branch']);

    $query = "SELECT bank_ifsc FROM `tbl_bank_details` where  bank_name = '$bank_name' AND bank_branch = '$bank_branch'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {

            $output = '<input type="text" class="form-control" name="ifsc_code" value="'.$row['bank_ifsc'].'" 
                                             onkeydown="return false;">';   
        }
    }
    echo $output;
?>