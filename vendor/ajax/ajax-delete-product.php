<?php
    include 'check-seller.php';
    if(isset($_SESSION['Seller_Name']))
    {
        if(isset($_POST['prod_id']))
        {
            $shop_id = $_SESSION['Shop_Id'];
            $prod_id = mysqli_real_escape_string($conn,$_POST['prod_id']);
            date_default_timezone_set("Asia/Kolkata");

            $query="SELECT i.image_name FROM `tbl_product` p , `tbl_image` i where i.prod_id = p.prod_id AND p.prod_id = $prod_id";

            $res=mysqli_query($conn,$query);
            $cnt=mysqli_num_rows($res);
            if($cnt > 0)
            {
                $i=1;
                while($row=mysqli_fetch_assoc($res))
                {
                    $image_name = $row['image_name'];

                    $filePath = "../product-images/".$image_name;

                    if (file_exists($filePath))
                    {
                        unlink($filePath);
                    }
                     else
                    {
                        echo 2;
                    }
                }
            }

            $query = "DELETE FROM `tbl_image` WHERE prod_id = $prod_id";
            mysqli_query($conn,$query) or die("Error Occured");
            //$query = "DELETE FROM `tbl_product` WHERE prod_id = $prod_id AND shop_id = $shop_id";
            $today = date("y-m-d H:i:s");
            $query = "UPDATE `tbl_product` SET prod_status = 2  , update_date = '$today' WHERE prod_id = $prod_id AND shop_id = $shop_id";
            if(mysqli_query($conn,$query))
            {
                echo 1;
            }
            else
            {
                echo 2;
            }
        }
    }
?>
