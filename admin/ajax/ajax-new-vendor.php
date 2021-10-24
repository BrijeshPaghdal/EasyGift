<?php
include "check-admin.php";
$query = "SELECT s.seller_name , s.seller_l_name , p.shop_name , s.seller_image , s.seller_status , l.email_id FROM `tbl_seller` s , `tbl_seller_login` l , `tbl_shop` p WHERE p.seller_id = s.seller_id AND s.s_login_id = l.s_login_id ORDER BY s.seller_create_date DESC LIMIT 5";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
  $output = '<table class="table table-hover dashboard-task-infos">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Shop Name</th>
                      <th>Email</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  ';

  while ($row = mysqli_fetch_assoc($res)) {
    $seller_name = $row['seller_name'] . " ";
    $seller_name .= $row['seller_l_name'];
    $shop_name = $row['shop_name'];
    $seller_image = $row['seller_image'];
    $seller_status = $row['seller_status'];
    $email_id = $row['email_id'];



    $output .= '<tr>
          <td class="table-img" align="center">
            <img src="../vendor/seller-images/' . $seller_image . '" alt="" height="40px" width="40px" />
          </td>
          <td>' . $seller_name . '</td>
          <td>' . $shop_name . '</td>
          <td>' . $email_id . '</td>
          <td>';
    if ($seller_status == 0) {
      $output .=  '<span class="label bg-red shadow-style">Disable</span>';
    } else if ($seller_status == 1) {
      $output .=  '<span class="label bg-green shadow-style">Active</span>';
    } else if ($seller_status == 2) {
      $output .=  '<span class="label bg-orange shadow-style">Panding</span>';
    } else if ($seller_status == 3) {
      $output .=  '<span class="label bg-red shadow-style">Rejected</span>';
    }

    $output .=  '
          </td>
        </tr>';


    $output .= '</td></tr>';
  }
  $output .= '</tbody>
    </table>';
  echo $output;
} else { {
    echo "no Seller found...";
  }
}
