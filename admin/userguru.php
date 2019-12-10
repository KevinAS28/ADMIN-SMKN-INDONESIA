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
		<title>Admin | User Guru</title>
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
					<li class="nav-item dropdown">
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
							<a class="dropdown-item" href="../admin/datanilai.php">Data Nilai</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">|</a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							User
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item active" href="../admin/userguru.php">Guru</a>
							<a class="dropdown-item" href="../admin/usersiswa.php">Siswa</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">|</a>
					</li>
					<li class="nav-item ">
						<a href="../admin/admin.php" class="nav-link">Admin</a>
					</li>
					<li class="nav-item login">
						<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
					</li>
				</ul>
			</nav>
		</div>
		<div class="container"><br>
			<b>Data User Guru&nbsp;<i class="fa fa-chevron-right"></i></b>
			<hr>
			<div class="main-wrapper">
				<div class="main">
					<article>
						<table class="table table-secondary table-hover table-striped tableUserGuru">
							<thead class="thead-dark">
								<th>#</th>
								<th>Gambar</th>
								<th>Username</th>
								<th>Password</th>
								<th>Level</th>
								<th>Action</th>
							</thead>
							<tbody>
							<?php
								$sql = mysqli_query($mysqli, "SELECT * FROM `user` WHERE level='guru' ORDER BY id_user DESC");
							
								if(mysqli_num_rows($sql) > 0){
								$no = 1;
								while($data  = mysqli_fetch_assoc($sql)):
							?>
								<tr>
									<td><?php echo $no?></td>
									<td><img style="width: 100px; height: 150px;" src="<?php echo "/smkindonesia/img/".$data['foto'] ?>"></td>
									<td><?php echo $data['username'] ?></td>
									<td><?php echo $data['password'] ?></td>
									<td><?php echo $data['level'] ?></td>
									<td>
										<a href="edituserguru.php?id_user=<?php echo $data['id_user'] ?>"
											class="btn btn-warning">Update</a>
										<a href="deleteuserguru.php?id_user=<?php echo $data['id_user'] ?>"
											onClick='return confirm("Apakah Ada yakin menghapus?")'
											class="btn btn-danger">Delete</a>
									</td>
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
						<a href="tambahuserguru.php" class="btn btn-dark">Tambah<br> User Guru</a>
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
<script>
	$(".tableUserGuru").DataTable();
</script>
	</html>