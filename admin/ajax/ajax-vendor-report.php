<?php
require_once('./check-admin.php');
require_once('../../config.php');
$status = mysqli_real_escape_string($conn, $_POST['status']);

$query = "SELECT s.seller_id,s.seller_name,l.email_id,s.seller_phone_no,s.seller_status,s.seller_create_date,s.seller_update_date,a.shop_name FROM tbl_seller s,tbl_shop a,tbl_seller_login l WHERE s.seller_id=a.seller_id AND l.s_login_id=s.s_login_id AND seller_status = $status";

$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    $output = '
              <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                <thead>
                  <tr>
                  <th>No.</th>
                  <th>Seller Name</th>
                  <th>Shop Name</th>
                  <th>Phone No</th>
                  <th>Email Id</th>    
                  <th>Register Date</th>
                  <th>Seller Status</th>
                  </tr>
                </thead><tbody>';
    $i = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $seller_name = $row['seller_name'];
        $seller_id = $row['seller_id'];
        $shop_name = $row['shop_name'];
        $phone_no = $row['seller_phone_no'];
        $email = $row['email_id'];
        $seller_create_date = $row['seller_create_date'];
        $seller_status = $row['seller_status'];
        $c_d = explode(" ", $seller_create_date);
        $i = $i + 1;

        $output .= "
        <tr>
        <td>{$i}</td>
        <td>{$seller_name}</td>
        <td>{$shop_name}</td>
        <td>{$phone_no}</td>
        <td>{$email}</td>
        <td>{$c_d[0]}</td>";

        if ($seller_status == 1) {
            $output .= "<td><span class='label bg-green shadow-style'>Active</span></td>";
        } else if ($seller_status == 0) {
            $output .= "<td><span class='label bg-red shadow-style'>Disable</span></td>";
        } else if ($seller_status == 3) {
            $output .= "<td><span class='label bg-red shadow-style'>Rejected</span></td>";
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
                    <th>Seller Name</th>
                    <th>Shop Name</th>
                    <th>Phone No</th>
                    <th>Email Id</th>    
                    <th>Register Date</th>
                    <th>Seller Status</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan=10><center>No Record Available</center></td>
                </tr>
                </tbody>
                ';
}
