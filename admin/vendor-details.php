<?php
$title = "Vendor Details";
require_once('./header.php');
require_once('../config.php');
$seller_id = mysqli_real_escape_string($conn, $_GET['vendor_id']);

$query = "SELECT s.seller_name , s.seller_l_name , s.seller_phone_no , s.seller_pancard_no , s.seller_image , l.email_id ,p.shop_id, p.shop_name , p.gst_no , p.latitude , p.longitude , a.address , a.pincode , c.city_name ,t.state_name , y.country_name , y.phone_code , d.b_acc_no ,b.bank_id , b.bank_name , b.bank_ifsc , b.bank_branch , b.bank_address , b.bank_city ,b.bank_district ,b.bank_state , b.bank_country  from `tbl_seller` s , `tbl_seller_login` l , `tbl_shop` p , `tbl_address` a , `tbl_cities` c , `tbl_states` t , `tbl_countries` y , `tbl_s_bank_details` d , `tbl_bank_details` b WHERE l.s_login_id = s.s_login_id AND s.seller_id = p.seller_id AND a.shop_id = p.shop_id AND a.city_id = c.city_id AND c.state_id = t.state_id AND t.country_id = y.country_id AND s.seller_id = d.seller_id AND d.bank_id = b.bank_id AND s.seller_id = $seller_id";

