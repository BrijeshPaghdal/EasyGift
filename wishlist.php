<?php require_once 'head.php'; ?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>

    <!-- End .header -->

    <main class="main">
      <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
          <h1 class="page-title">Wishlist<span>Shop</span></h1>
        </div>
        <!-- End .container -->
      </div>
      <!-- End .page-header -->
      <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Wishlist
            </li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->

      <div class="page-content">
        <div class="container" id = "show_wishlist">
          <table class="table table-wishlist table-mobile" >
            <thead>
              <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Stock Status</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td class="product-col">
                  <div class="product">
                    <figure class="product-media">
                      <a href="#">
                        <img src="assets/images/products/table/product-2.jpg" alt="Product image" />
                      </a>
                    </figure>

                    <h3 class="product-title">
                      <a href="#">Blue utility pinafore denim dress</a>
                    </h3>
                    <!-- End .product-title -->
                  </div>
                  <!-- End .product -->
                </td>
                <td class="price-col">$76.00</td>
                <td class="stock-col">
                  <span class="in-stock">In stock</span>
                </td>
                <td class="action-col">
                  <button class="btn btn-block btn-outline-primary-2">
                    <i class="icon-cart-plus"></i>Add to Cart
                  </button>
                </td>
                <td class="remove-col">
                  <button class="btn-remove">
                    <i class="icon-close"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="product-col">
                  <div class="product">
                    <figure class="product-media">
                      <a href="#">
                        <img src="assets/images/products/table/product-3.jpg" alt="Product image" />
                      </a>
                    </figure>

                    <h3 class="product-title">
                      <a href="#">Orange saddle lock front chain cross body bag</a>
                    </h3>
                    <!-- End .product-title -->
                  </div>
                  <!-- End .product -->
                </td>
                <td class="price-col">$52.00</td>
                <td class="stock-col">
                  <span class="out-of-stock">Out of stock</span>
                </td>
                <td class="action-col">
                  <button class="btn btn-block btn-outline-primary-2 disabled">
                    Out of Stock
                  </button>
                </td>
                <td class="remove-col">
                  <button class="btn-remove" >
                    <i class="icon-close"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- End .table table-wishlist -->

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
  <div class="mobile-menu-overlay"></div>
  <!-- End .mobil-menu-overlay -->


  <!-- Sign in / Register Modal -->
  <?php require_once("./signin-modal.php") ?>
  <!-- End .modal -->


  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

<!-- molla/wishlist.html  22 Nov 2019 09:55:06 GMT -->

</html>
