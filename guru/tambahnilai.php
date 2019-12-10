<?php
session_start();
include "../koneksi.php";
if($_SESSION['status']!="login"){
	header("location:../login.php?pesan=belum_login");
}
if(isset($_POST['submit'])){
	$id_siswa = $_POST ['id_siswa'];
	$nip = $_POST ['nip'];
	$mapel = $_POST ['mapel'];
	$uh = $_POST ['uh'];
	$uts = $_POST ['uts'];
	$uas = $_POST ['uas'];
	$cek = mysqli_query($mysqli, "SELECT * FROM nilai WHERE id_siswa = '$id_siswa' AND id_mapel = '$mapel'") or die(mysqli_error($mysqli));	
	if(mysqli_num_rows($cek) == 0){
		$sql = mysqli_query($mysqli, "INSERT INTO nilai VALUES('','$mapel','$id_siswa','$nip','$uh','$uts','$uas')") or die(mysqli_error($mysqli));		
		if($sql){
			echo '<script>alert("Berhasil menambahkan data."); document.location="datanilai.php";</script>';
		}else{
			echo '<script>alert("Gagal melakukan proses tambah data."); document.location="datanilai.php";</script>';
				}
	}else{
		echo '<script>alert("Gagal, NIS dan mapel sudah terdaftar");
			document.location="tambahnilai.php";</script>';
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
	<title>GURU | Tambah Nilai</title>
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
				<li class="nav-item">
					<a href="../guru/index_guru.php" class="nav-link">Home</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item">
					<a href="../guru/datasiswa.php" class="nav-link">Data Siswa</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">|</a>
				</li>
				<li class="nav-item  active">
					<a href="../guru/datanilai.php" class="nav-link">Data Nilai</a>
				</li>
				<li class="nav-item login">
					<a href="../logout.php" class="nav-link">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container"><br>
		<b>Nilai&nbsp;<i class="fa fa-chevron-right"></i> Tambah</b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
				<?php
					$username = $_SESSION['username'];
				?>
                <form action="tambahnilai.php"  method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
                                <label>NIS</label>
                                <input type="text" class="form-control" id="nissiswa" placeholder="Nis Siswa">
								<input type="hidden" id="id_siswa" name="id_siswa">
							</div>
							<div class="form-group col-md-6">
                                <label>NIP</label>
                                <input type="text" class="form-control" name="nip" value="<?php echo $username; ?>" placeholder="Nip Anda..." readonly>
								
							</div>
							<div class="form-group col-md-6">
								<label>Mapel</label>
								<select name="mapel" class="form-control">
									<?php 
									$sql = mysqli_query($mysqli,"SELECT * FROM mapel");
									while($d = mysqli_fetch_assoc($sql)){
									?>
									<option value="<?= $d['id_mapel']?>">
										<?=
											$d['nama_mapel'];
										?>	
									</option>
									<?php 
									}
									?>
								</select>
									
							</div>
							<div class="form-group col-md-6">
								<label>Nilai Ulangan Harian</label>
								<input type="number" name="uh" min="0" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Nilai Ujian Tengah Semester</label>
								<input type="number" name="uts" min="0" class="form-control">
							</div>
							<div class="form-group col-md-6">
								<label>Nilai Ujian Akhir Semester</label>
								<input type="number" name="uas" min="0" class="form-control">
							</div>
						</div>
						<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
						<input type="reset" class="btn btn-warning" value="Reset">
					</form>
				</article>
                <aside><br>
                <a href="../guru/datanilai.php" class="btn btn-dark">Tampil<br> Data Nilai</a><br>
					<div class="list-group jurusan">
						<a href="#" class="list-group-item list-group-item-action header" style="background-color:#1f2e2e; color:white;">Jurusan</a>
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
					<h5 class="modal-title" id="exampleModalLabel">NILAI SISWA</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<table class="table table-striped table-hover table-secondary tableNilaiSiswa">
						<thead class="thead-dark">
							<th>#</th>
							<th>Id Siswa</th>
							<th>NIS</th>
							<th>Nama Siswa</th>
							<th>Prodi</th>
							<th>Kelas</th>
						</thead>
						<tbody class="">
							<?php
								$getDataByGuru = mysqli_query($mysqli, "SELECT guru.kelas FROM `guru` WHERE guru.nip = $username");

								$kelas = mysqli_fetch_assoc($getDataByGuru);
								$getKelas = $kelas["kelas"];
	
								// var_dump($getKelas);
	
								$sql = mysqli_query($mysqli, "SELECT * FROM `siswa` INNER JOIN prodi ON siswa.id_prodi = prodi.id_prodi  INNER JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas IN ($getKelas) ORDER BY id_siswa DESC");
								if(mysqli_num_rows($sql) > 0){
								$no = 1;
								while($data  = mysqli_fetch_assoc($sql)):
							?>
							<tr>
								<td><?php echo $no?></td>
								<td><?php echo $data['id_siswa'] ?></td>
								<td><?php echo $data['nis'] ?></td>
								<td><?php echo $data['nama_siswa'] ?></td>
								<td><?php echo $data['nama_prodi'] ?></td>
								<td><?php echo $data['tingkat_kelas'] ?> <?php echo $data['kode_prodi'] ?> <?php echo $data['kode_kelas'] ?></td>
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

		var datatable = $(".tableNilaiSiswa").DataTable();

		$(".tableNilaiSiswa tbody tr").click(function () {
			var currow = datatable.row(this).index();
			console.log(currow);
			var rows = datatable.rows(currow).data();
			console.log(currow);
			var getNis = rows[0][2];
			var getIdSiswa = rows[0][1];

			$("#nissiswa").val(getNis);

			$("#id_siswa").val(getIdSiswa);

			$("#modalNisSiswa").modal("hide");
		});
	});
</script>
</html>