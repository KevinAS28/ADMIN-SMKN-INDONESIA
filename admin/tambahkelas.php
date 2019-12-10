<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}

if(isset($_POST['submit'])){
	$tingkat_kelas = $_POST['tingkat_kelas'];
	$kode_kelas = $_POST['kode_kelas'];
	$kode_prodi = $_POST['kode_prodi'];
	$cek = mysqli_query($mysqli, "SELECT * FROM kelas WHERE id_kelas = 'id_kelas'");
	if(mysqli_num_rows($cek) == 0){
	$sql = mysqli_query($mysqli, "INSERT INTO kelas (id_kelas, tingkat_kelas, kode_kelas, id_prodi) VALUES('','$tingkat_kelas','$kode_kelas','$kode_prodi')") or die(mysqli_error($mysqli));		
		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="datakelas.php";</script>';
		}else{
			echo json_encode($sql);
				}
	}else{
		 echo '<script>alert("Gagal, mapel sudah terdaftar");
		 	document.location="tambahkelas.php";</script>';
		}
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
		<title>Admin | Insert Kelas</title>
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
				<li class="nav-item  active dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Data
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../admin/dataguru.php">Data Guru</a>
						<a class="dropdown-item" href="../admin/datasiswa.php">Data Siswa</a>
						<a class="dropdown-item" href="../admin/dataprodi.php">Data Prodi</a>
						<a class="dropdown-item active" href="../admin/datakelas.php">Data Kelas</a>
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
		<b>Data Kelas&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Insert</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<form action="tambahkelas.php" method="POST">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Tingkat Kelas</label>
								<select class="form-control" name="tingkat_kelas">
									<option value="X">X</option>
									<option value="XI">XI</option>
									<option value="XII">XII</option>
								</select>
							</div>
							<div class="form-group col-md-12">
								<label>Kode Prodi</label>
								<select class="form-control" name="kode_prodi">
									<?php
											$id_kelas = $_GET['id_kelas'];

											$sql = mysqli_query($mysqli,'SELECT * FROM prodi');

											while($data = mysqli_fetch_assoc($sql)){
											
										?>

									<option value="<?php echo $data['id_prodi']?>"><?php echo $data['kode_prodi']?>
									</option>
									<?php 
											}
											$sql = mysqli_query($mysqli,"SELECT * FROM kelas INNER JOIN prodi ON kelas.id_prodi = prodi.id_prodi WHERE id_kelas = '$id_kelas'");

											while ($d = mysqli_fetch_assoc($sql)){

											
										?>
									<option value="<?php echo $d['id_kelas']?>" selected hidden>
										<?php
													echo $d['kode_prodi'];
												?>
									</option>
									<?php } ?>

								</select>
							</div>
							<div class="form-group col-md-12">
								<label>Kode Kelas</label>
								<select name="kode_kelas" class="form-control">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
						</div><br>
						<input type="submit" class="btn btn-info" value="Simpan" name="submit">
						<input type="reset" class="btn btn-warning" value="Reset">

					</form>
				</article>
				<aside>
					<a href="datakelas.php" class="btn btn-dark">Tampil<br> Data Kelas</a>
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