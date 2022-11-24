<?php
include "../config/koneksi.php";
ob_start();
session_start();
if(!isset($_SESSION['username'])) header ("location: login.php");

if(isset($_GET['username'])){
  $query = mysqli_query ($conn,"SELECT * FROM user WHERE username='$_GET[username]'") or die (mysql_error());
  $result_edit = mysqli_fetch_array($query);
  }
  $sql = "SELECT max(no_bukti) FROM beban";
  $query = mysqli_query($conn, $sql);
  
  $transaksi = mysqli_fetch_array($query);
  
  if ($transaksi) {
      $nilai = substr($transaksi[0], 1);
      $kode = (int)$nilai;
  
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "D" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
  } else {
      $auto_kode = "D0001";
  }
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
  <title>SIA Jaya Rent| Beban</title>
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
        Beban
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index2.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transaksi</a></li>
        <li class="active">Beban</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Beban</h3>
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
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            </div>
          </div>

          <div class="col-md-10"></div>
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Tambah Beban</button>
          
          <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Beban</h4>
                                  </div>
                                  
                                  <form action="crud.php?aksi=tambah-beban" method="POST" enctype="multipart/form-data">
                                  
                                  <div class="modal-body">
                                             <div class="form-group">
                                                <label class="control-label" for="">Tanggal</label>
                                                <input type="date" name="addtgl" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">No Bukti</label>
                                                <input type="text" readonly name="no_bkt" class="form-control" placeholder="auto" id="" value="<?php echo $auto_kode; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Keterangan</label>
                                                <input type="text" name="addket" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                            <label class="control-label" for="">Akun</label>
                                            </div>
                                            <select class="form-control" name="addakun" value =""placeholder = "PILIH" required>
                                            <option value=""> PILIH </option>
                                            <?php
											$query	= mysqli_query($conn,"SELECT * FROM akun WHERE bagan IN ('2','5') ");
                      while ($hasil = mysqli_fetch_array($query)) 
                       {?>
                          <option value = "<?php echo $hasil['kode_akun'];?>"><?php echo $hasil['kode_akun'];?>|<?php echo $hasil['nama_akun'];?></option>
                                            <?php } ?>                            
                                            </select>
                                           
                                            <div class="form-group">
                                                <label class="control-label" for="">Jumlah</label>
                                                <input type="number" name="addjml" class="form-control" required>
                                            </div>
                                            
                                            <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
                                                </div>
                                            </div>
                                  </div>
                                </div>
                            </div>
                       
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th data-field="no" data-editable="true"><center>No</th>
                    <th data-field="tgl" data-editable="true"><center>Tanggal</th>
                    <th data-field="bkt" data-editable="true"><center>No Bukti</th>
                    <th data-field="kt" data-editable="true"><center>Keterangan</th>
                    <th data-field="akun" data-editable="true"><center>Akun</th>
                    <th data-field="nominal" data-editable="true"><center>Nominal</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    if($tang==1){
                    $query	= mysqli_query($conn,"SELECT * FROM beban JOIN akun USING (kode_akun) WHERE tanggal_beban BETWEEN '$awal' and '$akhir' ORDER BY tanggal_beban ASC");
                    }
                    else{
                        $query	= mysqli_query($conn,"SELECT * FROM beban JOIN akun USING (kode_akun) ORDER BY tanggal_beban ASC");

                    }
                    while ($hasil = mysqli_fetch_array($query)) 
                      
                 { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $hasil['tanggal_beban'];?></td>
                    <td><?php echo $hasil['no_bukti'];?></td>
					          <td><?php echo $hasil['keterangan'];?></td>
                    <td><?php echo $hasil['nama_akun'];?></td>
					          <td align="right"><?php echo "Rp. ".number_format($hasil['nominal'],2,',','.').""; ?></td>
                  </tr>
                  <?php   } ?>
                </tbody>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
<?php 
mysqli_close($conn);
ob_end_flush();
?>

