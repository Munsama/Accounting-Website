<?php
include "../config/koneksi.php";

$ambil=$_GET['aksi'];
if($ambil=="tambah-user")
{
    
    $user 	= @$_POST['adduser'];
    $email 	= @$_POST['addemail'];
    $pass	= @$_POST['addpass'];
    $nama	= @$_POST['addnama'];
    $level	= @$_POST['addlevel'];

    $result	= mysqli_query ($conn,"INSERT INTO user VALUES ('$nama','$user','$email','$pass','$level')")or die (mysqli_error());
		if ($result=true){
            echo"<script>alert('Tambah Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=data-user.php"/>';
		}else {
			echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
		}
} 
else if($ambil=="edit-user")
{
    $user 	= @$_POST['edituser'];
    $email 	= @$_POST['editemail'];
    $pass	= @$_POST['editpass'];
    $nama	= @$_POST['editnama'];
    $level	= @$_POST['editlevel'];

    $edit	= "UPDATE user SET nama='$nama', username='$user', email='$email', password='$pass', level='$level'";
		$edit .="WHERE username='$user'";
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
            echo"<script>alert('Update Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=data-user.php"/>';

		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
}
else if($ambil=="hapus-user")
{
    $user 	= @$_POST['viewuser'];
    $email 	= @$_POST['viewemail'];
    $pass	= @$_POST['viewpass'];
    $nama	= @$_POST['viewnama'];
    $level	= @$_POST['viewlevel'];

    $id =$_GET['Username'];
	$tambah	= mysqli_query ($conn,"DELETE FROM user WHERE username ='$id'")or die (mysql_error());
		if ($tambah=true){
            echo"<script>alert('Delete Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=data-user.php"/>';
		}else {
			echo"<script>alert('Delete Data Tidak Berhasil');</script>";
		}
    }

?>

<?php
include "../config/koneksi.php";

$ambil=$_GET['aksi'];
if($ambil=="tambah-akun")
{
    
    $kode 	= @$_POST['addkode'];
    $akun	= @$_POST['addakun'];
    $bagan	= @$_POST['addbagan'];
    $posisi	= @$_POST['addposisi'];
    $lr	= @$_POST['addlr'];
    $pm	= @$_POST['addpm'];
    $grup	= @$_POST['addgrup'];

    $result	= mysqli_query ($conn,"INSERT INTO akun VALUES ('$kode','$akun','$bagan', '$posisi', '$lr', '$pm', '$grup')")or die (mysqli_error());
		if ($result=true){
            echo"<script>alert('Tambah Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=data-akun.php"/>';
		}else {
			echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
		}
} 
else if($ambil=="edit-akun")
{
    $kode 	= @$_POST['editkode'];
    $akun	= @$_POST['editakun'];
    $bagan	= @$_POST['editbagan'];
    $posisi	= @$_POST['editposisi'];
    $lr	= @$_POST['editlr'];
    $pm	= @$_POST['editpm'];
    $grup	= @$_POST['editgrup'];

    $edit	= "UPDATE akun SET kode_akun='$kode', nama_akun='$akun', bagan='$bagan', posisi='$posisi', laba_rugi='$lr', pm='$pm', grup='$grup' ";
		$edit .="WHERE kode_akun='$kode'";
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
            echo"<script>alert('Update Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=data-akun.php"/>';

		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
}
else if($ambil=="hapus-akun")

