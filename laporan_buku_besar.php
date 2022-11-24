<?php
if($domain!=='pemilik'){
	?><script language="javascript">document.location.href="logout.php"</script><?php
}
?>
			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li>
								<a href="#">Laporan</a>
							</li>
							<li class="active">Buku Besar</li>
						</ul><!-- /.breadcrumb -->
					</div>	
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Laporan
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Buku Besar
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="row">
									<div class="col-xs-12">
									<?php include "alert.php"; ?>
										<div class="clearfix">
											<div class="pull-right tableTools-container">
												<a target="_blank" href='cetak_buku_besar.php?tglA=<?=$_GET['tglA']?>&tglB=<?=$_GET['tglB']?>'>
													<button class="btn btn-white btn-primary btn-bold">
														<i class="ace-icon fa fa-print bigger-120 blue"></i> Cetak
													</button>
												</a>
											</div>
										</div>
										<div class="table-header">
											Results for "Laporan Buku Besar"
										</div>
										<div class="table-responsive">
											<table class="table table-bordered" width="100%">
												<?php
													$tglA = $_GET['tglA'];
													$tglB = $_GET['tglB'];
													$cek = true;
													$tglcek = true;
													$tglstr = '';
													$header = '';

													$sql = "SELECT * FROM tb_akun ";
													$query	= mysql_query($sql);

													while($rows=mysql_fetch_array($query)){

														?>
															<tr>
																	<th colspan="4"><b>Nama Akun : <?=$rows['nama_akun']?></b></th>
																	<th colspan="3"><div align="right"><b>Kode Akun : <?=$rows['id_akun']?></b></div></th>
																</tr>
																<tr>
																	<td rowspan="2" class="center" width="8%"><b>Tanggal</b></td>
																	<td rowspan="2" class="center" width="26%"><b>Keterangan</b></td>
																	<td rowspan="2" class="right" width="16%"><b>Debit</b></td>
																	<td rowspan="2" class="right" width="16%"><b>Kredit</b></td>
																	<td rowspan="2" class="center"><b>Saldo</b></td>
																</tr>
																<tr>
																	<td class="right" width="16%"><b>Debit</b></td>
																	<td class="right" width="16%"><b>Kredit</b></td>
															</tr>

														<?php
														
														$id_akun = $rows['id_akun'];
														$sal = mysql_query("SELECT * FROM tb_jurnal WHERE id_akun=$id_akun");
														$saldo11 = mysql_fetch_array($sal);

														$saldo = 0;
														$posisi = "";

														if($saldo11['debit'] == 0){
															$saldo = $saldo11['kredit'];
															$posisi = "kanan";
														}else{
															$saldo = $saldo11['debit'];
															$posisi = "kiri";
														}

														$query222 = "SELECT * FROM tb_jurnal WHERE id_akun=$id_akun";
														$querys	= mysql_query($query222);
														$no =0;
														while($rows1=mysql_fetch_array($querys)){ $no++;?>
														
														<tr>
													<td class="center"><?php echo $rows1['tgl']//$tglstr; ?></td>
													<td class="center"><?php echo $rows1['keterangan']; ?></td>
													<td class="right">
														<?php echo "Rp. ".number_format($rows1['debit'],2,',','.').""; ?>
													</td>
													<td class="right">
														<?php echo "Rp. ".number_format($rows1['kredit'],2,',','.').""; ?>
													</td>
													<?php

														
															if($posisi == "kiri"){
																if($rows1['debit'] == 0){
																	$saldo = $rows1['kredit'] - $saldo ; 
																	$salD = $saldo;
																	$salK = 0;
																}else{
																	if($no == 1){
																		$salD=$saldo;
																		$salK=0;
																	} else {
																		$saldo =  $saldo + $rows1['debit']; 
																		$salD = $saldo;
																		$salK = 0;
																	}
																}
															}else {							
																if($rows1['kredit'] == 0){
																	$saldo = $saldo - $rows1['debit'];
																	$salD = 0; 
																	$salK = $saldo;
																}else{
																	if($no == 1){
																		$salD=0;
																		$salK=$saldo;
																	} else {
																		$saldo = $saldo + $rows1['kredit'];
																		$salD = 0; 
																		$salK = $saldo;
																	}																	
																}																
															}		
													?>
													<td class="right">
														<?php echo "Rp. ".number_format($salD,2,',','.').""; ?>
													</td>
													<td class="right">
														<?php echo "Rp. ".number_format($salK,2,',','.').""; ?>
													</td>
												</tr>
															<?php

														}

													}
														// $querys = "SELECT * SUM(tb_jurnal.debit)+SUM(tb_jurnal.kredit) FROM tb_jurnal INNER JOIN tb_akun On tb_jurnal.id_akun=tb_akun.id_akun 
														// 			WHERE tb_jurnal.id_akun='$rows[id_akun]' ORDER BY tb_jurnal.tgl" ;

														

														// $row=mysql_fetch_array($querys);
														// if($header != $rows['id_akun']){
														// 	if($cek){
														// 	 	$cek = true;
														// 	}else{
														// 		$cek =false;
														// 	}
															//else
															  //footer

														// 			$header = $rows['id_akun'];
													?>
											</table>
										</div>
										<div class="clearfix">
											<div class="pull-right tableTools-container">
												<a href="?page=laporan" class="yellow">
													<button class="btn btn-white btn-warning btn-bold">
														<i class="ace-icon fa fa-arrow-left bigger-120 yellow"></i> Kembali
													</button>
												</a>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>
