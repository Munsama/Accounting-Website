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
<title>CETAK NERACA SALDO</title>
</head>
<body>
<center>
 
		<h2>NERACA SALDO</h2>
		<h4>JAYA RENT</h4>
 
	</center>
    <table border="1" style="width: 100%">
              <tr>
                            <td colspan="4" align="center"><b>Tabel</b>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><b>Jaya Rent</b>
                        </tr>
                        <tr>
                            <td colspan="4" align="center"><b>Neraca Saldo</b>
                        </tr>

                        <tr align="center">
                            <th rowspan="2" align="center" class="center" width="10%"><center>Nomor Akun</center></th>
                            <th rowspan="2" align="center" class="center" width="35%"><center>Nama Akun</center></th>
                            <th colspan="2" align="center" class="center" width="30%"><center>Saldo</center></th>
                        </tr>
                        <tr align="center">
                            <th><center>Debit</center></th>
                            <th><center>Kredit</center></th>
                        </tr>
                        <?php
                        $saldo_debet = 0;
                        $saldo_kredit = 0;
                        $sql = mysqli_query($conn,"SELECT * FROM akun ORDER BY kode_akun");


                        while ($query = mysqli_fetch_array($sql)) {
                            $kode_akun = $query['kode_akun'];

                        ?>
                        <tr>
                            <td class="center"><?=$query['kode_akun']?></td>
                            <td class="center"><?=$query['nama_akun']?></td>
                            <?php
                            if($tang == 1) {
                                $sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun' and tgl BETWEEN '$awal' and '$akhir'");
                                $sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun and tgl BETWEEN '$awal' and '$akhir'");
                            } else {
                                $sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
                                $sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
                            }
                            //$sal = mysqli_query($conn,"SELECT SUM(debit) as debit FROM ju WHERE kode_akun='$kode_akun'");
                            $debit = mysqli_fetch_array($sal);

                            //$sal2 = mysqli_query($conn,"SELECT SUM(kredit) as kredit FROM ju WHERE kode_akun=$kode_akun");
                            $kredit = mysqli_fetch_array($sal2);

                            if($query['grup'] == "debit") {
                                $salD = $debit['debit'] - $kredit['kredit'];
                                $saldo_debet += $salD;
                                $salK = 0;
                            }
                            else {
                                $salD = 0;
                                $salK = $kredit['kredit'];
                                $saldo_kredit += $salK;
                            }
                            ?>
                            <td>Rp.<?=number_format($salD)?></td>
                            <td>Rp.<?=number_format($salK)?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" align="right"><b>Total :</b></td>
                            <td><b>Rp.<?=number_format($saldo_debet)?></b></td>
                            <td><b>Rp.<?=number_format($saldo_kredit)?></b></td>
                        </tr>

              </table>
            </div>
            
            
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 
<script>
		window.print();
	</script>

</body>
</html>

