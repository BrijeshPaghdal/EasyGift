<?php
$title = "Product Detail";

include 'check-seller.php';
$shop_id = $_SESSION['Shop_Id'];
$prod_id = mysqli_real_escape_string($conn,$_GET['prod_id']);

$query = "SELECT p.prod_id , s.cate_name , c.sub_c_name , p.prod_name , p.comp_name , p.price , p.avai_qua , p.prod_desc , p.prod_status , p.add_date , p.update_date , COUNT(o.order_id) total_order FROM `tbl_product` p , `tbl_sub_category` c , `tbl_category`s, `tbl_order` o where s.cate_id = c.cate_id AND c.sub_c_id = p.sub_c_id AND o.prod_id = p.prod_id AND o.status = 1 AND p.prod_id = $prod_id AND p.shop_id = $shop_id";

$res = mysqli_query($conn,$query);
$cnt=mysqli_num_rows($res);
if($cnt > 0)
{
    while($row = mysqli_fetch_assoc($res))
    {
            $cate_name = $row['cate_name'];
            $sub_c_name=$row['sub_c_name'];
            $prod_name=$row['prod_name'];
            $comp_name=$row['comp_name'];
            $price=$row['price'];
            $avai_qua=$row['avai_qua'];
            $prod_desc=$row['prod_desc'];
            $prod_status=$row['prod_status'];
            $total_order = $row['total_order'];
            $add_date = $row['add_date'];
            $update_date = $row['update_date'];
    }
    // if($cate_name == NULL)
    // {
    //     header("Location:404.php");
    // }
    include 'header.php';
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Product Details</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="index.php">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="./product-list.php">Products</a>
                        </li>
                        <li class="breadcrumb-item active">Product Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="block-header">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <ul class="breadcrumb breadcrumb-style ">
                                        <li class="bcrumb-1">
                                            <a href="./index.php">Home</a>
                                        </li>
                                        <li class="bcrumb-2">
                                            <a href="product-list.php">Product</a>
                                        </li>
                                        <li class="bcrumb-3">
                                            <a href="#" onClick="return false;"><?php echo $prod_name ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="product-store">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="product-gallery">
                                            <div class="product-gallery-thumbnails">
                                                <ol class="thumbnails-list list-unstyled">
                                                    <?php
                                                        $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
                                                        $res = mysqli_query($conn,$query);
                                                        $cnt=mysqli_num_rows($res);
                                                        if($cnt > 0)
                                                        {
                                                            $tmp = 0;
                                                            while($row = mysqli_fetch_assoc($res))
                                                            {
                                                                if($tmp == 0)
                                                                    $image_name = $row['image_name'];
                                                                $tmp++;
                                                                echo "<li><img src='./product-images/{$row['image_name']}'></li>";
                                                            }
                                                        }
                                                    ?>

                                                </ol>
                                            </div>
                                            <div class="product-gallery-featured">
                                                <img src='./product-images/<?php echo $image_name?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="product-payment-details">
                                            <p class="last-sold text-muted">
                                                <h6 style="opacity: 0.6">
                                                    Sold Count : <?php echo $total_order?>
                                                </h6>
                                            </p>
                                            <h4 class="product-title mb-2">
                                                <?php echo $prod_name?>
                                            </h4>
                                            <h2 class="product-price display-4">
                                                ₹ <?php echo $price?>
                                            </h2>
                                            <p>
                                            <strong>
                                                <?php echo $prod_desc?>
                                            </strong>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id='prod_id' name="prod_id" value="<?php echo $prod_id; ?>">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation">
                                <a href="#home" data-toggle="tab" class="active show">Product Detail</a>
                            </li>
                            <li role="presentation">
                                <a href="#profile" data-toggle="tab">Suggested For</a>
                            </li>
                            <li role="presentation">
                                <a href="#reviews" data-toggle="tab">Reviews</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="home">
                                <div class="product-description">
                                    <h2 class="mb-5">Product Detail</h2>
                                    <dl class="row mb-5">
                                        <dt class="col-sm-3">Category Name</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $cate_name == '' ? '-' : $cate_name?>
                                            </dd>
                                        <dt class="col-sm-3">Sub Category Name</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $sub_c_name == '' ? '-' : $sub_c_name?>
                                            </dd>
                                        <dt class="col-sm-3">Company Name</dt>
                                            <dd class="col-sm-9">
                                            <?php echo $comp_name?>
                                            </dd>
                                        <dt class="col-sm-3">Price</dt>
                                            <dd class="col-sm-9">
                                                <?php echo $price?>
                                            </dd>
                                        <dt class="col-sm-3">Available Quantity</dt>
                                            <dd class="col-sm-9">
                                                <?php echo $avai_qua?>
                                            </dd>
                                        <dt class="col-sm-3">Total Sell</dt>
                                            <dd class="col-sm-9">
                                                <?php echo $total_order?>
                                            </dd>
                                        <dt class="col-sm-3">Status</dt>
                                            <dd class="col-sm-9">
                                                <?php
                                                    if($prod_status == 1)
                                                        echo "<span class='label bg-green shadow-style'>Active</span>";
                                                    else
                                                        echo "<span class='label bg-red shadow-style'>Disable</span>";
                                                ?>
                                            </dd>
                                        <dt class="col-sm-3">Add Date</dt>
                                        <dd class="col-sm-9">
                                            <?php echo $add_date?>
                                        </dd>
                                        <dt class="col-sm-3">Update Date</dt>
                                        <dd class="col-sm-9">
                                            <?php
                                                if ($update_date == '')
                                                    echo "-";
                                                else
                                                    echo $update_date;
                                            ?>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <div class="product-description">
                                    <h2 class="mb-5">Suggested For</h2>
                                    <?php
                                        $query = "SELECT s.sugg_for FROM `tbl_suggestion` s , `tbl_prod_sugg` p WHERE s.sugg_id = p.sugg_id AND p.prod_id = $prod_id";
                                        $res = mysqli_query($conn,$query);
                                        $cnt=mysqli_num_rows($res);
                                        if($cnt > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                echo "<dt class='col-sm-3'>{$row['sugg_for']}</dt>";
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="reviews">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php
}
else
{
    header("Location:404.php");
}
?>
<script src="assets/js/app.min.js"></script>
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/ecommerce/product-detail.js"></script>
<script src="assets/js/custom.js"></script>

</body>

</html>
