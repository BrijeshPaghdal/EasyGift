<?php
include('../config.php');
$name = mysqli_real_escape_string($conn, $_POST['register-name']);
$email = mysqli_real_escape_string($conn, $_POST['register-email']);
$number = mysqli_real_escape_string($conn, $_POST['register-number']);
$passwd = mysqli_real_escape_string($conn, $_POST['register-password']);
$cpasswd = mysqli_real_escape_string($conn, $_POST['register-confirm-password']);

// validation 
function checkReqiredField($arrayInput)
{
    $tempArray = array();
    foreach ($arrayInput as $name => $val) {
        if (strlen($val) === 0) {
            switch ($name) {
                case 0:
                    array_push($tempArray, "0");
                    break;
                case 1:
                    array_push($tempArray, "1");
                    break;
                case 2:
                    array_push($tempArray, "2");
                    break;
                case 3:
                    array_push($tempArray, "3");
                    break;
                case 4:
                    array_push($tempArray, "4");
                    break;
            }
        } else if ((strlen($val) !== 0)) {
            switch ($name) {
                case 0:
                    $t = checkLength($val, 3, 15);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }

                    break;
                case 1:
                    $t = checkEmail($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
                case 2:
                    $t = checkNumber($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
                case 3:
                    $t = checkPassword($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
                case 4:
                    $t = matchPassword($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
            }
        }
    }
    return $tempArray;
}

$temp = checkReqiredField([$name, $email, $number, $passwd, $cpasswd]);


function checkLength($input, $min, $max)
{
    if (strlen($input) < $min) {
        return 5;
    } else if (strlen($input) > $max) {
        return 5;
    }
}


function checkEmail($input)
{
    $vale = preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i", $input);
    if (!$vale) {
        return 6;
    }
}

function checkNumber($input)
{
    $val = preg_match("/^[+]?(\d{1,2})?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/", $input);
    if (!$val) {
        return 7;
    }
}



function checkPassword($input)
{
    $val = preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $input);
    if (!$val) {
        return 8;
    }
}

function matchPassword($input)
{
    if ($input != $GLOBALS['passwd']) {
        return 9;
    }
}



if (count($temp) > 0) {
    echo json_encode($temp);
} else {
    $query = "SELECT * FROM `tbl_cust_login` WHERE email_id = '{$email}'";
    $result = mysqli_query($conn, $query);

    $query1 = "SELECT * FROM `tbl_customer` WHERE mobile_no = '{$number}'";
    $result1 = mysqli_query($conn, $query1);
    if (mysqli_num_rows($result) > 0 || mysqli_num_rows($result1) > 0) {
        array_push($temp, "s");
        echo json_encode($temp);
    } else {
        $query = "INSERT INTO `tbl_cust_login`(email_id,passwd) VALUES";
        $passwdmd = md5($passwd);
        $query .= "('$email','$passwdmd')";
        $result = mysqli_query($conn, $query);
        $query = "SELECT * FROM `tbl_cust_login` WHERE email_id = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $login_id = $row['cust_login_id'];
            }
            $query = "INSERT INTO `tbl_customer`(cust_name,mobile_no,cust_login_id) VALUES";
            $query .= "('$name','$number','$login_id')";
            if (mysqli_query($conn, $query)) {
                echo "success";
            }
        }
    }
}
