<?php
$title = "Reviews";
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
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $title ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center l-bg-red">
                    <div class="icon m-b-10">
                        <div class="chart chart-bar-2">6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5</div>
                    </div>
                    <div class="text m-b-10">Total Ticket</div>
                    <h3 class="m-b-0">1512
                        <i class="material-icons">trending_up</i>
                    </h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center l-bg-cyan">
                    <div class="icon m-b-10">
                        <span class="chart chart-line-2">9,4,6,5,6,4,7,3</span>
                    </div>
                    <div class="text m-b-10">Reply</div>
                    <h3 class="m-b-0">1236
                        <i class="material-icons">trending_up</i>
                    </h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center l-bg-orange">
                    <div class="icon m-b-10">
                        <div class="chart chart-pie-2">30, 35, 25, 8</div>
                    </div>
                    <div class="text m-b-10">Resolve</div>
                    <h3 class="m-b-0">1107
                        <i class="material-icons">trending_down</i>
                    </h3>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center green">
                    <div class="icon m-b-10">
                        <div class="chart chart-bar-2">4,6,-3,-1,2,-2,4,3,6,7,-2,3,4,6,-3,-1,2,-2,4,3,6,7,-2,3</div>
                    </div>
                    <div class="text m-b-10">Pending</div>
                    <h3 class="m-b-0">167
                        <i class="material-icons">trending_down</i>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row justify-content-center text-center m-t-20">
                            <div class="col-5">
                                <h6 class="text-muted">Real-Time Visits</h6>
                                <h3>23,000</h3>
                            </div>
                            <div class="col-5">
                                <h6 class="text-muted">Returning Visitors</h6>
                                <h3>12,564</h3>
                            </div>
                        </div>
                        <div id="area_chart" class="area_chart-style"></div>
                        <div class="row justify-content-center text-center b-t-default m-t-15 p-t-20">
                            <div class="col-3 b-r-default">
                                <h5>75%</h5>
                                <p class="text-muted m-b-0">Satisfied</p>
                            </div>
                            <div class="col-3 b-r-default">
                                <h5>16%</h5>
                                <p class="text-muted m-b-0">Unsatisfied</p>
                            </div>
                            <div class="col-3">
                                <h5>9%</h5>
                                <p class="text-muted m-b-0">NA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row justify-content-center text-center m-t-20">
                            <div class="col-5">
                                <h6 class="text-muted">Total Working Hours</h6>
                                <h3>87,000</h3>
                            </div>
                            <div class="col-5">
                                <h6 class="text-muted">Total Employees</h6>
                                <h3>4,354</h3>
                            </div>
                        </div>
                        <div id="project_line" class="area_chart-style"></div>
                    </div>
                    <div class="card-footer">
                        <div class="row text-center">
                            <div class="col-6 b-r-default">
                                <h6 class="text-muted m-b-10">Completed Projects</h6>
                                <h3 class="m-b-0">986</h3>
                            </div>
                            <div class="col-6">
                                <h6 class="text-muted m-b-10">Total Earnings</h6>
                                <h3 class="m-b-0">234.6M</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card bg-green total-card">
                    <div class="card-block">
                        <div class="text-center p-t-20">
                            <h3>Total Sales</h3>
                            <p class="m-0">4000</p>
                        </div>
                    </div>
                    <div id="graph1" class="card-height-100"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-orange total-card">
                    <div class="card-block">
                        <div class="text-center p-t-20">
                            <h3>Visitors</h3>
                            <p class="m-0">3345</p>
                        </div>
                    </div>
                    <div id="graph2" class="card-height-100"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-cyan total-card">
                    <div class="card-block">
                        <div class="text-center p-t-20">
                            <h3>Orders</h3>
                            <p class="m-0">2364</p>
                        </div>
                    </div>
                    <div id="graph3" class="card-height-100"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card bg-purple total-card">
                    <div class="card-block">
                        <div class="text-center p-t-20">
                            <h3>Profit</h3>
                            <p class="m-0">$75,656</p>
                        </div>
                    </div>
                    <div id="graph4" class="card-height-100"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Income</div>
                    <h3 class="m-b-10">$758
                        <i class="material-icons col-green">trending_up</i>
                    </h3>
                    <div class="icon">
                        <div class="chart chart-bar"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Orders Received</div>
                    <h3 class="m-b-10">1025
                        <i class="material-icons col-red">trending_down</i>
                    </h3>
                    <div class="icon">
                        <span class="chart chart-line"></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Sales</div>
                    <h3 class="m-b-10">956
                        <i class="material-icons col-green">trending_up</i>
                    </h3>
                    <div class="icon">
                        <div class="chart chart-pie"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-box text-center white">
                    <div class="text font-17 m-b-5">Total Active Users</div>
                    <h3 class="m-b-10">214
                        <i class="material-icons col-red">trending_down</i>
                    </h3>
                    <div class="icon">
                        <div class="chart" id="liveChart">Loading..</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!-- Customer Review -->
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Customer</strong> Review
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="review-block">
                            <div class="row">
                                <div class="review-img">
                                    <img src="../../assets/images/user/user1.jpg" alt="">
                                </div>
                                <div class="col">
                                    <h6 class="m-b-15">Alis Smith
                                        <span class="float-right m-r-10 text-muted"> a week ago</span>
                                    </h6>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star_half</i>
                                    <i class="material-icons">star_border</i>
                                    <p class="m-t-15 m-b-15 text-muted">Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Etiam vel rutrum ex, at
                                        ornare mi. In quis scelerisque dui, eget rhoncus orci. Fusce et sodales
                                        ipsum.
                                        Nam id nunc euismod, aliquet arcu quis, mattis nisi.</p>
                                    <a href="#!">
                                        <i class="material-icons m-r-10">thumb_up</i>
                                    </a>
                                    <a href="#!">
                                        <i class="material-icons m-r-10 col-red">thumb_down</i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="review-img">
                                    <img src="../../assets/images/user/user2.jpg" alt="">
                                </div>
                                <div class="col">
                                    <h6 class="m-b-15">John Dio
                                        <span class="float-right m-r-10 text-muted"> a week ago</span>
                                    </h6>
                                    <i class="material-icons">star</i>
                                    <i class="material-icons">star_half</i>
                                    <i class="material-icons">star_border</i>
                                    <i class="material-icons">star_border</i>
                                    <i class="material-icons">star_border</i>
                                    <p class="m-t-15 m-b-15 text-muted">Nam quis ligula est. Nunc sed risus non
                                        turpis tristique tempor. Ut sollicitudin
                                        faucibus magna nec gravida. Suspendisse ullamcorper justo vel porta
                                        imperdiet.
                                        Nunc nec ipsum vel augue placerat faucibus. </p>
                                    <a href="#!">
                                        <i class="material-icons m-r-10">thumb_up</i>
                                    </a>
                                    <a href="#!">
                                        <i class="material-icons m-r-10 col-red">thumb_down</i>
                                    </a>
                                </div>
                            </div>
                            <div class="text-center  m-b-5">
                                <a href="#!" class="b-b-primary text-primary">View all Customer Reviews</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Customer Review -->
            <div class="col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Earning</strong> Source
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="totalEarning">
                            <h2>$90,808</h2>
                        </div>
                        <div class="p-t-10">
                            <span class="pull-left progress-label">envato.com</span>
                            <span class="pull-right progress-percent label label-info m-b-5">17%</span>
                        </div>
                        <div class="earningProgress">
                            <div class="progress shadow-style">
                                <div class="progress-bar l-bg-green width-per-17" role="progressbar" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <span class="pull-left progress-label">google.com</span>
                            <span class="pull-right progress-percent label label-danger m-b-5">27%</span>
                        </div>
                        <div class="earningProgress">
                            <div class="progress shadow-style">
                                <div class="progress-bar l-bg-purple width-per-27" role="progressbar" aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <span class="pull-left progress-label">yahoo.com</span>
                            <span class="pull-right progress-percent label label-primary m-b-5">25%</span>
                        </div>
                        <div class="earningProgress">
                            <div class="progress shadow-style">
                                <div class="progress-bar l-bg-orange width-per-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <span class="pull-left progress-label">store</span>
                            <span class="pull-right progress-percent label label-success m-b-5">18%</span>
                        </div>
                        <div class="earningProgress">
                            <div class="progress shadow-style">
                                <div class="progress-bar l-bg-cyan width-per-18" role="progressbar" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="p-t-10">
                            <span class="pull-left progress-label">Others</span>
                            <span class="pull-right progress-percent label label-warning m-b-5">13%</span>
                        </div>
                        <div class="earningProgress">
                            <div class="progress shadow-style">
                                <div class="progress-bar l-bg-red width-per-13" role="progressbar" aria-valuenow="13" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row state-overview">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box5 animate-bar bg-b-purple">
                    <div class="knob-icon">
                        <input type="text" class="dial" value="45" data-width="80" data-height="80" data-fgColor="#67de69">
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Projects</span>
                        <div class="progress m-t-20">
                            <div class="progress-bar l-bg-green shadow-style width-per-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-description">
                            <small>10% Increase in 28 Days</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box5 animate-bar bg-b-purple">
                    <div class="knob-icon">
                        <input type="text" class="dial" value="69" data-width="80" data-height="80" data-fgColor="#f98050">
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Clients</span>
                        <div class="progress m-t-20">
                            <div class="progress-bar l-bg-orange shadow-style width-per-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-description">
                            <small>26% Increase in 28 Days</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box5 animate-bar bg-b-purple">
                    <div class="knob-icon">
                        <input type="text" class="dial" value="84" data-width="80" data-height="80" data-fgColor="#8FD8FE">
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text p-b-10">Employee</span>
                        <div class="progress m-t-20">
                            <div class="progress-bar l-bg-cyan shadow-style width-per-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-description">
                            <small>14% Increase in 28 Days</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box5 animate-bar bg-b-purple">
                    <div class="knob-icon">
                        <input type="text" class="dial" value="56" data-width="80" data-height="80" data-fgColor="#ac8bde">
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">Task</span>
                        <div class="progress m-t-20">
                            <div class="progress-bar l-bg-purple shadow-style width-per-45" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-description">
                            <small>50% Increase in 28 Days</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-part text-center">
                    <i class="fab fa-twitter fa-3x col-blue"></i>
                    <div class="title p-t-15">
                        <h3>Twitter</h3>
                    </div>
                    <div class="text p-b-10">
                        <span>Lorem ipsum dolor sit amet, id quo eruditi
                            eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui
                            ad.</span>
                    </div>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-part text-center">
                    <i class="fab fa-instagram fa-3x col-red"></i>
                    <div class="title p-t-15">
                        <h3>Instagram</h3>
                    </div>
                    <div class="text p-b-10">
                        <span>Lorem ipsum dolor sit amet, id quo eruditi
                            eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui
                            ad.</span>
                    </div>
                    <a href="#">Learn More</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="box-part text-center">
                    <i class="fab fa-facebook-f fa-3x col-blue"></i>
                    <div class="title p-t-15">
                        <h3>Facebook</h3>
                    </div>
                    <div class="text p-b-10">
                        <span>Lorem ipsum dolor sit amet, id quo eruditi
                            eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui
                            ad.</span>
                    </div>
                    <a href="#">Learn More</a>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Single</strong>Slide Auto Play
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="owl-carousel owl-theme" id="single_slide_autoplay">
                            <div class="item">
                                <img src="../../assets/images/image-gallery/1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="../../assets/images/image-gallery/2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="../../assets/images/image-gallery/3.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="../../assets/images/image-gallery/4.jpg" alt="">
                            </div>
                            <div class="item">
                                <img src="../../assets/images/image-gallery/5.jpg" alt="">
                            </div>
                        </div>
                        <div class="owl-btns">
                            <div class="owl-play play">Play</div>
                            <div class="owl-stop stop">Stop</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Assign</strong> Task
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="tableBody">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Task</th>
                                        <th>Status</th>
                                        <th>Manager</th>
                                        <th>Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user1.jpg" alt="">
                                        </td>
                                        <td>Task A</td>
                                        <td>
                                            <span class="label light-green shadow-style">Doing</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-green width-per-62" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user2.jpg" alt="">
                                        </td>
                                        <td>Task B</td>
                                        <td>
                                            <span class="label l-bg-purple shadow-style">To Do</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-purple width-per-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user3.jpg" alt="">
                                        </td>
                                        <td>Task C</td>
                                        <td>
                                            <span class="label l-bg-orange shadow-style">On Hold</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-orange width-per-72" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user4.jpg" alt="">
                                        </td>
                                        <td>Task D</td>
                                        <td>
                                            <span class="label l-bg-cyan shadow-style">Wait Approvel</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-cyan width-per-95" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user5.jpg" alt="">
                                        </td>
                                        <td>Task E</td>
                                        <td>
                                            <span class="label light-green shadow-style">Suspended</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-green width-per-87" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user1.jpg" alt="">
                                        </td>
                                        <td>Task A</td>
                                        <td>
                                            <span class="label light-green shadow-style">Doing</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-green width-per-62" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="table-img">
                                            <img src="../../assets/images/user/user2.jpg" alt="">
                                        </td>
                                        <td>Task B</td>
                                        <td>
                                            <span class="label l-bg-purple shadow-style">To Do</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress shadow-style">
                                                <div class="progress-bar l-bg-purple width-per-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center cyan">
                    <div class="icon m-b-10">
                        <div class="chart chart-bar">6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5</div>
                    </div>
                    <div class="text m-b-10">Total Income</div>
                    <h3 class="m-b-0">$1512
                        <i class="material-icons">trending_up</i>
                    </h3>
                    <small class="displayblock">21% Higher Than Average </small>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center purple">
                    <div class="icon m-b-10">
                        <span class="chart chart-line">9,4,6,5,6,4,7,3</span>
                    </div>
                    <div class="text m-b-10">Orders Received</div>
                    <h3 class="m-b-0">1236
                        <i class="material-icons">trending_up</i>
                    </h3>
                    <small class="displayblock">13% Highr Than Average </small>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center blue">
                    <div class="icon m-b-10">
                        <div class="chart chart-pie">30, 35, 25, 8</div>
                    </div>
                    <div class="text m-b-10">Total Sales</div>
                    <h3 class="m-b-0">1107
                        <i class="material-icons">trending_down</i>
                    </h3>
                    <small class="displayblock">34% Lower Than Average </small>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="support-box text-center green">
                    <div class="icon m-b-10">
                        <div class="chart chart-bar">4,6,-3,-1,2,-2,4,3,6,7,-2,3,4,6,-3,-1,2,-2,4,3,6,7,-2,3</div>
                    </div>
                    <div class="text m-b-10">Total Active Users</div>
                    <h3 class="m-b-0">167
                        <i class="material-icons">trending_down</i>
                    </h3>
                    <small class="displayblock">06% Lower Than Average </small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Total</strong> Revenue
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="body text-center">
                            <h4 class="m-b-20">Total Visitors</h4>
                            <h6 class="m-b-30">5,98,345</h6>
                            <input type="text" class="dial" value="93" data-width="120" data-height="120" data-thickness="0.12" data-fgColor="#F3AB81">
                            <h4 class="m-t-30">Satisfaction Rate</h4>
                            <h6 class="displayblock m-t-10">36% Average</h6>
                            <div class="icon m-t-25">
                                <div class="chart chart-bar2">
                                    6,4,8,6,8,10,5,6,7,9,5,6,4,8,6,8,10,5,6,7,9,5,10,5,6,7,9,5,6,4,8,6,8</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>New </strong>Orders
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="new-orders" class="media-list position-relative">
                            <div class="table-responsive">
                                <table id="new-orders-table" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Product</th>
                                            <th class="border-top-0">Customers</th>
                                            <th class="border-top-0">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-truncate">iPhone X</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8999</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Pixel 2</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$5550</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">OnePlus</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$9000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Galaxy</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$7500</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Moto Z2</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8500</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">iPhone X</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8999</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">iPhone X</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$8999</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Pixel 2</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$5550</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">OnePlus</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$9000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-truncate">Galaxy</td>
                                            <td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <img class="rounded-circle" src="../../assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm">
                                                        <span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td class="text-truncate">$7500</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Latest</strong> Posts
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-auto p-r-0">
                                    <img src="../../assets/images/posts/post1.jpg" alt="user image" class="latest-posts-img">
                                </div>
                                <div class="col">
                                    <h6>About Something</h6>
                                    <p class="text-muted m-b-5">
                                        <i class="fa fa-play-circle-o"></i> Video | 10 minutes ago
                                    </p>
                                    <p class="text-muted ">Lorem Ipsum is simply dummy text of the.</p>
                                </div>
                            </div>
                            <div class="row m-b-20">
                                <div class="col-auto p-r-0">
                                    <img src="../../assets/images/posts/post2.jpg" alt="user image" class="latest-posts-img">
                                </div>
                                <div class="col">
                                    <h6>Relationship</h6>
                                    <p class="text-muted m-b-5">
                                        <i class="fa fa-play-circle-o"></i> Video | 24 minutes ago
                                    </p>
                                    <p class="text-muted ">Lorem Ipsum is simply dummy text of the.</p>
                                </div>
                            </div>
                            <div class="row m-b-20">
                                <div class="col-auto p-r-0">
                                    <img src="../../assets/images/posts/post3.jpg" alt="user image" class="latest-posts-img">
                                </div>
                                <div class="col">
                                    <h6>Human body</h6>
                                    <p class="text-muted m-b-5">
                                        <i class="fa fa-play-circle-o"></i> Video | 53 minutes ago
                                    </p>
                                    <p class="text-muted ">Lorem Ipsum is simply dummy text of the.</p>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#!" class="b-b-primary text-primary">View All Posts</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Recent</strong> Activities
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="sl-item sl-primary">
                            <div class="sl-content">
                                <small class="text-muted">
                                    <i class="fa fa-user position-left"></i> 5 mins ago</small>
                                <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                            </div>
                        </div>
                        <div class="sl-item sl-danger">
                            <div class="sl-content">
                                <small class="text-muted">
                                    <i class="fa fa-user position-left"></i> 8 mins ago</small>
                                <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                            </div>
                        </div>
                        <div class="sl-item sl-success">
                            <div class="sl-content">
                                <small class="text-muted">
                                    <i class="fa fa-user position-left"></i> 10 mins ago</small>
                                <p>Lorem ipsum dolor sit amet cons the ecte tur and adip ascing elit users.</p>
                            </div>
                        </div>
                        <div class="sl-item sl-warning">
                            <div class="sl-content">
                                <small class="text-muted">
                                    <i class="fa fa-user position-left"></i> 12 mins ago</small>
                                <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                            </div>
                        </div>
                        <div class="sl-item sl-primary">
                            <div class="sl-content">
                                <small class="text-muted">
                                    <i class="fa fa-user position-left"></i> 5 mins ago</small>
                                <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="chat">
                        <div class="chat-header clearfix">
                            <img src="../../assets/images/user/user2.jpg" alt="avatar">
                            <div class="chat-about">
                                <div class="chat-with">Aiden Chavez</div>
                                <div class="chat-num-messages">2 new messages</div>
                            </div>
                        </div>
                        <div class="chat-history" id="chat-conversation">
                            <ul>
                                <li class="clearfix">
                                    <div class="message-data text-right">
                                        <span class="message-data-time">10:10 AM, Today</span> &nbsp; &nbsp;
                                        <span class="message-data-name">Michael</span>
                                        <i class="zmdi zmdi-circle me"></i>
                                    </div>
                                    <div class="message other-message float-right"> Hi Aiden, how are you? How is
                                        the project coming along? </div>
                                </li>
                                <li>
                                    <div class="message-data">
                                        <span class="message-data-name">
                                            <i class="zmdi zmdi-circle online"></i> Aiden</span>
                                        <span class="message-data-time">10:12 AM, Today</span>
                                    </div>
                                    <div class="message my-message">
                                        <p>Are we meeting today? Project has been already finished and I have
                                            results to
                                            show you.</p>
                                        <div class="row">
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="message-data">
                                        <span class="message-data-name">
                                            <i class="zmdi zmdi-circle online"></i> Aiden</span>
                                        <span class="message-data-time">10:12 AM, Today</span>
                                    </div>
                                    <div class="message my-message">
                                        <p>Are we meeting today? Project has been already finished and I have
                                            results to
                                            show you.</p>
                                        <div class="row">
                                        </div>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data text-right">
                                        <span class="message-data-time">10:10 AM, Today</span> &nbsp; &nbsp;
                                        <span class="message-data-name">Michael</span>
                                        <i class="zmdi zmdi-circle me"></i>
                                    </div>
                                    <div class="message other-message float-right"> Hi Aiden, how are you? How is
                                        the project coming along? </div>
                                </li>
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Enter text here.." />
                                </div>
                            </div>
                            <div class="chat-upload">
                                <a href="#">
                                    <i class="material-icons">attach_file</i>
                                </a>
                                <a href="#">
                                    <i class="material-icons">insert_emoticon</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!-- Activity -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>Activity</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="assign-style">
                            <ul class="feedBody">
                                <li class="active-feed">
                                    <div class="feed-user-img">
                                        <img src="../../assets/images/user/user1.jpg" class="img-radius " alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblFileStyle">File</span> Sarah Smith
                                        <small class="text-muted">6 hours ago</small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        hii John, I have upload doc related to task.
                                    </p>
                                </li>
                                <li class="diactive-feed">
                                    <div class="feed-user-img">
                                        <img src="../../assets/images/user/user2.jpg" class="img-radius " alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblTaskStyle">Task </span> Jalpa Joshi
                                        <small class="text-muted">5 hours ago
                                        </small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        Please do as specify. Let me know if you have any query.
                                    </p>
                                </li>
                                <li class="diactive-feed">
                                    <div class="feed-user-img">
                                        <img src="../../assets/images/user/user3.jpg" class="img-radius " alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblCommentStyle">comment</span> Lina Smith
                                        <small class="text-muted">6 hours ago</small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        Hey, How are you??
                                    </p>
                                </li>
                                <li class="active-feed">
                                    <div class="feed-user-img">
                                        <img src="../../assets/images/user/user4.jpg" class="img-radius " alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblReplyStyle">Reply</span> Jacob Ryan
                                        <small class="text-muted">7 hours ago</small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        I am fine. You??
                                    </p>
                                </li>
                                <li class="active-feed">
                                    <div class="feed-user-img">
                                        <img src="../../assets/images/user/user5.jpg" class="img-radius " alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblFileStyle">File</span> Sarah Smith
                                        <small class="text-muted">6 hours ago</small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        hii John, I have upload doc related to task.
                                    </p>
                                </li>
                                <li class="diactive-feed">
                                    <div class="feed-user-img">
                                        <img src="../../assets/images/user/user6.jpg" class="img-radius " alt="User-Profile-Image">
                                    </div>
                                    <h6>
                                        <span class="feedLblStyle lblTaskStyle">Task </span> Jalpa Joshi
                                        <small class="text-muted">5 hours ago
                                        </small>
                                    </h6>
                                    <p class="m-b-15 m-t-15">
                                        Please do as specify. Let me know if you have any query.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Activity -->
            <!-- TODO List -->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Todo</strong> List
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="to-do-list ui-sortable" id="sortable-todo">
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> Add salary
                                        details in system
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> Announcement for
                                        holiday
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> call bus driver
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> Office picnic
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> Add salary
                                        details in system
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> Announcement for
                                        holiday
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> call bus driver
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="form-check m-l-10">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" value=""> Leave Application
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                                <div class="todo-actionlist pull-right clearfix">
                                    <a href="#" class="todo-remove">
                                        <i class="material-icons">clear</i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Notice</strong> Board
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="recent-comment">
                            <div class="notice-board">
                                <div class="table-img">
                                    <img class="notice-object" src="../../assets/images/user/user6.jpg" alt="...">
                                </div>
                                <div class="notice-body">
                                    <h5 class="notice-heading col-green">Airi Satou</h5>
                                    <p>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam.</p>
                                    <small class="text-muted">7 hours ago</small>
                                </div>
                            </div>
                            <div class="notice-board">
                                <div class="table-img">
                                    <img class="notice-object" src="../../assets/images/user/user4.jpg" alt="...">
                                </div>
                                <div class="notice-body">
                                    <h5 class="notice-heading color-primary col-indigo">Sarah Smith</h5>
                                    <p>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam.</p>
                                    <p class="comment-date">1 hour ago</p>
                                </div>
                            </div>
                            <div class="notice-board">
                                <div class="table-img">
                                    <img class="notice-object" src="../../assets/images/user/user3.jpg" alt="...">
                                </div>
                                <div class="notice-body">
                                    <h5 class="notice-heading color-danger col-cyan">Cara Stevens</h5>
                                    <p>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam.</p>
                                    <div class="comment-date">Yesterday</div>
                                </div>
                            </div>
                            <div class="notice-board no-border">
                                <div class="table-img">
                                    <img class="notice-object" src="../../assets/images/user/user7.jpg" alt="...">
                                </div>
                                <div class="notice-body">
                                    <h5 class="notice-heading color-info col-orange">Ashton Cox</h5>
                                    <p>Lorem ipsum dolor sit amet, id quo eruditi eloquentiam.</p>
                                    <div class="comment-date">Yesterday</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Recent</strong> Activity
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#" onClick="return false;">Action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#" onClick="return false;">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary">
                                    <img class="notice-object" src="../../assets/images/user/user1.jpg" alt="...">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Lorem ipsum dolor sit amet, id quo eruditi.</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <p>5 minutes ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge primary">
                                    <img class="notice-object" src="../../assets/images/user/user2.jpg" alt="...">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Lorem ipsum dolor sit amet, id quo eruditi.</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <p>10 minutes ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge primary">
                                    <img class="notice-object" src="../../assets/images/user/user8.jpg" alt="...">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Lorem ipsum dolor sit amet, id quo eruditi.</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <p>20 minutes ago</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-badge primary">
                                    <img class="notice-object" src="../../assets/images/user/user4.jpg" alt="...">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h5 class="timeline-title">Lorem ipsum dolor sit amet, id quo eruditi.</h5>
                                    </div>
                                    <div class="timeline-body">
                                        <p>35 minutes ago</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<!-- Widget Js -->
<!-- Carousel Js -->
<script src="assets/js/pages/medias/carousel.js"></script>
<!-- Knob Js -->
<script src="assets/js/pages/charts/jquery-knob.js"></script>
<script src="assets/js/pages/todo/todo.js"></script>
<script src="assets/js/pages/widgets/widget.js"></script>
</body>

</html>