-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2022 pada 12.30
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_enkripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_files`
--

CREATE TABLE `tb_files` (
  `id_file` int(11) NOT NULL,
  `file` text DEFAULT NULL,
  `size` varchar(99) NOT NULL,
  `tipe_file` text NOT NULL,
  `waktu_enkripsi` varchar(999) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `kunci` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_files`
--

INSERT INTO `tb_files` (`id_file`, `file`, `size`, `tipe_file`, `waktu_enkripsi`, `status`, `kunci`) VALUES
(70, '838956_yuhuuuuuu.docx', '11.24', 'docx', '13.137718041738', 0, 'r4u7x!A%D*G-KaPd'),
(71, '838956_yuhuuuuuu.docx', '11.25', 'docx', '12.321849664052', 1, 'r4u7x!A%D*G-KaPd'),
(72, '649165_akun-pegawai-eabsensi-dprd-sulsel.pdf', '390.81', 'pdf', '12.698018550873', 0, 'mZq4t7w!z%C*F-Ja'),
(73, '649165_akun-pegawai-eabsensi-dprd-sulsel.pdf', '390.81', 'pdf', '13.087483247121', 1, 'mZq4t7w!z%C*F-Ja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'fhikar', '12345678', 'user'),
(2, 'via', '12345678', 'user'),
(5, 'cindy', 'cindy', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_files`
--
ALTER TABLE `tb_files`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_files`
--
ALTER TABLE `tb_files`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
