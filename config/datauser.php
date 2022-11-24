<?php
include "../config/koneksi.php";

?>

<link rel="stylesheet" href="<?Php echo $base_url;?>includes/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?Php echo $base_url;?>includes/data-table/bootstrap-editable.css">
    
    <link rel="stylesheet" href="<?Php echo $base_url;?>includes/data-table/style.css">
    <link rel="stylesheet" href="<?Php echo $base_url;?>includes/data-table/css/responsive.css">
    <script src="<?Php echo $base_url;?>includes/data-table/modernizr-2.8.3.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


 
    
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Data User</h1>
                        </div>
                        <div class="col-md-11"></div>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        <i class="lnr lnr-file-add"></i>
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Tambah Data User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <form action="<?= $base_url ?>modules/index.php?pages=crud&aksi=tambah-user" method="POST">
                                    
                                    <div class="form-group">
                                        <label class="control-label" for="">Nama</label>
                                        <input type="text" name="add_nama" class="form-control" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="">Username</label>
                                        <input type="text" name="add_username" class="form-control" id="" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="">Password</label>
                                        <input type="password" name="add_password" class="form-control" id="" required>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label" for="">Level</label>
                                    <div class="custom-select">
                                    <select name="add_level" class="form-control">
                                                    <option value="Admin">Pilih</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Pengurus">Pengurus</option>
                                                    <option value="Anggota">Anggota</option>
                                            </select>
                                </div>
                                    </div>
                            <!-- Modal footer -->
                             <div class="modal-footer">
                                    <button type="submit" class="btn btn-warning" name="tambah">Tambah</button>
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            </div>

                    </div>
         </div>
    </div>
</div>

<?php

// Check If form submitted, insert form data into users table.
// if(isset($_POST['tambah'])) {
//     $name = $_POST['nama'];
//     $username = $_POST['username'];
//     $password = $_POST['password'];
//     $akses = $_POST['level'];

//     // Insert user data into table
//     $result = mysqli_query($conn, "INSERT INTO user VALUES('','$name','$username' ,'$password','$akses')");
// }
?>

                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
											$no = 1;
											$query	= mysqli_query($conn,"SELECT * FROM user");
												while ($hasil = mysqli_fetch_array($query)) 
													
												{ ?>
													
													<tr>
                                                    <td></td>
													<td><?php echo $no++; ?></td>
													<td><?php echo $hasil['nama'];?></td>
													<td><?php echo $hasil['username'];?></td>
													<td><?php echo $hasil['password'];?></td>
													<td><?php echo $hasil['level'];?></td>
													<td>
                                                        
                                                    
                                                        <button data-toggle = "modal" data-target="#myModal<?= $hasil ['id']?>" class="btn btn-primary btn-xs"><i class="lnr lnr-pencil"></i></button>  
                                                        <a href='#' style='color:#fff;'onclick="if(confirm('Apakah yakin menghapus dataasdasdasd ?')){window.location.href='<?php echo $base_url?>modules/index.php?pages=crud&aksi=hapus-user&id=<?php echo $hasil['id'];?>'}"> <button class="btn btn-danger btn-xs"><i class="lnr lnr-trash"></i></button></a>
                                                    </tr>   
                                                    
                                                    
                                                    <!-- Modal untuk edit data-->
                            <div class="modal fade" id="myModal<?php echo $hasil['id'];?>" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Edit Data User</h4>
                                  </div>
                                  <div class="modal-body">
                                  <form action="<?= $base_url ?>modules/index.php?pages=crud&aksi=edit-user" method="post">
                                    <input type="hidden" name="id" value="<?= $hasil['id'] ?>">
                                    <div class="form-group">
                                        <label class="control-label" for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $hasil['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?= $hasil['username'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="">Password</label>
                                        <input type="text" name="password" class="form-control" value="<?= $hasil['password'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="">Level</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-select">
                                            <select name="level" class="form-control">
                                                    <option value="">Pilih</option>
                                                    <option value="Admin" <?php echo ($hasil['level'] == "Admin"?'selected':'') ?>>Admin</option>
                                                    <option value="Pengurus" <?php echo ($hasil['level'] == "Pengurus"?'selected':'') ?>>Pengurus</option>
                                                    <option value="Anggota" <?php echo ($hasil['level'] == "Anggota"?'selected':'') ?>>Anggota</option>
                                            </select>
                                         </div>
                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">cancel</button>
                                                    <input type="submit" class="btn btn-success" name="submit" value="simpan">
                                                    </form>
                                            </div>
                                            </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
										<?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script src="<?Php echo $base_url;?>includes/data-table/jquery-1.12.4.min.js"></script>
    <script src="<?Php echo $base_url;?>includes/data-table/bootstrap-table.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/tableExport.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/data-table-active.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/bootstrap-table-editable.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/bootstrap-editable.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/bootstrap-table-resizable.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/colResizable-1.5.source.js"></script>
<script src="<?Php echo $base_url;?>includes/data-table/bootstrap-table-export.js"></script>
<!-- Button to Open the Modal -->

