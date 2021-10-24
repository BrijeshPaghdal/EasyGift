<?php
$title = "Edit Product";
require_once("./header.php");



    $shop_id = $_SESSION['Shop_Id'];

    $prod_id = $_GET['prod_id'];
    $query = "SELECT  p.prod_id , c.cate_id , c.sub_c_name , p.prod_name , p.comp_name , p.price , p.avai_qua , p.prod_desc , p.prod_status FROM `tbl_product` p , `tbl_sub_category` c where c.sub_c_id = p.sub_c_id AND p.prod_id = $prod_id AND p.shop_id = $shop_id";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
        while($row = mysqli_fetch_assoc($res))
        {
            $cate_id = $row['cate_id'];
            $sub_c_name=$row['sub_c_name'];
            $prod_name=$row['prod_name'];
            $comp_name=$row['comp_name'];
            $price=$row['price'];
            $avai_qua=$row['avai_qua'];
            $prod_desc=$row['prod_desc'];
            $prod_status=$row['prod_status'];
        }
        $query = "SELECT sugg_id FROM `tbl_prod_sugg` WHERE prod_id = $prod_id";
        $res = mysqli_query($conn,$query);
        $cnt=mysqli_num_rows($res);
        if($cnt > 0)
        {
            while($row = mysqli_fetch_assoc($res))
            {
                $sugg_id[]=$row['sugg_id'];
            }
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
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="./product-list.php">Product</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Edit Product -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Edit</strong> Product</h2>
                    </div>
                    <div class="body">
                        <form id="formEdit">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Prod_Name" maxlength="30" minlength="3" value = "<?php echo $prod_name; ?>" required />

                                    <label class="form-label">Product Name</label>
                                </div>
                                <div class="help-info">Min. 3, Max. 30 characters</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Prod_Company" maxlength="30" minlength="3" value = "<?php echo $comp_name; ?>"required />

                                    <label class="form-label">Product Company Name</label>
                                </div>
                                <div class="help-info">Min. 3, Max. 30 characters</div>
                            </div>
                            <div class="form-group default-select select2Style">
                                <select class="form-control select2" name = "Cate_Name" id = "Cate_Name">
                                    <!-- <option disabled selected>Choose Product Category</option> -->
                                     <?php

                                        $query = "SELECT * FROM `tbl_category` WHERE cate_id != 0";
                                        $res = mysqli_query($conn,$query);
                                        $cnt=mysqli_num_rows($res);
                                        if($cnt > 0)
                                        {
                                          while($row = mysqli_fetch_assoc($res))
                                          {
                                            $cate_id_2 = $row['cate_id'];

                                            $count = 0;
                                            $query = "SELECT COUNT(sub_c_id) FROM `tbl_sub_category` WHERE cate_id = $cate_id_2";
                                            $res2 = mysqli_query($conn, $query);

                                            while ($row2 = mysqli_fetch_assoc($res2)) {
                                                    $count = $row2['COUNT(sub_c_id)'];
                                                    break;
                                            }
                                            if($count > 0)
                                            {
                                              $select = "";
                                              if ($cate_id == $row['cate_id'])
                                                  $select = "selected";
                                              echo "<option ". $select .">".$row['cate_name']."</option>";
                                            }
                                          }
                                        }

                                      ?>
                                </select>
                            </div>

                            <div class="form-group default-select select2Style">
                                <select class="form-control select2" data-placeholder="Select" name="Sub_C_Name" id="Sub_C_Name">
                                    <option value="" disabled selected>
                                        Choose Product Sub Category
                                    </option>
                                    <?php
                                       $query = "SELECT * FROM `tbl_sub_category` WHERE cate_id = $cate_id AND sub_c_id != 0";
                                       $res = mysqli_query($conn,$query);
                                       $cnt=mysqli_num_rows($res);
                                       if($cnt > 0)
                                       {
                                         while($row = mysqli_fetch_assoc($res))
                                         {
                                             $select = "";
                                             if ($sub_c_name == $row['sub_c_name'])
                                                 $select = "selected";
                                             echo "<option ". $select .">".$row['sub_c_name']."</option>";
                                         }
                                       }

                                     ?>
                                </select>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="Price" value = "<?php echo $price; ?>" maxlength="8" minlength="0"  required />
                                    <label class="form-label">Product Price</label>
                                </div>
                                <div class="help-info">Price only</div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Avail_Qua" maxlength="10" minlength="1" value = "<?php echo $avai_qua; ?>" required />

                                    <label class="form-label">Product Quantity</label>
                                </div>
                                <div class="help-info"></div>
                            </div>

                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="Prod_Description" cols="30" rows="5" class="form-control no-resize" required><?php echo $prod_desc; ?></textarea>
                                    <label class="form-label">Product Description</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <h2 class="card-inside-title">Product Suggest For</h2>
                                <?php
                                    $query = "SELECT sugg_id , sugg_for FROM `tbl_suggestion`";
                                        $res = mysqli_query($conn,$query);
                                        $cnt=mysqli_num_rows($res);
                                        if($cnt > 0)
                                        {
                                            $checked = "";
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                if(in_array($row['sugg_id'],$sugg_id))
                                                {
                                                    $checked = "checked";
                                                }
                                                else
                                                {
                                                    $checked = "";
                                                }
                                            echo "<label style=''>
                                                       <input class='with-gap' type='checkbox' name = 'suggest_for[]' value = '{$row['sugg_id']}'  $checked/>
                                                        <span style='padding-left:25px;padding-right:20px'>{$row['sugg_for']}</span>
                                                </label>";
                                            }
                                        }
                                ?>
                            </div>

                            <div class="form-group form-float">
                                <h2 class="card-inside-title">Image Upload</h2>
                                <div class="card-inside-title">
                                <?php
                                    $query = "SELECT * FROM `tbl_image` WHERE prod_id = $prod_id";
                                    $res = mysqli_query($conn,$query);
                                    $cnt=mysqli_num_rows($res);
                                    if($cnt > 0)
                                    {
                                        $image_name = "";
                                        while($row = mysqli_fetch_assoc($res))
                                        {
                                            $image_name = $row['image_name'];
                                            echo "<img src='./product-images/$image_name' height='75px' width='75px' />";

                                        }
                                    }
                                ?>
                                </div>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Image</span>
                                        <input type="file" name = "image[]" multiple />
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" value="" placeholder="Upload one or more Image .... All images will be replaced by new one" />
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="prod_id" value="<?php echo $prod_id ?>">

                            <button class="btn btn-primary waves-effect" type="submit">
                                Edit Product
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
<script src="assets/js/custom.js" defer></script>
<script src="assets/js/pages/ui/dialogs.js"></script>
<script src="assets/js/pages/forms/form-validation.js"></script>
<script src="assets/js/pages/forms/advanced-form-elements.js"></script>
<script src="assets/js/pages/forms/basic-form-elements.js"></script>

<?php
 }
    else
    {
        header("Location:404.php");
    }
?>
<!-- Demo Js -->
</body>

</html>
