<?php
if(isset($_POST['btnSendmail']))
{
		include './config.php';
    $Email = mysqli_real_escape_string($conn,$_POST['Email']);
    $query = "SELECT * FROM `tbl_cust_login` WHERE email_id = '$Email'";
    $res = mysqli_query($conn,$query);
    $cnt=mysqli_num_rows($res);
    if($cnt > 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$cust_login_id = $row['cust_login_id'];
				$to_email =$row['email_id'];
			}
      $query = "SELECT * FROM `tbl_customer` WHERE cust_login_id = $cust_login_id";
      $res = mysqli_query($conn,$query);
      $cnt=mysqli_num_rows($res);
      if($cnt > 0)
			{
				while($row = mysqli_fetch_assoc($res))
				{
					$name = $row['cust_name'];
				}

				$hash_id = md5($cust_login_id);
				$subject = "Forgot Password";
				$body = "Hello " . $name . " ,\n" . "This is your recovery mail click given link below \n";
				$body .= "http://localhost/phpproj/EasyGift/reset-password.php?id=$hash_id";
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
					$mail->Password = 'YOUR_PASSWORD';

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

					$query = "INSERT INTO `tbl_forgot_passwd`(cust_login_id,valid_till) Values ($cust_login_id,'$valid_till')";
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
<?php require_once 'head.php'; ?>

<body>
    <div class="page-wrapper">
        <?php require_once 'header.php'; ?>

        <!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Login</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('assets/images/backgrounds/login-bg.jpg')">
                <div class="container">
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="forgot-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="forgot-2" aria-selected="false">Forgot Password</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="register-email-2">Your email address *</label>
                                            <input type="email" class="form-control" name="Email" id="register-email-2" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <input type="submit" class="btn btn-outline-primary-2" name= "btnSendmail"  value="Send Recovery Mail">
                                        </div>
																				<!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->

        <?php require_once 'footer.php'; ?>

        <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <?php require_once 'mobile-menu.php'; ?>
    <!-- End .mobile-menu-container -->


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

</html>
