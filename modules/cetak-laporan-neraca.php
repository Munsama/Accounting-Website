<?php
include "../config/koneksi.php";
if(isset($_GET['username'])){
$query = mysqli_query ($conn,"Select * FROM user where username='$_GET[username]'") or die (mysql_error());
$result_edit = mysqli_fetch_array($query);
}
if (isset($_POST['cetak'])){
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
	<title>CETAK LAPORAN NERACA</title>
</head>
<body>
 
	<center>
 
		<h2>LAPORAN NERACA</h2>
		<h4>JAYA RENT</h4>
 
	</center>
    <table border="1" style="width: 100%">
 <tbody>
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
																WHERE ju.tgl BETWEEN '$awal' and '$akhir' AND akun.laba_rugi ='T'
															");
															}
															else{
																$labaK = mysqli_query($conn,"
																SELECT SUM(ju.kredit) AS labaK,
																ju.tgl
																FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
																WHERE akun.laba_rugi ='T'
															");
															}
													$lbK = mysqli_fetch_array($labaK);
													if($tang==1){

													$labaD = mysqli_query($conn,"
															SELECT SUM(ju.debit) AS labaD,
															ju.tgl
															FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
															WHERE ju.tgl BETWEEN '$awal' and '$akhir' AND akun.laba_rugi ='B'
														");
														}
														else{
															$labaD = mysqli_query($conn,"
															SELECT SUM(ju.debit) AS labaD,
															ju.tgl
															FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
															WHERE akun.laba_rugi ='B'
														");
														}
													$lbD = mysqli_fetch_array($labaD);

													$total_laba = $lbK['labaK']-$lbD['labaD'];
													if($tang==1)
													{
														$prive = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) AS total_prive FROM prive WHERE tanggal_prive BETWEEN '$awal' and '$akhir' "));
													}
													else{
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
        <script>
		window.print();
	</script>
 
</body>
    <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/morrisjs/raphael-min.js"></script>
    <script src="js/morrisjs/morris.js"></script>
    <script src="js/morrisjs/morris-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</html>