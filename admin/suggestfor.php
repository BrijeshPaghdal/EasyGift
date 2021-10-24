<?php
  $title = "Suggest For";
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
                        <h2 class="card-inside-title">Add Suggest For</h2>
                        <form id="form_validation" name='form_validation' method="POST">
                            <div class="form-group form-float">
                                <div class="form-line" id="formSuggestfor">
                                    <input type="text" class="form-control" name="SugggestFor" id="suggestfor" required>
                                    <label class="form-label">Suggest For</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line" id="form">
                                    <select name = "gender" id = "gender" class="form-control select2" >
                                      <option disabled>Select Gender</option>
                                      <option>male</option>
                                      <option>female</option>
                                      <option>other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line" id="formMinage">
                                    <input type="number" class="form-control" name="minage" id="minage"  min='1' max = '100' value="1" required>
                                    <label class="form-label">Minimum Age</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line" id="formMaxAge">
                                    <input type="number" class="form-control" name="maxage" id="maxage" min='1' max = '100' value="1" required>
                                    <label class="form-label">Maximum Age</label>
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
                        <div class="table-responsive" id="suggest-for">
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
