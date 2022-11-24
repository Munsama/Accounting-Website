<?php
include "../config/koneksi.php";
ob_start();
session_start();
if(!isset($_SESSION['username'])) header ("location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIA Jaya Rent| Data Akun</title>
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
			include "header2.php";
			?> 
  <!-- Left side column. contains the logo and sidebar -->
  <div class="main-sidebars">
		<?php 
			include "sidebar2.php";
		?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Akun
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index3.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Data Akun</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Akun</h3>
            </div>
          </div>
          <div class="col-md-10"></div>
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Tambah Akun</button>
          
          <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Data Akun</h4>
                                  </div>
                                  <form action="crud.php?aksi=tambah-akun" method="POST" enctype="multipart/form-data">
											
                                  <div class="modal-body">
                                  <div class="form-group">
                                                <label class="control-label" for="">Kode Akun</label>
                                                <input type="number" name="addkode" class="form-control" required>
                                            </div>          
                                  <div class="form-group">
                                                <label class="control-label" for="">Nama Akun</label>
                                                <input type="text" name="addakun" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label" for="">Bagan</label>
                                            </div>
                                            <select class="form-control" name="addbagan" required>
                                            <option value=""> PILIH </option>
                                            <option  value="1">1</option>
                                            <option  value="2">2</option>
                                            <option  value="3">3</option>
                                            <option  value="4">4</option>
                                            <option  value="5">5</option>                                                                   
                                            </select>

                                            <div class="form-group">
                                                <label class="control-label" for="">Posisi</label>
                                            </div>
                                            <select class="form-control" name="addposisi">
                                            <option value=""> PILIH </option>
                                            <option  value="">null</option>
                                            <option  value="L">L</option>
                                            <option  value="R">R</option>
                                            </select>
                                            
                                            <div class="form-group">
                                                <label class="control-label" for="">LR</label>
                                            </div>
                                            <select class="form-control" name="addlr" required>
                                            <option value=""> PILIH </option>
                                            <option  value="N">N</option>
                                            <option  value="T">T</option>
                                            <option  value="B">B</option>
                                            </select> 

                                            <div class="form-group">
                                                <label class="control-label" for="">PM</label>
                                            </div>
                                            <select class="form-control" name="addpm" required>
                                            <option value=""> PILIH </option>
                                            <option  value="0">0</option>
                                            <option  value="1">1</option>
                                            </select>

                                            <div class="form-group">
                                                <label class="control-label" for="">Grup</label>
                                            </div>
                                            <select class="form-control" name="addgrup" required>
                                            <option value=""> PILIH </option>
                                            <option  value="debit">debit</option>
                                            <option  value="kredit">kredit</option>
                                            </select>

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
                    <th data-field="kode" data-editable="true"><center>Kode Akun</th>
                    <th data-field="nama" data-editable="true"><center>Nama Akun</th>
                    <th data-field="bagan" data-editable="true"><center>Bagan</th>
                    <th data-field="posisi" data-editable="true"><center>Posisi</th>
                    <th data-field="lr" data-editable="true"><center>LR</th>
                    <th data-field="pm" data-editable="true"><center>PM</th>
                    <th data-field="grup" data-editable="true"><center>Grup</th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                <?php
											$no = 1;
											$query	= mysqli_query($conn,"SELECT * FROM akun");
												while ($hasil = mysqli_fetch_array($query)) 
													
												{ ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
					<td><?php echo $hasil['kode_akun'];?></td>
					<td><?php echo $hasil['nama_akun'];?></td>
          <td><?php echo $hasil['bagan'];?></td>
          <td><?php echo $hasil['posisi'];?></td>
          <td><?php echo $hasil['laba_rugi'];?></td>
          <td><?php echo $hasil['pm'];?></td>
          <td><?php echo $hasil['grup'];?></td>
                    <td>
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $hasil['kode_akun'];?>"><i class="fa fa-pencil"></i>
                        </button>
													
													<!--<a onclick="javascript:document.getElementById('mymodal').src='index.php?pages=data-user&username=" class="xcrud-action btn btn-info btn-sm" title="Edit"  data-toggle="modal" data-target="#myModal">
                                                        <i class="mdi mdi-information"></i> EDIT
                                                    </a> -->
														
                    <a href='#' style='color:#fff;'onclick="if(confirm('Apakah yakin menghapus data?'))
                    {window.location.href='crud.php?aksi=hapus-akun&Kode_akun=<?php echo $hasil['kode_akun'];?>'}"> 
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
					</td>
                  </tr>
                                    <div class="modal fade" id="myModal<?php echo $hasil['kode_akun'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Data Akun</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="crud.php?aksi=edit-akun" method="POST" enctype="multipart/form-data">
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Kode Akun</label>
                                                                    <input type="text" readonly ="" name="editkode" class="form-control" value="<?php echo $hasil['kode_akun'];?>"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Nama Akun</label>
                                                                    <input type="text"  name="editakun" class="form-control"  value="<?php echo $hasil['nama_akun'];?>" required>
                                                                </div>
                                                                <div class="form-group">                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-success" name="tambah"> Simpan</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="mymodal<?php echo $hasil['kode_akun'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Lihat Data Akun</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                                
                                                            <div class="form-group">
                                                                    <label class="control-label" for="">Kode Akun</label>
                                                                    <input type="text" readonly ="" name="viewkode" class="form-control" value="<?php echo $hasil['kode_akun'];?>"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Nama Akun</label>
                                                                    <input type="text" readonly ="" name="viewakun" class="form-control"  value="<?php echo $hasil['nama_akun'];?>" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Bagan</label>
                                                                </div>
                                                                <select class="form-control" name="editbagan">
                                                                    <option <?php if($hasil['bagan'] == '1') echo "selected"; ?> value="1">1</option>
                                                                    <option <?php if($hasil['bagan'] == '2') echo "selected"; ?> value="2">2</option>
                                                                    <option <?php if($hasil['bagan'] == '3') echo "selected"; ?> value="3">3</option>                                                                    
                                                                    <option <?php if($hasil['bagan'] == '4') echo "selected"; ?> value="4">4</option>                                                                    
                                                                    <option <?php if($hasil['bagan'] == '5') echo "selected"; ?> value="5">5</option>                                                                    
                                                                </select>
                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Posisi</label>
                                                                </div>
                                                                <select class="form-control" name="editposisi">
                                                                    <option <?php if($hasil['posisi'] == 'null') echo "selected"; ?> value="null">null</option>
                                                                    <option <?php if($hasil['posisi'] == 'L') echo "selected"; ?> value="L">L</option>
                                                                    <option <?php if($hasil['posisi'] == 'R') echo "selected"; ?> value="R">R</option>                                                                    
                                                                </select>

                                                                <div class="form-group">
                                                                    <label class="control-label" for="">LR</label>
                                                                </div>
                                                                <select class="form-control" name="editlr">
                                                                    <option <?php if($hasil['laba_rugi'] == 'N') echo "selected"; ?> value="N">N</option>
                                                                    <option <?php if($hasil['laba_rugi'] == 'T') echo "selected"; ?> value="T">T</option>                                                                    
                                                                    <option <?php if($hasil['laba_rugi'] == 'B') echo "selected"; ?> value="B">B</option>                                                                    
                                                                </select>

                                                                <div class="form-group">
                                                                    <label class="control-label" for="">PM</label>
                                                                </div>
                                                                <select class="form-control" name="editpm">
                                                                    <option <?php if($hasil['pm'] == '0') echo "selected"; ?> value="0">0</option>
                                                                    <option <?php if($hasil['pm'] == '1') echo "selected"; ?> value="1">1</option>                                                                    
                                                                </select>

                                                                 <div class="form-group">
                                                                    <label class="control-label" for="">Grup</label>
                                                                </div>
                                                                <select class="form-control" name="editgrup">
                                                                    <option <?php if($hasil['grup'] == 'debit') echo "selected"; ?> value="debit">debit</option>
                                                                    <option <?php if($hasil['grup'] == 'kredit') echo "selected"; ?> value="kredit">kredit</option>                                                                    
                                                                </select>

                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>               
                  <?php }?>
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