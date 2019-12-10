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
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/w3.css">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../bootstrap/css/jquery.dataTables.min.css">
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../bootstrap/js/jquery.dataTables.min.js"></script>
		<title>Admin | Update Siswa</title>
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
		<b>Data Siswa&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Update</b>
		<hr>
		<div class="main-wraper">
			<div class="main">
				<article>
					<?php
					if(isset($_GET['id_siswa'])){
						$id_siswa = $_GET['id_siswa'];
						$select = mysqli_query($mysqli, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'");
						if(mysqli_num_rows($select) == 0){
							echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
							exit();
						}else{
							$data = mysqli_fetch_assoc($select);
						}
					}
					?>

					<?php
						if(isset($_POST['submit'])){
							$id_siswa = $_GET['id_siswa'];
							$nis = $_POST ['nis'];
							$nama_siswa = $_POST ['nama_siswa'];
							$jenis_kelamin = $_POST ['jenis_kelamin'];
							$kelas = $_POST ['kelas'];
							$alamat = $_POST ['alamat'];
							$prodi = $_POST['prodi'];
							$sql = mysqli_query($mysqli, "UPDATE siswa SET nis='$nis',nama_siswa='$nama_siswa', jenis_kelamin='$jenis_kelamin',id_kelas='$kelas',alamat='$alamat',id_prodi='$prodi' WHERE id_siswa='$id_siswa'") or die (mysqli_error($mysqli));
							if($sql){
								echo "<script>alert('Berhasil!'); document.location='datasiswa.php?id_siswa=$id_siswa' </script>";
							}else{
								echo "alert('error')";
							}
						}
					?>
					<form action="editsiswa.php?id_siswa=<?php echo $id_siswa; ?>" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>NIS</label>
								<input type="text" name="nis" class="form-control" id="nissiswa" value="<?php echo $data['nis']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Nama Siswa</label>
								<input type="text" name="nama_siswa" class="form-control"
									value="<?php echo $data['nama_siswa'];?>">
							</div>

							<div class="form-group col-md-6">
								<label>Alamat</label>
								<textarea class="form-control" name="alamat"><?php echo $data['alamat']?></textarea>
							</div>

							
							<div class="form-group col-md-6">
								<label>Jenis Kelamin</label><br>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-laki"
										<?php if($data['jenis_kelamin'] == 'Laki-laki'){ echo 'checked'; } ?>>
									<label class="form-check-label">Laki-laki</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan"
										<?php if($data['jenis_kelamin'] == 'Perempuan'){ echo 'checked'; }?>>
									<label class="form-check-label">Perempuan</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="jenis_kelamin" disabled>
									<label class="form-check-label" for="inlineCheckbox1">Waria</label>
								</div>
							</div>

							<div class="form-group col-md-6">
								<label>Prodi</label>
								<select class="form-control" name="prodi">
									<?php
											$id_siswa = $_GET['id_siswa'];

											$sqi = mysqli_query($mysqli,'SELECT * FROM prodi');

											while($data = mysqli_fetch_assoc($sqi)){
											
										?>

									<option value="<?php echo $data['id_prodi']?>"><?php echo $data['nama_prodi']?>
									</option>
									<?php 
											}
											$sql = mysqli_query($mysqli,"SELECT * FROM siswa INNER JOIN prodi ON siswa.id_prodi = prodi.id_prodi WHERE id_siswa = '$id_siswa'");
											while ($d = mysqli_fetch_assoc($sql)){
										?>
									<option value="<?php echo $d['id_prodi']?>" selected hidden>
										<?php
													echo $d['nama_prodi'];
												?>
									</option>
									<?php } ?>
								</select>
							</div>
							
							<div class="form-group col-md-6">
								<label>Kelas</label>
								<select class="form-control" name="kelas">
									<?php 
											$sql = mysqli_query($mysqli,"SELECT * FROM kelas INNER JOIN prodi ON kelas.id_prodi = prodi.id_prodi");
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

							
						</div><br>
						<input type="submit" class="btn btn-info" value="Simpan" name="submit">
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
					<table class="table table-striped table-hover table-secondary tableUserSiswa">
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

		var datatable = $(".tableUserSiswa").DataTable();

		$(".tableUserSiswa tbody tr").click(function () {
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