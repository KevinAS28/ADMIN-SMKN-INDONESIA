-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2019 pada 14.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk_indonesia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'dinda', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru1`
--

CREATE TABLE `guru1` (
  `id_guru` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kode_prodi` varchar(255) NOT NULL,
  `mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru1`
--

INSERT INTO `guru1` (`id_guru`, `nip`, `nama_guru`, `alamat`, `kode_prodi`, `mapel`) VALUES
(4, 192036719, 'Ade S.Pd', 'Bojong', 'RPL', 'Bahasa Inggris,Bahasa Indonesia,Bahasa Sunda,Pendidikan Kewarganegaraan'),
(5, 19230230, 'Revi Fernando', 'Bandung Papandayan No.75', 'TKJ,MM,TFLM,DPIB', 'Matematika,Pendidikan Kewarganegaraan,Bahasa Sunda'),
(7, 182739107, 'Iwan S.kom.', 'Bogor', 'RPL,TFLM', 'Pendidikan Kewarganegaraan,Agama'),
(8, 2147483647, 'Hikmat S.Kom', 'Citayam', 'TFLM,BKP', 'Bahasa Inggris,Bahasa Indonesia,Penjas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat_kelas` varchar(11) NOT NULL,
  `kode_kelas` varchar(25) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat_kelas`, `kode_kelas`, `id_prodi`) VALUES
(2, 'X', '1', 1),
(4, 'XI', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Agama'),
(2, 'Bahasa Inggris'),
(3, 'Bahasa Indonesia'),
(4, 'Bahasa Sunda'),
(5, 'Pendidikan Kewarganegaraan'),
(6, 'Matematika'),
(7, 'Penjas'),
(8, 'Kimia'),
(9, 'Fisika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `uh` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_mapel`, `id_siswa`, `uh`, `uts`, `uas`) VALUES
(2, 8, 32, 88, 80, 97);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kode_prodi`, `nama_prodi`) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 'MM', 'Multimedia'),
(3, 'TKJ', 'Teknik Komputer Jaringan'),
(4, 'SIJA', 'Sistem Jaringan dan Aplikasi '),
(5, 'TFLM', 'Teknik Fabrikasi Logam'),
(6, 'TOI', 'Teknik Otomasi Industri'),
(7, 'DPIB', 'Desain Pemodelan Intruksi Bangunan'),
(8, 'BKP', 'Bangunan Kontruksi Properti'),
(9, 'TP', 'Teknik Pemesinan'),
(10, 'TKR', 'Teknik Kendaraan Ringan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(25) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `alamat`, `id_kelas`, `id_prodi`) VALUES
(19, 1017007669, 'dinda', 'Perempuan', 'Bogor', 2, 6),
(32, 101799745, 'agan', 'laki', 'jk', 4, 8),
(33, 92932, 'Afghan', 'Laki-laki', 'test', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` bigint(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 1017007668, 'dinda123', 'siswa'),
(4, 567898456789056789, 'dona123', 'guru'),
(5, 1, 'apani', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `guru1`
--
ALTER TABLE `guru1`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `id_mapel` (`id_mapel`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_kelas` (`id_kelas`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru1`
--
ALTER TABLE `guru1`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
