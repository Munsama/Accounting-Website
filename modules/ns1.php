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
    }else {
        $tang = 0;
    }
} else {
    $tang = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIA Jaya Rent| Laporan Neraca Saldo</title>
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
			include "header3.php";
			?> 
  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebars">
		<?php 
			include "sidebar3.php";
		?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Neraca Saldo
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index4.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Perekapan</a></li>
        <li class="active">Neraca Saldo</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Neraca Saldo</h3>
            </div>
          </div>
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
                                
                                <form action="cetak-ns.php" method="POST" target="_blank">
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
          

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
              <tr>
                            <td colspan="4" align="center"><b>Tabel</b>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><b>Jaya Rent</b>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><b>Neraca Saldo</b>
                        </tr>

                        <tr align="center">
                            <th rowspan="2" align="center" class="center" width="10%"><center>Nomor Akun</center></th>
                            <th rowspan="2" align="center" class="center" width="35%"><center>Nama Akun</center></th>
                            <th colspan="2" align="center" class="center" width="30%"><center>Saldo</center></th>
                        </tr>
                        <tr align="center">
                            <th><center>Debit</center></th>
                            <th><center>Kredit</center></th>
                        </tr>
                        <?php
                        $saldo_debet = 0;
                        $saldo_kredit = 0;
                        $sql = mysqli_query($conn,"SELECT * FROM akun ORDER BY kode_akun");


                        while ($query = mysqli_fetch_array($sql)) {
                            $kode_akun = $query['kode_akun'];

                        ?>
                        <tr>
                            <td class="center"><?=$query['kode_akun']?></td>
                            <td class="center"><?=$query['nama_akun']?></td>
                            <?php
                            if($tang == 1) {
                                $sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun' and tgl BETWEEN '$awal' and '$akhir'");
                                $sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun and tgl BETWEEN '$awal' and '$akhir'");
                            } else {
                                $sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
                                $sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
                            }
                            //$sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
                            $debit = mysqli_fetch_array($sal);

                            //$sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
                            $kredit = mysqli_fetch_array($sal2);

                            if($query['grup'] == "debit") {
                                $salD = $debit['debit'] - $kredit['kredit'];
                                $saldo_debet += $salD;
                                $salK = 0;
                            }
                            else {
                                $salD = 0;
                                $salK = $kredit['kredit'];
                                $saldo_kredit += $salK;
                            }
                            ?>
                            <td>Rp.<?=number_format($salD)?></td>
                            <td>Rp.<?=number_format($salK)?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" align="right"><b>Total :</b></td>
                            <td><b>Rp.<?=number_format($saldo_debet)?></b></td>
                            <td><b>Rp.<?=number_format($saldo_kredit)?></b></td>
                        </tr>

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