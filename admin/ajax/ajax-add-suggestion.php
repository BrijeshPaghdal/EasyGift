<?php
if (isset($_POST['SugggestFor'])) {

    require("../config.php");

    $sugg_for = mysqli_real_escape_string($conn, $_POST['SugggestFor']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $min_age = mysqli_real_escape_string($conn, $_POST['minage']);
    $max_age = mysqli_real_escape_string($conn, $_POST['maxage']);

    $query = "SELECT COUNT(sugg_id) FROM `tbl_suggestion` WHERE sugg_for = '$sugg_for'";
    $res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($res)) {
        $count = $row['COUNT(sugg_id)'];
        break;
    }
    if ($count == 0) {
          $query = "INSERT INTO `tbl_suggestion`(sugg_for,gender,min_age,max_age) VALUES";
          $query .= "('$sugg_for','$gender',$min_age , $max_age)";
          if (mysqli_query($conn, $query)) {
              echo "success";
          } else {
              echo "2";
          }
    } else {
        echo "1";
    }
} else {
    header("Location:404.php");
}
