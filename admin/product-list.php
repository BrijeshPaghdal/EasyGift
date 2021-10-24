<?php
$title = "Product List";
require_once("./header.php");
if (isset($_GET['shop_id'])) {
  $shop_id =  $_GET['shop_id'];
}

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
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="body">
            <input type="hidden" id="shop_id" value="<?php echo $shop_id ?>">
            <div class="table-responsive" id="product-list">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src=" assets/js/app.min.js">
</script>
<script src="assets/js/table.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/pages/ui/dialogs.js"></script>
<script src="assets/js/custom.js"></script>
<!-- Demo Js -->
</body>


</html>