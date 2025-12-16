-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 03 Agu 2024 pada 19.42
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db15`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
(1, 'X MM', 'MULTIMEDIA'),
(2, 'X IPS', 'ILMU PENGETAHUAN SOSIAL'),
(3, 'XI IPA', 'ILMU PENGETAHUAN ALAM'),
(4, 'XI IPS', 'ILMU PENGETAHUAN SOSIAL'),
(5, 'XII IPS', 'ILMU PENGETAHUAN SOSIAL'),
(6, 'XII IPA', 'ILMU PENGETAHUAN ALAM'),
(8, 'X AP', 'ADMINISTRASI PERKANTORAN');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `kelas_spp`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `kelas_spp` (
`nama_kelas` varchar(10)
,`jumlah_bayar` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(35) CHARACTER SET utf8 NOT NULL,
  `bulan` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_spp` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nisn`, `nis`, `nama`, `bulan`, `tgl_bayar`, `id_spp`, `jumlah_bayar`) VALUES
(13, '19210693', '0693', 'Annisa Nurul Putri', 'JULI', '2023-07-10', 0, 500000),
(14, '19210642', '0642', 'Aisha Salma Huwaida', 'JUNI', '2023-06-10', 0, 500000),
(15, '19211054', '1054', 'Kania Dwi Komara', 'JUNI', '2023-06-22', 0, 500000),
(17, '19210987', '0987', 'Azhka Putra Pratama', 'JULI', '2024-07-02', 0, 600000),
(18, '19210853', '0853', 'Ahmad Ramzy', 'JULI', '2024-07-03', 0, 600000),
(19, '19211054', '1054', 'Kania Dwi Komara', 'JULI', '2024-07-04', 0, 600000),
(20, '19210798', '0798', 'Najwa Kayla', 'JULI', '2024-07-03', 0, 600000),
(21, '19213453', '3453', 'Azhka Putra Pratama', 'JULI', '2024-07-05', 0, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_pengguna` varchar(35) NOT NULL,
  `level` enum('petugas','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_pengguna`, `level`) VALUES
(1, 'Aisha', 'petugas1', 'Aisha Salma Huwaida', 'petugas'),
(3, 'Azhka', 'siswa_azhka', 'Azhka Putra Pratama', 'siswa'),
(4, 'Fahdiya', 'petugas2', 'Fahdiya Ayu', 'petugas'),
(5, 'Annisa', 'siswa_annisa', 'Annisa Nurul Putri', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(4) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nama_kelas` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nis`, `nama`, `nama_kelas`, `alamat`, `no_telp`) VALUES
(2, '19216543', '6543', 'Kania Dwi Komara', 'XII IPA', 'Rusun Petamburan', '085765342154'),
(3, '19213453', '3453', 'Azhka Putra Pratama', 'X IPA', 'Rusun Bendhil', '087856342312');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id_spp`, `kelas`, `jumlah_bayar`) VALUES
(2, 'XI IPA', 550000),
(3, 'XII', 450000),
(4, 'X IPA', 600000),
(5, 'X IPS', 500000),
(6, 'XI IPS', 550000);

--
-- Trigger `spp`
--
DELIMITER $$
CREATE TRIGGER `log_spp_update` AFTER UPDATE ON `spp` FOR EACH ROW BEGIN
    INSERT INTO spp_log (id_spp, kelas, jumlah_bayar, operation)
    VALUES (NEW.id_spp, NEW.kelas, NEW.jumlah_bayar, 'UPDATE');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp_log`
--

CREATE TABLE `spp_log` (
  `log_id` int(11) NOT NULL,
  `id_spp` int(11) DEFAULT NULL,
  `kelas` varchar(35) DEFAULT NULL,
  `jumlah_bayar` varchar(10) DEFAULT NULL,
  `changed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `operation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `spp_log`
--

INSERT INTO `spp_log` (`log_id`, `id_spp`, `kelas`, `jumlah_bayar`, `changed_at`, `operation`) VALUES
(1, 4, 'X IPA', '600000', '2024-07-28 09:38:22', 'UPDATE'),
(2, 5, 'Kelas 11', '750000', '2024-07-28 10:05:30', 'UPDATE'),
(6, 5, '[kelas 11]', '700000', '2024-07-28 10:15:42', 'UPDATE'),
(7, 5, 'kelas 11', '700000', '2024-07-28 10:17:10', 'UPDATE'),
(9, 5, 'X OTKP', '450000', '2024-08-03 14:15:49', 'UPDATE'),
(10, 5, 'X OTKP', '500000', '2024-08-03 14:18:00', 'UPDATE'),
(11, 5, 'X IPS', '500000', '2024-08-03 14:18:00', 'UPDATE'),
(12, 2, 'XI', '550000', '2024-08-03 14:18:15', 'UPDATE'),
(13, 2, 'XI IPA', '550000', '2024-08-03 14:18:15', 'UPDATE');

-- --------------------------------------------------------

--
-- Struktur untuk view `kelas_spp`
--
DROP TABLE IF EXISTS `kelas_spp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelas_spp`  AS SELECT `kelas`.`nama_kelas` AS `nama_kelas`, `spp`.`jumlah_bayar` AS `jumlah_bayar` FROM (`kelas` join `spp` on(`kelas`.`id_kelas` = `spp`.`id_spp`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indeks untuk tabel `spp_log`
--
ALTER TABLE `spp_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `spp_log`
--
ALTER TABLE `spp_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
