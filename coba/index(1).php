<?php 
session_start();
include "../config/koneksi.php";
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SIA Panglima Variasi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base_url;?>resource/img/favicon2.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/educate-custon-icon.css">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $base_url;?>includes/css/style.css">
    <!-- responsive CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo $base_url;?>includes/css/responsive.css">
	<link rel="stylesheet" href="<?php echo $base_url;?>includes/css/data-table/bootstrap-table.css">
	<link rel="stylesheet" href="<?php echo $base_url;?>includes/css/data-table/bootstrap-editable.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<?php if(@$_SESSION['username']){
  ?>
  <?php echo $_SESSION['level'];?>
	<div class="header-advance-area">
		<?php 
			include "header.php";
			?>  
	</div>
    <div class="left-sidebar-pro">
		<?php 
			include "sidebar.php";
		?>
	</div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper" style="padding:4em 0;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<?php if(@$_GET['pages']){
					include "konten.php";
					}else {
					include "home.php";
				}
				?>

				</div>
            </div>
        </div>
	</div>
    </div>
	<div class="footer-copyright-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="footer-copy-right">
						<p>Copyright © 2019</p>
					</div>
				</div>
			</div>
		</div>
	</div>
  
	<?php } else { echo "<script>window.location.href='login.php'</script>";} ?>
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
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/morrisjs/raphael-min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/morrisjs/morris.js"></script>
    <script src="<?php echo $base_url;?>includes/js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo $base_url;?>includes/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/calendar/moment.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo $base_url;?>includes/js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo $base_url;?>includes/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
	
	<script src="<?php echo $base_url;?>includes/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo $base_url;?>includes/js/data-table/tableExport.js"></script>
    <script src="<?php echo $base_url;?>includes/js/data-table/data-table-active.js"></script>
    <script src="<?php echo $base_url;?>includes/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo $base_url;?>includes/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo $base_url;?>includes/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo $base_url;?>includes/js/data-table/colResizable-1.5.source.js"></script>
	<script src="<?php echo $base_url;?>includes/js/data-table/bootstrap-table-export.js"></script>
</html>