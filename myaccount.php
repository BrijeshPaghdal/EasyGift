<?php
require_once 'head.php';
require_once('./check-user.php');
include "config.php";

$pagetitle = "My Account";

session_start();

$cust_id = $_SESSION['user_id'];
$query = "SELECT * FROM `tbl_customer` WHERE cust_id = $cust_id";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
    $cust_name = $row['cust_name'];
    $mobile_no = $row['mobile_no'];
    $cust_login_id = $row['cust_login_id'];
  }
}

$query = "SELECT email_id FROM `tbl_cust_login` WHERE cust_login_id = $cust_login_id";
$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
    $email_id = $row['email_id'];
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
                    <h1 class="page-title">My Account </h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $pagetitle ?></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="dashboard">
                    <div class="container">
                        <div class="row">
                            <aside class="col-md-4 col-lg-3">
                                <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">My Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="logout.php">Sign Out</a>
                                    </li>
                                </ul>
                            </aside><!-- End .col-lg-3 -->

                            <div class="col-md-8 col-lg-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                        <p>Hello <span class="font-weight-normal text-dark">User</span>
                                            <br>
                                            From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.
                                        </p>
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                        <table class="table table-wishlist table-mobile" id="order-details">

                                        </table>
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                        <p>No downloads available yet.</p>
                                        <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                        <p>The following addresses will be used on the checkout page by default.</p>

                                    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                        <form id="acc_setting" method="post">
                                            <label>Name * (leave has it is for not change)</label>
                                            <input type="text" name="cust_name" id="cust_name" class="form-control" value="<?php echo $cust_name ?>" required>

                                            <!-- <label>Display Name *</label>
                                            <input type="text" class="form-control" required>
                                            <small class="form-text">This will be how your name will be displayed in the account section and in reviews</small> -->

                                            <label>Email address * (leave has it is for not change)</label>
                                            <input type="email" name="email_id" class="form-control" value="<?php echo $email_id ?>" required>

                                            <label>Phone No. * (leave has it is for not change)</label>
                                            <input type="text" name="mobile_no" class="form-control" value="<?php echo $mobile_no ?>" required>

                                            <label>Current password (leave blank to leave unchanged)</label>
                                            <input type="password" id="curr_passwd" name="curr_passwd" class="form-control">

                                            <label>New password (leave blank to leave unchanged)</label>
                                            <input type="password" id = "new_passwd" name="new_passwd" class="form-control">

                                            <label>Confirm new password</label>
                                            <input type="password" id = "cnf_passwd" name="cnf_passwd" class="form-control mb-2">

                                            <input type="submit" class="btn btn-outline-primary-2 icon-long-arrow-right" value="SAVE CHANGES">

                                        </form>
                                    </div><!-- .End .tab-pane -->


                                </div>
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .dashboard -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php require_once 'footer.php'; ?>
        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <!-- Mobile Menu -->
    <?php require_once 'mobile-menu.php'; ?>



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


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->

</html>
