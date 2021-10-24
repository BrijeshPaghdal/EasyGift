  <footer class="footer footer-2">
      <div class="footer-middle">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-12 col-lg-4">
                      <div class="widget widget-about">
                          <img src="assets/images/demos/demo-7/logo-footer.png" class="footer-logo" alt="Footer Logo" width="105" height="25" />
                          <p>
                              Easygift provides best online cake, flowers and gifts buy services across near by shop in your cities in india. Order now to get best price on fresh cake, gifts and flowers with esay recieved near by shop.....
                          </p>

                          <div class="widget-about-info">
                              <div class="row">

                                  <!-- End .col-sm-6 -->
                                  <div class="col-sm-6 col-md-8">
                                      <span class="widget-about-title">Payment Method</span>
                                      <figure class="footer-payments">
                                          <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20" />
                                      </figure>
                                      <!-- End .footer-payments -->
                                  </div>
                                  <!-- End .col-sm-6 -->
                              </div>
                              <!-- End .row -->
                          </div>
                          <!-- End .widget-about-info -->
                      </div>
                      <!-- End .widget about-widget -->
                  </div>
                  <!-- End .col-sm-12 col-lg-4 -->

                  <div class="col-sm-4 col-lg-2">
                      <div class="widget">
                          <h4 class="widget-title">Useful links</h4>
                          <!-- End .widget-title -->

                          <ul class="widget-list">

                              <!-- <li><a href="contact.php">Contact us</a></li> -->
                              <li><a href="about.php">About Us</a></li>
                          </ul>
                          <!-- End .widget-list -->
                      </div>
                      <!-- End .widget -->
                  </div>
                  <!-- End .col-sm-4 col-lg-2 -->

                  <!-- End .col-sm-4 col-lg-2 -->

                  <div class="col-sm-4 col-lg-2">
                      <div class="widget">
                          <h4 class="widget-title">My Account</h4>
                          <!-- End .widget-title -->

                          <ul class="widget-list">
                            <?php
                            if(!isset($_SESSION['user_id']))
                            {
                              echo '<li><a href="login.php">Sign In</a></li>';
                            }
                            else {
                              echo '<li><a href="logout.php">Sign Out</a></li>';

                            }
                            ?>
                              <li><a href="cart.php">View Cart</a></li>

                          </ul>
                          <!-- End .widget-list -->
                      </div>
                      <!-- End .widget -->
                  </div>
                  <!-- End .col-sm-4 col-lg-2 -->

                  <div class="col-sm-6 col-lg-2">

                      <!-- End .widget -->
                  </div>
                  <!-- End .col-sm-6 col-lg-2 -->

              </div>
              <!-- End .row -->
          </div>
          <!-- End .container-fluid -->
      </div>
      <!-- End .footer-middle -->

      <div class="footer-bottom">
          <div class="container-fluid">
              <p class="footer-copyright">
                  Copyright © 2021 EasyGift . All Rights Reserved.
              </p>
              <!-- End .footer-copyright -->
              <ul class="footer-menu">
                  <li><a href="#">Terms Of Use</a></li>
                  <li><a href="#">Privacy Policy</a></li>
              </ul>
              <!-- End .footer-menu -->
          </div>
          <!-- End .container-fluid -->
      </div>
      <!-- End .footer-bottom -->
  </footer>
