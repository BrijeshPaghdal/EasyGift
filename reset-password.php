<?php
	include './config.php';
	$date = date_default_timezone_set('Asia/Kolkata');

	if(isset($_POST['changePasswd']))
	{
		$id = $_POST['id'];
		$passwd = $_POST['new_passwd'];

		$query = "SELECT * FROM `tbl_forgot_passwd`";
		$res=mysqli_query($conn,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt > 0)
		{
			while($row = mysqli_fetch_assoc($res))
			{
				$cust_login_id = $row['cust_login_id'];

				$cust_login_id_hash = md5($cust_login_id);

				if($id === $cust_login_id_hash)
				{
					$temp = 1;
					break;
				}
				else {
					$temp = 0;
				}
			}
			if($temp == 0)
			{
				// header("Location:404.php");
			}
			else {
        $passwdmd = md5($passwd);
				$query = "UPDATE `tbl_cust_login` SET passwd = '$passwdmd' WHERE cust_login_id = $cust_login_id";
			    if(mysqli_query($conn,$query))
			    {
						// header("Location:login.php?msg=PasswordChanged");
						// $query1 = "DELETE FROM `tbl_forgot_passwd` WHERE cust_login_id = $cust_login_id";
						// mysqli_query($conn,$query1);
			    	header("Location:login.php?msg=PasswordChanged");
						// }
					}
			}
		}
	}
?>
<?php
if(isset($_GET['id']))
{
		$id = mysqli_real_escape_string($conn,$_GET['id']);

		$query = "SELECT * FROM `tbl_forgot_passwd` Order BY valid_till DESC";
		$res=mysqli_query($conn,$query);
		$cnt=mysqli_num_rows($res);
		if($cnt > 0)
		{
			$temp = 0;
			while($row = mysqli_fetch_assoc($res))
			{
				$cust_login_id = $row['cust_login_id'];
				$valid_till = $row['valid_till'];

				$cust_login_id_hash = md5($cust_login_id);

				$currTime = date('Y-m-d H:i:s');
				if($id === $cust_login_id_hash && $valid_till >= $currTime)
				{
					$temp = 1;
					break;
				}
				else {
					$temp = 0;
				}
			}
			if($temp == 0)
			{
				header("Location:404.php");
			}
?>
<?php require_once 'head.php'; ?>

<body>
  <div class="page-wrapper">
    <?php require_once 'header.php'; ?>
    <!-- End .header -->

    <main class="main">
      <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="
            background-image: url('assets/images/backgrounds/login-bg.jpg');
          ">
        <div class="container">
          <div class="form-box">
            <div class="form-tab">
              <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="forgot-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="forgot-2" aria-selected="false">Reset Password</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                  <form method="POST" id = "reset-passwd">
                    <div class="form-group">
                      <label for="register-password-2">New Password *</label>
                      <input type="password" class="form-control" name = "new_passwd" id="new_passwd" required />
                    </div>
                    <!-- End .form-group -->

                    <div class="form-group">
                      <label for="register-confirm-password-2">Confirm Password *</label>
                      <input type="password" class="form-control" id="cnf_passwd" name="cnf_passwd" required />
                    </div>
                    <!-- End .form-group -->
                    <div class="form-footer">
                      <input type="hidden" name="id" value="<?php echo $id?>">
                      <input type="submit" class="btn btn-outline-primary-2" name= "changePasswd"  value="Change Password">
                    </div>
                    <!-- End .form-footer -->
                  </form>
                </div>
                <!-- .End .tab-pane -->
              </div>
              <!-- End .tab-content -->
            </div>
            <!-- End .form-tab -->
          </div>
          <!-- End .form-box -->
        </div>
        <!-- End .container -->
      </div>
      <!-- End .login-page section-bg -->
    </main>
    <!-- End .main -->
  </div>
  <!-- End .page-wrapper -->
  <button id="scroll-top" title="Back to Top">
    <i class="icon-arrow-up"></i>
  </button>

  <!-- Mobile Menu -->
  <?php require_once 'footer.php'; ?>
  <!-- End .mobile-menu-container -->

  <!-- Plugins JS File -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.hoverIntent.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/superfish.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

</html>
<?php
	}
	else {
		header("Location:404.php");
	}
}
?>
