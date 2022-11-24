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
  <title>Cetak Buku Besar</title>
</head>
<body><center>
 
		<h2>BUKU BESAR</h2>
		<h4>JAYA RENT</h4>
 
	</center>
<
            
<?php
$sql = mysqli_query($conn,"SELECT * FROM akun ");


while ($query = mysqli_fetch_array($sql)) {
?>

                    <table border="1" style="width: 100%">
                        <tr>
                            <th colspan="5"><b>Nama Akun : <?=$query['nama_akun']?></b></th>
                            <th colspan="2">
                                <div align="right"><b>Kode Akun :<?=$query['kode_akun']?> </b></div>
                            </th>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="center" width="12%"><b>Tanggal</b></td>
                            <td rowspan="2" class="center" width="27%"><b>Keterangan</b></td>
                            <td rowspan="2" class="center" width="10%"><b>Ref</b></td>
                            <td rowspan="2" class="center"><b>Debit</b></td>
                            <td rowspan="2" class="center"><b>Kredit</b></td>
                            <td colspan="2" class="center"><b>Saldo</b></td>
                        </tr>
                        <tr align="center">
                            <td class="center" width="12%"><b>Debit</b></td>
                            <td class="center" width="12%"><b>Kredit</b></td>
                        </tr>

                        <?php
                        $kode_akun = $query['kode_akun'];
                        if($tang == 1) {
                            $sal = mysqli_query($conn,"SELECT * FROM ju WHERE kode_akun=$kode_akun and tgl BETWEEN '$awal' and '$akhir'");
                        } else {
                            $sal = mysqli_query($conn,"SELECT * FROM ju WHERE kode_akun=$kode_akun");
                        }
//                        $sal = mysqli_query($conn,"SELECT * FROM ju WHERE kode_akun=$kode_akun");

                        $hitung = mysqli_num_rows($sal);

                        $saldo11 = mysqli_fetch_array($sal);

                        $saldo = 0;
                        $posisi = "";


                        if($saldo11['debit'] == 0){
                            $saldo = $saldo11['kredit'];
                            $posisi = "kanan";
                        }else{
                            $saldo = $saldo11['debit'];
                            $posisi = "kiri";
                        }

                        $hitung2 = 1;
                        if($tang == 1) {
                            $query222 = "SELECT * FROM ju WHERE kode_akun=$kode_akun and tgl BETWEEN '$awal' and '$akhir'";
                        } else {
                            $query222 = "SELECT * FROM ju WHERE kode_akun=$kode_akun";
                        }
//                        $query222 = "SELECT * FROM ju WHERE kode_akun=$kode_akun";
                        $querys	= mysqli_query($conn, $query222);
                        $no =0;
                        while($rows1=mysqli_fetch_array($querys)){ $no++;
                        ?>

                        <tr align="center">
                            <td><?=date('d F Y', strtotime($rows1['tgl']));?></td>
                            <td class="center"><?=$rows1['keterangan']?></td>
                            <td class="center"><?=$rows1['kode_akun']?></td>
                            <td align ="right" class="center">Rp.<?=number_format($rows1['debit'])?></td>
                            <td align ="right" class="center">Rp.<?=number_format($rows1['kredit'])?></td>
                            <?php

                            if($posisi == "kiri"){
                                if($rows1['debit'] == 0){
                                    $saldo = $saldo - $rows1['kredit'];
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
                            <?php
                            $warna = "";
                            if($hitung2 == $hitung)
                                

                            ?>
                            <td align ="right" class="center" 
                                <?php
                                if($hitung2 == $hitung)
                                echo "<b>Rp.".number_format($salD)."</b>";
                                else echo "Rp.".number_format($salD);
                                ?></td>
                            <td align ="right" class="center" <?=$warna?>>
                                <?php
                                if($hitung2 == $hitung)
                                    echo "<b>Rp.".number_format($salK)."</b>";
                                else echo "Rp.".number_format($salK);
                                ?></td>
                        </tr>
                        <?php $hitung2++; } ?>
                
              </table>
              
            
						<?php } ?>

<!--<script src="assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>-->
<!---->
<!--<script>-->
<!--    //Date picker-->
<!--    $('#datepicker').datepicker({-->
<!--        autoclose: true-->
<!--    })-->
<!--</script>-->
<!--<script>-->
<!--    $('#reservation').daterangepicker()-->
<!--</script>-->
<!---->
<!--<!-- date-range-picker -->-->
<!--<script src="--><?//=$url?><!--assets/moment/min/moment.min.js"></script>-->
<!--<script src="--><?//=$url?><!--assets/bootstrap-daterangepicker/daterangepicker.js"></script>-->   
            
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</body>
</html>
