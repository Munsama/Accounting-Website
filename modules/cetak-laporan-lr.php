<?php
include "../config/koneksi.php";


if (isset($_POST['cetak'])){
    $awal = $_POST['awal'];
    $akhir = $_POST['akhir'];
    
//    echo $awal."dan"."$akhir";

    if ($awal != null){
        $tang = 1;
        $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T' and ju.tgl BETWEEN '$awal' and '$akhir'");
        $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B' and ju.tgl BETWEEN '$awal' and '$akhir' GROUP BY akun.kode_akun");
        $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B' and ju.tgl BETWEEN '$awal' and '$akhir'");

    }else {
        $tang = 0;
        $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
        $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
        $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");
    }
} else {
    $tang = 0;
    $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
    $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
    $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");

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
              <?php
                            $saldo = 0;
//                            $query = mysqli_query($conn, "SELECT SUM(ju.kredit) as p_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='T'");
                            $pen = mysqli_fetch_array($query);
                            $saldo = $pen['p_total'];
                            ?>

                            <tr>
                                <td colspan="3" align="center"><b>Jaya Rent</b></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><b>Laporan Laba Rugi</b></td>
                            </tr>
                            <tr height="40px">
                                <td colspan="2" align="left"><b>Pendapatan Jasa</b></td>
                                <td colspan="2" width="40%" align="left"><b>Rp.<?=number_format($pen['p_total'])?></b></td>
                            </tr>

                            <tr height="40px">
                                <td colspan="3" align="left"> <b>Beban Usaha :</b></td>
                            </tr>
                            <?php
//                            $query2 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total, akun.nama_akun FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'GROUP BY akun.kode_akun");
                            while ($beban = mysqli_fetch_array($query2)) {
                            ?>
                            <tr>
                                <td><?=$beban['nama_akun']?></td>
                                <td> Rp.<?=number_format($beban['b_total'])?></td>
                                <td></td>
                            </tr>
                            <?php } ?>
                            <tr height="40px">
                                <td colspan="2" align="left"><b>Total Beban Usaha</b></td>
                                <?php
//                                $query3 = mysqli_query($conn, "SELECT SUM(ju.debit) as b_total FROM `ju` JOIN akun USING(kode_akun) WHERE akun.laba_rugi='B'");
                                $total_b = mysqli_fetch_array($query3);
                                $saldo -= $total_b['b_total'];
                                ?>
                                <td align="left"><b>Rp.<?=number_format($total_b['b_total'])?></b></td>
                            </tr>


                            <tfoot>
                            <tr height="40px">
                                <td colspan="2" align="right">
                                    <b>Laba Bersih :</b>
                                </td>
                                <td>
                                    Rp.<?=number_format($saldo)?>
                                </td>
                            </tr>

                            </tfoot>

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
