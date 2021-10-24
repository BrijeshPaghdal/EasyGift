<?php
$title = "Category";
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
                        <h2 class="card-inside-title">Add Category</h2>
                        <form id="form_validation" name='form_validation' method="POST">
                            <div class="form-group form-float">
                                <div class="form-line" id="form">
                                    <input type="text" class="form-control" name="catename" id="catename" required>
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="image" id="imagename" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" id ="image_name" type="text">
                                </div>
                            </div>
                            <input type="hidden" name="cate_id" id = "cate_id" value="">
                            <button class="btn btn-primary waves-effect" id="add" type="submit">ADD</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive" id="category-list">
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
