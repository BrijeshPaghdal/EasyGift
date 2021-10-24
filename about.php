<?php
require_once 'head.php';
?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>

    <!-- End .header -->

    <main class="main">
      <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              About us
            </li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->
      <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('assets/images/about-header-bg.jpg')">
          <h1 class="page-title text-white">
            About us<span class="text-white">Who we are</span>
          </h1>
        </div>
        <!-- End .page-header -->
      </div>
      <!-- End .container -->

      <div class="page-content pb-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
              <h2 class="title">Our Vision</h2>
              <!-- End .title -->
              <p>
                Easygift provides best online cake, flowers and gifts buy services across near by shop in your cities in india. Order now to get best price on fresh cake, gifts and flowers with esay recieved near by shop.....
              </p>
            </div>
            <!-- End .col-lg-6 -->
          </div>
          <!-- End .row -->

          <div class="mb-5"></div>
          <!-- End .mb-4 -->
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

  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>


</html>