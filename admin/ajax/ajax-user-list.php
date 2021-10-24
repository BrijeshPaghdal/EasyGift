<?php
require_once('./check-admin.php');
require_once('../../config.php');
$query = "SELECT c.cust_id,c.cust_name,c.mobile_no,s.email_id,c.cust_status,c.create_date,c.update_date from `tbl_customer` c,`tbl_cust_login` s where c.cust_login_id=s.cust_login_id";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    $output = "
      <table class='table table-hover js-basic-example contact_list js-sweetalert' >
        <thead>
          <tr>
            <th>No.</th>
            <th>User Name</th>
            <th>Phone No</th>
            <th>Email Id</th>    
            <th>Register Date</th>
            <th>User Status</th>
          </tr>
        </thead> <tbody>";
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $cust_id = $row['cust_id'];
        $cust_name = $row['cust_name'];
        $phone_no = $row['mobile_no'];
        $email = $row['email_id'];
        $cust_create_date = $row['create_date'];
        $cust_status = $row['cust_status'];
        $c_d = explode(" ", $cust_create_date);
        $i = $i + 1;

        $output .= "<tr>
            <td>{$i}</td>   
            <td>{$cust_name}</td>
            <td>{$phone_no}</td>
            <td>{$email}</td>
            <td>{$c_d[0]}</td>";
        if ($cust_status == 1) {
            $output .= "<td>
                        <select  class='form-control custom-select label bg-green' 
                                style='border-radius: 12px 12px 12px 12px; 
                                height: 25px; 
                                width: 90px;
                                font-size : 14px'
                                name='user_status' id = 'user_status'>";
            $output .= "<option selected value = 'Enable/$cust_id'>Enable</option>";
            $output .= "<option value = 'Disable/$cust_id'>Disable</option>";
            $output .= "</select>
                            </td>";
        } else {
            $output .= "<td>
            <select  class='form-control custom-select label bg-orange' 
                    style='border-radius: 12px 12px 12px 12px; 
                    height: 25px; 
                    width: 90px;
                    font-size : 14px'
                    name='user_status' id ='user_status'>";
            $output .= "<option  value = 'Enable/$cust_id'>Enable</option>";
            $output .= "<option selected value = 'Disable/$cust_id'>Disable</option>";
            $output .= "</select>
                </td>";
        }
    }

    $output .= "</tbody></table>";
    echo $output;
} else {
    echo "<center>No Records Found.....</center>";
}
?>

<script src="assets/js/table.min.js"></script>
<!-- Custom Js -->

<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/pages/ui/dialogs.js"></script>