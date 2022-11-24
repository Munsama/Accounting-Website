<?php
ob_start();
session_start();
if(isset($_SESSION['username'])) header ("location: index2.php");
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login SIA JayaRent</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo $base_url;?>includes/login/images/icons/accounting.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>includes/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo $base_url;?>includes/login/images/bg-01.jpg');">
			<div class="wrap-login100"> 
				<form class="login100-form validate-form" action = "login_proses.php" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-10 p-t-1">
						Sistem Informasi Akuntansi </span>
 					<span class="login100-form-title p-b-10 p-t-2" > 
						 Jaya Rent Car </span>
					<span> </span>	 
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"> 
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo $base_url;?>includes/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo $base_url;?>includes/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo $base_url;?>includes/login/js/main.js"></script>

</body>
</html>
<?php 
mysqli_close($conn);
ob_end_flush();
?>