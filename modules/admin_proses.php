<?php
include "../config/koneksi.php";

$status = @$_POST['status'];
$user 	= @$_POST['txtuser'];
$email 	= @$_POST['txtemail'];
$pass	= @$_POST['txtpass'];
$nama	= @$_POST['txtnama'];
$level	= @$_POST['txtlevel'];
	
switch($status) {
	case 'add':
		$tambah	= mysqli_query ($conn,"INSERT INTO user VALUES (null,'$nama','$user','$email','$pass','$level')")or die (mysqli_error());
		if ($tambah=true){
			echo"<script>alert('Tambah Data Berhasil');</script>";
		}else {
			echo"<script>alert('Tambah Data Tidak Berhasil');</script>";
		}
	break;
	
	case 'edit':
		$edit	= "UPDATE user SET nama='$nama', username='$user',email='$email',password='$pass', level='$level'";
		$edit .="WHERE username='$user'";
		$edit	= mysqli_query($conn,$edit) or die (mysqli_error());
		if ($edit=true){
			echo"<script>alert('Update Data Berhasil');</script>";
		}else {
			echo"<script>alert('Update Data Tidak Berhasil');</script>";
		}
	break;
	
	default:
	$id =$_GET['usernames'];
	$tambah	= mysql_query ($conn, "DELETE FROM user WHERE username ='$id'")or die (mysql_error());
		if ($tambah=true){
			echo"<script>alert('Delete Data Berhasil');</script>";
		}else {
			echo"<script>alert('Delete Data Tidak Berhasil');</script>";
		}
	break;
}
?>
<meta http-equiv="refresh" content="0; url=data-user.php">