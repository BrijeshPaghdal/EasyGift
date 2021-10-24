<?php
	include 'check-admin.php';

	function getData($output,$res,$cnt,$temp_date)
	{
		$i = 0;
		if($cnt > 0)
		{

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
					if($i >= 29)
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
							if ($i >= 29)
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

					if($i >= 29)
					{
						break;
					}
					else
					{
						$output .= ",";
						$i++;
					}
				}
				while($i<=29)
				{
					$output .= "0";
					if($i >= 29)
					{
						break;
					}
					else
					{
						$output .= ",";
						$i++;
					}
				}
				return $output;
			}
	 	}
		date_default_timezone_set("Asia/Kolkata");
		$query = "SELECT COUNT(*) AS total, DATE(seller_create_date) AS add_date FROM tbl_seller WHERE seller_status = 1 GROUP BY DATE(seller_create_date) DESC LIMIT 30";
		$output = "";
    $temp_date = date('d-m' , strtotime('-1 days'));
    $res=mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);

		$output .= getData($output,$res,$cnt,$temp_date);
		$output .= "/";
		echo $output;

		date_default_timezone_set("Asia/Kolkata");
		$query = "SELECT COUNT(*) AS total, DATE(create_date) AS add_date FROM tbl_customer GROUP BY DATE(create_date) DESC LIMIT 30";

		$output = "";
    $temp_date = date('d-m' , strtotime('-1 days'));
    $res=mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);

		$output .= getData($output,$res,$cnt,$temp_date);

		echo $output;
?>
