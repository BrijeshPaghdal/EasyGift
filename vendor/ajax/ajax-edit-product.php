<?php
    include 'check-seller.php';

        $temp = 0;
        $seller_id = $_SESSION['Seller_Id'];
        $shop_id = $_SESSION['Shop_Id'];

        $prod_id = mysqli_real_escape_string($conn,$_POST['prod_id']);
        $sub_c_name = mysqli_real_escape_string($conn,$_POST['Sub_C_Name']);

        $prod_name = mysqli_real_escape_string($conn,$_POST['Prod_Name']);
        $comp_name = mysqli_real_escape_string($conn,$_POST['Prod_Company']);
        $price = mysqli_real_escape_string($conn,$_POST['Price']);
        $avai_qua = mysqli_real_escape_string($conn,$_POST['Avail_Qua']);
        $prod_desc = mysqli_real_escape_string($conn,$_POST['Prod_Description']);
        date_default_timezone_set("Asia/Kolkata");

        function resize_image($image_name , $max_resolution)
        {
          if(file_exists("../product-images/".$image_name))
          {
            $extension = pathinfo($image_name,PATHINFO_EXTENSION);
            if(strcmp($extension,"png") == 0)
            {
              $original_image = imagecreatefrompng("../product-images/".$image_name);
            }
            else if (strcmp($extension,"jpeg") == 0 || strcmp($extension,"jpg") == 0) {
              $original_image = imagecreatefromjpeg("../product-images/".$image_name);
            }

            // resolution
            $original_width = imagesx($original_image);
            $original_height = imagesy($original_image);

            //try width first
            $ratio = $max_resolution / $original_width;
            $new_width = $max_resolution;
            $new_height = $original_height * $ratio;

            if($new_height > $max_resolution){
              $ratio = $max_resolution / $original_height;
              $new_height = $max_resolution;
              $new_width = $original_width * $ratio;
            }

            if($original_image)
            {
              $new_image = imagecreatetruecolor($new_width,$new_height);

              imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
               // imagecopyresized($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
              if(strcmp($extension,"png") == 0)
              {
                imagepng($new_image,"../product-images/".$image_name);
              }
              elseif (strcmp($extension,"jpeg") == 0 || strcmp($extension,"jpg") == 0) {
                imagejpeg($new_image,"../product-images/".$image_name);
              }
            }
            else {
              echo "no";
            }
          }
        }



        if(isset($_FILES['image']) && $_FILES['image']['name'][0] != '')
        {
            $query = "SELECT * FROM `tbl_image` WHERE prod_id = $prod_id";
            $res = mysqli_query($conn,$query);
            $cnt=mysqli_num_rows($res);
            if($cnt > 0)
            {
                while($row = mysqli_fetch_assoc($res))
                {
                    $image_name  = $row['image_name'];
                    $filePath = "../product-images/".$image_name;
                    if (file_exists($filePath))
                    {
                        unlink($filePath);
                    }
                }
            }
            $query = "DELETE FROM `tbl_image` WHERE prod_id = $prod_id";
            $res = mysqli_query($conn,$query);

            foreach($_FILES['image']['name'] as $key=>$val)
            {
                $file_name = $_FILES['image']['name'][$key];
                $file_tmp_name = $_FILES['image']['tmp_name'][$key];
                $extension = pathinfo($file_name,PATHINFO_EXTENSION);
                $valid_extension = array("jpg", "jpeg" , "png");

                if(in_array($extension, $valid_extension))
                {
                    if( $_FILES['image']['size'][$key]<800000 )
                    {
                        $new_file_name = $_SESSION['Seller_Id']."-".date("d-m-y-h-m-s")."-".rand(1,10000).$file_name;

                        move_uploaded_file($file_tmp_name, "../product-images/".$new_file_name);
                        resize_image($new_file_name , "1000");
                        $query = "INSERT INTO `tbl_image`(prod_id,image_name) VALUES";
                        $query .= "($prod_id,'$new_file_name')";
                       // echo $query;
                        if(mysqli_query($conn,$query))
                        {
                            $temp = 1;
                        }
                        else
                        {
                            echo "3";
                        }
                    }
                }
            }
        }
        else
        {
            $temp = 1;
        }

        $query = "SELECT sub_c_id FROM `tbl_sub_category` WHERE sub_c_name = '$sub_c_name'";
        $res = mysqli_query($conn,$query);
        $cnt=mysqli_num_rows($res);
        if($cnt > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $sub_c_id = $row['sub_c_id'];
            }
        }

        $query = "UPDATE `tbl_product` SET ";
        $query .= "shop_id = $shop_id ,";
        $query .= "sub_c_id = $sub_c_id,";
        $query .= "prod_name = '$prod_name',";
        $query .= "comp_name = '$comp_name',";
        $query .= "price = $price,";
        $query .= "avai_qua = $avai_qua,";
        $query .= "prod_desc = '$prod_desc',";
        $query .= "update_date = '".date("y-m-d H:i:s")."'";
        $query .= " WHERE prod_id = $prod_id";


        if(mysqli_query($conn,$query) && $temp == 1)
        {
            if(isset($_POST['suggest_for']))
            {
                $query = "DELETE FROM `tbl_prod_sugg` WHERE prod_id = $prod_id";
                mysqli_query($conn,$query);

                $suggest_for = $_POST['suggest_for'];

                foreach($suggest_for as $sugg_id) {
                    $query = "INSERT INTO `tbl_prod_sugg`(prod_id,sugg_id) VALUES";
                    $query .= "($prod_id,$sugg_id)";
                    mysqli_query($conn,$query);
                }
            }
            echo "1";
        }
        else
        {
            echo "2";
        }

?>
