<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
	<link rel="stylesheet" type="text/css" href="css/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Login Admin SMK INDONESIA</title>
</head>

<body class="ignielPelangi">
	<div id="header">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
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
				<li class="nav-item">
					<a href="datasiswa.php" class="nav-link">Data Siswa</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item">
					<a href="dataguru.php" class="nav-link">Data Guru</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item active">
					<a href="nilai.php" class="nav-link">Nilai</a>
				</li>
				<li class="nav-item login">
					<a href="login.php" class="nav-link">Login&nbsp;<i class="fa fa-sign-in"></i></a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="container">
		<b>Nilai&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>

				</article>
				<aside>
					<form>
						<input class="search" type="text" placeholder="Cari..." required>
						<button class="submit" type="submit">Cari</button>
					</form><br>

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
			</div>
		</div>

	</div>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>
</body>

</html>