<?php
include('../config.php');
$email = mysqli_real_escape_string($conn, $_POST['singin-email']);
$passwd = mysqli_real_escape_string($conn, $_POST['singin-password']);



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
            }
        } else if ((strlen($val) !== 0)) {
            switch ($name) {
                case 0:
                    $t = checkEmail($val);
                    if ($t != "") {
                        array_push($tempArray, $t);
                    }
                    break;
            }
        }
    }
    return $tempArray;
}

$temp = checkReqiredField([$email, $passwd]);

function checkEmail($input)
{
    $vale = preg_match("/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i", $input);
    if (!$vale) {
        return 2;
    }
}





if (count($temp) > 0) {
    echo json_encode($temp);
} else {
    $md5passwd = md5($passwd);
    $query = "SELECT * FROM tbl_cust_login WHERE email_id = '{$email}' AND passwd = '{$md5passwd}'";
    $result = mysqli_query($conn, $query);
    $cnt = mysqli_num_rows($result);
    if ($cnt > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $log_user_id = $row['cust_login_id'];
        }
        $query1 = "SELECT cust_id FROM tbl_customer WHERE cust_login_id = $log_user_id";
        $result1 = mysqli_query($conn, $query1);
        $cnt1 = mysqli_num_rows($result1);
        if ($cnt1 > 0) {
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $cust_id = $row1['cust_id'];
            }
        }
        session_start();
        $_SESSION['user_id'] = $cust_id;
        if (isset($_POST['remember'])) {
            setcookie("user_login", $email, time() + (86400 * 5), "/");
            setcookie("user_password", $passwd, time() + (86400 * 5), "/");
        }
        echo "success";
    } else {
        array_push($temp, "3");
        echo json_encode($temp);
    }
}
