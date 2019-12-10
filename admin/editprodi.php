<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/w3.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
		<title>Admin | Update Prodi</title>
</head>

<body class="ignielPelangi">
	<div id="header">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">
				<img alt="Logo" src="../img/tutwuri.png" style="width:40px;">
			</a>
			<ul class="nav navbar-nav ">
				<li class="nav-item active">
					<a class="navbar-brand" href="#" style="font-size:20px;">SMK INDONESIA</a>
				</li>
				<li class="nav-item">
					<a href="../admin/index_admin.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Data
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../admin/dataguru.php">Data Guru</a>
						<a class="dropdown-item" href="../admin/datasiswa.php">Data Siswa</a>
						<a class="dropdown-item active" href="../admin/dataprodi.php">Data Prodi</a>
						<a class="dropdown-item" href="../admin/datakelas.php">Data Kelas</a>
						<a class="dropdown-item" href="../admin/datamapel.php">Data Mapel</a>
						<a class="dropdown-item" href="../admin/datanilai.php">Data Nilai</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						User
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../admin/userguru.php">Guru</a>
						<a class="dropdown-item" href="../admin/usersiswa.php">Siswa</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item">
					<a href="../admin/admin.php" class="nav-link">Admin</a>
				</li>
				<li class="nav-item login">
					<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="container"><br>
		<b>Data Prodi&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Update</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<?php
					if(isset($_GET['id_prodi'])){
						$id_prodi = $_GET['id_prodi'];
						$select = mysqli_query($mysqli, "SELECT * FROM prodi WHERE id_prodi='$id_prodi'");
						if(mysqli_num_rows($select) == 0){
							echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
							exit();
						}else{
							$data = mysqli_fetch_assoc($select );
						}
					}
					?>

					<?php
						if(isset($_POST['submit'])){
							$kode_prodi = $_POST ['kode_prodi'];
							$nama_prodi= $_POST ['nama_prodi'];
							$sql = mysqli_query($mysqli, "UPDATE prodi SET kode_prodi='$kode_prodi',nama_prodi='$nama_prodi' WHERE id_prodi='$id_prodi'");
							if($sql){
								echo "<script>alert('Berhasil!'); document.location='dataprodi.php?id_prodi=$id_prodi' </script>";
							}
						}
					?>

					<form action="editprodi.php?id_prodi=<?php echo $id_prodi; ?>" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Kode Prodi</label>
								<input type="text" name="kode_prodi" class="form-control"
									value="<?php echo $data['kode_prodi']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Nama Prodi</label>
								<input type="text" name="nama_prodi" class="form-control"
									value="<?php echo $data['nama_prodi']; ?>">
							</div>
						</div><br>

						<input type="submit" class="btn btn-info" value="Simpan" name="submit">
						<input type="reset" class="btn btn-warning" value="Reset">

					</form>
				</article>
				<aside>
					<a href="dataprodi.php" class="btn btn-dark">Tampil<br> Data Prodi</a>
					<div class="list-group jurusan">
						<a href="#" class="list-group-item list-group-item-action header"
							style="background-color:#1f2e2e; color:white;">Jurusan</a>
						<a href="#" class="list-group-item list-group-item-action">Rekayasa Perangkat Lunak</a>
						<a href="#" class="list-group-item list-group-item-action">Multimedia</a>
						<a href="#" class="list-group-item list-group-item-action">Teknik Komputer Jaringan</a>
						<a href="#" class="list-group-item list-group-item-action">Sistem Jaringan dan Aplikasi</a>
						<a href="#" class="list-group-item list-group-item-action">Teknik Fabrikasi Logam</a>
						<a href="#" class="list-group-item list-group-item-action">Teknik Otomasi Industri</a>
						<a href="#" class="list-group-item list-group-item-action">Teknik Kendaraan Ringan</a>
						<a href="#" class="list-group-item list-group-item-action">Teknik Pemesinan</a>
						<a href="#" class="list-group-item list-group-item-action">Bisnis Kontruksi Properti</a>
						<a href="#" class="list-group-item list-group-item-action">Desain Pemodelan Informasi Bangunan
						</a>
					</div>
				</aside>
			</div>
		</div>
	</div>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>
</body>

</html>