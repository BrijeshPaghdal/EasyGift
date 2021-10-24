<?php
if(isset($_POST['cate_id'])){
	require("../config.php");
	$response = array();
	$cate_id = mysqli_real_escape_string($conn, $_POST['cate_id']);
	$query  = "SELECT * FROM `tbl_category` WHERE cate_id = $cate_id";
	$res = mysqli_query($conn, $query);
	$cnt = mysqli_num_rows($res);
	if ($cnt > 0) {
	    while ($row = mysqli_fetch_assoc($res)) {
	        $image_name = $row['cate_image_name'];
	        $cate_name = $row['cate_name'];
	    }
	    $response['cname'] = $cate_name;
	    $response['iname'] = $image_name;
	    echo json_encode($response);
	}	
}
else
{
	header("Location:login.php");
}

