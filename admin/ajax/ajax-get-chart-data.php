<?php
	include 'check-admin.php';

	function getData($output,$res,$cnt,$temp_date)
	{
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
				if($temp_date == $row['add_date'])
				{
					$output .=  $row['total'];
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
					while($temp_date != $row['add_date'])
					{
						$i++;
						$temp_date = date('Y-m-d' , strtotime('-'. $i.' days'));
						if($temp_date == $row['add_date'])
						{
							$output .=  $row['total'];
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
		return $output;
	}
		$shop_id = $_SESSION['Shop_Id'];
		date_default_timezone_set("Asia/Kolkata");
		$query = "SELECT COUNT(*) AS total, DATE(order_date) AS add_date FROM tbl_order o  GROUP BY DATE(order_date) DESC LIMIT 7";
		$output = "";
    $temp_date = date('d-m' , strtotime('-1 days'));
    $res=mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);

		$output .= getData($output,$res,$cnt,$temp_date);
		$output .= "/";
		echo $output;

		$query = "SELECT COUNT(*) AS total, DATE(add_date) AS add_date FROM tbl_product GROUP BY DATE(add_date) DESC LIMIT 7";

		$output = "";
    $temp_date = date('d-m' , strtotime('-1 days'));
    $res=mysqli_query($conn,$query) or die("sddf");
    $cnt=mysqli_num_rows($res);

		$output .= getData($output,$res,$cnt,$temp_date);

		echo $output;
?>
