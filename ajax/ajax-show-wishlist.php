<?php
  session_start();
  require_once("../config.php");

  $cust_id = $_SESSION['user_id'];

  $output = '
  <table class="table table-cart table-mobile" id="wishlist-details">
  <thead>
    <tr>
      <th>Product</th>
      <th>Price</th>
      <th>Stock Status</th>
      <th></th>
      <th></th>
    </tr>
  </thead>

  <tbody>';

  // echo $prod_id ." ".$cust_id;
  $query = "SELECT * FROM `tbl_wishlist` WHERE cust_id = $cust_id AND status = 1";

	$res=mysqli_query($conn,$query);
	$cnt=mysqli_num_rows($res);

	if($cnt > 0)
	{
    while($row=mysqli_fetch_assoc($res))
    {
      $prod_id = $row['prod_id'];
      $query = "SELECT * FROM `tbl_product` WHERE prod_id = $prod_id AND prod_status = 1";
      $res1=mysqli_query($conn,$query);
    	$cnt1=mysqli_num_rows($res1);

    	if($cnt1 > 0)
    	{
        while($row1=mysqli_fetch_assoc($res1))
        {
          $query = "SELECT image_name FROM `tbl_image` WHERE prod_id = $prod_id";
          $res2 = mysqli_query($conn, $query);
          $cnt2 = mysqli_num_rows($res2);
          if ($cnt2 > 0) {
            $image_name = "";
            while ($row2 = mysqli_fetch_assoc($res2)) {
              $image_name = $row2['image_name'];
              break;
            }
          }

          $prod_name = $row1['prod_name'];
          $price = $row1['price'];

          $output .= '<tr>
            <td class="product-col">
              <div class="product">
                <figure class="product-media">
                  <a href="product.php?prod_id='.$prod_id.'">
                    <img src="vendor/product-images/'.$image_name.'" alt="Product image" />
                  </a>
                </figure>

                <h3 class="product-title">
                  <a href="product.php?prod_id='.$prod_id.'">'.$prod_name.'</a>
                </h3>
                <!-- End .product-title -->
              </div>
              <!-- End .product -->
            </td>
            <td class="price-col">₹'.$row1['price'].'</td>';

            if($row1['avai_qua'] > 0)
            {
              $stockClass = "in-stock";
              $stock = "In stock";
              $disabled = "";
            }
            else
            {
              $stockClass = "out-of-stock";
              $stock = "Out of stock";
              $disabled = "disabled";
            }

          $output .= '
            <td class="stock-col">
              <span class="'.$stockClass.'">'.$stock.'</span>
            </td>
            <td class="action-col">
              <button class="btn btn-block btn-outline-primary-2 '.$disabled.'" id = "'.$prod_id.'">
                <i class="icon-cart-plus"></i>Add to Cart
              </button>
            </td>
            <td class="remove-col">
              <button class="btn-remove" id="'.$prod_id.'">
                <i class="icon-close"></i>
              </button>
            </td>
          </tr>';
        }
      }

    }
  }

  echo $output;
