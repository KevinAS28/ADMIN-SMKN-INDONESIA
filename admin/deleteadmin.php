<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}
if(isset($_GET['id_user'])){
	$id_user = $_GET['id_user'];
	$cek = mysqli_query($mysqli, "SELECT * FROM user WHERE id_user='$id_user'") or die(mysqli_error($mysqli));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($mysqli, "DELETE FROM user WHERE id_user='$id_user'") or die(mysqli_error($mysqli));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="admin.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="admin.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="admin.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="admin.php";</script>';
}

?>
