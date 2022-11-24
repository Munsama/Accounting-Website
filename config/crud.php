<!-- Data User  -->
<?php
$ambil=$_GET['aksi'];
if($ambil=="tambah-user")
{
        $name = $_POST['add_nama'];
        $username = $_POST['add_username'];
        $password = $_POST['add_password'];
        $akses = $_POST['add_level'];

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO user VALUES('','$name','$username' ,'$password','$akses')");
        // echo "INSERT INTO user VALUES(null,'$name','$username' ,'$password','$akses')";
        if ($result=true){
            echo"<script>alert(Data berhasil dimasukkan');</script>";
           echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=datauser"/>';
		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
} 
else if($ambil=="edit-user")
{       
        $user = $_POST['id'];
        $name = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $akses = $_POST['level'];

        $edit	= "UPDATE user SET id='$user',nama ='$name',username = '$username', password='$password',level='$akses'";
        $edit .="WHERE id='$user'";
        // echo $edit;
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
            echo"<script>alert('Update Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=datauser"/>';

		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
}
else if($ambil=="hapus-user")
{
    $id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM user WHERE id='$id'");
if ($result=true){
            echo"<script>alert('hapus Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=datauser"/>';

		}else {
			echo"<script>alert('hapus Data Tidak Berhasil');</script>";
		}
}
?>

<!-- Data Akun -->
<?php
$ambil=$_GET['aksi'];
if($ambil=="tambah-akun")
{
        
        $namaakun = $_POST['add_namaakun'];
        $nomorakun = $_POST['add_nomorakun'];

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO dataakun VALUES('','$namaakun','$nomorakun')");
        // echo "INSERT INTO dataakun VALUES(null,'$namaakun','$nomorakun')";
        if ($result=true){
            echo"<script>alert(Data berhasil dimasukkan');</script>";
           echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=dataakun"/>';
		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
} 
else if($ambil=="edit-akun")
{       
        $user = $_POST['id'];
        $namaakun = $_POST['namaakun'];
        $nomorakun = $_POST['nomorakun'];

        $edit	= "UPDATE dataakun SET id='$user',namaakun ='$namaakun',nomorakun = '$nomorakun'";
        $edit .="WHERE id='$user'";
        // echo $edit;
		$edit= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
            echo"<script>alert('Update Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=dataakun"/>';

		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
}
else if($ambil=="hapus-akun")
{
    $id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM dataakun WHERE id='$id'");
if ($result=true){
            echo"<script>alert('hapus Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=dataakun"/>';

		}else {
			echo"<script>alert('hapus Data Tidak Berhasil');</script>";
		}
}
?>


<!-- Data Karyawan---------------------------------------------------------- -->
<?php
$ambil=$_GET['aksi'];
if($ambil=="tambah-karyawan")
{
        
        $nama = $_POST['add_nama'];
        $jeniskelamin = $_POST['add_jk'];
        $alamat = $_POST['add_alamat'];
        $jabatan = $_POST['add_jabatan'];
        $tempatlahir = $_POST['add_tempat'];
        $tanggallahir = $_POST['add_tanggal'];

        // Insert user data into table
        $result = mysqli_query($conn, "INSERT INTO datakaryawan VALUES('','$nama','$jeniskelamin','$alamat','$jabatan','$tempatlahir','$tanggallahir')");
        // echo "INSERT INTO dataakun VALUES(null,'$nama','$jeniskelamin','$alamat','$jabatan','$tempatlahir','$tanggallahir')";
        if ($result=true){
            echo"<script>alert(Data berhasil dimasukkan');</script>";
           echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=datakaryawan"/>';
		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
} 
else if($ambil=="edit-karyawan")
{       
        $user = $_POST['id'];
        $nama = $_POST['nama'];
        $jeniskelamin = $_POST['jk'];
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];
        $tempatlahir = $_POST['tempat'];
        $tanggallahir = $_POST['tanggal'];

        $edit	= "UPDATE datakaryawan SET id='$user', nama ='$nama',jk = '$jeniskelamin', alamat ='$alamat', jabatan ='$jabatan', tempat='$tempatlahir', tanggal ='$tanggallahir'";
        $edit .="WHERE id='$user'";
        echo $edit;
		$edit= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
            echo"<script>alert('Update Data Berhasil');</script>";
            // echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=datakaryawan"/>';

		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
}
else if($ambil=="hapus-karyawan")
{
    $id = $_GET['id'];

// Delete user row from table based on given id
$result = mysqli_query($conn, "DELETE FROM datakaryawan WHERE id='$id'");
if ($result=true){
            echo"<script>alert('hapus Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=datakaryawan"/>';

		}else {
			echo"<script>alert('hapus Data Tidak Berhasil');</script>";
		}
}
?>