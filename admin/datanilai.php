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
	<title>Admin | Data Nilai</title>
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
						<a class="dropdown-item" href="../admin/dataguru.php">Data Guru</a>
						<a class="dropdown-item" href="../admin/datasiswa.php">Data Siswa</a>
						<a class="dropdown-item" href="../admin/dataprodi.php">Data Prodi</a>
						<a class="dropdown-item" href="../admin/datakelas.php">Data Kelas</a>
						<a class="dropdown-item" href="../admin/datamapel.php">Data Mapel</a>
						<a class="dropdown-item active" href="../admin/datanilai.php">Data Nilai</a>
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
		<b>Data Nilai&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<table class="table table-secondary table-hover table-striped tableNilai">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">NIS</th>
								<th scope="col">Nama Siswa</th>
								<th scope="col">Kelas</th>
								<th scope="col">Mapel</th>
								<th scope="col">UH</th>
								<th scope="col">UTS</th>
								<th scope="col">UAS</th>
								<th scope="col">Rata - rata</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							//$sql = mysqli_query($mysqli, "SELECT * FROM `nilai` INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel INNER JOIN siswa ON siswa.id_siswa= nilai.id_siswa INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas INNER JOIN prodi ON kelas.id_prodi=prodi.id_prodi ORDER BY id_nilai DESC") or die(mysqli_error($koneksi));
							$student_query = mysqli_query($mysqli, "SELECT * from `siswa` INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas INNER JOIN prodi ON kelas.id_prodi=prodi.id_prodi");
							$no = 1;
							while ($student = mysqli_fetch_assoc($student_query)){
								$student_id = $student['id_siswa'];
								$student_score_raw_query = "SELECT * FROM `nilai` INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel where `nilai`.id_siswa='$student_id'";
								$student_score_query = mysqli_query($mysqli, $student_score_raw_query);
								printf("%s<br>", $student_score_raw_query);
								$student_score_count_query = mysqli_query($mysqli, "select count(*) from `nilai` where id_siswa='$student_id'");
								$count = mysqli_fetch_array($student_score_count_query)[0];


								$student_score = mysqli_fetch_assoc($student_score_query);
								$ratarata = ($student_score['uas'] + $student_score['uts'] + $student_score['uh'])/3;
								?>
									<tr>
										<td><?php echo $no?></td>
										<td><?php echo $student['nis'] ?></td>
										<td><?php echo $student['nama_siswa'] ?></td>
										<td><?php echo $student['tingkat_kelas'] ?> <?php echo $student['kode_prodi'] ?> <?php echo $student['kode_kelas'] ?></td>


										<?php //only for the first row ?>
										<td><?php echo $student_score['nama_mapel'] ?></td>
										<td><?php echo $student_score['uh'] ?></td>
										<td><?php echo $student_score['uts'] ?></td>
										<td><?php echo $student_score['uas'] ?></td>
										<td><?php echo $ratarata; ?></td> 
										<td>
											<a href="editnilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
												class="btn btn-warning">Update</a>
											<a href="deletenilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
												onClick='return confirm("Apakah Ada yakin menghapus?")'
												class="btn btn-danger">Delete</a>
										</td>
										
									</tr>

								<?php
								while ($student_score = mysqli_fetch_assoc($student_score_query)){								
									print_r($student_score);
									$ratarata = ($student_score['uas'] + $student_score['uts'] + $student_score['uh'])/3;
								?>
									<tr>
										<td colspan="4"></td>
										<!-- <td></td>
										<td></td>
										<td></td> -->
										<td><?php echo $student_score['nama_mapel'] ?></td>
										<td><?php echo $student_score['uh'] ?></td>
										<td><?php echo $student_score['uts'] ?></td>
										<td><?php echo $student_score['uas'] ?></td>
										<td><?php echo $ratarata; ?></td> 
										<td>
											<a href="editnilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
												class="btn btn-warning">Update</a>
											<a href="deletenilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
												onClick='return confirm("Apakah Ada yakin menghapus?")'
												class="btn btn-danger">Delete</a>
										</td>
									</tr>																		
								<?php
								//$kelas_siswa = mysqli_query($mysqli, "SELECT * FROM `kelas` where `kelas_id`='' ")
								}
								$no++;
								?>
										<!-- <td><?php echo $ratarata; ?></td> 
										<td>
											<a href="editnilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
												class="btn btn-warning">Update</a>
											<a href="deletenilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
												onClick='return confirm("Apakah Ada yakin menghapus?")'
												class="btn btn-danger">Delete</a>
										</td>
									</tr>								 -->
								<?php

							}
						?>


						
						</tbody>
					</table>
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
			</div>
		</div>

	</div>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>
</body>
<script>
	$(".tableNilai").DataTable();
</script>
</html>

<!-- <tbody>
							<?php
							$sql = mysqli_query($mysqli, "SELECT * FROM `nilai` INNER JOIN mapel ON nilai.id_mapel = mapel.id_mapel INNER JOIN siswa ON siswa.id_siswa= nilai.id_siswa INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas INNER JOIN prodi ON kelas.id_prodi=prodi.id_prodi ORDER BY id_nilai DESC") or die(mysqli_error($koneksi));
						
							if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data  = mysqli_fetch_assoc($sql)):
								$ratarata = ($data['uh'] + $data['uas'] + $data['uts']) / 3;
						?>
							<tr>
								<td><?php echo $no?></td>
								<td><?php echo $data['nis'] ?></td>
								<td><?php echo $data['nama_siswa'] ?></td>
								<td><?php echo $data['tingkat_kelas'] ?> <?php echo $data['kode_prodi'] ?> <?php echo $data['kode_kelas'] ?></td>
								<td><?php echo $data['nama_mapel'] ?></td>
								<td><?php echo $data['uh'] ?></td>
								<td><?php echo $data['uts'] ?></td>
								<td><?php echo $data['uas'] ?></td>
								<td><?php echo $ratarata; ?></td>
								<?php
									$id_siswa = $data['id_siswa'];
									if(mysqli_num_rows($id_siswa) == 1){
										while($data  = mysqli_fetch_assoc($id_siswa)):
								?>
										<td rowspan="1"></td>
										<td rowspan="1"></td>
										<td rowspan="1"></td>
										<td rowspan="1"></td>
										<td><?php echo $data['nama_mapel'] ?></td>
										<td><?php echo $data['uh'] ?></td>
										<td><?php echo $data['uts'] ?></td>
										<td><?php echo $data['uas'] ?></td>
										<td><?php echo $ratarata; ?></td>
										<td rowspan="1"></td>
								<?php
								endwhile;
									}
								?>
								<td>
									<a href="editnilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
										class="btn btn-warning">Update</a>
									<a href="deletenilai.php?id_nilai=<?php echo $data['id_nilai'] ?>"
										onClick='return confirm("Apakah Ada yakin menghapus?")'
										class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php
							$no++;
						  	endwhile;
						}
						?>
						</tbody> -->