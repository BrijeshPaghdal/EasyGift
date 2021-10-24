<?php
require_once 'head.php';
session_start();
include_once("./check-user.php");
include "config.php";

$cust_id = $_SESSION['user_id'];
$query = "SELECT * FROM `tbl_customer` WHERE cust_id = $cust_id";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
    $cust_name = $row['cust_name'];
    $mobile_no = $row['mobile_no'];
  }
}

?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>
    <!-- End .header -->

    <main class="main">
      <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
          <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div>
        <!-- End .container -->
      </div>
      <!-- End .page-header -->
      <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">
              Checkout
            </li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->

      <div class="page-content">
        <div class="checkout">
          <div class="container">
            <!-- <div class="checkout-discount">
              <form action="#">
                <input type="text" class="form-control" required id="checkout-discount-input" />
                <label for="checkout-discount-input" class="text-truncate">Have a coupon?
                  <span>Click here to enter your code</span></label>
              </form>
            </div> -->
            <!-- End .checkout-discount -->
            <form action="order_process.php" method="post">
              <div class="row">
                <div class="col-lg-9">
                  <h2 class="checkout-title">Billing Details</h2>
                  <!-- End .checkout-title -->
                  <div class="row">
                    <div class="col-sm-6">
                      <label>First Name *</label>
                      <input type="text" class="form-control" name="fname" value = "<?php echo $cust_name ?>" required />
                    </div>
                    <!-- End .col-sm-6 -->

                    <div class="col-sm-6">
                      <label>Last Name *</label>
                      <input type="text" class="form-control" name="lname" required />
                    </div>
                    <!-- End .col-sm-6 -->
                  </div>
                  <!-- End .row -->

                  <label>Phone Number *</label>
                  <input type="tel" class="form-control" name="phone" value = "<?php echo $mobile_no ?>" required />

                  <!-- <label>Order notes (optional)</label>
                  <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea> -->
                </div>
                <!-- End .col-lg-9 -->
                <aside class="col-lg-3">
                  <div class="summary">
                    <h3 class="summary-title">Your Order</h3>
                    <!-- End .summary-title -->

                    <table class="table table-summary" id="checkout-details">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>

                      <tbody>

                      </tbody>
                    </table>
                    <!-- End .table table-summary -->

                    <div class="accordion-summary" id="accordion-payment">

                      <div class="card">
                        <div class="card-header" id="heading-3">
                          <h2 class="card-title">
                            <input type="radio" name="payment-group" class="collapsed" value="cod" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3" required checked>
                            Cash on delivery
                            </a>
                          </h2>
                        </div>
                        <!-- End .card-header -->
                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                          <div class="card-body">
                            Recieved product and pay cash amount
                          </div>
                          <!-- End .card-body -->
                        </div>
                        <!-- End .collapse -->
                      </div>
                      <!-- End .card -->


                      <div class="card">
                        <div class="card-header" id="heading-5">
                          <h2 class="card-title">
                            <input type="radio" name="payment-group" class="collapsed" value="paytm" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5" required>
                            Debit Card , Upi (Paytm)
                            <img src="assets/images/payments-summary.png" alt="payments cards" />
                            </a>
                          </h2>
                        </div>
                        <!-- End .card-header -->
                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                          <div class="card-body">
                            Pay money online and using a credit card, debit card, and UPI.
                          </div>
                          <!-- End .card-body -->
                        </div>
                        <!-- End .collapse -->
                      </div>
                      <!-- End .card -->
                    </div>
                    <!-- End .accordion -->

                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                      <span class="btn-text">Place Order</span>
                      <span class="btn-hover-text">Proceed to Checkout</span>
                    </button>
                  </div>
                  <!-- End .summary -->
                </aside>
                <!-- End .col-lg-3 -->
              </div>
              <!-- End .row -->
            </form>
          </div>
          <!-- End .container -->
        </div>
        <!-- End .checkout -->
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



</html>
