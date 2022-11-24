<?php
include "../config/koneksi.php";

if(isset($_GET['username'])){
  $query = mysqli_query ($conn,"SELECT * FROM user WHERE username='$_GET[username]'") or die (mysql_error());
  $result_edit = mysqli_fetch_array($query);
  }
  $sql = "SELECT max(id_jtransaksi) FROM jenistransaksi";
  $query = mysqli_query($conn, $sql);
  
  $transaksi = mysqli_fetch_array($query);
  
  if ($transaksi) {
      $nilai = substr($transaksi[0], 1);
      $kode = (int)$nilai;
  
      //tambahkan sebanyak + 1
      $kode = $kode + 1;
      $auto_kode = "1" . str_pad($kode, 1, "0",  STR_PAD_LEFT);
  } else {
      $auto_kode = "1";
  }
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIA Jaya Rent| Data Jenis Transaksi</title>
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
        Data Jenis Transaksi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index2.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Data Jenis Transaksi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Jenis Transaksi</h3>
            </div>
          </div>
          <div class="col-md-10"></div>
          <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Tambah Jenis Transaksi</button>
          
          <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Data Jenis Transaksi</h4>
                                  </div>
                                  
                                  <form action="crud.php?aksi=tambah-jtransaksi" method="POST" enctype="multipart/form-data">
											
                                  <div class="modal-body">
                                            <div class="form-group">
                                                <label class="control-label" for="">Jenis Transaksi</label>
                                                <input type="number" readonly name="addid" class="form-control" placeholder="auto" id=""  value="<?php echo $auto_kode; ?>">
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="control-label" for="">Nama Jenis Transaksi</label>
                                                <input type="text" name="addnama" class="form-control" required>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label" for="">Kode Akun</label>
                                            </div>
                                            
                                            <select class="form-control" name="addkode">
                                            <?php
											
											$query	= mysqli_query($conn,"SELECT * FROM akun");
                      while ($hasil = mysqli_fetch_array($query)) 
                                          
                       {?>
                                            <option value ="<?php echo $hasil['kode_akun'];?>"><?php echo $hasil['kode_akun'];?> | <?php echo $hasil['nama_akun'];?></option>
                                            
                                            <?php } ?>                     
                                            </select>
                       
                                            <div class="form-group">
                                            <label class="control-label" for="">Id Kelompok Transaksi</label>
                                            </div>
                                    
                                            <select class="form-control" name="addkt">
                                            
                                            <?php
											
											$query	= mysqli_query($conn,"SELECT * FROM kelompoktransaksi");
                      while ($hasil = mysqli_fetch_array($query)) 
                                          
                       {?>
                                            <option value ="<?php echo $hasil['id_ktransaksi'];?>"><?php echo $hasil['id_ktransaksi'];?> | <?php echo $hasil['nama_ktransaksi'];?></option>
                                            <?php } ?>                            
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
                    <th data-field="no" data-editable="true">No</th>
                    <th data-field="idjt" data-editable="true">Id Jenis Transaksi</th>
                    <th data-field="nama" data-editable="true">Jenis Transaksi</th>
                    <th data-field="ka" data-editable="true"> Akun</th>
                    <th data-field="kt" data-editable="true"> Kelompok Transaksi</th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                <?php
											$no = 1;
                      $query	= mysqli_query($conn,"SELECT * FROM jenistransaksi JOIN akun ON jenistransaksi.kode_akun = akun.kode_akun JOIN kelompoktransaksi USING (id_ktransaksi)");
                        while ($hasil = mysqli_fetch_array($query))
												{ ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
					<td><?php echo $hasil['id_jtransaksi'];?></td>
					<td><?php echo $hasil['nama_jtransaksi'];?></td>
          
					<td>
          
              <?php echo $hasil['kode_akun'];?> | <?php echo $hasil['nama_akun'];?>
          
                        </td>
					<td><?php echo $hasil['id_ktransaksi'];?> | <?php echo $hasil['nama_ktransaksi'];?></td>
                    <td>
                        <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModals<?php echo $hasil['id_jtransaksi'];?>"><i class="fa fa-pencil"></i>
                        </button>
													
													<!--<a onclick="javascript:document.getElementById('mymodal').src='index.php?pages=data-user&username=" class="xcrud-action btn btn-info btn-sm" title="Edit"  data-toggle="modal" data-target="#myModal">
                                                        <i class="mdi mdi-information"></i> EDIT
                                                    </a> -->
														
                    <a href='#' style='color:#fff;'onclick="if(confirm('Apakah yakin menghapus data?'))
                    {window.location.href='crud.php?aksi=hapus-jtransaksi&JTransaksi=<?php echo $hasil['id_jtransaksi'];?>'}"> 
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
					</td>
                  </tr>
                                    <div class="modal fade" id="myModals<?php echo $hasil['id_jtransaksi'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Data Jenis Transaksi</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="crud.php?aksi=edit-jtransaksi" method="POST" enctype="multipart/form-data">
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Id Jenis Transaksi</label>
                                                                    <input type="text" readonly="" name="editid" class="form-control" value="<?php echo $hasil['id_jtransaksi'];?>"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Nama Jenis Transaksi</label>
                                                                    <input type="text" name="editnama" class="form-control"  value="<?php echo $hasil['nama_jtransaksi'];?>" required>
                                                                </div>
                                                                                            
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Kode Akun</label>
                                                                </div>
                                                                <select class="form-control" name="editkode">
                                            <?php
											
											$query2	= mysqli_query($conn,"SELECT * FROM akun");
                      while ($hasil2 = mysqli_fetch_array($query2)) 
                                          
                       {?> 
                       <option <?php if($hasil2['kode_akun'] == $hasil['kode_akun']) echo "selected"; ?> value="<?php echo $hasil2['kode_akun'];?>"><?php echo $hasil['nama_akun'];?> | <?php echo $hasil2['nama_akun'];?></option>
                                            
                                            <?php } ?>                     
                                            </select>
                       
                                            <div class="form-group">
                                            <label class="control-label" for="">Id Kelompok Transaksi</label>
                                            </div>
                                    
                                            <select class="form-control" name="editkt">
                                            
                                            <?php
											
											$query3	= mysqli_query($conn,"SELECT * FROM kelompoktransaksi");
                      while ($hasil3 = mysqli_fetch_array($query3)) 
                                          
                       {?>
                                            <option  <?php if($hasil3['id_ktransaksi'] == $hasil['id_ktransaksi']) echo "selected"; ?> value="<?php echo $hasil3['id_ktransaksi'];?>"><?php echo $hasil3['id_ktransaksi'];?></option>
                                            <?php } ?>                            
                                            </select>
                                                                <div class="form-group">                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-success" name="simpan"> Simpan</button>
                                                                    
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                                
                                    <?php } ?>
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
