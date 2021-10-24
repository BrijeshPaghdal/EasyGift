<?php
require("../config.php");
$cate_name = mysqli_real_escape_string($conn, $_POST['catename']);
$cate_id = mysqli_real_escape_string($conn, $_POST['cate_id']);

// if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
//     $file_name = $_FILES['image']['name'];
//     $file_tmp_name = $_FILES['image']['tmp_name'];
//     $extension = pathinfo($file_name, PATHINFO_EXTENSION);
//     $valid_extension = array("jpg", "jpeg", "png");

//     if (in_array($extension, $valid_extension)) {
//         if ($_FILES['image']['size'] < 200000) {
//             $new_file_name = date("d-m-y-h-m-s") . "-" . rand(1, 10000) . $file_name;
//             move_uploaded_file($file_tmp_name, "../category-image/" . $new_file_name);
//             $query = "INSERT INTO `tbl_category`(cate_name,image_name) VALUES";
//             $query .= "('$cate_name','$new_file_name')";

//             $result = mysqli_query($conn, $query);
//         } else {
//             echo "1";
//         }
//     } else {
//         echo "3";
//     }
// } else {
//     echo "2";
// }
echo $cate_id;
