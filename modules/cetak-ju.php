<?php
include "../config/koneksi.php";

if (isset($_POST['cetak'])){
  $awal= $_POST['awal'];
  $akhir = $_POST['akhir'];

//    echo $awal."dan"."$akhir";

  if ($awal != null){
      $tang = 1;
      $total = mysqli_fetch_array(mysqli_query($conn,"select SUM(debit) as debit from ju WHERE tgl BETWEEN '$awal' and '$akhir'"));
      $total2 = mysqli_fetch_array(mysqli_query($conn,"select SUM(kredit) as kredit from ju WHERE tgl BETWEEN '$awal' and '$akhir'"));
  }else {
      $tang = 0;
      $total = mysqli_fetch_array(mysqli_query($conn,"select SUM(debit) as debit from ju"));
      $total2 = mysqli_fetch_array(mysqli_query($conn,"select SUM(kredit) as kredit from ju"));
  }
} else {
  $tang = 0;
  $total = mysqli_fetch_array(mysqli_query($conn,"select SUM(debit) as debit from ju"));
  $total2 = mysqli_fetch_array(mysqli_query($conn,"select SUM(kredit) as kredit from ju"));
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>CETAK JURNAL UMUM</title>
</head>
<body>
<center>
 
		<h2>JURNAL UMUM</h2>
		<h4>JAYA RENT</h4>
 
	</center>

        <table border="1" style="width: 100%">
		<tr>
			<th data-field="tgl" data-editable="true">Tanggal</th>
            <th data-field="no_bukti" data-editable="true">No Bukti</th>
            <th data-field="nama_akun" data-editable="true">Keterangan</th>
            <th data-field="kode_akun" data-editable="true">Ref</th>
            <th data-field="debit" data-editable="true">Debit</th>
            <th data-field="kredit" data-editable="true">Kredit</th>
		</tr>
<tbody>
<?php
$no = 1;
$query = mysqli_query($conn,"select DISTINCT(no_bukti),keterangan from ju ORDER BY tgl ASC");
while ($tampil = mysqli_fetch_array($query)) {
    $id = $tampil['no_bukti'];
    

    if($tang == 1) {
        $query2 = mysqli_query($conn,"select * from ju JOIN akun USING (kode_akun) WHERE no_bukti='$id' and tgl BETWEEN '$awal' and '$akhir' ORDER BY tgl, kredit ASC");
    } else {
        $query2 = mysqli_query($conn,"select * from ju JOIN akun USING (kode_akun) WHERE no_bukti='$id' ORDER BY ju.tgl , kredit ASC");
    }

    $op = 0;

    while ($tampil2 = mysqli_fetch_array($query2)) {
        $op++;
        $ama = $tampil2['keterangan'];
?>
<tr>
    
    <td align="center"><?=date('d F Y', strtotime($tampil2['tgl']));?></td>
    <td class="center"><?=$tampil2['no_bukti']?></td>
    <td class="left"><?=$tampil2['nama_akun']?></td>
    <td align="center"><?=$tampil2['kode_akun']?></td>
    <td>Rp.<?=number_format($tampil2['debit'])?></td>
    <td>Rp.<?=number_format($tampil2['kredit'])?></td>
</tr>

<?php }?>
    <?php
    if($op == 0){

    } else {
        ?>
        <tr>
            <td colspan="2"></td>
            <td align="center"><i><?= $ama ?></i></td>
            <td colspan="3"></td>
        </tr>
        <?php
    }
        ?>
<!--                                <tr  height="10px">-->
<!--                                    <td bgcolor="#b0c4de" colspan="7"></td>-->
<!--                                </tr>-->
    
<?php }?>
</tbody>
                    <tfoot>

                            <tr>
                                <td colspan="4" class="center" height="60px">
                                    <b>
                                        <div align="right">Total : </div>
                                    </b>
                                </td>
                                <?php
//                                $total = mysqli_fetch_array(mysqli_query($conn,"select SUM(debet) as debet from ju"));
//                                $total2 = mysqli_fetch_array(mysqli_query($conn,"select SUM(kredit) as kredit from ju"));
                                ?>
                                <td align="left"><b>Rp.<?=number_format($total['debit'])?>
                                    </b></td>
                                <td align="left"><b>Rp.<?=number_format($total2['kredit'])?>
                                    </b></td>
                            </tr>

                            </tfoot>
                                                                 
                                    
                </tbody>
              </table>
            
              <script>
		window.print();
	</script>
  
</body>
</html>
