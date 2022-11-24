<?php
ob_start();
session_start();
if(!isset($_SESSION['username'])) header ("location: login.php");
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIA Jaya Rent| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php if(@$_SESSION['username']){
  ?>
<div class="wrapper">
<?php 
			include "header3.php";
			?> 
  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebars">
		<?php 
			include "sidebar3.php";
		?>
	</div>  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index4.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <?php
													$saldo_debit = 0;
													$saldo_kredit = 0;
													$sql = mysqli_query($conn,"SELECT * FROM akun WHERE kode_akun = '11' ORDER BY kode_akun");


													while ($query = mysqli_fetch_array($sql)) {
														$kode_akun = $query['kode_akun'];

													?>
													
														<?php
														$sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
														$debit = mysqli_fetch_array($sal);

														$sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
														$kredit = mysqli_fetch_array($sal2);

														if($query['grup'] == "debit") {
															$salD = $debit['debit'] - $kredit['kredit'];
															$saldo_debit += $salD;
															$salK = 0;
														}
														else {
															$salD = 0;
															$salK = $kredit['kredit'];
															$saldo_kredit += $salK;
														}
														?>
														<h3 style="font-size: 20px">Rp.<?=number_format($salD)?></h3>
													<?php } ?>
              <p>Saldo Akhir Kas</p>
            </div>

            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa--circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <?php
													$saldo_debit = 0;
													$saldo_kredit = 0;
													$sql = mysqli_query($conn,"SELECT * FROM akun WHERE kode_akun = '41' ORDER BY kode_akun");


													while ($query = mysqli_fetch_array($sql)) {
														$kode_akun = $query['kode_akun'];

													?>
													
														<?php
														$sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
														$debit = mysqli_fetch_array($sal);

														$sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
														$kredit = mysqli_fetch_array($sal2);

														if($query['grup'] == "debit") {
															$salD = $debit['debit'] - $kredit['kredit'];
															$saldo_debit += $salD;
															$salK = 0;
														}
														else {
															$salD = 0;
															$salK = $kredit['kredit'];
															$saldo_kredit += $salK;
														}
														?>
														<h3 style="font-size: 20px">Rp.<?=number_format($salK)?></h3>
													<?php } ?>

              <p>Pendapatan</p>
            </div>
            <div class="icon">
              <i class="fa fa-line-chart"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa--circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
           <?php 
           if (isset($_POST['range'])){
            $awal = $_POST['awal'];
            $akhir = $_POST['akhir'];
            
        //    echo $awal."dan"."$akhir";
        
           if ($awal != null){
        $tang = 1;
        $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T' and ju.tgl BETWEEN '$awal' and '$akhir'");
        $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B' and ju.tgl BETWEEN '$awal' and '$akhir' GROUP BY akun.kode_akun");
        $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B' and ju.tgl BETWEEN '$awal' and '$akhir'");

    }else {
        $tang = 0;
        $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
        $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
        $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");
    }
} else {
    $tang = 0;
    $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
    $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
    $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");

}
?>
            <?php
                            $saldo = 0;
//                            $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
                            $pen = mysqli_fetch_array($query);
                            $saldo = $pen['p_total'];
                            ?>

                            
                            <?php
//                            $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
                            while ($beban = mysqli_fetch_array($query2)) {
                            ?>
                            
                            <?php } ?>
                            
                                <?php
//                                $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");
                                $total_b = mysqli_fetch_array($query3);
                                $saldo -= $total_b['b_total'];
                                ?>
                                <h3 style="font-size: 20px">Rp.<?=number_format($total_b['b_total'])?></h3>

              <p>Beban</p>
            </div>
            <div class="icon">
              <i class="fa fa-anchor"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa--circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <?php
													$saldo_debit = 0;
													$saldo_kredit = 0;
													$sql = mysqli_query($conn,"SELECT * FROM akun WHERE bagan = '2' ORDER BY kode_akun");


													while ($query = mysqli_fetch_array($sql)) {
														$kode_akun = $query['kode_akun'];

													?>
													
														<?php
														$sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
														$debit = mysqli_fetch_array($sal);

														$sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
														$kredit = mysqli_fetch_array($sal2);

														if($query['grup'] == "debit") {
															$salD = $debit['debit'] - $kredit['kredit'];
															$saldo_debit += $salD;
															$salK = 0;
														}
														else {
															$salD = 0;
															$salK = $kredit['kredit'];
															$saldo_kredit += $salK;
														}
														?>
														<h3 style="font-size: 20px">Rp.<?=number_format($salK)?></h3>
													<?php } ?>

              <p>JOK LALI BAYAR HUTANG</p>
            </div>
            <div class="icon">
              <i class="fa fa-credit-card"></i>
            </div>
            <a href="#" class="small-box-footer"> <i class="fa fa--circle-right"></i></a>
          </div>
        </div> 
        
        <!-- ./col -->
      </div>
      <div class="box">
            <div class="box-body">
              <h1 class="box-title">Halo Selamat Datang <?php echo $_SESSION['username'];?></h1>
            </div>
            <div class="box-body">
              <h1 class="box-title">Anda Telah Sukses Login Sebagai <?php echo $_SESSION['level'];?></h1>
            </div>
          </div>
      
      <!-- /.row -->
      

        
              

      

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <?php } else { echo "<script>window.location.href='login.php'</script>";} ?>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $base_url;?>includes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo $base_url;?>includes/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo $base_url;?>includes/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo $base_url;?>includes/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $base_url;?>includes/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $base_url;?>includes/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $base_url;?>includes/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo $base_url;?>includes/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo $base_url;?>includes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $base_url;?>includes/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url;?>includes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $base_url;?>includes/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url;?>includes/dist/js/demo.js"></script>
</body>
</html>
<?php 
mysqli_close($conn);
ob_end_flush();
?>