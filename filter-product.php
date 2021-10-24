<?php
require_once 'head.php';
if (isset($_GET['category'])) {
  $category = $_GET['category'];
} else {
  $category = '';
}
if (isset($_GET['subcategory'])) {
  $subcategory = $_GET['subcategory'];
} else {
  $subcategory = '';
}
if (isset($_GET['maxPrice'])) {
  $maxPrice = $_GET['maxPrice'];
} else {
  $maxPrice = '';
}
if (isset($_GET['minPrice'])) {
  $minPrice = $_GET['minPrice'];
} else {

  $minPrice = '';
}
?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>

    <!-- End .header -->

    <main class="main">
      <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
          <h1 class="page-title">Category</h1>
        </div>
        <!-- End .container -->
      </div>
      <!-- End .page-header -->
      <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Shop
            </li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->

      <div class="page-content">
        <div class="container">
          <div class="row">
            <div class="col-lg-9">

              <div class="products mb-3">
                <div class="row justify-content-center" id="filter_data" style="margin : 10px">

                  <!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                </div>
                <!-- End .row -->
              </div>
              <!-- End .products -->

              <!-- <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                      <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                    </a>
                  </li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">3</a>
                  </li>
                  <li class="page-item-total">of 6</li>
                  <li class="page-item">
                    <a class="page-link page-link-next" href="#" aria-label="Next">
                      Next
                      <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                    </a>
                  </li>
                </ul>
              </nav> -->
            </div>
            <!-- End .col-lg-9 -->
            <aside class="col-lg-2 order-lg-first">
              <div class="sidebar sidebar-shop">
                <div class="widget widget-clean">
                  <label>Filters:</label>
                  <a href="#" class="sidebar-filter-clear">Clean All</a>
                </div>
                <!-- End .widget widget-clean -->

                <div class="widget widget-collapsible">
                  <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                      Gift Category
                    </a>
                  </h3>
                  <!-- End .widget-title -->

                  <div class="collapse show" id="widget-1">
                    <div class="widget-body">
                      <div class="filter-items filter-items-count">
                        <div class='filter-item'>
                          <?php
                          require_once('./config.php');
                          $sql = "SELECT cate_id,cate_name FROM tbl_category  LIMIT 12 OFFSET 1";
                          $result = mysqli_query($conn, $sql) or die("Query Faild 1");
                          if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?>

                              <div class='custom-control custom-checkbox'>
                                <input type='checkbox' class='custom-control-input cate' value='<?php echo $row['cate_id'] ?>' name="category" id='cat-<?php echo $row['cate_id'] ?>' <?php if ($row['cate_name'] == $category) {
                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                      } ?> />
                                <label class='custom-control-label common_selector' id='cate_id' for='cat-<?php echo $row['cate_id'] ?>'><?php echo $row['cate_name'] ?></label>
                              </div>


                          <?php }
                          } ?>
                        </div>
                      </div>
                      <!-- End .filter-items -->
                    </div>
                    <!-- End .widget-body -->
                  </div>
                  <!-- End .collapse -->
                </div>
                <!-- End .widget -->

                <div class="widget widget-collapsible">
                  <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                      By Relation
                    </a>
                  </h3>
                  <!-- End .widget-title -->

                  <div class="collapse show" id="widget-4">
                    <div class="widget-body">
                      <div class="filter-items">
                        <?php
                        require_once('./config.php');
                        $sql = "SELECT sugg_id,sugg_for FROM tbl_suggestion  LIMIT 12";
                        $result = mysqli_query($conn, $sql) or die("Query Faild 1");
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class='filter-item'>
                              <div class='custom-control custom-checkbox'>
                                <input type='checkbox' class='custom-control-input sugg' value="<?php echo $row['sugg_id'] ?>" id='rel-<?php echo $row['sugg_id'] ?>' />
                                <label class='custom-control-label' for='rel-<?php echo $row['sugg_id'] ?>'><?php echo $row['sugg_for'] ?></label>
                              </div>
                            </div>

                        <?php }
                        } ?>
                        <!-- End .filter-item -->


                      </div>
                      <!-- End .filter-items -->
                    </div>
                    <!-- End .widget-body -->
                  </div>
                  <!-- End .collapse -->
                </div>
                <!-- End .widget -->

                <div class="widget widget-collapsible">
                  <h3 class="widget-title">
                    <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                      Price
                    </a>
                  </h3><!-- End .widget-title -->

                  <div class="collapse show" id="widget-5">
                    <div class="widget-body">
                      <div class="filter-price">
                        <div class="filter-price-text">
                          Price Range:
                          <input type="hidden" name="category" id="category" value='<?php echo $category ?>' />
                          <input type="hidden" name="subcategory" id="subcategory" value='<?php echo $subcategory ?>' />
                          <input type="hidden" name="minimum_price" id="minimum_price" value='<?php echo $minPrice ?>' />
                          <input type="hidden" name="maximum_price" id="maximum_price" value='<?php echo $maxPrice ?>' />
                          <span id="filter-price-range"></span>

                        </div><!-- End .filter-price-text -->

                        <div id="price-slider"></div><!-- End #price-slider -->
                      </div><!-- End .filter-price -->
                    </div><!-- End .widget-body -->
                  </div><!-- End .collapse -->
                </div><!-- End .widget -->
              </div>
              <!-- End .sidebar sidebar-shop -->
            </aside>
            <!-- End .col-lg-3 -->
          </div>
          <!-- End .row -->
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

  <!-- Sign in / Register Modal -->
  <?php require_once("./signin-modal.php") ?>
  <!-- End .modal -->

  <!-- End .modal -->

  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/wNumb.js"></script>
  <script src="assets/js/bootstrap-input-spinner.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/nouislider.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Custom Js File -->
  <script src="assets/js/custom.js" defer></script>

</body>

<!-- molla/category-4cols.html  22 Nov 2019 10:02:55 GMT -->

</html>