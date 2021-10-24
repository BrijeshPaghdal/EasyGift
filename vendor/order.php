<?php
$title = "Orders";
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
            <li class="breadcrumb-item bcrumb-1">
              <a href="./index.php">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Basic Examples -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2><strong>Order </strong>Details</h2>
          </div>
          <div class="body">
            <div class="table-responsive" id='order-view'>
              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Basic Examples -->
  </div>
</section>
<!-- Plugins Js -->
<script src="assets/js/app.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/custom.js"></script>
<!-- Demo Js -->
</body>

</html>
