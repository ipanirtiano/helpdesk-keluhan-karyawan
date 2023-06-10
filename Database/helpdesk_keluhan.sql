-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 05:29 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_keluhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_dept` varchar(10) NOT NULL,
  `nama_departemen` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `kode_dept`, `nama_departemen`, `created_at`, `updated_at`) VALUES
(2, 'Dept-13425', 'IT CENTER', '2021-06-04 09:31:46', '2021-06-04 09:32:04'),
(4, 'Dept-16902', 'PERSONALIA', '2021-06-04 10:02:38', '2021-06-04 10:02:38'),
(5, 'Dept-27923', 'AUDIT DEPARTEMEN', '2021-06-04 10:05:27', '2021-06-04 10:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_guest` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `kode_guest`, `nama_lengkap`, `email`, `phone`, `departemen`, `created_at`, `updated_at`) VALUES
(1, 'USR-037348', 'Ratna Zahra Puspita S.Ked', 'ipanirtiano@gmail.com', '098765432222', 'AUDIT DEPARTEMEN', '2021-06-02 21:45:38', '2021-06-04 09:33:18'),
(2, 'USR-023357', 'Ipan Irtiano', 'ipan@gmail.com', '098765432113', 'IT CENTER', '2021-06-04 09:32:35', '2021-06-04 09:32:35'),
(3, 'USR-259589', 'Dede Amelia', 'dede@gmail.com', '0985632666', 'AUDIT DEPARTEMEN', '2021-06-04 10:02:30', '2021-06-04 10:02:30'),
(4, 'USR-179017', 'Agusta', 'agus@gmail.com', '987466377478', 'IT CENTER', '2021-06-04 10:07:12', '2021-06-04 10:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_keluhan` varchar(20) NOT NULL,
  `tanggal_create` varchar(20) NOT NULL,
  `tanggal_update` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `detail_keluhan` varchar(255) NOT NULL,
  `created` varchar(10) NOT NULL,
  `progres` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `kode_keluhan`, `tanggal_create`, `tanggal_update`, `subject`, `detail_keluhan`, `created`, `progres`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'ID-238569-789', '06-06-2021', '08-06-2021', 'Jalan Rusak', '  Jalan                                         ', 'USR-037348', '100', 'Selesai', '1623148715_a3d106ba165653845656.jpeg', '2021-06-06 22:40:08', '2021-06-08 17:42:54'),
(6, 'ID-018234-018', '08-06-2021', '25-07-2021', 'Kaca Rusak', 'Kaca disebelah ruangan saya pecah                                        ', 'USR-037348', '40', 'Sedang Proses', '1623149028_0fd45fc732ddaebb5ed3.png', '2021-06-08 17:39:44', '2021-07-25 20:37:40'),
(7, 'ID-178358-127', '08-06-2021', '25-07-2021', 'baba', 'baba                                            ', 'USR-023357', '100', 'Selesai', '1623151872_3d71ba0b0d451d3ed967.png', '2021-06-08 18:31:12', '2021-07-25 20:47:19'),
(8, 'ID-039479-246', '08-06-2021', '25-07-2021', 'oppo', 'opp                                            ', 'USR-023357', '80', 'Sedang Proses', '1623152022_78a8dbd70282b927b391.png', '2021-06-08 18:33:42', '2021-07-25 20:37:14'),
(9, 'ID-023125-389', '25-07-2021', '25-07-2021', 'Jalan Rusak', '    s                            ', 'USR-037348', '0', 'Approved', '1627220863_856f1388120277440541.png', '2021-07-25 20:47:43', '2021-07-25 20:47:48'),
(10, 'ID-468246-012', '25-07-2021', 'Not Updated!', 'Kaca Rusak', '  d                                          ', 'USR-179017', '0', 'Pengajuan', '1627221684_6292d076ad2fee0b4ada.png', '2021-07-25 21:01:24', '2021-07-25 21:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-06-03-022924', 'App\\Database\\Migrations\\User', 'default', 'App', 1622687410, 1),
(2, '2021-06-03-024504', 'App\\Database\\Migrations\\Guest', 'default', 'App', 1622688324, 2),
(3, '2021-06-04-141917', 'App\\Database\\Migrations\\Departemen', 'default', 'App', 1622816384, 3),
(4, '2021-06-05-160644', 'App\\Database\\Migrations\\Keluhan', 'default', 'App', 1622909383, 4),
(5, '2021-07-25-134026', 'App\\Database\\Migrations\\Saran', 'default', 'App', 1627220465, 5);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_saran` varchar(20) NOT NULL,
  `tanggal_create` varchar(20) NOT NULL,
  `tanggal_update` varchar(20) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `detail_saran` varchar(255) NOT NULL,
  `created` varchar(10) NOT NULL,
  `progres` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `kode_saran`, `tanggal_create`, `tanggal_update`, `subject`, `detail_saran`, `created`, `progres`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'ID-127267-039', '25-07-2021', '25-07-2021', 'd', ' d                                           ', 'USR-037348', '100', 'Selesai', '1627221361_8094f342e1db9cea44e4.png', '2021-07-25 20:56:01', '2021-07-25 21:13:07'),
(3, 'ID-147039-678', '25-07-2021', 'Not Updated!', 'd', 'x                                            ', 'USR-023357', '0', 'Pengajuan', '1627222757_de938be035552e912375.png', '2021-07-25 21:19:17', '2021-07-25 21:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_users` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_users`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'USR-037348', 'ipanirtiano@gmail.com', '$2y$10$QEkZZv.YBW/Brp9nW0JbOuQTO.LTTmRm1YCjGjx.78AbJpZ0qnC0q', 'admin', '2021-06-02 21:45:39', '2021-07-25 08:36:00'),
(2, 'USR-023357', 'ipan@gmail.com', '$2y$10$tG.bv/w32VAfOFN8jymtmeXEK/ySltyLvExaBb6yICNFy1O88fChu', 'karyawan', '2021-06-04 09:32:35', '2021-06-04 09:32:35'),
(3, 'USR-259589', 'dede@gmail.com', '$2y$10$bX/nRU3zWLqGAJCxKLlCeOhldM2vyLo7gPvskErx6V7a8VFVWDrtG', 'karyawan', '2021-06-04 10:02:30', '2021-06-04 10:02:30'),
(4, 'USR-179017', 'agus@gmail.com', '$2y$10$jaxX97xE3B1Jj7aHW03b7ufhFNWOz5QpRl1iSHjmfXuim7y.jK0YW', 'admin', '2021-06-04 10:07:13', '2021-06-04 10:07:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
