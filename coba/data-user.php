  <?php
include "../config/koneksi.php";
if(isset($_GET['username'])){
$query = mysqli_query ($conn,"Select * FROM user where username='$_GET[username]'") or die (mysql_error());
$result_edit = mysqli_fetch_array($query);
}
?>
  <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Dashboard</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Data User</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Static Table Start -->
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1><span class="table-project-n">Data</span> User</h1>
                                </div>
                                <div class="col-md-10"></div>
                            </div><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal">Tambah User</button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Data User</h4>
                                  </div>
                                  <div class="modal-body">
										<form action="<?php echo $base_url?>modules/index.php?pages=crud&aksi=tambah-user" method="POST" enctype="multipart/form-data">
											
                                            <div class="form-group">
                                                <label class="control-label" for="">Nama</label>
                                                <input type="text" name="txtnama" class="form-control" id=""  required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Email</label>
                                                <input type="email" name="txtemail" class="form-control" id="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Username</label>
                                                <input type="text" name="txtuser" class="form-control"  id="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Password</label>
                                                <input type="password" name="txtpass" class="form-control" id="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Hak Akses</label>
                                            </div>
                                            <select class="form-control" name="txtlevel">
                                            <option  value="1">Super Admin</option>
                                            <option  value="2">Admin</option>
                                            <option  value="3">Pemilik</option>                                                                   
                                            </select>
                                            <div class="form-group">                                         
                                            <div class="modal-footer">
                                             <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                                                </div>
                                            </div>
                                            </form>
                                            
                                  </div>
                                </div>
                            </div>
                        </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">									
                                        <thead>
                                            <tr>
                                                <th data-field="no" data-editable="true">No</th>
                                                <th data-field="Nama" data-editable="true">Nama</th>
                                                <th data-field="Username" data-editable="true">Username</th>
                                                <th data-field="email" data-editable="true">Email</th>
                                                <th data-field="level" data-editable="true">Level</th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 1;
											$query	= mysqli_query($conn,"SELECT * FROM user");
												while ($hasil = mysqli_fetch_array($query)) 
													
												{ ?>
													<!--"index1.php?pages=data-user-tambah&status=edit&username=-->
													<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $hasil['Nama'];?></td>
													<td><?php echo $hasil['Username'];?></td>
													<td><?php echo $hasil['Email'];?></td>
													<td><?php echo $hasil['level'];?></td>
                                                    <td><button  class="btn btn-success btn-xs" data-toggle="modal" data-target="#mymodal<?php echo $hasil['Username'];?>"><i class="fa fa-eye"></i></button>
													<button  class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $hasil['Username'];?>"><i class="fa fa-pencil"></i></button>
													
													<!--<a onclick="javascript:document.getElementById('mymodal').src='index.php?pages=data-user&username=" class="xcrud-action btn btn-info btn-sm" title="Edit"  data-toggle="modal" data-target="#myModal">
                                                        <i class="mdi mdi-information"></i> EDIT
                                                    </a> -->
														
														<a href='#' style='color:#fff;'onclick="if(confirm('Apakah yakin menghapus data ?')){window.location.href='<?php echo $base_url?>modules/index.php?pages=crud&aksi=hapus-user&username=<?php echo $hasil['Username'];?>'}"> <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
														</td>
														</tr>

                                                <div class="modal fade" id="myModal<?php echo $hasil['Username'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Update Data User</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo $base_url?>modules/index.php?pages=crud&aksi=edit-user" method="POST" enctype="multipart/form-data">
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Nama</label>
                                                                    <input type="text" name="txtnama" class="form-control" value="<?php echo $hasil['Nama'];?>"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Email</label>
                                                                    <input type="text" name="txtemail" class="form-control" value="<?php echo $hasil['Email'];?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Username</label>
                                                                    <input type="text" readonly="" name="txtuser" class="form-control"  value="<?php echo $hasil['Username'];?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Password</label>
                                                                    <input type="text" name="txtpass" class="form-control" value="<?php echo $hasil['Password'];?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Hak Akses</label>
                                                                </div>
                                                                <select class="form-control" name="txtlevel">
                                                                    <option <?php if($hasil['level'] == '1') echo "selected"; ?> value="1">Super Admin</option>
                                                                    <option <?php if($hasil['level'] == '2') echo "selected"; ?> value="2">Admin</option>
                                                                    <option <?php if($hasil['level'] == '3') echo "selected"; ?> value="3">Pemilik</option>                                                                    
                                                                </select>
                                                                <div class="form-group">                                                                
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-success" name="tambah">Simpan</button>
                                                                    </div>
                                                                </div>
                                                                </form>
                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="mymodal<?php echo $hasil['Username'];?>" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Lihat Data User</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data">
                                                                
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Nama</label>
                                                                    <input type="text" readonly="" name="txtnama" class="form-control" value="<?php echo $hasil['Nama'];?>"  required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Email</label>
                                                                    <input type="text" readonly="" name="txtemail" class="form-control" value="<?php echo $hasil['Email'];?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Username</label>
                                                                    <input type="text" readonly="" name="txtuser" class="form-control"  value="<?php echo $hasil['Username'];?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Password</label>
                                                                    <input type="text" readonly="" name="txtpass" class="form-control" value="<?php echo $hasil['Password'];?>" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label" for="">Hak Akses</label>
                                                                </div>
                                                                <select class="form-control" readonly=""  name="txtlevel">
                                                                    <option <?php if($hasil['level'] == '1') echo "selected"; ?> value="1">Super Admin</option>
                                                                    <option <?php if($hasil['level'] == '2') echo "selected"; ?> value="2">Admin</option>
                                                                    <option <?php if($hasil['level'] == '3') echo "selected"; ?> value="3">Pemilik</option>                                                                    
                                                                </select>
                                                                </form>
                                                                
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
        