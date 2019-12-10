<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}
if(isset($_GET['id_guru'])){
	$id_guru = $_GET['id_guru'];
	$cek = mysqli_query($mysqli, "SELECT * FROM guru WHERE id_guru='$id_guru'") or die(mysqli_error($mysqli));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($mysqli, "DELETE FROM guru WHERE id_guru='$id_guru'") or die(mysqli_error($mysqli));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="dataguru.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="dataguru.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="dataguru.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="dataguru.php";</script>';
}

?>