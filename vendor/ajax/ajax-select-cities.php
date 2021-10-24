<?php
    include 'check-seller.php';
    $output = "<select>";
    
    $state_name = $_POST['State'];

    $query = "SELECT * FROM `tbl_states` WHERE state_name = '$state_name'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $state_id = $row['state_id'];
        }
    }
    $query = "SELECT city_name FROM `tbl_cities` where state_id = $state_id";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<option selected disabled value=''>City</option>";
        while($row = mysqli_fetch_assoc($res))
        {
            if ($row['city_name'] == $country_name)
                $selected = "selected";
            else
                $selected = "";
            $output .= "<option>".$row['city_name']."</option>";   
        }
    }
    $output .= "</select>";
    echo $output;
?>