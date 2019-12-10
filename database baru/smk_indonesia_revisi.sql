-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2019 pada 05.36
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
-- Database: `smk_indonesia_revisi`
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
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_mapel` int(50) NOT NULL,
  `id_prodi` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nip`, `alamat`, `id_mapel`, `id_prodi`) VALUES
(7, 'nita', '1234567887', 'Bandung', 1, 1),
(10, 'Ade', '1234567888', 'Bogor', 2, 2);

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
(2, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(50) NOT NULL,
  `id_prodi` int(50) NOT NULL,
  `id_siswa` int(50) NOT NULL,
  `uh` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_mapel`, `id_prodi`, `id_siswa`, `uh`, `uts`, `uas`) VALUES
(6, 1, 2, 28, 88, 88, 90);

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
(2, 'MM', 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(25) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `kelas`, `alamat`, `id_prodi`) VALUES
(28, 1017007669, 'ronny', 'laki-laki', 'XI', 'Bogor', 2),
(29, 92392, 'Test', 'Perempuan', 'XI', 'test', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `id_mapel` (`id_mapel`),
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

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
  ADD UNIQUE KEY `id_prodi` (`id_prodi`),
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
  ADD UNIQUE KEY `id_prodi` (`id_prodi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guru_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
