<?php
require_once('./check-admin.php');
require_once('../../config.php');
$status = mysqli_real_escape_string($conn, $_POST['status']);

$query = "SELECT c.cust_id,c.cust_name,c.mobile_no,s.email_id,c.cust_status,c.create_date,c.update_date from `tbl_customer` c,`tbl_cust_login` s WHERE c.cust_login_id=s.cust_login_id AND c.cust_status = $status";

$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    $output = '
              <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                <thead>
                  <tr>
                  <th>No.</th>
                  <th>User Name</th>
                  <th>Phone No</th>
                  <th>Email Id</th>    
                  <th>Register Date</th>
                  <th>User Status</th>
                  </tr>
                </thead><tbody>';
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
            $output .= "<td><span class='label bg-green shadow-style'>Active</span></td>";
        } else if ($cust_status == 0) {
            $output .= "<td><span class='label bg-red shadow-style'>Disable</span></td>";
        }
        $output .= "</tr>";
    }

    $output .= "</tbody></table></div>";
    echo $output;
} else {
    echo '
              <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User Name</th>
                        <th>Phone No</th>
                        <th>Email Id</th>    
                        <th>Register Date</th>
                        <th>User Status</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan=10><center>No Record Available</center></td>
                </tr>
                </tbody>
                ';
}
