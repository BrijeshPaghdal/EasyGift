<?php
  require_once 'check-admin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Easygift | <?php echo $title ?></title>
    <!-- Favicon-->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <!-- Plugins Core Css -->
    <link href="assets/css/app.min.css" rel="stylesheet" />
    <link href="assets/css/form.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/styles/all-themes.css" rel="stylesheet" />
</head>

<body class="light">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="loading-img-spin" src="assets/images/loading.png" width="20" height="20" alt="admin" />
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="./index.php">
                    <img src="assets/images/logo.png" alt="" />
                    <span class="logo-name">Easygift</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Full Screen Button -->
                    <li class="fullscreen">
                        <a href="javascript:;" class="fullscreen-btn">
                            <i class="fas fa-expand"></i>
                        </a>
                    </li>
                    <!-- #END# Full Screen Button -->

                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <img src="assets/images/user.jpg" width="32" height="32" alt="User" />
                        </a>
                        <ul class="dropdown-menu pullDown">
                              <ul class="user_dw_menu">
                                  <li>
                                    <a href="./logout.php">
                                        <i class="material-icons">power_settings_new</i>Logout
                                    </a>
                                  </li>
                              </ul>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    <li class="pull-right">
                        <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                            <i class="fas fa-cog"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="sidebar-user-panel active">
                        <div class="user-panel">
                            <div class="image">
                                <img src="assets/images/usrbig.jpg" class="img-circle user-img-circle" alt="User Image" />
                            </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name">Easy Gift</div>
                            <div class="profile-usertitle-job">Admin</div>
                        </div>
                    </li>
                    <li class="<?php echo $title == 'Home' ? 'active' : '' ?>">
                        <a href="index.php">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="<?php echo $title == 'Vendors' ? 'active' : '' ?>">
                        <a href="vendors.php">
                            <i class="fas fa-store"></i>
                            <span>Vendors</span>

                        </a>
                    </li>
                    <li class="<?php echo $title == 'Users' ? 'active' : '' ?>">
                        <a href="users.php">
                            <i class="fas fa-users-cog"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="<?php echo $title == 'Category' || $title == 'Sub Category' || $title == 'Suggest For'  ? 'active' : '' ?>" >
                       <a href="#" onClick="return false;" class="menu-toggle">
                           <i class="fas fa-list-ol"></i>
                           <span>Category List</span>
                       </a>
                       <ul class="ml-menu">
                           <li class="<?php echo $title == 'Category' ? 'active' : '' ?>">
                               <a href="category-list.php">Category</a>
                           </li>
                           <li class="<?php echo $title == 'Sub Category' ? 'active' : '' ?>" >
                               <a href="subcategory.php">Sub Category</a>
                           </li>
                           <li class="<?php echo $title == 'Suggest For' ? 'active' : '' ?>" >
                               <a href="suggestfor.php">Suggest For</a>
                           </li>
                       </ul>
                   </li>

                    <!-- <li>
              <a href="#" onClick="return false;" class="menu-toggle">
                <i class="fas fas fa-list-alt"></i>
                <span>Product Categories</span>
              </a>
              <ul class="ml-menu">
                <li>
                  <a href="pages/ecommerce/product-list.html">Product List</a>
                </li>
                <li>
                  <a href="pages/ecommerce/invoice.html">Add Product</a>
                </li>
              </ul>
            </li> -->
                    <!-- <li>
              <a href="#" onClick="return false;" class="menu-toggle">
                <i class="fas fab fa-first-order"></i>
                <span>Orders</span>
              </a>
              <ul class="ml-menu">
                <li>
                  <a href="pages/order/order.html">Order List</a>
                </li>
              </ul>
            </li> -->
                    <!-- <li>
              <a href="#" onClick="return false;" class="menu-toggle">
                <i class="fas fas fa-users"></i>
                <span>Customer</span>
              </a>
              <ul class="ml-menu">
                <li>
                  <a href="pages/ecommerce/product-list.html">Customer List</a>
                </li>
              </ul>
            </li> -->
                    <!-- <li class="<?php// echo $title == 'Payment Details' ? 'active' : '' ?>">
                        <a href="payment.php">
                            <i class="fas fab fa-paypal"></i>
                            <span>Payment Details</span>
                        </a>
                    </li> -->
                    <li class="<?php echo $title == 'Downloads' ? 'active' : '' ?>">
                        <a href="downloads.php">
                            <i class="fas fa-file-download"></i>
                            <span>Download</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation">
                    <a href="#skins" data-toggle="tab" class="active">SKINS</a>
                </li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                    <div class="demo-skin">
                        <div class="rightSetting">
                            <p>SIDEBAR MENU COLORS</p>
                            <button type="button" class="btn btn-sidebar-light btn-border-radius p-l-20 p-r-20">
                                Light
                            </button>
                            <button type="button" class="btn btn-sidebar-dark btn-default btn-border-radius p-l-20 p-r-20">
                                Dark
                            </button>
                        </div>
                        <div class="rightSetting">
                            <p>THEME COLORS</p>
                            <button type="button" class="btn btn-theme-light btn-border-radius p-l-20 p-r-20">
                                Light
                            </button>
                            <button type="button" class="btn btn-theme-dark btn-default btn-border-radius p-l-20 p-r-20">
                                Dark
                            </button>
                        </div>
                        <div class="rightSetting">
                            <p>SKINS</p>
                            <ul class="demo-choose-skin choose-theme list-unstyled">
                                <li data-theme="black" class="actived">
                                    <div class="black-theme"></div>
                                </li>
                                <li data-theme="white">
                                    <div class="white-theme white-theme-border"></div>
                                </li>
                                <li data-theme="purple">
                                    <div class="purple-theme"></div>
                                </li>
                                <li data-theme="blue">
                                    <div class="blue-theme"></div>
                                </li>
                                <li data-theme="cyan">
                                    <div class="cyan-theme"></div>
                                </li>
                                <li data-theme="green">
                                    <div class="green-theme"></div>
                                </li>
                                <li data-theme="orange">
                                    <div class="orange-theme"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="rightSetting">
                            <p>Disk Space</p>
                            <div class="sidebar-progress">
                                <div class="progress m-t-20">
                                    <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="progress-description">
                                    <small>26% remaining</small>
                                </span>
                            </div>
                        </div>
                        <div class="rightSetting">
                            <p>Server Load</p>
                            <div class="sidebar-progress">
                                <div class="progress m-t-20">
                                    <div class="progress-bar l-bg-orange shadow-style width-per-63" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="progress-description">
                                    <small>Highly Loaded</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </div>
