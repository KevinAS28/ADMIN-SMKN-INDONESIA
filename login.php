<?php
include 'koneksi.php';
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
	<title>Login Admin SMK INDONESIA</title>
	<style type="text/css">
		a {
		text-decoration: none;
		}
		label {
		font-family: "Raleway", sans-serif;
		font-size: 11pt;
		}
		#card {
		border-radius: 8px;
		box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
		height: 400px;
		margin: 2rem auto 8.1rem auto;
		width: 600px;
		}
		#card-content {
		padding: 12px 40px;
		}
		#card-title {
		font-family: "Raleway Thin", sans-serif;
		letter-spacing: 4px;
		padding-bottom: 23px;
		padding-top: 13px;
		text-align: center;
		}
		#submit-btn {
		background: -webkit-linear-gradient(right,  #141f1f,  #1f2e2e);
		border: none;
		border-radius: 21px;
		box-shadow: 0px 1px 8px #555;
		cursor: pointer;
		color: white;
		font-family: "Raleway SemiBold", sans-serif;
		height: 42.3px;
		margin: 0 auto;
		margin-top: 40px;
		transition: 0.25s;
		}
		#submit-btn:hover {
		box-shadow: 0px 1px 18px #888;
		}
		.form {
		align-items: left;
		display: flex;
		flex-direction: column;
		}
		.form-border {
		background: -webkit-linear-gradient(right,  #141f1f,  #1f2e2e);
		height: 1px;
		width: 100%;
		}
		.form-content {
		background: #141f1f;
		color: #dbdbdb;
		font-family: "cambria";
		border: none;
		outline: none;
		padding: 5px;
		}
		.underline-title {
		background: -webkit-linear-gradient(right,  #141f1f,  #1f2e2e, #555);
		height: 2px;
		margin: -1.1rem auto 0 auto;
		width: 89px;
		}

	</style>
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
				<li class="nav-item active login">
					<a href="login.php" class="nav-link">Login&nbsp;<i class="fa fa-sign-in"></i></a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="container"><br>
		<b>Log In&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
						<div id="card">
							<div id="card-content">
								<div id="card-title">
									<h2>LOGIN</h2><br>
									<div class="underline-title"></div>
								</div>
								<form method="post" class="form" action="proseslogin.php">
									<label for="user-email" style="padding-top:13px">
										&nbsp;Username
									</label>
									<input id="user-email" class="form-content" type="text" name="username"
										autocomplete="on" required />
									<div class="form-border"></div>
									<label for="user-password" style="padding-top:22px">&nbsp;Password
									</label>
									<input id="user-password" class="form-content" type="password" name="password"
										required />
									<div class="form-border"></div>
									<?php 
									if(isset($_GET['pesan'])){
										if($_GET['pesan'] == "gagal"){
											echo "<center style='margin-top:10px;'>Login gagal! username dan password salah!</center>";
										}else if($_GET['pesan'] == "logout"){
											echo "<center style='margin-top:10px;'>Anda telah berhasil logout</center>";
										}else if($_GET['pesan'] == "belum_login"){
											echo "<center style='margin-top:10px;'>Anda harus login untuk mengakses halaman admin/guru/siswa</center>";
										}
									}
								?>
									<input id="submit-btn" type="submit" name="submit" value="LOGIN" />
								</form>
							</div>
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