  <?php require_once('./online.php'); ?>
  <!-- Mobile Menu -->
  <div class="mobile-menu-overlay"></div>
  <!-- End .mobil-menu-overlay -->

  <div class="mobile-menu-container">
      <div class="mobile-menu-wrapper">
          <span class="mobile-menu-close"><i class="icon-close"></i></span>

          <form action="#" method="get" class="mobile-search">
              <label for="mobile-search" class="sr-only">Search</label>
              <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required />
              <button class="btn btn-primary" type="submit">
                  <i class="icon-search"></i>
              </button>
          </form>

          <nav class="mobile-nav">
              <ul class="mobile-menu">
                  <?php
                    require_once("./config.php");
                    $sql = "SELECT cate_id,cate_name FROM tbl_category LIMIT 8";
                    $result = mysqli_query($conn, $sql) or die("Query Faild 1");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                          <li>
                              <a href="#"><?php echo $row['cate_name'] ?></a>
                              <?php $cate_id = $row['cate_id']; ?>
                              <ul>

                                  <li>
                                      <a>By Price</a>

                                      <ul>
                                          <li>
                                              <a href="filter-product.php?category=<?php echo $row['cate_name'] ?>&maxPrice=499">Under 499</a>
                                          </li>
                                          <li>
                                              <a href="filter-product.php?category=<?php echo $row['cate_name'] ?>&minPrice=500&maxPrice=599">500 To 599</a>
                                          </li>
                                          <li>
                                              <a href="filter-product.php?category=<?php echo $row['cate_name'] ?>&minPrice=600&maxPrice=999">600 To 999</a>
                                          </li>
                                          <li>
                                              <a href="filter-product.php?category=<?php echo $row['cate_name'] ?>&minPrice=1000&maxPrice=1999">1000 To 1999</a>
                                          </li>

                                          <li>
                                              <a href="filter-product.php?category=<?php echo $row['cate_name'] ?>&minPrice=2000">Above 2000</a>
                                          </li>

                                      </ul>
                                  </li>
                                  <li>
                                      <a>By Types</a>

                                      <ul>
                                          <?php
                                            $sql1 = "SELECT sub_c_name FROM tbl_sub_category WHERE cate_id =  $cate_id";
                                            $result1 = mysqli_query($conn, $sql1) or die("Query Faild");
                                            if (mysqli_num_rows($result1) > 0) {
                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                            ?>
                                                  <li>
                                                      <a href="filter-product.php?category=<?php echo $row['cate_name'] ?>&subcategory=<?php echo $row1['sub_c_name'] ?>"><?php echo $row1['sub_c_name'] ?></a>
                                                  </li>

                                          <?php }
                                            } ?>
                                      </ul>
                                  </li>
                              </ul>
                          </li>
                  <?php }
                    } ?>

              </ul>
          </nav>
          <!-- End .mobile-nav -->

          <div class="social-icons">
              <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
              <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
              <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
              <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
          </div>
          <!-- End .social-icons -->
      </div>
      <!-- End .mobile-menu-wrapper -->
  </div>
  <!-- End .mobile-menu-container -->