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
  <title>SIA Jaya Rent| Laporan Neraca</title>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Neraca
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index4.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Neraca</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View Laporan Neraca</h3>
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
                                
                                <form action="cetak-laporan-neraca.php" method="POST" target="_blank">
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
                    <th colspan="2" class="left" width="50%">Aktiva</th>
                </tr>
                <?php
                if($tang==1){
                    $sqlL = mysqli_query($conn,"SELECT SUM(ju.debit) AS jml_debit, SUM(ju.kredit) AS jml_kredit, ju.tgl, ju.kode_akun, akun.*
                            FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                            WHERE ju.tgl BETWEEN '$awal' and '$akhir' AND akun.posisi='L' AND akun.posisi !=''
                            GROUP BY ju.kode_akun
                            ORDER BY ju.id_ju ASC");
                } else  {
                  $sqlL = mysqli_query($conn,"SELECT SUM(ju.debit) AS jml_debit, SUM(ju.kredit) AS jml_kredit, ju.tgl, ju.kode_akun, akun.*
                            FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                            WHERE akun.posisi='L' AND akun.posisi !=''
                            GROUP BY ju.kode_akun
                            ORDER BY ju.id_ju ASC");
                }													
                    while($rowsL=mysqli_fetch_array($sqlL)){
                        // if($rowsL['grup']=='Debit'){
                        // 	$jml_debitL = $rowsL['jml_debit']-$rowsL['jml_kredit'];
                        // 	// $jml_debit = $rows['jml_debit'];
                        // 	$jml_kredit = 0;
                        // }else{
                        // 	$jml_kreditL = $rowsL['jml_kredit']-$rowsL['jml_debit'];
                        // 	// $jml_kredit = $rows['jml_kredit'];
                        // 	$jml_debitL = 0;
                        // }
                ?>
                <tr>
                    <td class="left"><?php echo $rowsL['nama_akun']; ?></td>
                    <?php
                    if($rowsL['grup']=='debit'){
                        $jml_debitL = $rowsL['jml_debit']-$rowsL['jml_kredit'];
                    ?>
                    <td class="right">
                        <?php echo "Rp. ".number_format($jml_debitL,2,',','.').""; ?>
                    </td>
                    <?php
                    }else{
                        $jml_kreditL = $rowsL['jml_kredit']-$rowsL['jml_debit'];
                    ?>
                    <td class="right">
                        <?php echo "Rp. ".number_format($jml_kreditL,2,',','.').""; ?>
                    </td>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                    @$total_debitL += @$jml_debitL;
                    @$total_kreditL += @$jml_kreditL;
                    $totalL = $total_debitL+$total_kreditL;
                    }
                    // $total_debitL += $jml_debitL;
                    // $total_kreditL += $jml_kreditL;
                ?>
                <tr>
                    <td><b><div align="left">Jumlah Aktiva</div></b></td>

                    <td class="right"><b><?php echo "Rp. ".number_format($totalL,2,',','.').""; ?></b></td>
                </tr>
                <!-- batas -->
                <tr>
                    <th colspan="2" class="center" width="50%">&nbsp;</th>
                </tr>
                <tr>
                    <th colspan="2" class="left" width="50%">Kewajiban dan Modal</th>
                </tr>
                <?php
                    if($tang==1){
                      $labaK = mysqli_query($conn,"
                      SELECT SUM(ju.kredit) AS labaK,
                      ju.tgl
                      FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                      WHERE ju.tgl BETWEEN '$awal' and '$akhir' AND akun.laba_rugi ='T'");
                    } else {$labaK = mysqli_query($conn,"
                      SELECT SUM(ju.kredit) AS labaK,
                      ju.tgl
                      FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                      WHERE akun.laba_rugi ='T'");}
                    $lbK = mysqli_fetch_array($labaK);
                    
                    if($tang==1){
                      $labaD = mysqli_query($conn,"
                      SELECT SUM(ju.debit) AS labaD,
                      ju.tgl
                      FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                      WHERE ju.tgl BETWEEN '$awal' and '$akhir' AND akun.laba_rugi ='B'");
                    } else {
                      $labaD = mysqli_query($conn,"
                            SELECT SUM(ju.debit) AS labaD,
                            ju.tgl
                            FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                            WHERE akun.laba_rugi ='B'");
                    }
                    $lbD = mysqli_fetch_array($labaD);

                    $total_laba = $lbK['labaK']-$lbD['labaD'];
                    
                    if($tang==1){
                      $prive = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) AS total_prive FROM prive WHERE prive.tanggal_prive BETWEEN '$awal' and '$akhir'"));
                    } else {
                      $prive = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) AS total_prive FROM prive "));
                    }
                    
                    if($tang==1){
                      $sqlR = "SELECT SUM(ju.debit) AS jml_debit, SUM(ju.kredit) AS jml_kredit, ju.tgl, ju.kode_akun, akun.*
                      FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                      WHERE ju.tgl BETWEEN '$awal' and '$akhir' AND akun.posisi='R' AND akun.posisi !=''
                      GROUP BY ju.kode_akun
                      ORDER BY ju.id_ju ASC";
                    } else {
                      $sqlR = "SELECT SUM(ju.debit) AS jml_debit, SUM(ju.kredit) AS jml_kredit, ju.tgl, ju.kode_akun, akun.*
                            FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
                            WHERE akun.posisi='R' AND akun.posisi !=''
                            GROUP BY ju.kode_akun
                            ORDER BY ju.id_ju ASC";
                    }
                    $queryR	= mysqli_query($conn,$sqlR);
                    
                    while($rowsR=mysqli_fetch_array($queryR)){
                        $cekM = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM akun WHERE posisi='R' AND laba_rugi='N' AND pm=1"));
                        $dataM = $cekM['nama_akun'];

                        // if($rowsR['nama_akun']==$dataM){
                        // 	if($rowsR['grup']=='Debit'){
                        // 		$jml_debitR = ($rowsR['jml_debit']-$rowsR['jml_kredit'])+$labaD;
                        // 	}else{
                        // 		$jml_kreditR = ($rowsR['jml_kredit']-$rowsR['jml_debit'])+$labaD;
                        // 	}
                        // }else{
                        // 	if($rowsR['grup']=='Debit'){
                        // 		$jml_debitR = $rowsR['jml_debit']-$rowsR['jml_kredit'];
                        // 	}else{
                        // 		$jml_kreditR = $rowsR['jml_kredit']-$rowsR['jml_debit'];
                        // 	}
                        // }

                ?>
                <tr>
                    <td class="left"><?php echo $rowsR['nama_akun']; ?></td>
                    <?php
                    if($rowsR['nama_akun']==$dataM){
                        $jml_kredit = ($rowsR['jml_kredit']-$rowsR['jml_debit'])+$total_laba;
                        $jml_kreditR = $jml_kredit - $prive['total_prive'];
                    ?>
                    <td class="right">
                        <?php echo "Rp. ".number_format($jml_kreditR,2,',','.').""; ?>
                    </td>
                    <?php
                    }else{
                        $jml_kreditR = $rowsR['jml_kredit']-$rowsR['jml_debit'];
                    ?>
                    <td class="right">
                        <?php echo "Rp. ".number_format($jml_kreditR,2,',','.').""; ?>
                    </td>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                    @$total_debitR += @$jml_debitR;
                    @$total_kreditR += @$jml_kreditR;
                    $totalR = $total_debitR+$total_kreditR;
                    }
                    // $total_debitR += $jml_debitR;
                    // $total_kreditR += $jml_kreditR;
                ?>
                <tr>
                    <td><b><div align="left">Total Kewajiban dari Modal</div></b></td>
                    
                    <td class="right"><b><?php echo "Rp. ".number_format($totalR,2,',','.').""; ?></b></td>
                    
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