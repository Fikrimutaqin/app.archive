-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2021 pada 04.02
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `no_dok` int(11) NOT NULL,
  `jenis_dok` varchar(128) NOT NULL,
  `lokasi` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(128) NOT NULL,
  `type_file` varchar(128) NOT NULL,
  `ukuran_file` int(11) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `akses` int(11) NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`no_dok`, `jenis_dok`, `lokasi`, `nama`, `deskripsi`, `file`, `type_file`, `ukuran_file`, `tahun_ajaran`, `tanggal_upload`, `akses`, `author`) VALUES
(62, 'Silabus', 'data/Silabus/2021-2022', 'Silabus Kelas 12 RPL', 'Materi Silabus untuk kelas 12 RPL', '2.jpg', 'image/jpeg', 221681, '2021/2022', '2021-10-10', 1, 'mutaqin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `no_dok` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `download_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `no_dok`, `username`, `total`, `download_time`) VALUES
(7, 50, 'fikri@gmail.com', 1, '2021-08-28 19:11:34'),
(8, 38, 'fikri@gmail.com', 1, '2021-08-28 19:12:58'),
(9, 54, 'kepsek@gmail.com', 1, '2021-09-02 17:11:58'),
(10, 55, 'kepsek@gmail.com', 1, '2021-09-02 17:12:00'),
(11, 61, 'fikri@gmail.com', 1, '2021-10-06 09:44:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `author` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `name`, `description`, `status`, `date_created`, `author`) VALUES
(10, 'Silabus', 'Silabus', 1, '2021-08-28 11:16:28', 'Fikri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `cd_storage` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `author` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `thumbnail` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `log_activity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`users_id`, `first_name`, `last_name`, `email`, `password`, `thumbnail`, `role_id`, `is_active`, `create_date`, `log_activity`) VALUES
(4, 'Fikri Al Ganteng', 'Mutaqin', 'fikri@gmail.com', '4e6eab89750ab9dcc8d1b31ffbe2806b', '2.jpg', 1, 1, '2021-09-02 20:39:20', '2021-09-02 18:27:41'),
(17, 'Fikriv.2', 'Mutaqin', 'mutaqin@gmail.com', '19da9ebef1ca88a6cb3ffcb997054199', 'default.jpg', 6, 1, '2021-10-06 09:45:24', '0000-00-00 00:00:00'),
(18, 'fikriv.3', 'mutaqin', 'mutaqinfikri@gmail.com', '19da9ebef1ca88a6cb3ffcb997054199', 'default.jpg', 2, 1, '2021-10-06 09:53:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `users` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`role_id`, `users`) VALUES
(1, 'super admin'),
(2, 'admin'),
(6, 'guru'),
(7, 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`no_dok`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cd_storage` (`cd_storage`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `no_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
