<?php
	include 'check-seller.php';
	$shop_id = $_SESSION['Shop_Id'];
	date_default_timezone_set("Asia/Kolkata");
	$query = "SELECT COUNT(*) AS total_order, DATE(o.order_date) AS order_date FROM tbl_order o ,tbl_product p WHERE o.prod_id = p.prod_id AND p.shop_id = $shop_id GROUP BY DATE(o.order_date) DESC LIMIT 7";

	$output = "";
    $temp_date = date('d-m' , strtotime('-1 days'));
    $res=mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
    {
      $i = 0;
      while ($row = mysqli_fetch_assoc($res)) {

        if($i == 0){
          $temp_date = date('Y-m-d');
        }
        else
        {
          $temp_date = date('Y-m-d' , strtotime('-'. $i.' days'));
        }
        if($temp_date == $row['order_date'])
        {
          $output .=  $row['total_order'];
        }
        else
        {
          $output .=  '0';
          if($i >= 6)
          {
            break;
          }
          else
          {
            $output .= ",";
          }
          while($temp_date != $row['order_date'])
          {
            $i++;
            $temp_date = date('Y-m-d' , strtotime('-'. $i.' days'));
            if($temp_date == $row['order_date'])
            {
              $output .=  $row['total_order'];
            }
						else {
							$output .= "0";
							if ($i >= 6)
							{
								break;
							}
							else
							{
								$output .= ",";
							}
						}
          }
        }

        if($i >= 6)
        {
          break;
        }
        else
        {
          $output .= ",";
          $i++;
        }
      }
			
    }
    echo $output;
?>
