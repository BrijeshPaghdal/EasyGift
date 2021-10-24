<?php require_once('head.php'); ?>

<body>
  <div class="page-wrapper">
    <?php require_once('header.php'); ?>
    <!-- End .header -->

    <main class="main">
      <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Login</li>
          </ol>
        </div>
        <!-- End .container -->
      </nav>
      <!-- End .breadcrumb-nav -->

      <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="
            background-image: url('assets/images/backgrounds/login-bg.jpg');
          ">
        <div class="container">
          <div class="form-box">
            <div class="form-tab">
              <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="true">Sign In</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="false">Register</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                  <form id="sign-in" method="post">
                    <div class="form-group">
                      <label for="singin-email-2">Username or email address *</label>
                      <input type="text" class="form-control" id="singin-email-2" name="singin-email" required value="<?php if (isset($_COOKIE['user_login'])) {
                                                                                                                        echo $_COOKIE['user_login'];
                                                                                                                      } ?>" />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-group">
                      <label for="singin-password-2">Password *</label>
                      <input type="password" class="form-control" id="singin-password-2" name="singin-password" required value="<?php if (isset($_COOKIE['user_password'])) {
                                                                                                                                  echo $_COOKIE['user_password'];
                                                                                                                                } ?>" />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-footer">
                      <button type="submit" class="btn btn-outline-primary-2">
                        <span>LOG IN</span>
                        <i class="icon-long-arrow-right"></i>
                      </button>

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="signin-remember-2" name="remember" <?php if (isset($_COOKIE['user_login'])) {
                                                                                                                      echo 'checked';
                                                                                                                    } ?> />
                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                      </div>
                      <!-- End .custom-checkbox -->

                      <a href="forgot-password.php" class="forgot-link">Forgot Your Password?</a>
                    </div>
                    <!-- End .form-footer -->
                  </form>
                </div>
                <!-- .End .tab-pane -->
                <div class="tab-pane fade" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                  <form id="register-form" method="post">
                    <div class="form-group">
                      <label for="register-name-2">Your Name *</label>
                      <input type="text" class="form-control" id="register-name-2" name="register-name" required />

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
                    <!-- End .form-group -->

                    <div class="form-footer">
                      <button type="submit" class="btn btn-outline-primary-2" id="register-submit">
                        <span>SIGN UP</span>
                        <i class="icon-long-arrow-right"></i>
                      </button>

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="register-policy-2" required />
                        <label class="custom-control-label" for="register-policy-2">I agree to the
                          <a href="#">privacy policy</a> *</label>
                      </div>
                      <!-- End .custom-checkbox -->
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


    <!-- End .footer -->
  </div>
  <!-- End .page-wrapper -->
  <button id="scroll-top" title="Back to Top">
    <i class="icon-arrow-up"></i>
  </button>

  <!-- Mobile Menu -->
  <?php include 'mobile-menu.php'; ?>


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
  <!-- Custom Js File -->
  <script src="assets/js/custom.js"></script>

</body>


</html>