$res = mysqli_query($conn, $query);
$cnt = mysqli_num_rows($res);
if ($cnt > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $seller_name = $row['seller_name'];
        $seller_l_name = $row['seller_l_name'];
        $seller_phone_no = $row['seller_phone_no'];
        $seller_pancard_no = $row['seller_pancard_no'];
        $seller_image = $row['seller_image'];

        $email_id = $row['email_id'];
        $shop_id = $row['shop_id'];
        $shop_name = $row['shop_name'];
        $gst_no = $row['gst_no'];
        $latitude = $row['latitude'];
        $longitude = $row['longitude'];

        $address = $row['address'];
        $pincode = $row['pincode'];

        $city_name = $row['city_name'];

        $state_name = $row['state_name'];

        $country_name = $row['country_name'];
        $phone_code = $row['phone_code'];

        $b_acc_no = $row['b_acc_no'];

        $bank_id = $row['bank_id'];
        $bank_name = $row['bank_name'];
        $bank_ifsc = $row['bank_ifsc'];
        $bank_branch = $row['bank_branch'];
        $bank_address = $row['bank_address'];
        $bank_district = $row['bank_district'];
        $bank_city = $row['bank_city'];
        $bank_country = $row['bank_country'];
        $bank_state = $row['bank_state'];
    }
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
            <!-- Your content goes here  -->
            <div class="row clearfix">
                <div class="col-lg-5 col-md-12">
                    <div class="card">
                        <div class="m-b-20">
                            <div class="contact-grid">
                                <div class="profile-header bg-dark">
                                    <div class="user-name"><?php
                                                            if ($shop_name)
                                                                echo $shop_name;
                                                            else
                                                                echo "-"; ?></div>
                                    <div class="name-center"><?php echo $seller_name . " " . $seller_l_name ?></div>
                                </div>
                                <img src="../vendor/seller-images/<?php echo $seller_image ?>" class="user-img" alt="">
                                <p style="padding:10px " id='address' style="display:none"><?php
                                                                                            if ($address) {
                                                                                                echo $address . "," . $city_name . "." . $pincode;
                                                                                            } else {
                                                                                                echo "-";
                                                                                            }
                                                                                            ?></p>
                                <p>
                                </p>
                                <p>
                                    <?php
                                    if ($state_name)
                                        echo $state_name . " , " . $country_name;
                                    else
                                        echo "-";
                                    ?>
                                </p>
                                <div>
                                    <span class="phone">
                                        <i class="material-icons">phone</i><?php echo "+" . $phone_code . " " . $seller_phone_no ?></span>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <h5>
                                            <?php
                                            $query = "SELECT COUNT(prod_id) FROM `tbl_product` WHERE shop_id = $shop_id";
                                            $res = mysqli_query($conn, $query);
                                            $cnt = mysqli_num_rows($res);
                                            if ($cnt > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    echo $row['COUNT(prod_id)'];
                                                }
                                            }
                                            ?>

                                        </h5>
                                        <a style="color: black" href="./product-list.php?shop_id=<?php echo $shop_id ?>">Total Products </a>
                                    </div>
                                    <div class=" col-4">
                                        <!-- <h5>
                                            <i class="fas fa-star" style="color:orange ; font-size:11pt ; margin: 0px"></i>
                                            <i class="fas fa-star" style="color:orange ; font-size:11pt ; margin: 0px"></i>
                                            <i class="fas fa-star" style="color:orange ; font-size:11pt ; margin: 0px"></i>
                                            <i class="fas fa-star" style="color:orange ; font-size:11pt ; margin: 0px"></i>
                                            <i class="fas fa-star" style="color:orange ; font-size:11pt ; margin: 0px"></i>
                                        </h5>
                                        <small>Rating</small> -->
                                    </div>
                                    <div class="col-4">
                                        <h5>
                                            <?php
                                            $query = "SELECT COUNT(o.prod_id) FROM `tbl_order` o , `tbl_product` p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id ";
                                            $res = mysqli_query($conn, $query);
                                            $cnt = mysqli_num_rows($res);
                                            if ($cnt > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    echo $row['COUNT(o.prod_id)'];
                                                }
                                            }
                                            ?>
                                        </h5>
                                        <a style="color: black" href="./order-list.php?shop_id=<?php echo $shop_id ?>">Total Orders </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item m-l-12">
                                <a class="nav-link active" data-toggle="tab" href="#about">Location</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <input type="hidden" name="latitude" id="latitude" value="<?php echo $latitude ?>">
                            <input type="hidden" name="longitude" id="longitude" value="<?php echo $longitude ?>">
                            <div class="tab-pane body active" id="map" style="height:300px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="card">
                        <div class="profile-tab-box">
                            <div class="p-l-20">
                                <ul class="nav ">
                                    <li class="nav-item tab-all">
                                        <a class="nav-link active show" id="About" href="#project" data-toggle="tab">About</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2><strong>About</strong> Me</h2>
                                        </div>
                                        <div class="body">
                                            <div class="column">
                                                <div class="col-md-12">

                                                    <strong>Full Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $seller_name . " " . $seller_l_name ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Mobile</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo "+" . $phone_code . " " . $seller_phone_no ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Email</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $email_id ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Pancard No</strong>
                                                    <br>
                                                    <p class="text-muted"><?php echo $seller_pancard_no ?></p>
                                                </div>

                                            </div>

                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2><strong>About</strong> Shop</h2>
                                        </div>
                                        <div class="body">
                                            <div class="column">
                                                <div class="col-md-12">
                                                    <strong>Shop Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?php
                                                                            if ($shop_name) {
                                                                                echo $shop_name;
                                                                            } else {
                                                                                echo "-";
                                                                            }
                                                                            ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>GST No</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($gst_no) {
                                                            echo $gst_no;
                                                        } else {
                                                            echo "-";
                                                        } ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Address</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($address) {
                                                            echo $address . "," . $city_name . ".";
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Pincode</strong>
                                                    <br>
                                                    <p class="text-muted"><?php
                                                                            if ($pincode) {
                                                                                echo $pincode;
                                                                            } else {
                                                                                echo "-";
                                                                            } ?></p>
                                                </div>

                                                <div class="col-md-12">
                                                    <strong>State</strong>
                                                    <br>
                                                    <p class="text-muted"><?php
                                                                            if ($state_name) {
                                                                                echo $state_name;
                                                                            } else {
                                                                                echo "-";
                                                                            } ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Country</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($country_name)
                                                            echo $country_name;
                                                        else
                                                            echo "-";
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card project_widget">
                                        <div class="header">
                                            <h2><strong>Bank</strong> Details</h2>
                                        </div>
                                        <div class="body">
                                            <div class="column">
                                                <div class="col-md-12">
                                                    <strong>Bank Name</strong>
                                                    <br>
                                                    <p class="text-muted"><?php
                                                                            if ($bank_name)
                                                                                echo $bank_name;
                                                                            else
                                                                                echo "-";
                                                                            ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Account no</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($b_acc_no)
                                                            echo $b_acc_no;
                                                        else
                                                            echo "-";
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Branch Name</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($bank_branch)
                                                            echo $bank_branch;
                                                        else
                                                            echo "-";
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Address</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($bank_address)
                                                            echo $bank_address;
                                                        else
                                                            echo "-";
                                                        ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Bank City</strong>
                                                    <br>
                                                    <p class="text-muted"><?php
                                                                            if ($bank_city)
                                                                                echo $bank_city;
                                                                            else
                                                                                echo "-";
                                                                            ?></p>
                                                </div>

                                                <div class="col-md-12">
                                                    <strong>State</strong>
                                                    <br>
                                                    <p class="text-muted"><?php
                                                                            if ($bank_state)
                                                                                echo $bank_state;
                                                                            else
                                                                                echo "-";
                                                                            ?></p>
                                                </div>
                                                <div class="col-md-12">
                                                    <strong>Country</strong>
                                                    <br>
                                                    <p class="text-muted">
                                                        <?php
                                                        if ($bank_country)
                                                            echo $bank_country;
                                                        else
                                                            echo "-";
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <br>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/app.min.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/admin.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGW4NhnfWPiQVZnDchPoXUBGUz3uLLCHE"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->
<?php
} else {
    header("Location:404.php");
}
?>
</body>


</html>
