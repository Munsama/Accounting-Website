<?php
include "../config/koneksi.php";
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | SIA Panglima Variasi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base_url;?>resource/img/favicon2.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo $base_url;?>js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  
  <img src="<?php echo $base_url;?>resource/img/bg.jpg" alt="gambar" class="bg"/>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<div class="hpanel">
            
                    <div class="panel-body">
                      <div class="col-md-3"></div>
                        <img class="main-logo" src="img/LOGO2.png" alt=""/>
                        <form action="login_proses.php" method="POST" enctype="multipart/form-data" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input name="username" type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input name="password" type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                           
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
		</div>   
    </div>
</body>
<!-- jquery
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/icheck/icheck.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/tawk-chat.js"></script>

</html>
