<?php
session_start();
include '../koneksi.php';
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}
if(isset($_POST['submit'])){
	$nis = $_POST ['nis'];
	$nama_siswa = $_POST ['nama_siswa'];
	$jenis_kelamin = $_POST ['jenis_kelamin'];
	$kelas = $_POST ['kelas'];
	$alamat = $_POST ['alamat'];
	$prodi = $_POST ['prodi'];
	$cek = mysqli_query($mysqli, "SELECT * FROM siswa WHERE nis='$nis'") or die(mysqli_error($mysqli));	
	if(mysqli_num_rows($cek) == 0){
		$sql = mysqli_query($mysqli, "INSERT INTO siswa VALUES('','$nis','$nama_siswa','$jenis_kelamin','$alamat','$kelas','$prodi')") or die(mysqli_error($mysqli));		
		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="datasiswa.php";</script>';
		}else{
			echo '<script>alert("Gagal melakukan proses tambah data."); document.location="datasiswa.php";</script>';
				}
	}else{
		echo '<script>alert("Gagal, NIS sudah terdaftar");
			document.location="tambahsiswa.php";</script>';
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
		<title>Admin | Insert Siswa</title>
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
						<a class="dropdown-item  active" href="../admin/datasiswa.php">Data Siswa</a>
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
		<b>Data Siswa&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Insert</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<form action="tambahsiswa.php" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>NIS</label>
								<input type="text" name="nis" class="form-control" id="nissiswa"  placeholder="NIS">
							</div>
							<div class="form-group col-md-6">
								<label>Nama Siswa</label>
								<input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa">
							</div>
							<div class="form-group col-md-6">
								<label>Program Studi</label>
								<select class="form-control" name="prodi">
									<?php 
												$sql = mysqli_query($mysqli,"SELECT * FROM prodi");
												while($d = mysqli_fetch_assoc($sql)){
											?>
									<option value="<?= $d['id_prodi'] ?>">
										<?=
												$d['nama_prodi'];
												?>
									</option>
									<?php 
												}
											?>
								</select>

							</div>
							<div class="form-group col-md-6">
								<label>Kelas</label>
								<select class="form-control" name="kelas">
									<?php 
											$sql = mysqli_query($mysqli,"SELECT kelas.id_kelas,kelas.kode_kelas, kelas.tingkat_kelas, prodi.kode_prodi FROM `kelas` INNER JOIN prodi ON kelas.id_prodi = prodi.id_prodi");
											while($a = mysqli_fetch_assoc($sql)){
										?>
									<option value="<?= $a['id_kelas'] ?>">
										<?=
											 $a['tingkat_kelas'];
											?>
										<?=
											 $a['kode_prodi'];
											?>
										<?=
											 $a['kode_kelas'];
											?>
									</option>
									<?php 
											}
										?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Jenis Kelamin</label><br>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki">
									<label class="form-check-label">Laki-laki</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan">
									<label class="form-check-label">Perempuan</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" disabled>
									<label class="form-check-label">Waria</label>
								</div>
							</div>
							<div class="form-group col-md-6">
								<label>Alamat</label>
								<textarea class="form-control" name="alamat"
									placeholder="Bandung, Papandayan no 75"></textarea>
							</div>
						</div><br>
						<input type="submit" class="btn btn-primary" value="Simpan" name="submit">
						<input type="reset" class="btn btn-warning" value="Reset">
					</form>
				</article>
				<aside>
					<a href="datasiswa.php" class="btn btn-dark">Tampil<br> Data Siswa</a>
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

	<!-- Modal -->
	<div class="modal fade" id="modalNisSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">USER SISWA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-hover table-secondary tableSiswa">
						<thead class="thead-dark">
							<th>#</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
						</thead>
						<tbody class="">
							<?php
								$sql = mysqli_query($mysqli, "SELECT * FROM `user` WHERE level='siswa' ORDER BY id_user DESC");
								if(mysqli_num_rows($sql) > 0){
								$no = 1;
								while($data  = mysqli_fetch_assoc($sql)):
							?>
							<tr>
								<td><?php echo $no?></td>
								<td><?php echo $data['username'] ?></td>
								<td><?php echo $data['password'] ?></td>
								<td><?php echo $data['level'] ?></td>
							</tr>
							<?php
								$no++;
									endwhile;
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>
</body>
<script>
	$(document).ready(function () {
		$("#nissiswa").click(function () {
			$("#modalNisSiswa").modal("show");
		});

		var datatable = $(".tableSiswa").DataTable();

		$(".tableSiswa tbody tr").click(function () {
			var currow = datatable.row(this).index();
			console.log(currow);
			var rows = datatable.rows(currow).data();
			console.log(currow);
			var getNis = rows[0][1];

			$("#nissiswa").val(getNis);

			$("#modalNisSiswa").modal("hide");
		});
	});
</script>
</html>