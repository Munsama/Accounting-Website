<?php
$ambil=$_GET['aksi'];
if($ambil=="tambah-user")
{
    $status = @$_POST['status'];
    $user 	= @$_POST['txtuser'];
    $email 	= @$_POST['txtemail'];
    $pass	= @$_POST['txtpass'];
    $nama	= @$_POST['txtnama'];
    $level	= @$_POST['txtlevel'];

    $tambah	= mysqli_query ($conn,"INSERT INTO user VALUES ('$nama','$email','$user','$pass','$level')")or die (mysqli_error());
		if ($tambah=true){
            echo"<script>alert('Tambah Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=data-user"/>';
		}else {
			echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
		}
} 
else if($ambil=="edit-user")
{
    $status = @$_POST['status'];
    $user 	= @$_POST['txtuser'];
    $email 	= @$_POST['txtemail'];
    $pass	= @$_POST['txtpass'];
    $nama	= @$_POST['txtnama'];
    $level	= @$_POST['txtlevel'];

    $edit	= "UPDATE user SET Username='$user',Password='$pass',Email='$email', Nama='$nama',Level='$level'";
		$edit .="WHERE Username='$user'";
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
            echo"<script>alert('Update Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=data-user"/>';

		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
}
else if($ambil=="hapus-user")
{
    $status = @$_POST['status'];
    $user 	= @$_POST['txtuser'];
    $email 	= @$_POST['txtemail'];
    $pass	= @$_POST['txtpass'];
    $nama	= @$_POST['txtnama'];
    $level	= @$_POST['txtlevel'];

    $id =$_GET['username'];
	$tambah = mysqli_query ($conn,"DELETE FROM user WHERE Username ='$id'")or die (mysql_error());
		if ($tambah=true){
            echo"<script>alert('Delete Data Berhasil');</script>";
            echo '<meta http-equiv="Refresh" content="0; url=index.php?pages=data-user"/>';
		}else {
			echo"<script>alert('Delete Data Tidak Berhasil');</script>";
		}
    }

?>

