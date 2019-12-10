<?php
session_start();

if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}

if (!isset($_SESSION["username"])) {
	echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!="siswa") {
    echo "Anda tidak punya akses pada halaman siswa";
    exit;
}

$id_user=$_SESSION["id_user"];
$username=$_SESSION["username"];

?>

<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/w3.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
		<title>Siswa | Index</title>
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
				<li class="nav-item active">
					<a href="../siswa/index_siswa.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item">
					<a href="../siswa/nilai_siswa.php" class="nav-link">Nilai Saya</a>
				</li>
				<li class="nav-item login">
					<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container">
		<b>Home&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<br>
		<div class="col-md-10 col-md-offset-1">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="../img/slider1.jpg" class="d-block w-100">
						<div class="carousel-caption">
							<h3>SMK Indonesia</h3>
							<p>Menghasilkan lulusan dengan kompetensi yang di butuhkan DU/DI bertaraf nasional dan
								internasional</p>
						</div>
					</div>
					<div class="item">
						<img src="../img/slider0.jpg" class="d-block w-100">
						<div class="carousel-caption">
							<h3>SMK Indonesia</h3>
							<p>Menanamkan Imam dan Taqwa serta sikap Profesional pada seluruh komponen sekolah</p>
						</div>
					</div>
					<div class="item">
						<img src="../img/slider3.jpg" class="d-block w-100">
						<div class="carousel-caption">
							<h3>SMK Indonesia</h3>
							<p>If Better Is Posible, Good Is Not Enough</p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<button class="btn btn-success btn-lg btn-block">
				<center class="animated infinite rubberBand slow">Welcome Dude! have a good day!</center>
			</button>
		</div>
	</div>
	<div class="container">
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article><br>
					<div class="jumbotron">
						<h3 class="display-5">VISI</h3>
						<p class="lead">SMK Bermutu, Unggul Merata, Terampil, Berkarakter dan Berdaya Saing Dalam
							Kebekerjaan.</p>
						<hr class="my-3">
						<h3 class="display-5">MISI</h4>
							<p class="lead">
								<ol>
									<li>Meningkatkan Ketersediaan saran prasarana SMK Bernumut sesuai SNP.</li>
									<li>Meningkatkan keterjangkuan layanan SMK yang berkeadilan.</li>
									<li>Meningkatkan kualitas pembelajaran SMK Unggul Merata untuk menghasilkan lulusan
										berdaya saing dalam bekerja.</li>
									<li>Mewujud kesetaraan layana SMK yang memberdayakan potensi bangsa.</li>
									<li>Meningkatkan kepastian layanan yang menghasilkan lulusan SMK terampil ,
										berkarakter dan mandiri.</li>
								</ol>
							</p>

					</div>
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
	</div>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>

</body>

</html>