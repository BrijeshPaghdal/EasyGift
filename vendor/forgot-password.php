<?php
if(isset($_POST['btnSendmail']))
{
		include '../config.php';
    $Email = mysqli_real_escape_string($conn,$_POST['S_Email']);
    $query = "SELECT * FROM `tbl_seller_login` WHERE email_id = '$Email'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$s_login_id = $row['s_login_id'];
				$to_email =$row['email_id'];
			}
      $query = "SELECT * FROM `tbl_seller` WHERE s_login_id = $s_login_id";
      $res = mysqli_query($conn,$query);
      $cnt=mysqli_num_rows($res);
      if($cnt > 0)
			{
				while($row = mysqli_fetch_assoc($res))
				{
					$name = $row['seller_name'];
				}

				$hash_id = md5($s_login_id);
				$subject = "Forgot Password";
				$body = "Hello " . $name . " ,\n" . "This is your recovery mail click given link below \n";
				$body .= "http://localhost/phpproj/EasyGift/vendor/change-passwd.php?id=$hash_id";
				$headers = "From: abc@gmail.com";
				$from = "abc@gmail.com";
				$temp = 0;

				$os = "Linux";
				$detail = $_SERVER['HTTP_USER_AGENT'];
				if(strpos($detail, $os) !== false)
				{
					require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
					require '/usr/share/php/libphp-phpmailer/class.smtp.php';
					$mail = new PHPMailer;
					$mail->setFrom('');
					$mail->addAddress($to_email);
					$mail->Subject = $subject;
					$mail->Body = $body;
					$mail->IsSMTP();
					$mail->SMTPSecure = 'ssl';
					$mail->Host = 'ssl://smtp.gmail.com';
					$mail->SMTPAuth = true;
					$mail->Port = 465;

					//Set your existing gmail address as user name
					$mail->Username = 'YOUR EMAIL ADDRESS';

					//Set the password of your gmail address here
					$mail->Password = 'YOUR PASSWORD';

					if(!$mail->send()) {
					  echo 'Email is not sent.';
					  echo 'Email error: ' . $mail->ErrorInfo;
					} else {
						$temp = 1;
					}
				}
				else {

					if(mail($to_email, $subject, $body, $headers))
					{
						$temp = 1;
					}
					else
					{
						echo error_get_last()['message']."<br><br>Email sending failed...<br><br>";
						print_r(error_get_last());
						die();
					}
				}
				if ($temp == 1) {
					$date = date_default_timezone_set('Asia/Kolkata');
					$curr_date = strtotime(date("y-m-d H:i:s"));
					$future_date = $curr_date + (60*5);
					$valid_till = date("y-m-d H:i:s", $future_date);

					$query = "INSERT INTO `tbl_s_forgot_passwd`(s_login_id,valid_till) Values ($s_login_id,'$valid_till')";
					mysqli_query($conn,$query);

						echo "Email successfully sent to $to_email...<br> please check your email ";
					die();
				}
		}
		else
		{
			header("Location:login.php?msg=emailNotFound");
		}
	}
	else {
		echo "Email not registered";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from www.radixtouch.in/templates/admin/lorax/source/light/pages/examples/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 11:24:13 GMT -->
  <head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Forgot Password</title>
    <!-- Favicon-->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
    <!-- Plugins Core Css -->
    <link href="assets/css/app.min.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/pages/extra_pages.css" rel="stylesheet" />
  </head>

  <body class="login-page">
    <div class="limiter">
      <div class="container-login100 page-background">
        <div class="wrap-login100">
          <form class="validate-form" method="post">
            <span class="login100-form-logo">
              <img alt="" src="assets/images/loading.png" />
            </span>
            <span class="login100-form-title p-b-34 p-t-27">
              Reset Password
            </span>
            <div class="text-center">
              <p class="txt1 p-b-20">Enter your registered email address.</p>
            </div>
            <div
              class="wrap-input100 validate-input"
              data-validate="Enter email"
            >
              <input
                class="input100"
                type="text"
                name="S_Email"
                placeholder="Email"
              />
              <i class="material-icons focus-input1001">email</i>
            </div>
            <div class="container-login100-form-btn">
              <button class="login100-form-btn" name= "btnSendmail">Send Recovery E-Mail</button>
            </div>
            <div class="text-center p-t-50">
              <a class="txt1" href="login.php"> Login? </a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Plugins Js -->
    <script src="assets/js/app.min.js"></script>
    <!-- Extra page Js -->
    <script src="assets/js/pages/examples/pages.js"></script>
  </body>
</html>
