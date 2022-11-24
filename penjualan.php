<?php
include "../config/koneksi.php";
if(isset($_GET['username'])){
$query = mysqli_query ($conn,"Select * FROM user where username='$_GET[username]'") or die (mysql_error());
$result_edit = mysqli_fetch_array($query);
}
$sql = "SELECT max(no_transaksi) FROM penjualan";
$query = mysqli_query($conn, $sql);

$transaksi = mysqli_fetch_array($query);

if ($transaksi) {
    $nilai = substr($transaksi[0], 1);
    $kode = (int)$nilai;

    //tambahkan sebanyak + 1
    $kode = $kode + 1;
    $auto_kode = "K" . str_pad($kode, 4, "0",  STR_PAD_LEFT);
} else {
    $auto_kode = "K0001";
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
                                            <li><span class="bread-blod">Transaksi / Penjualan</span>
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
                                    <h1><span class="table-project-n">Penjualan</span> </h1>
                                </div>
                                <div class="col-md-10"></div>
                            </div><button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                              <div class="modal-dialog">
                              
                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Tambah Data</h4>
                                  </div>
                                  <div class="modal-body">
										<form action="<?php echo $base_url?>modules/index.php?pages=crud&aksi=tambah-penjualan" method="POST" enctype="multipart/form-data">
											
                                            <div class="form-group">
                                                <label class="control-label" for="">Tanggal</label>
                                                <input type="date" name="tanggal" class="form-control" id=""  required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">No Transaksi</label>
                                                <input type="text" readonly name="no_transaksi" class="form-control" placeholder="auto" id=""  value="<?php echo $auto_kode; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Kode Akun</label>
                                                
                                                <select class="form-control" id="kode_akun" name="kode_akun"  required>
                                                <option  value="">Kode Akun</option>
                                                <?php
                                                $query=mysqli_query($conn,"SELECT*FROM akun ORDER BY id_akun ASC");
                                                
                                                while($hasil=mysqli_fetch_array($query)){
                                                    echo "<option value='$hasil[id_akun]'>$hasil[id_akun]|$hasil[nama_akun]</option>";
                                                   
                                                }
                                                ?>
                                                                                                                
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Pelanggan</label>
                                                <input type="text" name="pelanggan" class="form-control" id="" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Barang</label>
                                                
                                                <select class="form-control" id="barang" name="barang" onchange="changeValue(this.value)" required>
                                                <option  value="">Pilih Barang</option>
                                                <?php
                                                $query=mysqli_query($conn,"SELECT*FROM barang ORDER BY id_barang ASC");
                                                $a="var harga_barang =  new Array();\n;";
                                                while($hasil=mysqli_fetch_array($query)){
                                                    echo "<option value='$hasil[nama_barang]'>$hasil[nama_barang]</option>";
                                                    $a.="harga_barang['".$hasil['nama_barang']."']={harga_barang:'".addslashes($hasil['harga_barang'])."'};\n";
                                                }
                                                ?>
                                                                                                                
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Harga Barang</label>
                                                <input type="text"name="harga_barang" readonly id="harga_barang" class="form-control" onkeyup="oa()" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="">Qty</label>
                                                <input type="number" name="qty" onkeyup="oa()" id="qty" min="1" class="form-control"  required>
                                            </div>
                                            
                                                <label class="control-label" for="">Service</label>
                                            
                                            <select class="form-control"id="service" name="service" onchange="oa()">
                                            <option  value="Ya">Ya</option>
                                            <option  value="Tidak">Tidak</option>
                                                                                                             
                                            </select>
                                            <div class="form-group">
                                                <label class="control-label" for="">Total</label>
                                                <input type="text" id="total_harga" readonly name="total" class="form-control" required>
                                            </div>
                                            <script type='text/javascript'>
                                                    <?php   
                                                        echo $a;
                                                    ?>

                                                    function changeValue(id){  
                                                        document.getElementById('harga_barang').value = harga_barang[id].harga_barang;  
                                                    }
                                                    function oa(){
                                                        var quan=parseInt(document.getElementById('qty').value);
                                                        var harga=parseInt(document.getElementById('harga_barang').value);
                                                        var ser=document.getElementById('service').value;
                                                        if(ser==['Tidak']){
                                                        var total_bayar=quan*harga;
                                                        document.getElementById('total_harga').value=total_bayar;
                                                        }
                                                        else if(ser==['Ya']){
                                                            var total_bayar=(quan*harga);
                                                            document.getElementById('total_harga').value=total_bayar+20000;
                                                        }
                                                       
                                                    }

                                                    
                                            </script>
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
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" >									
                                        <thead>
                                            <tr>
                                            <th data-field="no" data-editable="true">No</th>
                                                <th data-field="tanggal" data-editable="true">Tanggal</th>
                                                <th data-field="no_transaksi" data-editable="true">No Transaksi</th>
                                                <th data-field="pelanggan" data-editable="true">Pelanggan</th>
                                                <th data-field="barang" data-editable="true">Barang</th>
                                                <th data-field="qty" data-editable="true">Qty</th>
                                                <th data-field="service" data-editable="true">Service</th>
                                                <th data-field="total" data-editable="true">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php
											$no = 1;
											$query	= mysqli_query($conn,"SELECT * FROM penjualan");
												while ($hasil = mysqli_fetch_array($query)) 
													
												{ ?>
<tr>
													<td><?php echo $no++; ?></td>
													<td><?php echo $hasil['tanggal'];?></td>
													<td><?php echo $hasil['no_transaksi'];?></td>
                                                    <td><?php echo $hasil['pelanggan'];?></td>
                                                    <td><?php echo $hasil['barang'];?></td>
                                                    <td><?php echo $hasil['qty'];?></td>
                                                    <td><?php echo $hasil['service'];?></td>
                                                    <td><?php echo $hasil['total'];?></td>

													
                                                    
													<!--<a onclick="javascript:document.getElementById('mymodal').src='index.php?pages=data-user&username=" class="xcrud-action btn btn-info btn-sm" title="Edit"  data-toggle="modal" data-target="#myModal">
                                                        <i class="mdi mdi-information"></i> EDIT
                                                    </a> -->
														
														</tr>
													<!--"index1.php?pages=data-user-tambah&status=edit&username=-->
													
                                                    
													<!--<a onclick="javascript:document.getElementById('mymodal').src='index.php?pages=data-user&username=" class="xcrud-action btn btn-info btn-sm" title="Edit"  data-toggle="modal" data-target="#myModal">
                                                        <i class="mdi mdi-information"></i> EDIT
                                                    </a> -->
														
                                                       

                                                
                                                
                                                
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

        