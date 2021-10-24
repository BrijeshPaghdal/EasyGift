<?php
if(isset($_POST['Seller_Name']))
{
	include 'check-seller.php';

	$shop_id = $_SESSION['Shop_Id'];
	$seller_id = $_SESSION['Seller_Id'];

	$seller_name = mysqli_real_escape_string($conn,$_POST['Seller_Name']);
	$seller_l_name = mysqli_real_escape_string($conn,$_POST['Seller_L_Name']);
    $seller_phone_no = mysqli_real_escape_string($conn,$_POST['Seller_Phon_no']);
    $seller_pancard_no = mysqli_real_escape_string($conn,$_POST['seller_pancard_no']);

    $email_id = mysqli_real_escape_string($conn,$_POST['Seller_Email_Id']);

    if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
    {
        $query = "SELECT seller_image FROM `tbl_seller` WHERE seller_id = $seller_id";
        $res = mysqli_query($conn,$query);
        $cnt=mysqli_num_rows($res);
        if($cnt > 0)
        {
            $image_name  = $row['seller_image'];  
            $filePath = "../seller-images/".$image_name;
            if (file_exists($filePath)) 
            {
                unlink($filePath);
            }
        }
        else
        {
        	echo "0";
        }

        $file_name = $_FILES['image']['name'];
        $file_tmp_name = $_FILES['image']['tmp_name'];
        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
        $valid_extension = array("jpg", "jpeg" , "png");
            
        if(in_array($extension, $valid_extension))
        {
            if( $_FILES['image']['size']<200000 )
            {
                $new_file_name = $_SESSION['Seller_Id']."-".date("d-m-y-h-m-s")."-".rand(1,10000).$seller_name;
            
                move_uploaded_file($file_tmp_name, "../seller-images/".$new_file_name);

                $query = "UPDATE `tbl_seller` SET seller_image = '$new_file_name' WHERE seller_id = $seller_id";
               // echo $query;
                if(mysqli_query($conn,$query))
                {
                	$_SESSION['Seller_Image'] = $new_file_name;
                    $temp = 1;
                }
                else
                {
                    echo "0";
                }
            }
            else
            {
            	echo "1";
            }
        }
        else
        {
        	echo "2";
        }
    }

    $query = "SELECT s_login_id FROM `tbl_seller` WHERE seller_id = $seller_id";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
    	while ($row = mysqli_fetch_assoc($res)) {
    		$s_login_id = $row['s_login_id'];
        }
    	$query = "UPDATE `tbl_seller_login` SET email_id = '$email_id' WHERE s_login_id = $s_login_id";
		
		if(mysqli_query($conn,$query))
	    {
	    	setcookie("vendor_login", "", time() - 3600, "/");
			setcookie("vendor_password", "", time() - 3600, "/");
	    	$query = "UPDATE `tbl_seller` SET seller_name = '$seller_name' , seller_l_name = '$seller_l_name' , seller_phone_no = '$seller_phone_no' , seller_pancard_no = '$seller_pancard_no', seller_update_date = '".date('Y-m-d H:i:s')."' WHERE seller_id = $seller_id";

		    if(mysqli_query($conn,$query))
		    {
		    	$_SESSION['Seller_Name'] = $seller_name;
				echo "3";
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
    else
    {
    	echo "0";
    }
}
else
{
	header("Location:404.php");
}