<?php
  $title = "Sub Category";
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
        <div class="row clearfix">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="body">
                        <h2 class="card-inside-title">Add Sub Category</h2>
                        <form id="form_validation" name='form_validation' method="POST">
                          <div class="form-group default-select select2Style">
                            <label>Select Category</label>
                            <select name = "Cate_Id" id = "Cate_Name" class="form-control select2" >
                                <?php
                                    $query = "SELECT * FROM `tbl_category` WHERE cate_id != 0";
                                    $res = mysqli_query($conn,$query);
                                    $cnt=mysqli_num_rows($res);
                                    if($cnt > 0)
                                    {
                                      while($row = mysqli_fetch_assoc($res))
                                      {
                                        $cate_id = $row['cate_id'];
                                        echo "<option value = $cate_id >".$row['cate_name']."</option>";
                                      }
                                    }

                                ?>
                            </select>
                          </div>
                            <div class="form-group form-float">
                                <div class="form-line" id="form">
                                    <input type="text" class="form-control" name="subcatename" id="subcatename" required>
                                    <label class="form-label">Sub Category Name</label>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" id="add" type="submit">ADD</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive" id="sub-category-list">
                            <table class="table table-hover js-basic-example contact_list js-sweetalert">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/form.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/forms/basic-form-elements.js"></script>
<script src="assets/js/pages/forms/form-validation.js"></script>
<script src="assets/js/custom.js"></script>
<!-- Demo Js -->
</body>

</html>
