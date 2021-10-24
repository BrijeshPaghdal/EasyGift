<?php
$title = "Edit Product";
require_once("./header.php")
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
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Add Product -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Add</strong> Product</h2>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="productname" maxlength="10" minlength="3" required />

                                    <label class="form-label">Product Name</label>
                                </div>
                                <div class="help-info">Min. 3, Max. 10 characters</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="produccomapnyname" maxlength="10" minlength="3" required />

                                    <label class="form-label">Product Company Name</label>
                                </div>
                                <div class="help-info">Min. 3, Max. 10 characters</div>
                            </div>
                            <div class="form-group default-select select2Style">
                                <select class="form-control select2" data-placeholder="Select">
                                    <option value="" disabled selected>
                                        Choose Product Categories
                                    </option>
                                    <option>India</option>
                                    <option>Australia</option>
                                    <option>USA</option>
                                    <option>Poland</option>
                                    <option>Afghanistan</option>
                                </select>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="number" maxlength="8" minlength="0" required />
                                    <label class="form-label">Product Price</label>
                                </div>
                                <div class="help-info">Price only</div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="productqty" maxlength="10" minlength="1" required />

                                    <label class="form-label">Product Quantity</label>
                                </div>
                                <div class="help-info"></div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                    <label class="form-label">Product Description</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <h2 class="card-inside-title">Product Suggest For</h2>
                                <label>
                                    <input class="with-gap" type="checkbox" checked />
                                    <span>Parent</span>
                                </label>
                                <label>
                                    <input class="with-gap" type="checkbox" checked />
                                    <span>Child</span>
                                </label>
                            </div>

                            <div class="form-group form-float">
                                <h2 class="card-inside-title">Image Upload</h2>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Image</span>
                                        <input type="file" multiple />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload one or more Image" />
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="form-group">
                    <h2 class="card-inside-title">Product Status</h2>
                    <div class="demo-switch">
                      <div class="switch">
                        <label
                          >Disable
                          <input type="checkbox" checked />
                          <span class="lever"></span>Enable</label
                        >
                      </div>
                    </div>
                  </div> -->

                            <div class="form-group">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" id="checkbox" name="checkbox" />
                                        I have read and accept the terms
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">
                                SUBMIT
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Vertical Layout -->
    </div>
</section>
<!-- Plugins Js -->
<script src="assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>

<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/forms/form-validation.js"></script>
<script src="assets/js/pages/forms/advanced-form-elements.js"></script>
<script src="assets/js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
</body>

<!-- Mirrored from www.radixtouch.in/templates/admin/lorax/source/light/pages/forms/form-examples.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 11:21:03 GMT -->

</html>