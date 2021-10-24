<?php require_once 'head.php'; ?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>

    <!-- End .header -->

    <main class="main">
      <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="
            background-image: url('assets/images/backgrounds/login-bg.jpg');
          ">
        <div class="container">
          <div class="form-box">
            <div class="form-tab">
              <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="forgot-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="forgot-2" aria-selected="false">Vendor Registration</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                  <form id="registration_vendor" method="post">
                    <div class="form-group">
                      <label for="register-fname-2">Vendor First Name *</label>
                      <input type="text" class="form-control" id="register-fname-2" name="register-first-name" required />
                    </div>
                    <!-- End .form-group -->
                    <div class="form-group">
                      <label for="register-lname-2">Vendor Last Name *</label>
                      <input type="text" class="form-control" id="register-lname-2" name="register-last-name" required />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-group">
                      <label for="register-email-2">Your email address *</label>
                      <input type="email" class="form-control" id="register-email-2" name="register-email" required />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-group">
                      <label for="register-number-2">Phone Number *</label>
                      <input type="tel" class="form-control" id="register-number-2" name="register-number" required />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-group">
                      <label for="register-password-2">Password *</label>
                      <input type="password" class="form-control" id="register-password-2" name="register-password" required />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-group">
                      <label for="register-confirm-password-2">Confirm Password *</label>
                      <input type="password" class="form-control" id="register-confirm-password-2" name="register-confirm-password" required />
                    </div>

                    <div class="form-group">
                      <label for="register-vendor-pancard-no">Pancard No *</label>
                      <input type="text" class="form-control" id="register-vendor-pancard-no" name="register-vendor-pancard-no" required />
                    </div>

                    <div class="form-group">
                      <label for="register-vendor-profile">Profile Image *</label>
                      <input type="file" class="form-control" id="image" name="image" required />
                    </div>

                    <div class="form-footer">
                      <button type="submit" class="btn btn-outline-primary-2">
                        <span>Submit</span>
                        <i class="icon-long-arrow-right"></i>
                      </button>
                    </div>
                    <!-- End .form-footer -->
                  </form>
                </div>
                <!-- .End .tab-pane -->
              </div>
              <!-- End .tab-content -->
            </div>
            <!-- End .form-tab -->
          </div>
          <!-- End .form-box -->
        </div>
        <!-- End .container -->
      </div>
      <!-- End .login-page section-bg -->
    </main>
    <!-- End .main -->
  </div>
  <?php require_once 'footer.php'; ?>

  <!-- End .footer -->

  <!-- End .page-wrapper -->
  <button id="scroll-top" title="Back to Top">
    <i class="icon-arrow-up"></i>
  </button>

  <!-- Mobile Menu -->
  <?php require_once 'mobile-menu.php'; ?>

  <!-- End .mobile-menu-container -->
  .

  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Custom Js File -->
  <script src="assets/js/custom.js"></script>


  </html>