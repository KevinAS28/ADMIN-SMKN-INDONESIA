<?php
include 'koneksi.php'
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="bootstrap/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/jquery.dataTables.min.js"></script>
	<title>Home | Data SIswa</title>
</head>
<body class="ignielPelangi">
	<div id="header">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">
				<img alt="Logo" src="img/tutwuri.png" style="width:40px;">
			</a>
			<ul class="nav navbar-nav ">
				<li class="nav-item active">
					<a class="navbar-brand" href="#" style="font-size:20px;">SMK INDONESIA</a>
				</li>
				<li class="nav-item">
					<a href="index.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item active">
					<a href="datasiswa.php" class="nav-link">Data Siswa</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item">
					<a href="dataguru.php" class="nav-link">Data Guru</a>
				</li>
				<li class="nav-item login">
					<a href="login.php" class="nav-link">Login&nbsp;<i class="fa fa-sign-in"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container"><br>
		<b>Data Siswa&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<table class="table table-striped table-secondary tableSiswa">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Foto</th>
								<th scope="col">NIS</th>
								<th scope="col">Nama Siswa</th>
								<th scope="col">Jenis Kelamin</th>
								<th scope="col">Kelas</th>
								<th scope="col">Alamat</th>
							</tr>
						</thead>
						<tbody id="tabledata">
							<?php
									$query = mysqli_query($mysqli, "SELECT * FROM `siswa` INNER JOIN prodi ON siswa.id_prodi = prodi.id_prodi  INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas INNER JOIN user ON siswa.nis = user.username ORDER BY id_siswa DESC");
								
								$no = 1;
								while($data = mysqli_fetch_array($query)){
								echo "<tr>";
								echo "<td>".$no."</td>";
								echo '<td><img style="width: 100px; height: 150px;" src="/smkindonesia/img/'.$data['foto'].'"/></td>';
								echo "<td>".$data['nis']."</td>";
								echo "<td>".$data['nama_siswa']."</td>";
								echo "<td>".$data['jenis_kelamin']."</td>";
								echo "<td>".$data['tingkat_kelas']."&nbsp;".$data['kode_prodi']."&nbsp;".$data['kode_kelas']."</td>";
								echo "<td>".$data['alamat']."</td>";
								$no++;
								}
							?>
						</tbody>
					</table>
				</article>
				<aside>
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
	</div><br>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>
</body>
<script>
	$(".tableSiswa").DataTable();
</script>

</html>