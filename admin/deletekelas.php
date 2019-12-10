<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}
if(isset($_GET['id_kelas'])){
	$id_kelas = $_GET['id_kelas'];
	$cek = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'") or die(mysqli_error($mysqli));
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($mysqli, "DELETE FROM kelas WHERE id_kelas='$id_kelas'") or die(mysqli_error($mysqli));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="datakelas.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="datakelas.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="datakelas.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="datakelas.php";</script>';
}

?>
