<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
	$cek = mysqli_query($mysqli, "SELECT * FROM user WHERE username = 'username'");
	if(mysqli_num_rows($cek) == 0){
	    $sql = mysqli_query($mysqli, "INSERT INTO user (id_user, username, password, level) VALUES('','$username','$password','$level')") or die(mysqli_error($mysqli));		
		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="admin.php";</script>';
		}else{
			echo json_encode($sql);
				}
	}else{
		 echo '<script>alert("Gagal, username sudah terdaftar");
		 	document.location="tambahadmin.php";</script>';
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
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
		<title>Admin | Insert Admin</title>
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
				<li class="nav-item active">
					<a href="../admin/admin.php" class="nav-link">Admin</a>
				</li>
				<li class="nav-item login">
					<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container"><br>
		<b>Data Admin&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Insert</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<form action="tambahadmin.php" method="POST" enctype="multipart/form-data">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username...">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Password</label>
								<input type="text" name="password" class="form-control" placeholder="Password...">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Level</label>
								<select name="level" class="form-control">
                                    <option value="guru" disabled>Guru</option>
                                    <option value="siswa"  disabled>Siswa</option>
                                    <option value="admin" selected>Admin</option>
                                </select>
                            </div>
						</div><br>
						<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
						<input type="reset" class="btn btn-warning" value="Reset">
					</form>
				</article>
				<aside>
					<form type="GET">
						<input class="search" type="text" name="cari" placeholder="Cari username..." required>
						<button class="submit" type="submit">Cari</button>
					</form><br>
					<a href="admin.php" class="btn btn-dark">Tampil<br> Admin</a>
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