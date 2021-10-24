<?php
  require_once 'head.php';
  require_once('config.php');

  session_start();

  if(isset($_SESSION['user_id']))
  {
    if(isset($_SESSION['city']))
    {
      $user_latitude = $_SESSION['latitude'];
      $user_longitude = $_SESSION['longitude'];
    }
  }
  $prod_id = mysqli_real_escape_string($conn, $_GET['prod_id']);

  $query = "SELECT p.prod_id , s.cate_name , c.sub_c_name , p.prod_name , p.comp_name , p.price , p.avai_qua , p.prod_desc , p.prod_status , p.add_date , p.update_date FROM `tbl_product` p , `tbl_sub_category` c , `tbl_category`s where s.cate_id = c.cate_id AND c.sub_c_id = p.sub_c_id AND p.prod_id = $prod_id";
  $res = mysqli_query($conn, $query);
  $cnt = mysqli_num_rows($res);
  if ($cnt > 0) {
  while ($row = mysqli_fetch_assoc($res)) {

    $cate_name = $row['cate_name'];
    $sub_c_name = $row['sub_c_name'];
    $prod_name = $row['prod_name'];
    $comp_name = $row['comp_name'];
    $price = $row['price'];
    $prod_desc = $row['prod_desc'];
  }
?>

  <body >
    <div class="page-wrapper">
      <?php require_once 'header.php'; ?>

      <!-- End .header -->

      <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
          <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">
                Products
              </li>
            </ol>
          </div>
          <!-- End .container -->
        </nav>
        <!-- End .breadcrumb-nav -->

        <div class="page-content">
          <div class="container">
            <div class="product-details-top">
              <div class="row">
                <div class="col-md-6">
                  <div class="product-gallery product-gallery-vertical">
                    <div class="row">
                      <figure class="product-main-image" >
                        <?php

                        $prod_id = mysqli_real_escape_string($conn, $_GET['prod_id']);
                        $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";

                        $res = mysqli_query($conn, $query);
                        $cnt = mysqli_num_rows($res);
                        if ($cnt > 0) {
                          $tmp = 0;
                          while ($row = mysqli_fetch_assoc($res)) {
                            if ($tmp == 0) {
                              $image_name = $row['image_name'];
                              $tmp++;
                              echo " <img id='product-zoom' src='./vendor/product-images/{$image_name}' data-zoom-image='./vendor/product-images/{$image_name}' alt='product image'>";
                            }
                          }
                        }

                        ?>
                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                          <i class="icon-arrows"></i>
                        </a>
                      </figure>
                      <!-- End .product-main-image -->

                      <div id="product-zoom-gallery" class="product-image-gallery">

                        <?php
                          $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
                          $res = mysqli_query($conn, $query);
                          $cnt = mysqli_num_rows($res);
                          if ($cnt > 0) {
                            $tmp = 0;
                            while ($row = mysqli_fetch_assoc($res)) {
                              if ($tmp == 0) {
                                $image_name = $row['image_name'];
                                $tmp++;
                                echo "<a class='product-gallery-item active' href='#' data-image='./vendor/product-images/{$image_name}' data-zoom-image='./vendor/product-images/{$image_name}'>
                                            <img src='./vendor/product-images/{$image_name}' alt='product cross' />
                                      </a>";
                              } else {
                                $image_name = $row['image_name'];
                                $tmp++;
                                echo " <a class='product-gallery-item' href='#' data-image='./vendor/product-images/{$image_name}' data-zoom-image='./vendor/product-images/{$image_name}'>
                              <img src='./vendor/product-images/{$image_name}' alt='product cross' />
                            </a>";
                              }
                            }
                          }
                        ?>


                      </div>
                      <!-- End .product-image-gallery -->
                    </div>
                    <!-- End .row -->
                  </div>
                  <!-- End .product-gallery -->
                </div>
                <!-- End .col-md-6 -->

                <div class="col-md-6">
                  <div class="product-details product-details-centered">
                    <h1 class="product-title" id="name<?php echo $prod_id ?>"><?php echo $prod_name ?></h1>
                    <!-- End .product-title -->


                    <div class="ratings-container">
                      <div class="ratings">

                        <?php
                        $query = "SELECT  avg(r.rating) as rtotal  FROM `tbl_review` r , `tbl_order` o , `tbl_product` p , `tbl_customer` c WHERE r.id = o.id AND o.prod_id = p.prod_id AND p.prod_id = '$prod_id' AND o.cust_id = c.cust_id";
                        $res = mysqli_query($conn, $query);
                        $cnt = mysqli_num_rows($res);
                        if ($cnt > 0) {
                          while ($row = mysqli_fetch_assoc($res)) {
                            $ratingavg = $row['rtotal'];
                        ?>
                            <div class="ratings-val" style="width: <?php echo $ratingavg * 20 ?>%"></div>

                        <?php }
                        } ?>
                        <!-- End .ratings-val -->
                      </div>
                      <!-- End .ratings -->

                    </div>
                    <!-- End .rating-container -->

                    <div class="product-price" id="price<?php echo $prod_id ?>"> ₹ <?php echo $price ?></div>
                    <!-- End .product-price -->

                    <div class="product-content">
                      <p>
                        <?php echo $prod_desc ?>
                      </p>
                    </div>
                    <!-- End .product-content -->

                    <div class="product-details-action">
                      <div class="details-action-col">
                        <div class="product-details-quantity">
                          <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required />
                        </div>
                        <!-- End .product-details-quantity -->

                        <button class="btn btn-block btn-outline-primary-2 btn-product btn-cart" id = "<?php echo $prod_id ?>">
                        Add to Cart
                        </button>
                      </div>
                      <!-- End .details-action-col -->


                    </div>
                    <!-- End .product-details-action -->

                    <div class="product-details-footer">
                      <div class="product-cat">
                        <span>Suggest For :</span>
                        <?php
                        $query = "SELECT s.sugg_for FROM `tbl_suggestion` s , `tbl_prod_sugg` p WHERE s.sugg_id = p.sugg_id AND p.prod_id = $prod_id";
                        $res = mysqli_query($conn, $query);
                        $cnt = mysqli_num_rows($res);
                        if ($cnt > 0) {
                          while ($row = mysqli_fetch_assoc($res)) {
                            echo "<a href='#'>{$row['sugg_for']}</a>,";
                          }
                        }
                        ?>
                      </div>
                      <!-- End .product-cat -->

                    </div>
                    <!-- End .product-details-footer -->
                  </div>
                  <!-- End .product-details -->

                </div>
                <!-- End .col-md-6 -->
              </div>
              <!-- End .row -->
            </div>
            <!-- End .product-details-top -->

            <div class="product-details-tab">
              <ul class="nav nav-pills justify-content-center" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Shop information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Location</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews</a>
                </li> -->
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                  <div class="product-desc-content">
                    <h3>Product Information</h3>

                    <ul>
                      <li>
                        Category : <?php echo $cate_name ?>
                      </li>
                      <li>
                        Sub Category : <?php echo $sub_c_name ?>
                      </li>
                      <li>
                        Company Name : <?php echo $comp_name ?>
                      </li>
                      <li>
                        Price : ₹ <?php echo $price ?>
                      </li>
                    </ul>

                    <p>
                      <?php echo $prod_desc ?>
                    </p>
                  </div>
                  <!-- End .product-desc-content -->
                </div>
                <!-- .End .tab-pane -->
                <?php
                $query = "SELECT s.shop_name ,s.longitude , s.latitude ,a.address,a.pincode,c.city_name , v.state_name from `tbl_shop` s,`tbl_product` p,`tbl_address` a,`tbl_cities` c,`tbl_states` v WHERE p.shop_id = s.shop_id AND a.shop_id = s.shop_id AND c.city_id = a.city_id AND c.state_id = v.state_id AND a.shop_id = s.shop_id AND p.prod_id = $prod_id";

                $res = mysqli_query($conn, $query);
                $cnt = mysqli_num_rows($res);
                if ($cnt > 0) {
                  while ($row = mysqli_fetch_assoc($res)) {
                    $shop_name = $row['shop_name'];
                    $address = $row['address'];
                    $pincode = $row['pincode'];
                    $city_name = $row['city_name'];
                    $state_name = $row['state_name'];
                    $longitude = $row['longitude'];
                    $latitude = $row['latitude'];
                  }
                } ?>
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                  <div class="product-desc-content">
                    <h3>Shop Information</h3>
                    <ul>
                      <li>Shop Name : <?php echo $shop_name ?></li>
                      <li>Address : <?php echo $address ?></li>
                      <li>Pincode : <?php echo $pincode ?></li>
                      <li>City : <?php echo $city_name ?></li>
                      <li>State : <?php echo $state_name ?></li>
                    </ul>

                  </div>
                  <!-- End .product-desc-content -->
                </div>
                <!-- .End .tab-pane -->
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                  <div class="product-desc-content">
                    <h3>Location</h3>
                    <input type="hidden" name="latitude" id="latitude" value="<?php echo $latitude ?>">
                    <input type="hidden" name="longitude" id="longitude" value="<?php echo $longitude ?>">
                    <input type="hidden" name="user_latitude" id="user_latitude" value="<?php echo $user_latitude ?>">
                    <input type="hidden" name="user_longitude" id="user_longitude" value="<?php echo $user_longitude ?>">
                    <div class="tab-pane body active" id="map1" style="height:500px">
                    </div>
                  </div>
                  <!-- End .product-desc-content -->
                </div>
                <!-- .End .tab-pane -->

              </div>
            </div>
              <!-- End .tab-content -->
              <div class="container">
                <div class="reviews">

                  <h3>Reviews</h3>
                  <?php
                    $temp = 0;
                    $cust_id = $_SESSION['user_id'];
                    $query = "SELECT c.cust_id , c.cust_name , p.prod_name , r.rating , r.review , r.review_date FROM `tbl_review` r , `tbl_order` o , `tbl_product` p , `tbl_customer` c WHERE r.id = o.id AND o.prod_id = p.prod_id AND p.prod_id = $prod_id AND o.cust_id = c.cust_id ORDER BY r.review_date DESC";
                    $res = mysqli_query($conn, $query);
                    $cnt = mysqli_num_rows($res);
                    if ($cnt > 0) {
                      while ($row = mysqli_fetch_assoc($res)) {
                        $c_id = $row['cust_id'];
                        $cust_name = $row['cust_name'];
                        $prod_name = $row['prod_name'];
                        $rating = $row['rating'];
                        $review = $row['review'];
                        $review_date = $row['review_date'];
                        $time = strtotime($review_date);

                        if($cust_id == $c_id)
                        {
                          $temp = 1;
                        }


                  ?>
                      <div class="review">
                        <div class="row no-gutters">
                          <div class="col-auto">
                            <h4><a href="#"><?php echo $cust_name ?></a></h4>
                            <div class="ratings-container">
                              <div class="ratings">
                                <div class="ratings-val" style="width: <?php echo $rating * 20 ?>%"></div>
                                <!-- End .ratings-val -->
                              </div>
                              <!-- End .ratings -->
                            </div>
                            <!-- End .rating-container -->
                            <span class="review-date"><?php echo date("d-m-Y", $time) ?> </span>
                          </div>
                          <!-- End .col -->
                          <div class="col">

                            <h4><?php echo $review ?> </h4>

                            <!-- <div class="review-content">

                                  </div> -->
                            <!-- End .review-content -->


                          </div>
                          <!-- End .col-auto -->
                        </div>
                      <?php }
                      if($temp == 0 && isset($_SESSION['user_id']))
                      {
                        $query = "SELECT id FROM `tbl_order` o  WHERE prod_id = $prod_id AND cust_id = $cust_id";
                        $res = mysqli_query($conn, $query);
                        $cnt = mysqli_num_rows($res);
                        if ($cnt > 0) {
                          while ($row = mysqli_fetch_assoc($res)) {
                            $ord_id = $row['id'];
                          }
                        }

                      ?>
                      <!-- End .row -->
                      <div class="mb-3"></div>

                      <form method="post" id = "add_review">
                        <div class="row">
                          <h3>Add Review</h3>

                          <div class="ratings-container col-lg-12">
                            <div class="rateyo-readonly-widg" ></div>
                            <!-- End .ratings-val -->
                          </div>

                          <div class="col-lg-12">
                            <div class="row">
                              <textarea class="form-control" cols="30" rows="4" placeholder="Keep add reviews" id="review_desc" required></textarea>
                            </div>
                          </div>
                          <input type="hidden" name = "ord_id" id="ord_id"  value="<?php echo $ord_id ?>">
                          <button type="submit" class="btn btn-outline-primary-2" id="addRating">
                            <span>ADD REVIEW</span>
                          </button>
                        </div>
                        <!-- End .row -->
                      </div>
                      </form>
                      <?php
                      }
                      ?>
                </div>
                <!-- End .review -->



              <?php
                  } else {
                    echo "<h5> No Review Available </h5>";
                  }
              ?>
              </div>
            </div>
            <!-- End .product-details-tab -->

            <h2 class="title text-center mb-4">You May Also Like</h2>
            <!-- End .title text-center -->
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false,
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

              <?php
              $query = "SELECT b.cate_name,p.prod_name,p.price,p.prod_id from `tbl_shop` s,`tbl_product` p,`tbl_address` a,`tbl_cities` c,`tbl_states` v,`tbl_sub_category` n, `tbl_category` b  WHERE p.shop_id = s.shop_id AND a.shop_id = s.shop_id AND c.city_id = a.city_id AND c.state_id = v.state_id AND a.shop_id = s.shop_id AND n.sub_c_id = p.sub_c_id AND b.cate_id = n.cate_id AND c.city_name = '$city_name' AND b.cate_name = '$cate_name' AND p.prod_status = '1'  AND p.prod_id != '$prod_id' ";
              $res = mysqli_query($conn, $query);
              $cnt = mysqli_num_rows($res);
              if ($cnt > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  $cate_name = $row['cate_name'];
                  $prod_name = $row['prod_name'];
                  $price = $row['price'];
                  $prod_id = $row['prod_id'];
              ?>
                  <div class="product product-7 text-center">
                    <figure class="product-media">


                      <a href="product.php?prod_id=<?php echo $prod_id ?>">
                        <?php
                        $query1 = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
                        $res1 = mysqli_query($conn, $query1);
                        $cnt1 = mysqli_num_rows($res1);
                        if ($cnt1 > 0) {
                          $tmp = 0;
                          while ($row1 = mysqli_fetch_assoc($res1)) {
                            if ($tmp == 0) {
                              $image_name = $row1['image_name'];
                              $tmp++;
                              echo "<img src='./vendor/product-images/{$image_name}' alt='Product image' class='product-image'>";
                            }
                          }
                        }
                        ?>
                      </a>


                      <div class="product-action">
                        <a href="#" id="<?php echo $prod_id ?>" class="btn-product btn-cart"><span>add to cart</span></a>

                      </div>
                      <!-- End .product-action -->
                    </figure>
                    <!-- End .product-media -->

                    <div class="product-body">
                      <div class="product-cat">
                        <a href="#"><?php echo $cate_name ?></a>
                      </div>
                      <!-- End .product-cat -->
                      <h3 class="product-title">
                        <a href="product.html"><?php echo $prod_name ?></a>
                      </h3>
                      <!-- End .product-title -->
                      <div class="product-price"> ₹ <?php echo $price ?></div>
                      <!-- End .product-price -->
                      <div class="ratings-container">

                        <div class="ratings">
                          <?php
                          $query2 = "SELECT  avg(r.rating) as rtotal  FROM `tbl_review` r , `tbl_order` o , `tbl_product` p , `tbl_customer` c WHERE r.id = o.id AND o.prod_id = p.prod_id AND p.prod_id = '$prod_id' AND o.cust_id = c.cust_id";
                          $res2 = mysqli_query($conn, $query2);
                          $cnt2 = mysqli_num_rows($res2);
                          if ($cnt2 > 0) {
                            while ($row2 = mysqli_fetch_assoc($res2)) {
                              $ratingavg = $row2['rtotal'];
                          ?>
                              <div class="ratings-val" style="width: <?php echo $ratingavg * 20 ?>%"></div>

                          <?php }
                          } ?>

                          <!-- End .ratings-val -->
                        </div>
                        <!-- End .ratings -->

                      </div>
                      <!-- End .rating-container -->

                    </div>
                    <!-- End .product-body -->
                  </div>
                  <!-- End .product -->
              <?php }
              } ?>
            </div>
            <!-- End .owl-carousel -->
          </div>
          <!-- End .container -->
        </div>
        <!-- End .page-content -->
      </main>
      <!-- End .main -->

      <?php require_once 'footer.php'; ?>

      <!-- End .footer -->
    </div>
    <!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top">
      <i class="icon-arrow-up"></i>
    </button>

    <!-- Mobile Menu -->
    <?php require_once 'mobile-menu.php'; ?>

    <!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <?php require_once("./signin-modal.php") ?>
    <!-- End .modal -->
  <?php } else {
  header("Location:404.php");
} ?>

  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/wNumb.js"></script>
  <script src="assets/js/bootstrap-input-spinner.js"></script>
  <script src="assets/js/jquery.elevateZoom.min.js"></script>
  <script src="assets/js/bootstrap-input-spinner.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGW4NhnfWPiQVZnDchPoXUBGUz3uLLCHE"></script>
  <!-- <script type="text/javascript" src="assets/css/plugins/rateyo/jquery.min.js"></script> -->
  <script type="text/javascript" src="assets/css/plugins/rateyo/jquery.rateyo.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Custom Js File -->
  <script src="assets/js/custom.js"></script>
  </body>

  </html>
