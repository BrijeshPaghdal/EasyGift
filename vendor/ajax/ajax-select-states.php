<?php
    include 'check-seller.php';
    
    $output = "<select>";
    
    $country_name = $_POST['Country'];

    $query = "SELECT * FROM `tbl_countries` WHERE country_name = '$country_name'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $country_id = $row['country_id'];
        }
    }
    $query = "SELECT state_name FROM `tbl_states` where country_id = $country_id";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        $output .= "<option selected disabled value=''>State</option>";
        while($row = mysqli_fetch_assoc($res))
        {
            if ($row['state_name'] == $state_name)
                $selected = "selected";
            else
                $selected = "";
            $output .= "<option $selected>".$row['state_name']."</option>";   
        }
    }
    $output .= "</select>";
    echo $output;
?>