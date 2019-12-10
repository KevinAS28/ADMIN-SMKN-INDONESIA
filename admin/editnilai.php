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
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/w3.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
		<title>Admin | Update Nilai</title>
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
						<a class="dropdown-item " href="../admin/dataguru.php">Data Guru</a>
						<a class="dropdown-item" href="../admin/datasiswa.php">Data Siswa</a>
						<a class="dropdown-item" href="../admin/dataprodi.php">Data Prodi</a>
						<a class="dropdown-item" href="../admin/datakelas.php">Data Kelas</a>
						<a class="dropdown-item" href="../admin/datamapel.php">Data Mapel</a>
						<a class="dropdown-item active" href="../admin/datanilai.php">Data Nilai</a>
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
		<b>Data Siswa&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Update</b>
		<hr>
		<div class="main-wraper">
			<div class="main">
				<article>
					<?php
					if(isset($_GET['id_nilai'])){
						$id_nilai = $_GET['id_nilai'];
						$select = mysqli_query($mysqli, "SELECT * FROM `nilai` INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel INNER JOIN siswa ON nilai.id_siswa = siswa.id_siswa WHERE id_nilai='$id_nilai'");
						if(mysqli_num_rows($select) == 0){
							echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
							exit();
						}else{
							$data = mysqli_fetch_assoc($select);
						}
					}
					?>

					<?php
						if(isset($_POST['submit'])){
							$id_nilai = $_GET['id_nilai'];
							$mapel = $_POST ['mapel'];
                            $uh = $_POST ['uh'];
                            $uts = $_POST ['uts'];
                            $uas = $_POST ['uas'];
							$sql = mysqli_query($mysqli, "UPDATE nilai SET id_mapel='$mapel',uts='$uts',uas='$uas',uh='$uh' WHERE id_nilai='$id_nilai'") or die (mysqli_error($mysqli));
							if($sql){
								echo "<script>alert('Berhasil!'); document.location='datanilai.php?id_nilai=$id_nilai' </script>";
							}else{
								echo "alert('error')";
							}
						}
					?>
					<form action="editnilai.php?id_nilai=<?php echo $id_nilai; ?>" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>NIS</label>
								<input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>"
									readonly />
							</div>
							<div class="form-group col-md-6">
								<label>Nama Siswa</label>
								<input type="text" name="nama_siswa" class="form-control"
									value="<?php echo $data['nama_siswa'];?>" readonly />
							</div>
							<div class="form-group col-md-6">
								<label>Mapel</label>
								<select class="form-control" name="mapel">
									<?php 
											$sql = mysqli_query($mysqli,"SELECT * FROM mapel");
											while($a = mysqli_fetch_assoc($sql)){
										?>
									<option value="<?= $a['id_mapel'] ?>">
										<?=
											 $a['nama_mapel'];
											?>
									</option>
									<?php 
											}
										?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Nilai Ulangan Harian</label>
								<input type="number" name="uh" class="form-control" value="<?php echo $data['uh']; ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nilai Ujian Tengah Semester</label>
								<input type="number" name="uts" class="form-control"
									value="<?php echo $data['uts']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Nilai Ujian Akhir Semester</label>
								<input type="number" name="uas" class="form-control"
									value="<?php echo $data['uas']; ?>">
							</div>
						</div><br>
						<input type="submit" class="btn btn-info" value="Simpan" name="submit">
						<input type="reset" class="btn btn-warning" value="Reset">

					</form>
				</article>
				<aside>
					<a href="datanilai.php" class="btn btn-dark">Tampil<br> Data Nilai</a>
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