<?php
if (isset($_POST['A_Email'])) {
	include '../../config.php';

	$Email = mysqli_real_escape_string($conn, $_POST['A_Email']);

	$Passwd = mysqli_real_escape_string($conn, $_POST['A_Passwd']);


	$query = "SELECT * FROM `tbl_admin` WHERE a_email = '$Email' And a_passwd = '$Passwd'";

	$res = mysqli_query($conn, $query);
	$cnt = mysqli_num_rows($res);
	if ($cnt > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$a_id = $row['a_id'];
			$a_name = $row['a_name'];
			$a_email = $row['a_email'];
		}

		if (isset($_POST['remember'])) {
			setcookie("admin_login", $Email, time() + (86400 * 5), "/");
			setcookie("admin_passwd", $Passwd, time() + (86400 * 5), "/");
		}

		session_start();
		$_SESSION['Admin_Id'] = $a_id;
		$_SESSION['Admin_Name'] = $a_name;
		$_SESSION['Admin_Emailid'] = $a_email;

		echo 1;
	} else {
		echo 2;
	}
} else {
	header('Location:404.php');
}
