<?php
include 'online.php';
?>
<header class="header header-7">
    <div class="header-top">
        <div class="container-fluid">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="index.php">INR</a>
                    <div class="header-menu">
                        <ul>
                            <a href="index.php">INR</a>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropdown -->

                <div class="header-dropdown">
                    <a href="index.php">Eng</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="index.php">English</a></li>
                        </ul>
                    </div>
                    <!-- End .header-menu -->
                </div>
                <!-- End .header-dropdown -->
            </div>
            <!-- End .header-left -->

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                          <?php
                          if(isset($_SESSION['user_id']))
                          {
                            session_start();
                            $cust_id = $_SESSION['user_id'];
                          	$prod_id = mysqli_real_escape_string($conn,$_POST['prod_id']);

                            // echo $prod_id ." ".$cust_id;
                            $query = "SELECT COUNT(*) As total_wish FROM `tbl_wishlist` WHERE cust_id = $cust_id AND status = 1";

                          	$res=mysqli_query($conn,$query);
                          	$cnt=mysqli_num_rows($res);

                          	if($cnt > 0)
                          	{
                              while($row=mysqli_fetch_assoc($res))
                              {
                                  $total_wish = $row['total_wish'];
                              }
                            }
                          ?>
                            <li><a href="wishlist.php"><i class="icon-heart-o"></i>My Wishlist <span>(<?php echo $total_wish; ?>)</span></a></li>
                          <?php
                          }
                          ?>
                            <li><a href="about.php">About Us</a></li>
                            <!-- <li><a href="contact.php">Contact Us</a></li> -->
                            <li>
                                <a href="vendor/login.php">Login As Vendor</a>
                            </li>
                            <li>
                                <a href="vendor-registration.php">Become A Vendor</a>
                            </li>
                            <li>
                                <?php

                                if (isset($_SESSION['user_id'])) {
                                    echo "<a href='myaccount.php'><i class='icon-user'></i>My Account</a>";
                                } else {
                                    echo "<a href='login.php'><i class='icon-user'></i>Login</a>";
                                }
                                session_write_close();
                                ?>

                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- End .top-menu -->
            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container-fluid -->
    </div>
    <!-- End .header-top -->

    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="index.php" class="logo">
                    <img src="assets/images/demos/demo-7/logo.png" alt="Molla Logo" width="120" height="25" />
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <?php
                        require_once('./config.php');
                        $sql = "SELECT cate_id,cate_name FROM tbl_category LIMIT 6 OFFSET 1";
                        $result = mysqli_query($conn, $sql) or die("Query Faild 1");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                                <li>
                                    <a href="#" class="sf-with-ul"><?php echo $row['cate_name'] ?></a>
                                    <?php $cate_id = $row['cate_id']; ?>
                                    <div class="megamenu megamenu-md">
                                        <div class="row no-gutters">
                                            <div class="col-md-12">
                                                <div class="menu-col">
                                                    <div class="row">
                                                        <div class="col-md-6">

                                                            <div class="menu-title">By Price</div>
                                                            <!-- End .menu-title -->
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
                                                        </div>
                                                        <!-- End .col-md-6 -->

                                                        <div class="col-md-6">
                                                            <div class="menu-title">Sub Category</div>
                                                            <!-- End .menu-title -->

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
                                                        </div>
                                                        <!-- End .col-md-6 -->
                                                    </div>
                                                    <!-- End .row -->
                                                </div>
                                                <!-- End .menu-col -->
                                            </div>
                                            <!-- End .col-md-12 -->


                                        </div>
                                        <!-- End .row -->
                                    </div>
                                    <!-- End .megamenu megamenu-md -->
                                </li>

                        <?php }
                        } ?>

                    </ul>
                    <!-- End .menu -->
                </nav>
                <!-- End .main-nav -->
            </div>
            <!-- End .header-left -->

            <div class="header-right">
                <!-- <div class="header-search header-search-extended header-search-visible">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required />
                            <button class="btn btn-primary" type="submit">
                                <i class="icon-search"></i>
                            </button>
                        </div>

                    </form>
                </div> -->
                <!-- End .header-search -->

                <?php
                if (isset($_SESSION['user_id'])) {
                    echo "<div class='dropdown cart-dropdown' id = 'isNotification'>
                    <a href='#' class='dropdown-toggle' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-display='static'>
                        <i class='icon far fa-bell fa-xs'></i>
                    </a>

                    <div class='dropdown-menu dropdown-menu-right'>
                        <div class='dropdown-cart-products' id='notification'>
                            No notification Available
                        </div>
                    </div>
                </div>";
                } ?>

                <!-- End .Notification-dropdown -->
                <div class="dropdown cart-dropdown">
                    <a href="cart.php" class="dropdown-toggle">
                        <i class="icon-shopping-cart"></i>
                    </a>
                </div>
                <!-- End .cart-dropdown -->

            </div>
            <!-- End .header-right -->
        </div>
        <!-- End .container-fluid -->
    </div>
    <!-- End .header-middle -->
</header>
