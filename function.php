<?php

session_start();

//bikin koneksi
$c = mysqli_connect('localhost', 'root', '', 'kasir');

//Login
if(isset($_POST['login'])){
	//initiate variable
	$username = $_POST['username'];
	$password = $_POST['password'];

	$check = mysqli_query($c, "SELECT * FROM pegawai WHERE username='$username' and password='$password'");
	$hitung = mysqli_num_rows($check);

	if($hitung>0){
		//jika datanay ditemukan
		//berhasil login
		$_SESSION['login'] = 'true';
		header('location:index.php');
	} else {
		//data tidak ditemukan
		//gagal login
		echo '
		<script>alert("Username atau Password salah");
		window.location.href="login.php"
		</script>
		';
	}
}


?>