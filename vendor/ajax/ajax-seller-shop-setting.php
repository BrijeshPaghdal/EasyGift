<?php
if(isset($_POST['Shop_Name']))
{
	include 'check-seller.php';

	$shop_id = $_SESSION['Shop_Id'];
	$seller_id = $_SESSION['Seller_Id'];

	$shop_name = mysqli_real_escape_string($conn,$_POST['Shop_Name']);
	$gst_no = mysqli_real_escape_string($conn,$_POST['GST_NO']);
	$latitude = mysqli_real_escape_string($conn,$_POST['lat']);
	$longitude = mysqli_real_escape_string($conn,$_POST['long']);

	$address = mysqli_real_escape_string($conn,$_POST['Shop_Addr']);
	$city = mysqli_real_escape_string($conn,$_POST['City']);
	$state = mysqli_real_escape_string($conn,$_POST['State']);
	$country = mysqli_real_escape_string($conn,$_POST['Country']);
	$pincode = mysqli_real_escape_string($conn,$_POST['Pincode']);

	$query = "UPDATE `tbl_shop` SET shop_name = '$shop_name' , gst_no = '$gst_no' , latitude = '$latitude' ,longitude = '$longitude' WHERE shop_id = $shop_id";
	if(mysqli_query($conn,$query))
    {
    	$query = "SELECT c.city_id FROM `tbl_cities` c , `tbl_states` s , `tbl_countries` a WHERE c.city_name = '$city' AND c.state_id = s.state_id AND s.country_id = a.country_id AND a.country_name = '$country'";
        $result=mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($result))
        {
            $city_id = $row['city_id'];
        }

        $query = "UPDATE `tbl_address` SET address = '$address' ,pincode = $pincode ,city_id = $city_id WHERE shop_id = $shop_id";

        if(mysqli_query($conn,$query))
        {
        	echo "1";
        }
        else
        {
        	echo "0";
        }
    }
	else
	{
		echo "0";
	}
    
}
?>