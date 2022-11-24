<?php
include"koneksi.php";

if(isset($_GET['usernames'])){
$query = mysql_query ("Select * FROM _admin where usernames='$_GET[usernames]'") or die (mysql_error());
$result_edit = mysql_fetch_array($query);
}
?>
<body>
<div class="stambah">
<form action="admin_proses.php" method="POST" enctype="multipart/form-data">
<?php
	if(isset($_GET['usernames'])){
		echo "<input type='hidden' name='status' value='edit'>";
	}else {
		echo "<input type='hidden' name='status' value='add'>";
	}
?>
<h2 align="center" style="border-bottom:2px solid#000;">Edit Data User</h2>
<table align="center">
<tr>
		<td><label>Nama</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtnama" placeholder="nama" value="<?php if(isset($result_edit['nama'])) echo $result_edit['nama'] ?>"></td>
    </tr>
    
	<tr>
		<td><label>Usernames</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtuser" placeholder="username" value="<?php if(isset($result_edit['username'])) echo $result_edit['username'] ?>" required></td>
	</tr>
    
    <tr>
		<td><label>Email</label></td>
		<td>:</td>
		<td><input type="email" class="form-control" name="txtemail" placeholder="email" value="<?php if(isset($result_edit['email'])) echo $result_edit['email'] ?>"required></td>
    </tr>
    
	<tr>
		<td><label>Password</label></td>
		<td>:</td>
		<td><input type="text" class="form-control" name="txtpass" placeholder="password" value="<?php if(isset($result_edit['password'])) echo $result_edit['password'] ?>"required></td>
	</tr>
	
	<tr>
		<td><label>Level</label></td>
		<td>:</td>
		<td ><input type="radio" name="txtlevel" value="admin" checked>Admin 
        <input type="radio" name="txtlevel" value="akuntan" <?php if(@$result_edit['level'] == 'akuntan') echo "checked"; ?>>Akuntan
        <input type="radio" name="txtlevel" value="pemilik" <?php if(@$result_edit['level'] == 'pemilik') echo "checked"; ?>>Pemilik</td>
	</tr>
	
	<tr>
		<td><label>Foto</label></td>
		<td>:</td>
		<td><input type="file" name="foto" ></td>
	<?php
		if(isset($_GET['usernames'])){
				echo"<img src='gambar/$result_edit[foto]' width='100' height='100'/>";
	?>
		<input type="checkbox" name="centang" value="1"><br>Centang Jika Ingin Mengganti Foto
	<?Php }?>
	</tr>
	<tr>
		<td colspan="2"><button class="btn-biru"> Tambah </button></td>
		<td ><button class="btn-merah" onclick="window.location.href='data-user.php'"> kembali </button></td>
	</tr>
	</table>
</form>
</div>
</body>