<?php
require_once('./check-admin.php');
require_once('../../config.php');
$prod_id = $_POST['prod_id'];
$query = "SELECT c.cust_name , p.prod_name , r.rating , r.review , r.review_date FROM `tbl_review` r , `tbl_order` o , `tbl_product` p , `tbl_customer` c WHERE r.id = o.id AND o.prod_id = p.prod_id AND p.prod_id = $prod_id AND o.cust_id = c.cust_id  ORDER BY r.review_date DESC LIMIT 5";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
  $output = '<div class="product-description">
                    <h2 class="mb-5">Product Review</h2>
                    <table id="quick-product-table" class="table table-hover">';

  while ($row = mysqli_fetch_assoc($res)) {
    $cust_name = $row['cust_name'];
    $prod_name = $row['prod_name'];
    $rating = $row['rating'];
    $review = $row['review'];
    $review_date = $row['review_date'];

    $time = strtotime($review_date);

    $output .= '<tr><td><div class="row">
                <div class="review-img">
                  <i class="material-icons col-green" style= "font-size:35px">account_circle</i>
                </div>
                <div class="col">
                  <h6 class="m-b-15">
                    ' . $cust_name . '
                    <span class="float-right m-r-10 text-muted">
                    ' . date("d-m-Y h:i A", $time) . '
                    </span>
                  </h6>';

    for ($i = 0; $i < 5; $i++) {
      if ($i < $rating) {
        $output .= '<i class="material-icons col-orange">star</i>';
      } else {
        $output .= '<i class="material-icons col-orange">star_border</i>';
      }
    }


    $output .= '<p class="m-t-15 m-b-15">
                    ' . $review . '
                  </p>
                </div>
              </div></td></tr>';
  }
  $output .= '</table></div>';
  echo $output;
} else {
  echo "No Record Found";
}
