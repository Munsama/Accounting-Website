<?php
include "../config/koneksi.php";

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
  <title>CETAK LAPORAN PERUBAHAN MODAL</title>
</head>
<body>
<center>
 
		<h2> PERUBAHAN MODAL</h2>
		<h4>JAYA RENT</h4>
 
	</center>

        <table border="1" style="width: 100%">
              <?php
											
												?>
												<tr>
													<th class="left">Modal Jaya Rent</th>
													<th class="right">
														<?php
														if($tang==1){
														$modal = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) as a_nominal FROM pendapatan WHERE tanggal_pendapatan BETWEEN '$awal' and '$akhir' AND kode_akun ='31'"));
														}
														else{
															$modal = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) as a_nominal FROM pendapatan WHERE kode_akun = '31'"));
															}	
														echo "Rp. ".number_format($modal['a_nominal'],2,',','.')."";
														?>
													</th>
												</tr>
												<tr>						
													<td class="left">
														Laba Bersih
													</td>
													<td class="right">
													<?php
													if($tang==1){
														$labaK = mysqli_query($conn,"
																SELECT SUM(ju.kredit) AS labaK,
																ju.tgl
																FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
																WHERE ju.tgl BETWEEN '$awal' and '$akhir'  AND akun.laba_rugi ='T'");
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
															");}
															else{
																$labaD = mysqli_query($conn,"
																		SELECT SUM(ju.debit) AS labaD,
																		ju.tgl
																		FROM ju INNER JOIN akun ON ju.kode_akun=akun.kode_akun 
																		WHERE akun.laba_rugi ='B'
																	");}
														$lbD = mysqli_fetch_array($labaD);

														$total_laba = $lbK['labaK']-$lbD['labaD'];
		
														// $total_debit  = $lb['jml_debit'];
														// $total_kredit = $lb['jml_kredit'];
														// $total_laba   = $total_debit+$total_kredit;

														echo "Rp. ".number_format($total_laba,2,',','.')."";
													?>
													</td>
												</tr>
												<tr>						
													<td class="left">
														Prive Jaya Rent
													</td>
													<td class="right">
														<?php
														if($tang==1){
														$prive = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) AS total_prive FROM prive WHERE tanggal_prive BETWEEN '$awal' and '$akhir'"));
														}
														if($tang==0){
															$prive = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(nominal) AS total_prive FROM prive "));
															}
														echo "- Rp. ".number_format($prive['total_prive'],2,',','.')."";
														?>
													</td>
												</tr>
												<?php 
													$total = ($modal['a_nominal']+$total_laba)-$prive['total_prive'];
													// }
												?>
												<tr>						
													<td colspan="2">&nbsp;</td>
												</tr>
												<tr>						
													<th class="left">
														Perubahan Modal Jaya Rent 
													</th>
													<th class="right">
														<?php echo "Rp. ".number_format($total,2,',','.').""; ?>
													</th>
												</tr>

              </table>
            </div>
            
            
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
		window.print();
	</script>
</body>
</html>
