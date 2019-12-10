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
	<title>Home | Data Guru</title>
</head>
<body class="ignielPelangi">
	<div id="header">
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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
				<li class="nav-item active">
					<a href="dataguru.php" class="nav-link">Data Guru</a>
				</li>
				<li class="nav-item login">
					<a href="login.php" class="nav-link">Login&nbsp;<i class="fa fa-sign-in"></i></a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="container"><br>
		<b>Data Guru&nbsp;<i class="fa fa-chevron-right"></i></b>
		<hr>
		<div class="main-wrapper">
			<div class="main">
				<article>
					<table class="table table-striped table-secondary tableGuru" id="table">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Foto</th>
								<th scope="col">NIP</th>
								<th scope="col">Nama Guru</th>
								<th scope="col">Mapel</th>
								<th scope="col">Mengajar</th>
								<th scope="col">Alamat</th>
							</tr>
						</thead>
						<tbody id="tabledata">
							<?php
								$sql = mysqli_query($mysqli, "SELECT guru.*,user.foto,user.level,GROUP_CONCAT(kelas.tingkat_kelas,' ',prodi.kode_prodi,' ',kelas.kode_kelas) AS kelas_ajar FROM `guru` INNER JOIN user ON user.username = guru.nip INNER JOIN kelas ON FIND_IN_SET (kelas.id_kelas,guru.kelas) INNER JOIN prodi ON prodi.id_prodi = kelas.id_prodi GROUP BY guru.nip ORDER BY id_guru DESC ");
							  
						    if(mysqli_num_rows($sql) > 0){
						    	$no = 1;
								while($data = mysqli_fetch_array($sql)):
									$explode = explode(',',$data['mapel']);
									$explode1 = explode(',',$data['kelas_ajar']);
						    	?>
							<tr>
								<td><?php echo $no?></td>
								<td><img style="width: 100px; height: 150px;" src="<?php echo "/smkindonesia/img/".$data['foto'] ?>"></td>
								<td><?php echo $data['nip']?></td>
								<td><?php echo $data['nama_guru']?>, <?php echo $data['gelar']?></td>
								<td>
									<?php
								for($i=0;$i<count($explode);$i++){
									echo "<li>".$explode[$i]."</li>";
								}?>
								</td>
								<td>
									<?php 
									
									for ($i=0; $i <count($explode1) ; $i++) { 
										echo "<li>".$explode1[$i]."</li>";
									}
								?>
								</td>
								
								<td><?php echo $data['alamat']?></td>
							</tr>
							<?php 
						    $no++;
						    endwhile;
						    }
						    ?>
							</tr>
						</tbody>
					</table>
				</article>
				<aside>
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
	</div><br>
	<div id="footer">
		<center>Copyright &copy; 2019 SMK Indonesia. All rights reserved. Designed by @adindalailatulistiqomah</center>
	</div>
</body>
<script>
	$(".tableGuru").DataTable();
</script>
</html>