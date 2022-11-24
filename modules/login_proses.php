<?php
	session_start();
	include '../config/koneksi.php';
	
	$user = @$_POST['username'];
	$pass = @$_POST['password'];
	
	$query=mysqli_query($conn,"SELECT * FROM user WHERE username='$user' AND password ='$pass'");
	$jumlahdata =mysqli_num_rows($query);
	
	if ($jumlahdata == 0 ) {
		echo "<script>alert('username dan password tidak sesuai !');
				window.location.href='login.php';</script>";
	} else{
		$data= mysqli_fetch_array($query);
		// cek jika user login sebagai admin
		if($data['level']=="admin"){
	 
			// buat session login dan username
			$_SESSION['username'] = $user;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			header("location:index2.php");
	 
		// cek jika user login sebagai pegawai
		}else if($data['level']=="akuntan"){
			// buat session login dan username
			$_SESSION['username'] = $user;
			$_SESSION['level'] = "akuntan";
			// alihkan ke halaman dashboard pegawai
			header("location:index3.php");
		}
		else if($data['level']=="pemilik"){
			// buat session login dan username
			$_SESSION['username'] = $user;
			$_SESSION['level'] = "pemilik";
			// alihkan ke halaman dashboard pegawai
			header("location:index4.php");
		}
		echo "<script>alert('Login Sukses !');
				</script>";
	}
?>
<meta http-equiv="refresh" content="0,URL=login.php">