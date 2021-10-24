<?php
$title = "Home";
require_once("./header.php");
?>
<section class="content">
  <div class="container-fluid">
    <div class="block-header">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <ul class="breadcrumb breadcrumb-style">
            <li class="breadcrumb-item">
              <h4 class="page-title"><?php echo $title ?></h4>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Widgets -->
    <div class="row">
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Users</div>
          <h3 class="m-b-10">
            <?php

              $query = "SELECT COUNT(cust_id) FROM `tbl_customer` WHERE cust_status = 1 ";
              $res = mysqli_query($conn, $query);
              $cnt = mysqli_num_rows($res);
              if ($cnt > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  echo $row['COUNT(cust_id)'];
                }
              }
            ?>
          </h3>
          <div class="icon">
            <div class="chart chart-bar" id="total_user"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Vendors</div>
          <h3 class="m-b-10">
            <?php

              $query = "SELECT COUNT(seller_id) FROM `tbl_seller` WHERE seller_status = 1";
              $res = mysqli_query($conn, $query);
              $cnt = mysqli_num_rows($res);
              if ($cnt > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  echo $row['COUNT(seller_id)'];
                }
              }
            ?>
          </h3>
          <div class="icon">
            <span class="chart chart-bar" id="total_seller"></span>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Active Users</div>
          <h3 class="m-b-10" id = 'onlineUser'>
          </h3>
          <div class="icon">
            <div class="chart chart-line" id="liveChartUser">Loading..</div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Active Vendors</div>
          <h3 class="m-b-10" id = 'onlineVendor'>
          </h3>
          <div class="icon">
            <div class="chart chart-line" id="liveChartVendor" >Loading..</div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Widgets -->
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="card">
          <div class="header">
            <h2><strong>Recent</strong> Report</h2>

          </div>
          <div class="body">
            <div class="card">
              <div class="chart-box-left">
                <div class="chart-note">
                  <span class="dot dot-product"></span>
                  <span>products</span>
                </div>
                <div class="chart-note mr-0">
                  <span class="dot dot-service"></span>
                  <span>Orders</span>
                </div>
              </div>
              <!-- Canvas for Chart.js -->
              <canvas id="chartReport2"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- Task Info -->
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="header">
            <h2><strong>Recently joined</strong> Vendors</h2>
            <ul class="header-dropdown m-r--5">
            <li class="dropdown">
              <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">more_vert</i>
              </a>
              <ul class="dropdown-menu pull-right">
                <li>
                  <a href="vendors.php">View More</a>
                </li>
              </ul>
            </li>
          </ul>
          </div>
          <div class="tableBody">
            <div class="table-responsive" id = "newVendors">

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Task Info -->
    </div>
  </div>
</section>
<!-- Plugins Js -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/index.js"></script>
<script src="assets/js/pages/charts/jquery-knob.js"></script>
<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
<script src="assets/js/pages/medias/carousel.js"></script>
<script src="assets/js/custom.js"></script>
</body>

</html>
