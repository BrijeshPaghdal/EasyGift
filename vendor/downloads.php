<?php
  $title = "Download";
  require_once("./header.php")
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title">Export Table</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="index.php">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Export Tables</li>
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
                                    <select class="form-control" id = "get_report">
                                        <option disabled selected>Please Select</option>
                                        <option value="0">Disable Product</option>
                                        <option value="1">Active Product</option>
                                        <option value="2">Complete Order</option>
                                        <option value="3">Rejected Order</option>
                                        <option value="4">Panding Order</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive" id="exportTable">
                                <table class="display table table-hover table-checkable order-column m-t-20 width-per-100" id="tableExport">
                                  <tr>
                                      <th><center>Please Select option to get report </option></th>
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
    <section id = "scripts">
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/js/table.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/admin.js"></script>
    <script src="./assets/js/custom.js"></script>
    <!-- Demo Js -->
  </section>
</body>
</html>
