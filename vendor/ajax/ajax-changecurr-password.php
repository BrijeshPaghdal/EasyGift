<?php
    include 'check-seller.php';

    if(isset($_POST['passwd']))  
    {
        $currPasswd = mysqli_real_escape_string($conn,$_POST['passwd']);
        $newPasswd = mysqli_real_escape_string($conn,$_POST['newpasswd']);
        $seller_id = $_SESSION['Seller_Id'];

        $query = "SELECT s_login_id FROM `tbl_seller` WHERE seller_id = $seller_id";
        $res = mysqli_query($conn,$query);
        $cnt=mysqli_num_rows($res);
        if($cnt > 0)
        {
            while ($row = mysqli_fetch_assoc($res)) 
            {
               $s_login_id = $row['s_login_id'];
            }
            $query = "SELECT passwd FROM `tbl_seller_login` WHERE s_login_id = $s_login_id";
            $res = mysqli_query($conn,$query);
            $cnt=mysqli_num_rows($res);
            if($cnt > 0)
            {
                while ($row = mysqli_fetch_assoc($res)) 
                {
                   $passwd = $row['passwd'];
                }
                if($passwd == $currPasswd)
                {
                    $query = "UPDATE `tbl_seller_login` SET passwd = '$newPasswd' WHERE s_login_id = $s_login_id AND passwd = '$currPasswd'";
                    if(mysqli_query($conn,$query))
                    {
                        setcookie("vendor_login", "", time() - 3600, "/");
                        setcookie("vendor_password", "", time() - 3600, "/");
                        echo "1";
                    }
                }
                else
                {
                    echo "2";
                }
            }
            else
            {
                echo "3";
            }
        }
        else
        {
            echo "3";
        }
    }

?>
