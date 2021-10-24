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
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Contact us
            </li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->
      <div class="container">
        <div class="page-header page-header-big text-center" style="background-image: url('assets/images/contact-header-bg.jpg')">
          <h1 class="page-title text-black">
            Contact us<span class="text-black">keep in touch with us</span>
          </h1>
        </div>
        <!-- End .page-header -->
      </div>
      <!-- End .container -->

      <div class="page-content pb-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
              <h2 class="title mb-1">Contact Information</h2>
              <!-- End .title mb-2 -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="contact-info">
                    <ul class="contact-list">
                      <li>
                        <i class="icon-map-marker"></i>
                        Surat,Gujarat
                      </li>
                      <li>
                        <i class="icon-phone"></i>
                        <a href="tel:#">+91 911 2 423 567</a>
                      </li>
                      <li>
                        <i class="icon-envelope"></i>
                        <a href="mailto:#">info@EasyGift.com</a>
                      </li>
                    </ul>
                    <!-- End .contact-list -->
                  </div>
                  <!-- End .contact-info -->
                </div>
                <!-- End .col-sm-7 -->

              </div>
              <!-- End .row -->
            </div>
            <!-- End .col-lg-6 -->
            <div class="col-lg-6">
              <h2 class="title mb-1">Got Any Questions?</h2>
              <!-- End .title mb-2 -->
              <p class="mb-2">
                Use the form below to get in touch with the sales team
              </p>

              <form action="#" class="contact-form mb-3">
                <div class="row">
                  <div class="col-sm-6">
                    <label for="cname" class="sr-only">Name</label>
                    <input type="text" class="form-control" id="cname" placeholder="Name *" required />
                  </div>
                  <!-- End .col-sm-6 -->

                  <div class="col-sm-6">
                    <label for="cemail" class="sr-only">Email</label>
                    <input type="email" class="form-control" id="cemail" placeholder="Email *" required />
                  </div>
                  <!-- End .col-sm-6 -->
                </div>
                <!-- End .row -->

                <div class="row">
                  <div class="col-sm-6">
                    <label for="cphone" class="sr-only">Phone</label>
                    <input type="tel" class="form-control" id="cphone" placeholder="Phone" />
                  </div>
                  <!-- End .col-sm-6 -->

                  <div class="col-sm-6">
                    <label for="csubject" class="sr-only">Subject</label>
                    <input type="text" class="form-control" id="csubject" placeholder="Subject" />
                  </div>
                  <!-- End .col-sm-6 -->
                </div>
                <!-- End .row -->

                <label for="cmessage" class="sr-only">Message</label>
                <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Message *"></textarea>

                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                  <span>SUBMIT</span>
                  <i class="icon-long-arrow-right"></i>
                </button>
              </form>
              <!-- End .contact-form -->
            </div>
            <!-- End .col-lg-6 -->
          </div>
          <!-- End .row -->

          <hr class="mt-4 mb-5" />


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


  <!-- Google Map -->
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>

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

<!-- molla/contact.html  22 Nov 2019 10:04:03 GMT -->

</html>