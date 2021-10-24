<?php
include 'config.php';

function resize_image($image_name , $max_resolution)
{
  if(file_exists("./product-images/".$image_name))
  {
    $extension = pathinfo($image_name,PATHINFO_EXTENSION);
    if(strcmp($extension,"png") == 0)
    {
      $original_image = imagecreatefrompng("./product-images/".$image_name);
    }
    else if (strcmp($extension,"jpeg") == 0 || strcmp($extension,"jpg") == 0) {
      $original_image = imagecreatefromjpeg("./product-images/".$image_name);
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

    //echo $new_width . " " .$new_height;

    if($original_image)
    {
      $new_image = imagecreatetruecolor($new_width,$new_height);

      //imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
      imagecopyresized($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);

      if(strcmp($extension,"png") == 0)
      {
        imagepng($new_image,"vendor/product-images/".$image_name);
      }
      elseif (strcmp($extension,"jpeg") == 0 || strcmp($extension,"jpg") == 0) {
        echo "success";
        imagejpeg($new_image,"vendor/product-images/".$image_name);
      }

    }
    else {
      echo "no";
    }
  }
  else{
    echo "sdfsdf";
  }
}




$query = "SELECT * FROM `tbl_image`";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
  $tmp = 0;
  while ($row = mysqli_fetch_assoc($res)) {
      $image_name = $row['image_name'];
      $image_id = $row['image_id'];
      resize_image($image_name,"1000");
      echo "$image_id : $image_name <br>";
      echo "<img src = './vendor/product-images/$image_name'><br>";


  }
}

?>
