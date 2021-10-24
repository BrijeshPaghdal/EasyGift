<?php
if(isset($_POST['B_ACC_NO']))
{
	include 'check-seller.php';
	
	$seller_id = $_SESSION['Seller_Id'];

	$b_country = mysqli_real_escape_string($conn,$_POST['bank_country']);
    $b_state = mysqli_real_escape_string($conn,$_POST['bank_state']);
    $b_city = mysqli_real_escape_string($conn,$_POST['bank_city']);
    $b_name = mysqli_real_escape_string($conn,$_POST['bank_name']);
    $b_branch = mysqli_real_escape_string($conn,$_POST['bank_branch']);
	$ifsc_code = mysqli_real_escape_string($conn,$_POST['ifsc_code']);    

    $b_acc_no = mysqli_real_escape_string($conn,$_POST['B_ACC_NO']);

    $query ="SELECT bank_id FROM `tbl_bank_details` WHERE bank_country = '$b_country' AND bank_state = '$b_state' AND bank_city = '$b_city' AND  bank_name = '$b_name' AND bank_branch = '$b_branch' AND bank_ifsc = '$ifsc_code'";
    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result))
    {
        $bank_id = $row['bank_id'];
    } 

    $query = "UPDATE `tbl_s_bank_details` SET bank_id = $bank_id , b_acc_no = '$b_acc_no' WHERE seller_id = $seller_id";
    if(mysqli_query($conn,$query))
    {
        echo "1";
    }
    else
    {
        echo "0";
    }
}
?>