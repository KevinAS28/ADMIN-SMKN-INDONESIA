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
		<title>Admin | Update Guru</title>
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
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Data
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item active" href="../admin/dataguru.php">Data Guru</a>
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
		<b>Data Guru&nbsp;<i class="fa fa-chevron-right"></i>&nbsp;Update</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<?php
					if(isset($_GET['id_guru'])){
						$id_guru = $_GET['id_guru'];
						$select = mysqli_query($mysqli, "SELECT * FROM guru WHERE id_guru='$id_guru'");

						if(mysqli_num_rows($select) == 0){
							echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
							exit();
						}else{
							$data = mysqli_fetch_assoc($select );
						}
					}
					?>

					<?php
						if(isset($_POST['submit'])){
							$nip = $_POST['nip'];
							$nama_guru = $_POST['nama_guru'];
							$alamat = $_POST['alamat'];
							$mapel = $_POST['mapel'];
							$gelar = $_POST['gelar'];
							$data =implode(',',$mapel);
							$kelas = $_POST['kelas'];
							$data2 = implode(',',$kelas);
							$sql = mysqli_query($mysqli, "UPDATE guru SET nip='$nip',nama_guru='$nama_guru',alamat='$alamat',mapel='$data',gelar='$gelar',kelas='$data2' WHERE id_guru='$id_guru'");
							if($sql){
								echo "<script>alert('Berhasil!'); document.location='dataguru.php?id_guru=$id_guru' </script>";
							}
						}
					?>

					<form action="editguru.php?id_guru=<?php echo $id_guru; ?>" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>NIP</label>
								<input type="text" name="nip" class="form-control" id="nipguru" value="<?php echo $data['nip']; ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Nama</label>
								<input type="text" name="nama_guru" class="form-control"
									value="<?php echo $data['nama_guru'] ?>">
							</div>
						</div>
						<div class="form-group">
							<label>Gelar</label>
							<select name="gelar" class="form-control">
								<option value="S.Ag.">Sarjana Agama</option>
								<option value="S.Pd.">Sarjana Pendidikan</option>
								<option value="S.Ars.">Sarjana Arsitektur</option>
								<option value="S.Psi.">Sarjana Psikologi</option>
								<option value="S.Kom.">Sarjana Komputer</option>
								<option value="S.Sn.">Sarjana Seni</option>
								<option value="S.Pd.I.">Sarjana Pendidikan Islam</option>
								<option value="S.T.">Sarjana Teknik</option>
								<option value="S.Ds.">Sarjana Desain</option>
								<option value="S.Mat.">Sarjana Matematika</option>
								<option value="S.SI.">Sarjana Sistem Informasi</option>
								<option value="S.TI.">Sarjana Teknologi Informasi</option>

								<option value="M.Ag.">Magister Agama</option>
								<option value="M.Ars.">Magister Arsitektur</option>
								<option value="M.Ds.">Magister Desain</option>
								<option value="M.Kom.">Magister Ilmu Komputer </option>
								<option value="M.P.Mat.">Magister Pengajaran Matematika</option>
								<option value="M.P.Kim.">Magister Pengajaran Kimia </option>
								<option value="M.P.Fis.">Magister Pengajaran Fisika</option>
								<option value="M.Pd.I.">Magister Pendidikan Islam </option>
								<option value="M.Pd.">Magister Pendidikan</option>
								<option value="M.Sn.">Magister Seni </option>
								<option value="M.T.">Magister Teknik</option>
								<option value="M.TI.">Magister Teknologi Informasi</option>
							</select>
						</div>	
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Mapel</label>
								<?php 
									$sql = mysqli_query($mysqli,"SELECT * FROM mapel");
									while($d = mysqli_fetch_assoc($sql)){
								?>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="mapel[]"
										value="<?php echo $d['nama_mapel']?>">&nbsp;&nbsp;&nbsp;
									<label class="form-check-label"><?php echo $d['nama_mapel']?></label>
								</div>
								<?php }?>
							</div>
							<div class="form-group col-md-6">
								<label>Kelas</label><br>
								<?php
									$sql = mysqli_query($mysqli, "SELECT kelas.id_kelas,kelas.kode_kelas, kelas.tingkat_kelas, prodi.kode_prodi FROM `kelas` INNER JOIN prodi ON kelas.id_prodi = prodi.id_prodi");
									while($d = mysqli_fetch_assoc($sql)){
								?>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="kelas[]"
										value="<?php echo $d['id_kelas']?>">
									<label class="form-check-label"><?php echo $d['tingkat_kelas']?> <?php echo $d['kode_prodi']?> <?php echo $d['kode_kelas']?></label>
								</div>
								<?php
									}
								?>
							</div><br>

							<input type="submit" class="btn btn-info" value="Simpan" name="submit">
							<input type="reset" class="btn btn-warning" value="Reset">

					</form>
				</article>
				<aside>
					<a href="dataguru.php" class="btn btn-dark">Tampil<br> Data Guru</a>
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
	<div class="modal fade" id="modalNipGuru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">USER GURU</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-hover table-secondary tableUserGuru">
						<thead class="thead-dark">
							<th>#</th>
							<th>Username</th>
							<th>Password</th>
							<th>Level</th>
						</thead>
						<tbody class="">
							<?php
								$sql = mysqli_query($mysqli, "SELECT * FROM `user` WHERE level='guru' ORDER BY id_user DESC");
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
		$("#nipguru").click(function () {
			$("#modalNipGuru").modal("show");
		});

		var datatable = $(".tableUserGuru").DataTable();

		$(".tableUserGuru tbody tr").click(function () {
			var currow = datatable.row(this).index();
			console.log(currow);
			var rows = datatable.rows(currow).data();
			console.log(currow);
			var getNip = rows[0][1];

			$("#nipguru").val(getNip);

			$("#modalNipGuru").modal("hide");
		});
	});
</script>
</html>