{

    $id =$_GET['Kode_akun'];
	$tambah	= mysqli_query ($conn,"DELETE FROM akun WHERE kode_akun  ='$id'")or die (mysql_error());
		if ($tambah=true){
            echo"<script>alert('Delete Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=data-akun.php"/>';
		}else {
			echo"<script>alert('Delete Data Tidak Berhasil');</script>";
		}
    }


        //PENDAPATAN
        $ambil=$_GET['aksi'];
        if($ambil=="tambah-pendapatan")
    {
        $no	      = @$_POST['no_bkt'];
        $ket	= @$_POST['addket'];
        $akun	= @$_POST['addakun'];
        $tgl	= @$_POST['addtgl'];
        $jml	= @$_POST['addjml'];
        
        $result	= mysqli_query ($conn, "INSERT INTO pendapatan VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
        $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null , '$tgl', '$no', '$ket','11', '$jml','0')")or die (mysqli_error());
        $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null , '$tgl','$no' ,'$ket','$akun', '0','$jml')")or die (mysqli_error());
        
              
        if ($result=true AND $result1=true AND $result2=true){
                echo"<script>alert('Tambah Data Berhasil');</script>";
                echo '<meta http-equiv="Refresh" content="0; url=pendapatan.php"/>';
                }else {
                      echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
                }
    } 
   
        //PEMBELIAN
        $ambil=$_GET['aksi'];
        if($ambil=="tambah-pembelian")
        {
        $no	      = @$_POST['no_bkt'];
        $ket	= @$_POST['addket'];
        $akun	= @$_POST['addakun'];
        $tgl	= @$_POST['addtgl'];
        $jml	= @$_POST['addjml'];
        
        $result	= mysqli_query ($conn, "INSERT INTO pembelian VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
        $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl', '$no', '$ket','$akun', '$jml','0')")or die (mysqli_error());
        $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl','$no' ,'$ket','11', '0','$jml')")or die (mysqli_error());
            
        if ($result = true AND $result1 =true) {
                    echo"<script>alert('Tambah Data Berhasil');</script>";
                    echo '<meta http-equiv="Refresh" content="0; url=pembelian.php"/>';
                    }else {
                          echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
                    }
        } 

        //HUTANG
        $ambil=$_GET['aksi'];
        if($ambil=="tambah-hutang")
        {
        $no	      = @$_POST['no_bkt'];
        $ket	= @$_POST['addket'];
        $akun	= @$_POST['addakun'];
        $tgl	= @$_POST['addtgl'];
        $jml	= @$_POST['addjml'];
        $jns      = @$_POST['jenis'];
        
      if ($jns=="ditambah"){
            $result	= mysqli_query ($conn, "INSERT INTO hutang VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
            $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl', '$no', '$ket','$akun', '$jml','0')")or die (mysqli_error());
            $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl','$no' ,'$ket','21', '0','$jml')")or die (mysqli_error());
      } else if ($jns=="dibayar"){
            $result	= mysqli_query ($conn, "INSERT INTO hutang VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
            $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl', '$no', '$ket','21', '$jml','0')")or die (mysqli_error());
            $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl','$no' ,'$ket','$akun', '0','$jml')")or die (mysqli_error());
      }
                    if ($result=true AND $result1=true AND $result2=true){
                    echo"<script>alert('Tambah Data Berhasil');</script>";
                    echo '<meta http-equiv="Refresh" content="0; url=hutang.php"/>';
                    }else {
                          echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
                    }
        } 
    
//PIUTANG
            $ambil=$_GET['aksi'];
    if($ambil=="tambah-piutang")
    {
      $no	= @$_POST['no_bkt'];
      $ket	= @$_POST['addket'];
      $akun	= @$_POST['addakun'];
      $tgl	= @$_POST['addtgl'];
      $jml	= @$_POST['addjml'];
      $jns  = @$_POST['jenis'];

      if ($jns=="ditambah"){
            $result	= mysqli_query ($conn, "INSERT INTO piutang VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
            $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl', '$no', '$ket','14', '$jml','0')")or die (mysqli_error());
            $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl','$no' ,'$ket','$akun', '0','$jml')")or die (mysqli_error());
      } else if ($jns=="dibayar"){
            $result	= mysqli_query ($conn, "INSERT INTO piutang VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
            $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl', '$no', '$ket','$akun', '$jml','0')")or die (mysqli_error());
            $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl','$no' ,'$ket','14', '0','$jml')")or die (mysqli_error());
      }
      

        if ($result=true AND $result1=true AND $result2=true){
                echo"<script>alert('Tambah Data Berhasil');</script>";
                echo '<meta http-equiv="Refresh" content="0; url=piutang.php"/>';
                }else {
                      echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
                }
    } 

//BEBAN
        $ambil=$_GET['aksi'];
    if($ambil=="tambah-beban")
    {
      $no	= @$_POST['no_bkt'];
      $ket	= @$_POST['addket'];
      $akun	= @$_POST['addakun'];
      $tgl	= @$_POST['addtgl'];
      $jml	= @$_POST['addjml'];
      
      $result	= mysqli_query ($conn, "INSERT INTO beban VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
      $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl', '$no', '$ket','$akun', '$jml','0')")or die (mysqli_error());
      $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null, '$tgl','$no' ,'$ket','11', '0','$jml')")or die (mysqli_error());

                if ($result=true AND $result1=true AND $result2=true){
                echo"<script>alert('Tambah Data Berhasil');</script>";
                echo '<meta http-equiv="Refresh" content="0; url=beban.php"/>';
                }else {
                      echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
                }
    } 

    $ambil=$_GET['aksi'];
    if($ambil=="tambah-prive")
{
    $no	      = @$_POST['no_bkt'];
    $ket	= @$_POST['addket'];
    $akun	= @$_POST['addakun'];
    $tgl	= @$_POST['addtgl'];
    $jml	= @$_POST['addjml'];
    
    $result	= mysqli_query ($conn, "INSERT INTO prive VALUES ( null, '$no', '$ket', '$akun', '$tgl', '$jml')")or die (mysqli_error());
    $result1  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null , '$tgl', '$no', '$ket','$akun', '$jml','0')")or die (mysqli_error());
    $result2  = mysqli_query ($conn, "INSERT INTO ju VALUES ( null , '$tgl','$no' ,'$ket','11', '0','$jml')")or die (mysqli_error());
    
          
    if ($result=true AND $result1=true AND $result2=true){
            echo"<script>alert('Tambah Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=prive.php"/>';
            }else {
                  echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
            }
} 
?>