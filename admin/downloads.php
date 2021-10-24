<?php
$title = "Downloads";
require_once("./header.php");
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title"><?php echo $title ?></h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="./index.php">
                                <i class="fas fa-home"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $title ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-9">
                                <h2>
                                    <strong> Exportable</strong> Table
                                </h2>
                            </div>
                            <div class="col-md-3">
                                <p>
                                    <b>Get Report</b>
                                </p>
                                <div class="form-group default-select">
                                    <select class="form-control" id="get_report">
                                        <option disabled selected>Please Select</option>
                                        <option value="0">Active User</option>
                                        <option value="1">Disable User</option>
                                        <option value="2">Active Vendor</option>
                                        <option value="3">Disable Vendor</option>
                                        <option value="4">Reject Vendor</option>
                                        <!-- <option value="5">Last Month Vendor Statement</option> -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="table-responsive" id="exportTable">
                            <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                                <tr>
                                    <th>
                                        <center>Please Select option to get report </option>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>
<!-- Plugins Js -->
<section id="scripts">
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/js/table.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/admin.js"></script>
    <script src="./assets/js/custom.js"></script>
</section>
<!-- Demo Js -->
</body>


<!-- Mirrored from www.radixtouch.in/templates/admin/lorax/source/light/pages/tables/export-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 11:21:04 GMT -->

</html>
