<?php require_once 'head.php'; ?>
<?php
$pagetitle = "Cart"
?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>
    <!-- End .header -->

    <main class="main">
      <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
          <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div>
        <!-- End .container -->
      </div>
      <!-- End .page-header -->
      <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $pagetitle ?></li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->

      <div class="page-content">
        <div class="cart">
          <div class="container">
            <div class="row">
              <div class="col-lg-9">
                <table class="table table-cart table-mobile" id="cart-details">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                  </tbody>
                </table>
                <!-- End .table table-wishlist -->


                <!-- End .cart-bottom -->
              </div>
              <!-- End .col-lg-9 -->
              <aside class="col-lg-3">
                <div class="summary summary-cart">
                  <h3 class="summary-title">Cart Total</h3>
                  <!-- End .summary-title -->

                  <table class="table table-summary">
                    <tbody>
                      <tr class="summary-subtotal">
                        <td>Subtotal:</td>
                        <td class="total_price">₹ </td>
                      </tr>
                      <!-- End .summary-subtotal -->

                      <!-- End .summary-shipping-row -->

                      <tr class="summary-total">
                        <td>Total:</td>
                        <td class="total_price">₹ </td>
                      </tr>
                      <!-- End .summary-total -->
                    </tbody>
                  </table>
                  <!-- End .table table-summary -->

                  <a href="checkout.php" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                </div>
                <!-- End .summary -->

                <a href="index.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
              </aside>
              <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
          </div>
          <!-- End .container -->
        </div>
        <!-- End .cart -->
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

  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/bootstrap-input-spinner.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

<!-- molla/cart.html  22 Nov 2019 09:55:06 GMT -->

</html>