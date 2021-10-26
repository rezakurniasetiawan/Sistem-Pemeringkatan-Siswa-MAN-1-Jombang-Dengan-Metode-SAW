-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2021 pada 14.53
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peringkatan_mansajoe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `B_UAS` double NOT NULL,
  `B_UTS` double NOT NULL,
  `B_nilairapot` double NOT NULL,
  `B_tesmasuk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bobot`
--

INSERT INTO `tb_bobot` (`B_UAS`, `B_UTS`, `B_nilairapot`, `B_tesmasuk`) VALUES
(0.3, 0.2, 0.2, 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `NIS` varchar(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `UAS` int(11) NOT NULL,
  `UTS` int(11) NOT NULL,
  `nilairapot` int(11) NOT NULL,
  `nilaitesmasuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`NIS`, `nama`, `UAS`, `UTS`, `nilairapot`, `nilaitesmasuk`) VALUES
('M001', 'Reza Kurnia Setiawan', 80, 95, 90, 80),
('M002', 'Ridho Alfiyas', 80, 75, 90, 85),
('M003', 'Indriana', 90, 95, 90, 98),
('M004', 'Ilham Fathkur Rohman', 80, 87, 90, 75),
('M005', 'Kharismamaharani', 90, 85, 85, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `NIS` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tgllahir` date NOT NULL,
  `asalsekolah` varchar(35) NOT NULL,
  `notelp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`NIS`, `nama`, `tgllahir`, `asalsekolah`, `notelp`) VALUES
('M001', 'Reza Kurnia Setiawan', '2000-11-14', 'Man 1 Jombang', '085850728067'),
('M002', 'Ridho Alfiyas', '2001-10-20', 'Man 1 Jombang', '085458728067'),
('M003', 'Indriana', '2000-11-13', 'Man 1 Jombang', '085850478067'),
('M004', 'Ilham Fathkur Rohman', '2001-02-10', 'Man 1 Jombang', '085850458067'),
('M005', 'Kharismamaharani', '2000-10-01', 'Man 1 Jombang', '081234072806');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hakakses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `username`, `password`, `hakakses`) VALUES
(1, 'Reza Kurnia Setiawan', 'rezakurniasetiawan@gmail.com', 'rezakurniasetiawan', '$2y$10$qQs/41SM12aOh6rLTjGsRORS2TEwonF1OTKk/ENDLczILXrGifO3K', 'admin'),
(2, 'indriana', 'indriana@gmail.com', 'indriana', '$2y$10$qQs/41SM12aOh6rLTjGsRORS2TEwonF1OTKk/ENDLczILXrGifO3K', 'murid');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`NIS`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`NIS`) REFERENCES `tb_siswa` (`NIS`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
