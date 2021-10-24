<?php
if (isset($_POST['catename'])) {

    require("../config.php");

    $cate_name = mysqli_real_escape_string($conn, $_POST['catename']);

    $query = "SELECT COUNT(cate_id) FROM `tbl_category` WHERE cate_name LIKE '$cate_name'";
    $res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($res)) {
        $count = $row['COUNT(cate_id)'];
        break;
    }
    if ($count == 0) {
        if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
            $file_name = $_FILES['image']['name'];
            $file_tmp_name = $_FILES['image']['tmp_name'];
            $extension = pathinfo($file_name, PATHINFO_EXTENSION);
            $valid_extension = array("jpg", "jpeg", "png");

            if (in_array($extension, $valid_extension)) {
                if ($_FILES['image']['size'] < 200000) {
                    $new_file_name = date("d-m-y-h-m-s") . "-" . rand(1, 10000) . $file_name;
                    move_uploaded_file($file_tmp_name, "../category-image/" . $new_file_name);

                    $query = "INSERT INTO `tbl_category`(cate_name,cate_image_name) VALUES";
                    $query .= "('$cate_name','$new_file_name')";

                    if (mysqli_query($conn, $query)) {
                        echo "success";
                    } else {
                        $filePath = "../category-image/" . $new_file_name;
                        unlink($filePath);
                        echo "5";
                    }
                } else {
                    echo "1";
                }
            } else {
                echo "3";
            }
        } else {
            echo "2";
        }
    } else {
        echo "4";
    }
} else {
    header("Location:404.php");
}
