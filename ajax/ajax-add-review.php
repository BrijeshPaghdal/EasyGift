<?php
  session_start();
  require_once("../config.php");

  $cust_id = $_SESSION['user_id'];

  $ord_id = mysqli_real_escape_string($conn,$_POST['ord_id']);
  $rating = mysqli_real_escape_string($conn,$_POST['rating']);
  $review = mysqli_real_escape_string($conn,$_POST['review']);

  $query = "INSERT INTO `tbl_review` (id,rating,review) VALUES ($ord_id,$rating,'$review')";
  if(mysqli_query($conn,$query))
  {
    echo "success";
  }
  else {
    echo "Error Occured";
  }

?>
