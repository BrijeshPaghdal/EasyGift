 <?php
    include 'check-seller.php';

        $seller_id = $_SESSION['Seller_Id'];
        $sub_c_name = mysqli_real_escape_string($conn,$_POST['Sub_C_Name']);
        $prod_name = mysqli_real_escape_string($conn,$_POST['Prod_Name']);
        $comp_name = mysqli_real_escape_string($conn,$_POST['Prod_Company']);
        $price = mysqli_real_escape_string($conn,$_POST['Price']);
        $avai_qua = mysqli_real_escape_string($conn,$_POST['Avail_Qua']);
        $prod_desc = mysqli_real_escape_string($conn,$_POST['Prod_Description']);

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


        if(isset($_FILES['image']) && $_FILES['image']['name'][0] != '' )
        {
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

            $shop_id = $_SESSION['Shop_Id'];

            $query = "INSERT INTO `tbl_product`(shop_id,sub_c_id,prod_name,comp_name,price,avai_qua,prod_desc) VALUES";
            $query .= "($shop_id,$sub_c_id,'$prod_name','$comp_name',$price,$avai_qua,'$prod_desc')";

            $result = mysqli_query($conn,$query);

            if($result > 0)
            {
                $query = "SELECT prod_id FROM `tbl_product` WHERE shop_id = $shop_id AND prod_name = '$prod_name'";

                $res = mysqli_query($conn,$query);
                $cnt=mysqli_num_rows($res);
                if($cnt > 0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $prod_id = $row['prod_id'];
                    }
                }

                if(isset($_POST['suggest_for'])){
                    $suggest_for = $_POST['suggest_for'];
                    foreach($suggest_for as $sugg_id)
                    {
                        $query = "INSERT INTO `tbl_prod_sugg`(prod_id,sugg_id) VALUES";
                        $query .= "($prod_id,$sugg_id)";

                        mysqli_query($conn,$query);
                    }
                    $temp = 0;
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

                                if($result=mysqli_query($conn,$query))
                                {
                                    $temp = 1;
                                }
                                else
                                {
                                    $temp = 0;
                                    break;
                                }
                            }
                            else
                            {
                                echo "1";
                            }
                        }
                        else
                        {
                            echo "3";
                        }
                    }
                    if($temp == 1)
                    {
                        echo "5";
                    }
                }
                else
                {
                    echo "4";
                }
            }
		}
        else
        {
            echo "2";
        }
?>
