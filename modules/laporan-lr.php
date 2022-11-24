<?php
include "../config/koneksi.php";
ob_start();
session_start();
if(!isset($_SESSION['username'])) header ("location: login.php");

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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIA Jaya Rent| Laporan Laba Rugi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $base_url;?>includes/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php if(@$_SESSION['username']){
  ?>
<?php 
			include "header.php";
			?> 
  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebars">
		<?php 
			include "sidebar.php";
		?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Laba Rugi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index2.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Laba Rugi</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Laporan Laba Rugi</h3>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box">
            <div class="box-header">
            <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-xs-6">
                            <h4 class="card-inside-title">Pilih Rentang Tanggal</h4>
                            <form action="" method="POST">
                                <div class="input-daterange input-group" id="bs_datepicker_range_container">
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="awal" placeholder="Tanggal Awal...">
                                    </div>
                                    <span class="input-group-addon">sampai</span>
                                    <div class="form-line">
                                        <input type="date" class="form-control" name="akhir" placeholder="Tanggal Akhir...">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="range" class="btn btn-primary btn-m">
                                    <i class="fa fa-search"></i>
                                    <span>Cari</span>
                                </button>
                                </form>
                                <br>
                                
                                <form action="cetak-laporan-lr.php" method="POST" target="_blank">
                                <input type="date" hidden value="<?php if ($tang == 1 )echo $awal;  ?>" name="awal">
                                <input type="date" hidden value="<?php if ($tang == 1 )echo $akhir;  ?>" name="akhir">
                                <button type="submit" name="cetak" class="btn btn-primary btn-m">
                                    <i class="fa fa-print"></i>
                                    <span>Cetak</span>
                                </button>
                            </form>
                            
                      <br>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
          </div>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
              <?php
                            $saldo = 0;
//                            $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
                            $pen = mysqli_fetch_array($query);
                            $saldo = $pen['p_total'];
                            ?>

                            <tr>
                                <td colspan="3" align="center"><b>Jaya Rent</b></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><b>Laporan Laba Rugi</b></td>
                            </tr>
                            <tr height="40px">
                                <td colspan="2" align="left"><b>Pendapatan Jasa</b></td>
                                <td colspan="2" width="40%" align="left"><b>Rp.<?=number_format($pen['p_total'])?></b></td>
                            </tr>

                            <tr height="40px">
                                <td colspan="3" align="left"> <b>Beban Usaha :</b></td>
                            </tr>
                            <?php
//                            $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
                            while ($beban = mysqli_fetch_array($query2)) {
                            ?>
                            <tr>
                                <td><?=$beban['nama_akun']?></td>
                                <td> Rp.<?=number_format($beban['b_total'])?></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <tr height="40px">
                                <td colspan="2" align="left"><b>Total Beban Usaha</b></td>
                                <?php
//                                $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");
                                $total_b = mysqli_fetch_array($query3);
                                $saldo -= $total_b['b_total'];
                                ?>
                                <td align="left"><b>Rp.<?=number_format($total_b['b_total'])?></b></td>
                            </tr>


                            <tfoot>
                            <tr height="40px">
                                <td colspan="2" align="right">
                                    <b>Laba Bersih :</b>
                                </td>
                                <td>
                                    Rp.<?=number_format($saldo)?>
                                </td>
                            </tr>

                            </tfoot>

              </table>
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
<!-- jQuery 3 -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $base_url;?>includes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $base_url;?>includes/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url;?>includes/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo $base_url;?>includes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $base_url;?>includes/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $base_url;?>includes/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $base_url;?>includes/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : false,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
</body>
</html>
<?php 
mysqli_close($conn);
ob_end_flush();
?>