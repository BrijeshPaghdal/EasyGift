<?php
require_once("../config.php");
session_start();
$city = $_SESSION['city'];

$query = "SELECT DISTINCT p.prod_id , p.prod_name , p.avai_qua , p.price FROM `tbl_product` p , `tbl_cities` c , `tbl_address` a ,`tbl_sub_category` s ,`tbl_category` e , `tbl_suggestion` g , `tbl_prod_sugg` h  WHERE p.shop_id = a.shop_id AND g.sugg_id = h.sugg_id AND p.sub_c_id = s.sub_c_id  AND a.city_id = c.city_id  AND p.prod_status = 1 ";
if(isset($_SESSION['user_id']))
{
  if(isset($_SESSION['city']))
  {
    $query .= "AND c.city_name = '$city'";
  }
}
if (isset($_POST['minimum_price'])) {
  if ($_POST['minimum_price'] != '') {
    $query .= " AND p.price > " . $_POST['minimum_price'];
  }
}

if (isset($_POST['maximum_price'])) {
  if ($_POST['maximum_price'] != '') {
    $query .= " AND p.price <" . $_POST['maximum_price'];
  }
}

if (isset($_POST['category'])) {
  if ($_POST['category'] != '') {
    $category = $_POST['category'];
    $query .= " AND e.cate_name = '$category'";
  }
}

if (isset($_POST['subcategory'])) {
  if ($_POST['subcategory'] != '') {
    $subcategory = $_POST['subcategory'];
    $query .= " AND s.sub_c_name = '$subcategory'";
  }
}

if (isset($_POST['cate_id'])) {
  $cate_id = implode(",", $_POST["cate_id"]);
  $query .= " AND s.sub_c_id = p.sub_c_id AND s.cate_id IN(" . $cate_id . ")";
}
if (isset($_POST['sugg_id'])) {
  $sugg_id = implode(",", $_POST["sugg_id"]);
  $query .= " AND p.prod_id = h.prod_id AND h.sugg_id IN(" . $sugg_id . ")";
}
// echo $query;

$res = mysqli_query($conn, $query) or die("error occured");
$cnt = mysqli_num_rows($res);

if ($cnt > 0) {
  $output = '';
  while ($row = mysqli_fetch_assoc($res)) {
    $prod_id = $row['prod_id'];

    $prod_name = $row['prod_name'];
    $price = $row['price'];
    $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
    $res1 = mysqli_query($conn, $query);
    $cnt1 = mysqli_num_rows($res1);
    if ($cnt1 > 0) {
      $image_name = "";
      while ($row1 = mysqli_fetch_assoc($res1)) {
        $image_name = $row1['image_name'];
        break;
      }
    }

    $output .= '<div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <div class="product text-center">
                    <figure class="product-media">

              <a href="product.php?prod_id=' . $prod_id . '">
                <img src="./vendor/product-images/' . $image_name . '" alt="Product image" class="product-image" />
              </a>';

    if(isset($_SESSION['user_id'])){

      $cust_id = $_SESSION['user_id'];

      $query = "SELECT * FROM `tbl_wishlist` WHERE prod_id = $prod_id AND cust_id = $cust_id";

    	$res1=mysqli_query($conn,$query);
    	$cnt1=mysqli_num_rows($res1);
      if($cnt1 > 0)
      {
        while ($row1 = mysqli_fetch_assoc($res1)) {
          $status = $row1['status'];
          if($status == 1)
          {
              $heart = "icon-heart";
              $msg = "remove from wishlist";
          }
          else {
            $heart = "icon-heart-o";
            $msg = "add to wishlist";
          }
        }
        $output .= '<div class="product-action-vertical">
            <i class="btn-product-icon '.$heart.' btn-expandable" id="wish" value=' . $prod_id . '><span>'.$msg.'</span></i>
          </div>
          <!-- End .product-action-vertical -->';

      }
      else {
        $output .= '<div class="product-action-vertical">
            <i class="btn-product-icon icon-heart-o btn-expandable" id="wish" value=' . $prod_id . '><span>add to wishlist</span></i>
          </div>
          <!-- End .product-action-vertical -->';
      }
    }

    $output .= '<div class="product-action">';
    if($row['avai_qua'] > 0)
    {
      $output .= '<a href="" id=' . $prod_id . ' class="btn-product btn-cart"><span>add to cart</span></a>';
    }
    else
    {
      $output .= '<span class="btn-product btn-cart">sold out</span>';
    }
    $output .= '</div>
              <!-- End .product-action -->
            </figure>
            <!-- End .product-media -->

            <div class="product-body">
              <!-- End .product-cat -->
              <h3 class="product-title">
                <a href="product.php?prod_id=' . $prod_id . '">' . $prod_name . '</a>
              </h3>
              <!-- End .product-title -->
              <div class="product-price">₹' . $price . '</div>
              <!-- End .product-price -->';
    $query = "SELECT r.rating FROM `tbl_review` r , `tbl_order` o WHERE o.id = r.id AND o.prod_id = $prod_id";
    $res2 = mysqli_query($conn, $query);
    $cnt2 = mysqli_num_rows($res2);
    if ($cnt2 > 0) {
      $rating = 0;
      $image_name = "";
      while ($row2 = mysqli_fetch_assoc($res2)) {
        $rating += (int)$row2['rating'];
      }
      $rating = ($rating / ($cnt2 * 5)) * 100;
      $total_rating = $cnt2;
    } else {
      $rating = 0;
      $total_rating = $cnt2;
    }

    $output .= '  <div class="ratings-container">
                <div class="ratings">
                  <div class="ratings-val" style="width:' . $rating . '%"></div>
                  <!-- End .ratings-val -->
                </div>
                <!-- End .ratings -->
                </div>
                <div class="ratings-container">
                <span class="ratings-text">( ' . $total_rating . ' Reviews )</span>
              </div>
              <!-- End .rating-container -->
            </div>';
    $output .= '<!-- End .product-body -->
                          </div>
                          <!-- End .product -->
                        </div>';
  }
  echo $output;
} else {
  echo "No Product Available";
}
