<?php
session_start();
include "../koneksi.php";

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
		<title>Siswa | Nilai Siswa</title>
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
					<a href="../siswa/index_siswa.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item  active">
					<a href="../siswa/nilai_siswa.php" class="nav-link">Nilai Saya</a>
				</li>
				<li class="nav-item login">
					<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container"><br>
		<b>Nilai&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
				<?php
					$username = $_SESSION['username'];
					echo "<b>Hallo, $username. <br>Inilai rangkap nilai mu dari semua mata pelajaran.</b>"; 
				?><br><br>
					<table class="table table-secondary table-hover table-striped tableSiswa">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th>Nama Guru</th>
								<th scope="col">Mapel</th>
								<th scope="col">UH</th>
								<th scope="col">UTS</th>
								<th scope="col">UAS</th>
								<th scope="col">Rata - rata</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$username = $_SESSION['username'];
							$sql = mysqli_query($mysqli, "SELECT * FROM `nilai` INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel INNER JOIN guru ON guru.nip = nilai.nip INNER JOIN siswa ON siswa.id_siswa= nilai.id_siswa INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas INNER JOIN prodi ON kelas.id_prodi=prodi.id_prodi WHERE nis = '$username' ORDER BY id_nilai DESC");
						
							if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data  = mysqli_fetch_assoc($sql)):
								$ratarata = ($data['uh'] + $data['uas'] + $data['uts']) / 3;
						?>
							<tr>

								<td><?php echo $no?></td>
								<td><?php echo $data['nama_guru'] ?> <?php echo $data['gelar'] ?></td>
								<td><?php echo $data['nama_mapel'] ?></td>
								<td><?php echo $data['uh'] ?></td>
								<td><?php echo $data['uts'] ?></td>
								<td><?php echo $data['uas'] ?></td>
								<td><?php echo $ratarata; ?></td>
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