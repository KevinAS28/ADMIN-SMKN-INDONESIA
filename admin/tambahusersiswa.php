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
    $ekstensi_foto = array('png','jpg','jpeg');
	$foto = $_FILES['foto']['name'];
	$x = explode('.', $foto);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];
	$cek = mysqli_query($mysqli, "SELECT * FROM user WHERE username = 'username'");
	if(mysqli_num_rows($cek) == 0 AND in_array($ekstensi, $ekstensi_foto) === true){
		if($ukuran <= 1000000){	
			move_uploaded_file($file_tmp, 'img/'.$foto);
	    $sql = mysqli_query($mysqli, "INSERT INTO user (id_user, username, password, level, foto) VALUES('','$username','$password','$level','$foto')") or die(mysqli_error($mysqli));		
		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="usersiswa.php";</script>';
		}else{
			echo json_encode($sql);
				}
	}else{
		 echo '<script>alert("Gagal, username sudah terdaftar");
		 	document.location="tambahuserguru.php";</script>';
        }
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
		<title>Admin | Insert User Siswa</title>
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
		<b>Data User Siswa&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Insert</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<form action="tambahusersiswa.php" method="POST" enctype="multipart/form-data">
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
									<option value="siswa" selected>Siswa</option>
									<option value="admin" disabled>Admin</option>
								</select>
							</div>
							<div class="form-group col-md-12">
								<label>Foto</label>
                                <input type="file" name="foto" class="form-control">
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
					<a href="usersiswa.php" class="btn btn-dark">Tampil<br> User Siswa</a>
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