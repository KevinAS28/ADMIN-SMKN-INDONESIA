<?php
session_start();
include "../koneksi.php";
if ($_SESSION['status'] != "login") {
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
	<title>Guru | Data Siswa</title>
</head>

<body class=" ignielPelangi">
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
					<a href="../guru/index_guru.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item active">
					<a href="../guru/datasiswa.php" class="nav-link">Data Siswa</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item">
					<a href="../guru/datanilai.php" class="nav-link">Data Nilai</a>
				</li>
				<li class="nav-item login">
					<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container"><br>
		<b>Siswa&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<table class="table table-secondary table-hover table-striped tableSiswa">
						<thead class="thead-dark">
							<tr>
								<th>#</th>
								<th>Foto</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Jenis Kelamin</th>
								<th>Jurusan</th>
								<th>Kelas</th>
								<th>Alamat</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$username = $_SESSION['username'];
							$getDataByGuru = mysqli_query($mysqli, "SELECT guru.kelas FROM `guru` WHERE guru.nip = $username");

							$kelas = mysqli_fetch_assoc($getDataByGuru);
							$getKelas = $kelas["kelas"];
							$sql = mysqli_query($mysqli, "SELECT * FROM `siswa` INNER JOIN prodi ON siswa.id_prodi = prodi.id_prodi INNER JOIN user ON siswa.nis = user.username  INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas IN ($getKelas) ORDER BY id_siswa DESC");

							if (mysqli_num_rows($sql) > 0) {
								$no = 1;
								while ($data  = mysqli_fetch_assoc($sql)) :
									?>
									<tr>
										<td><?php echo $no ?></td>
										<td><img style="width: 100px; height: 150px;" src="<?php echo "/smkindonesia/img/".$data['foto'] ?>"></td>
										<td><?php echo $data['nis'] ?></td>
										<td><?php echo $data['nama_siswa'] ?></td>
										<td><?php echo $data['jenis_kelamin'] ?></td>
										<td><?php echo $data['nama_prodi'] ?></td>
										<td><?php echo $data['tingkat_kelas'] ?>&nbsp;<?php echo $data['kode_prodi'] ?>&nbsp;<?php echo $data['kode_kelas'] ?>
										</td>
										<td><?php echo $data['alamat'] ?></td>
									</tr>
							<?php
									$no++;
								endwhile;
							}
							?>
						</tbody>
					</table>
				</article>
				<aside>
					<div class="list-group jurusan">
						<a href="#" class="list-group-item list-group-item-action header" style="background-color:#1f2e2e; color:white;">Jurusan</a>
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

<script>
	$(".tableSiswa").DataTable();
</script>

</html>