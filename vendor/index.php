<?php
  $title = "Home";
  require_once("./header.php");
  $shop_id = $_SESSION['Shop_Id'];
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
      <div class="col-lg-4 col-sm-4">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Income</div>
          <h3 class="m-b-20">₹
          <?php
            $query = "SELECT SUM(o.total_price) FROM `tbl_order` o , `tbl_product` p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id AND o.status = 1";
            $res = mysqli_query($conn, $query);
            $cnt = mysqli_num_rows($res);
            if ($cnt > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                if($row['SUM(o.total_price)'] == NULL)
                  echo "0";
                else
                  echo $row['SUM(o.total_price)'];
              }
            }
          ?>
          </h3>
          <div class="icon">
            <div class="chart chart-bar" id="chart-bar">
              <?php
                date_default_timezone_set("Asia/Kolkata");
                $query = "SELECT SUM(o.total_price) AS total_price, DATE(o.order_date) AS order_date FROM tbl_order o ,tbl_product p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id AND o.status = 1 GROUP BY DATE(o.order_date) DESC";

                $output = "";
                $temp_date = date('d-m', strtotime('-1 days'));
                $res = mysqli_query($conn, $query);
                $cnt = mysqli_num_rows($res);
                if ($cnt > 0) {
                  $i = 0;

                  while ($row = mysqli_fetch_assoc($res))
                  {

                    if ($i == 0)
                    {
                      $temp_date = date('Y-m-d');
                    }
                    else
                    {
                      $temp_date = date('Y-m-d', strtotime('-' . $i . ' days'));
                    }

                    if ($temp_date == $row['order_date'])
                    {
                      $output .= $row['total_price'];
                    }
                    else
                    {
                      $output .= '0';
                      if ($i  > 30)
                      {
                        break;
                      }
                      else
                      {
                        $output .= ",";
                      }
                      while ($temp_date != $row['order_date'])
                      {
                        $i++;
                        $temp_date = date('Y-m-d', strtotime('-' . $i . ' days'));
                        if ($temp_date == $row['order_date'])
                        {
                          $output .= $row['total_price'];
                        }
                        else {
                          $output .= "0";
                          if ($i  > 30)
                          {
                            break;
                          }
                          else
                          {
                            $output .= ",";
                          }
                        }
                      }
                    }

                    if ($i > 30)
                    {
                      break;
                    } else
                    {
                      $output .= ",";
                      $i++;
                    }
                  }
                }
                if($cnt < 30)
                {
                  for($i = $i ; $i<30 ; $i++)
                  {
                        $output .= "0";
                        if($i+1 != 30)
                        {
                          $output .= ",";
                        }
                    }

                }
                echo $output;
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Orders Received</div>
          <h3 class="m-b-20">
          <?php

            $query = "SELECT COUNT(o.prod_id) FROM `tbl_order` o , `tbl_product` p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id";
            $res = mysqli_query($conn, $query);
            $cnt = mysqli_num_rows($res);
            if ($cnt > 0) {
              while ($row = mysqli_fetch_assoc($res)) {
                echo $row['COUNT(o.prod_id)'];
              }
            }
          ?>
          </h3>
          <div class="icon">
            <div class="chart chart-line" id = "chart-line">
              <?php
              	include 'check-seller.php';
              	$shop_id = $_SESSION['Shop_Id'];
              	date_default_timezone_set("Asia/Kolkata");
              	$query = "SELECT COUNT(*) AS total_order, DATE(o.order_date) AS order_date FROM tbl_order o ,tbl_product p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id GROUP BY DATE(o.order_date) DESC LIMIT 14";

              	$output = "";
                  $temp_date = date('d-m' , strtotime('-1 days'));
                  $res=mysqli_query($conn,$query);
                  $cnt=mysqli_num_rows($res);
                  if($cnt > 0)
                  {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($res)) {

                      if($i == 0){
                        $temp_date = date('Y-m-d');
                      }
                      else
                      {
                        $temp_date = date('Y-m-d' , strtotime('-'. $i.' days'));
                      }
                      if($temp_date == $row['order_date'])
                      {
                        $output .=  $row['total_order'];
                      }
                      else
                      {
                        $output .=  '0';
                        if($i >= 13)
                        {
                          break;
                        }
                        else
                        {
                          $output .= ",";
                        }
                        while($temp_date != $row['order_date'])
                        {
                          $i++;
                          $temp_date = date('Y-m-d' , strtotime('-'. $i.' days'));
                          if($temp_date == $row['order_date'])
                          {
                            $output .=  $row['total_order'];
                          }
              						else {
              							$output .= "0";
              							if ($i >= 13)
              							{
              								break;
              							}
              							else
              							{
              								$output .= ",";
              							}
              						}
                        }
                      }

                      if($i >= 13)
                      {
                        break;
                      }
                      else
                      {
                        $output .= ",";
                        $i++;
                      }
                    }
                    while(1)
                    {
                      $output .= "0";
                      if($i >= 13)
                      {
                        break;
                      }
                      else
                      {
                        $output .= ",";
                        $i++;
                      }
                    }
                  }
                  echo $output;
              ?>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-sm-4">
        <div class="counter-box text-center white">
          <div class="text font-17 m-b-5">Total Sales</div>
          <h3 class="m-b-20">
          <?php

            $query = "SELECT SUM(quantity) AS total_quantity FROM `tbl_order` o , `tbl_product` p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id AND o.status = 1";
            $res = mysqli_query($conn, $query);
            $cnt = mysqli_num_rows($res);
            if ($cnt > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                  if($row['total_quantity'] == NULL)
                    echo "0";
                  else
                    echo $row['total_quantity'];
              }
            }
          ?>
          </h3>
          <div class="icon">
          <div class = 'chart chart-pie' id="pie-chart">
          <?php
            $query = "SELECT SUM(quantity) AS total_quantity, o.prod_id AS prod_id FROM tbl_order o ,tbl_product p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id AND o.status = 1 AND o.order_date > now() - INTERVAL 7 day GROUP BY prod_id ORDER BY total_quantity DESC LIMIT 5";
            $res = mysqli_query($conn, $query);
            $cnt = mysqli_num_rows($res);
            $output = '';
            if ($cnt > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($res)) {

              $output .= $row['total_quantity'];

                if ($i >= $cnt) {
                  break;
                } else {
                  $output .= ",";
                  $i++;
                }
              }
            }
            echo $output;
          ?>
          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Widgets -->
    <div class="row">
      <div class="col-lg-6 col-sm-6">
          <div class="card">
              <div class="header">
                  <h2>
                      <strong>Past 7 days</strong> Orders</h2>
                      <ul class="header-dropdown m-r--5">
                      <li class="dropdown">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          <li>
                            <a href="order.php">View More</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
              </div>
              <div class="body">
                  <div class="recent-report_chart">
                      <canvas id="line-chart"></canvas>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-lg-6 col-sm-6">
          <div class="card">
              <div class="header">
                  <h2>
                      <strong>Past 7 days</strong> Sold Products</h2>
                      <ul class="header-dropdown m-r--5">
                      <li class="dropdown">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                          <li>
                            <a href="order.php">View More</a>
                          </li>
                        </ul>
                      </li>
                    </ul>
              </div>
              <div class="body">
                  <div class="recent-report_chart">
                      <canvas id="pie-chart-big"><?php
                    $query = "SELECT SUM(quantity) AS total_quantity, o.prod_id AS prod_id FROM tbl_order o ,tbl_product p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id AND o.status = 1 AND o.order_date > now() - INTERVAL 7 day GROUP BY prod_id ORDER BY total_quantity DESC";
                    $res=mysqli_query($conn,$query);
                    $cnt=mysqli_num_rows($res);
                    $output='';
                    if($cnt > 0)
                    {
                      $i = 1;
                      while ($row = mysqli_fetch_assoc($res)) {

                        $output .= $row['total_quantity'];

                        if($i >= $cnt)
                        {
                          break;
                        }
                        else
                        {
                          $output .= ",";
                          $i++;
                        }
                      }
                    }
                    echo $output;
                  ?></canvas>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <div class="row clearfix">
      <!-- Browser Usage -->
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card">
          <div class="header">
            <h2><strong>Recently Added </strong>Products</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="product-list.php">View More</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="tableBody">
              <div class="table-responsive" id = 'quick-product-view'>

              </div>
          </div>
        </div>
      </div>
      <!-- #END# Quick View Product -->
      <!-- Quick View Order -->
      <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="card">
          <div class="header">
            <h2><strong>Recent</strong> Orders</h2>
            <ul class="header-dropdown m-r--5">
              <li class="dropdown">
                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">more_vert</i>
                </a>
                <ul class="dropdown-menu pull-right">
                  <li>
                    <a href="order.php">View More</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="tableBody">
            <div class="table-responsive" id = 'quick-order-view'>

            </div>
          </div>
        </div>
      </div>
      <!-- #END# Quick View Order -->
    </div>
    <div class="row clearfix">
      <!-- Customer Review -->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="header">
            <h2><strong>Customer</strong> Review</h2>
          </div>
          <div class="body">
            <div class="review-block" id = 'quick-view-review'>

        </div>
      </div>
      <!-- #END# Customer Review -->
    </div>
  </div>
</section>
<!-- Plugins Js -->
<script src="assets/js/app.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/index.js"></script>
<script src="assets/js/custom.js" defer></script>
</body>

</html>
