<?php
	session_start();
	include 'koneksi.php';
	$username= $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM user where username='".$username."' and password='".$password."' limit 1";
	$hasil = mysqli_query($mysqli,$sql);
	$jumlah = mysqli_num_rows($hasil);

	if ($jumlah>0) {
		$row = mysqli_fetch_assoc($hasil);
		$_SESSION["id_user"]=$row["id_user"];
		$_SESSION["username"]=$row["username"];
		$_SESSION["level"]=$row["level"];
		$_SESSION["status"] = "login";
		
		if ($_SESSION["level"]=$row["level"]=="admin"){
            header("Location:admin/index_admin.php");
        } else if ($_SESSION["level"]=$row["level"]=="guru"){
			header("Location:guru/index_guru.php");
		}else if ($_SESSION["level"]=$row["level"]=="siswa"){
            header("Location:siswa/index_siswa.php");
        }

		
	}else {
		header("location:login.php?pesan=gagal");
	}
?>