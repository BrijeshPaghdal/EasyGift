<?php


// Connetion Include
require_once('../config.php');
// Sller Details
$seller_first_name = mysqli_real_escape_string($conn, $_POST['register-first-name']);
$seller_last_name = mysqli_real_escape_string($conn, $_POST['register-last-name']);
$seller_phone_no = mysqli_real_escape_string($conn, $_POST['register-number']);
$seller_emailid = mysqli_real_escape_string($conn, $_POST['register-email']);
$seller_passwd = mysqli_real_escape_string($conn, $_POST['register-password']);
$seller_c_passwd = mysqli_real_escape_string($conn, $_POST['register-confirm-password']);
$pancard_no = mysqli_real_escape_string($conn, $_POST['register-vendor-pancard-no']);


function checkReqiredField($arrayInput)
{
    $tempArray = array();
    foreach ($arrayInput as $name => $val) {
        if (strlen($val) === 0) {
            switch ($name) {
                case 0:
                    array_push($tempArray, "a");
                    break;
                case 1:
                    array_push($tempArray, "b");
                    break;
                case 2:
                    array_push($tempArray, "c");
                    break;
                case 3:
                    array_push($tempArray, "d");
                    break;
                case 4:
                    array_push($tempArray, "e");
                    break;
                case 5:
                    array_push($tempArray, "f");
                    break;
                case 5:
                    array_push($tempArray, "g");
                    break;
            }
        } else if ((strlen($val) !== 0)) {
            switch ($name) {
                case 0:
                    $t = checkFirstNameLength($val, 3, 15);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }

                    break;
                case 1:
                    $t = checkLastNameLength($val, 3, 15);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }

                    break;
                case 2:
                    $t = checkEmail($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
                case 3:
                    $t = checkNumber($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
                case 4:
                    $t = checkPassword($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
                case 5:
                    $t = matchPassword($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;

                case 6:
                    $t = checkPancard($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
            }
        }
    }
    return $tempArray;
}

// Check Required Field
$temp = checkReqiredField([
    $seller_first_name, $seller_last_name, $seller_emailid, $seller_phone_no,
    $seller_passwd, $seller_c_passwd, $pancard_no
]);

if ($temp == []) {
    // Check exists Already User
    $query = "SELECT * from `tbl_seller_login` where email_id ='$seller_emailid'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)) {
        echo "Email Already Exist";
    } else {
        $seller_passwd = md5($seller_passwd);
        $query = "INSERT INTO `tbl_seller_login`(email_id,passwd) VALUES";
        $query .= "('$seller_emailid','$seller_passwd')";
        if (mysqli_query($conn, $query)) {

            $query = "SELECT s_login_id FROM `tbl_seller_login` WHERE email_id = '$seller_emailid'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $s_login_id = $row['s_login_id'];
            }

            if (isset($_FILES['image']) && $_FILES['image']['name'] != '') {
                $file_name = $_FILES['image']['name'];
                $file_tmp_name = $_FILES['image']['tmp_name'];
                $extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $valid_extension = array("jpg", "jpeg", "png");

                if (in_array($extension, $valid_extension)) {
                    if ($_FILES['image']['size'] < 500000) {
                        $new_file_name = date("d-m-y-h-m-s") . "-" . rand(1, 10000) . $file_name;
                        move_uploaded_file($file_tmp_name, "../vendor/seller-images/" . $new_file_name);

                        $query = "INSERT INTO `tbl_seller`(s_login_id,seller_name,seller_l_name,seller_phone_no,seller_pancard_no,seller_image) VALUES";
                        $query .= "($s_login_id,'$seller_first_name', '$seller_last_name','$seller_phone_no', '$pancard_no','$new_file_name')";
                        if (mysqli_query($conn, $query)) {
                            $query = "SELECT seller_id FROM `tbl_seller` WHERE s_login_id = $s_login_id";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $seller_id = $row['seller_id'];
                            }
                            $query = "INSERT INTO `tbl_shop`(seller_id) values($seller_id)";
                            if (mysqli_query($conn, $query)) {
                                $query = "SELECT shop_id FROM `tbl_shop` WHERE seller_id = $seller_id";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $shop_id = $row['shop_id'];
                                }
                                $query = "INSERT INTO `tbl_address`(shop_id ,city_id) values($shop_id,0)";
                                if (mysqli_query($conn, $query)) {
                                    $query = "INSERT INTO `tbl_s_bank_details`(seller_id ,bank_id) values($seller_id,0)";
                                    if (mysqli_query($conn, $query)) {
                                        echo "success";
                                    } else {
                                        echo "something went wrong";
                                    }
                                } else {
                                    echo "something went wrong";
                                }
                            } else {
                                echo "something went wrong";
                            }
                        } else {
                            echo "something went wrong";
                        }
                    } else {
                        echo "Image Size is too Big...";
                    }
                } else {
                    echo "Please Upload Proper Image";
                }
            } else {
                echo "Please Upload Image";
            }
        }
    }
} else {
    echo json_encode($temp);
}

function checkFirstNameLength($input, $min, $max)
{
    if (strlen($input) < $min) {
        return 1;
    } else if (strlen($input) > $max) {
        return 1;
    }
}


function checkLastNameLength($input, $min, $max)
{
    if (strlen($input) < $min) {
        return 2;
    } else if (strlen($input) > $max) {
        return 2;
    }
}


function checkEmail($input)
{
    $vale = preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i", $input);
    if (!$vale) {
        return 3;
    }
}

function checkNumber($input)
{
    $val = preg_match("/^[+]?(\d{1,2})?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/", $input);
    if (!$val) {
        return 4;
    }
}


function checkPassword($input)
{
    $val = preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $input);
    if (!$val) {
        return 5;
    }
}

// Check validate match password
function matchPassword($input)
{
    if ($input != $GLOBALS['seller_passwd']) {
        return 6;
    }
}

// Check validate pancard number
function checkPancard($input)
{
    $val = preg_match("/^([A-Z]{5})(\d{4})([A-Z]{1})$/", $input);
    if (!$val) {
        return 7;
    }
}
