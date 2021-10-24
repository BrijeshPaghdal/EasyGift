<?php

if (isset($_POST['S_Email'])) {
	include '../../config.php';

	$Email = mysqli_real_escape_string($conn, $_POST['S_Email']);

	$Passwd = mysqli_real_escape_string($conn, $_POST['S_Passwd']);

	$HashPasswd = md5($Passwd);

	$query = "SELECT * FROM `tbl_seller_login` WHERE email_id = '$Email' And passwd = '$HashPasswd'";

	$res = mysqli_query($conn, $query);
	$cnt = mysqli_num_rows($res);
	if ($cnt > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$login_id = $row['s_login_id'];
		}
		$query = "SELECT * FROM `tbl_seller` WHERE s_login_id = $login_id";
		$res = mysqli_query($conn, $query);
		$cnt = mysqli_num_rows($res);
		if ($cnt > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$status = $row['seller_status'];
				$sellerName = $row['seller_name'];
				$seller_id = $row['seller_id'];
				$seller_image = $row['seller_image'];
			}
			if ($status == 1) {
				session_start();

				$query = "SELECT shop_id FROM `tbl_shop` WHERE seller_id = $seller_id";
				$res = mysqli_query($conn, $query);
				$cnt = mysqli_num_rows($res);
				if ($cnt > 0) {
					while ($row = mysqli_fetch_assoc($res)) {
						$shop_id = $row['shop_id'];
					}
				}

				$_SESSION['Seller_Name'] = $sellerName;
				$_SESSION['Seller_Id'] = $seller_id;
				$_SESSION['Shop_Id'] = $shop_id;
				$_SESSION['Seller_Image'] = $seller_image;

				if (isset($_POST['remember'])) {
					setcookie("vendor_login", $Email, time() + (86400 * 5), "/");
					setcookie("vendor_password", $Passwd, time() + (86400 * 5), "/");
				}

				echo 1;
			} else if ($status == 2) {
				echo 2;
			} else if ($status == 0) {
				echo 0;
			} else if ($status == 3) {
				echo 3;
			}
		}
	} else {
		echo "4";
	}
} else {
	header("Location:../login.php");
}
