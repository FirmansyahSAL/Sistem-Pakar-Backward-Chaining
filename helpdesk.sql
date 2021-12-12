-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 11:36 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tiket`
--

CREATE TABLE `detail_tiket` (
  `id_detail` int(11) NOT NULL,
  `tiket_id` int(11) DEFAULT NULL,
  `tanggapan` text NOT NULL,
  `gambar_tanggapan` text NOT NULL,
  `waktu_tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_tiket`
--

INSERT INTO `detail_tiket` (`id_detail`, `tiket_id`, `tanggapan`, `gambar_tanggapan`, `waktu_tanggapan`) VALUES
(10, 135, 'seringai', '20210827010846.png', '2021-08-27'),
(11, 0, 'baik petugas kami akan ke sana secepat nya', '', '2021-08-27'),
(12, 137, 'petugas segera datang kesana untuk menangani nya', '20210827015103.jpg', '2021-08-27'),
(13, 138, 'petugas akan datang kesana untuk mengganti dengan kabel baru', '20210827092455.jpg', '2021-08-27'),
(14, 139, 'petugas akan segera datang ke situ', '20210827092841.jpg', '2021-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'Desain'),
(2, 'Tehknologi Informasi'),
(4, 'Supply Chain'),
(5, 'Kapal Perang'),
(6, 'Kapal Niaga'),
(7, 'Kapal Selam'),
(8, 'Pemasaran & Penjualan Bangkap'),
(9, 'rekayasa umum'),
(13, 'Kawasan '),
(14, 'HCM & Command Media'),
(15, 'Perbendaharaan'),
(16, 'Jaminan Kualitas'),
(17, 'Penjualan Rekumhar'),
(18, 'Pemeliharaan & Perbaikan'),
(19, 'akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(10) NOT NULL,
  `nama_gejala` text NOT NULL,
  `poin_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `nama_gejala`, `poin_gejala`) VALUES
('G001', 'CPU dan monitor mati', 10),
('G002', 'CPU hidup , Monitor Mati ,Tidak ada beep', 10),
('G003', 'Kipas Power Supply tidak berputar', 10),
('G004', 'Kipas Power Suplly berisik', 10),
('G005', 'PC kadang nyala kadang tidak', 10),
('G006', 'Power supply berfungsi tetapi motherboard tidak berfungsi', 10),
('G007', 'komputer mati saat di nyalakan beberapa saat', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Manager'),
(2, 'IT Staff'),
(29, 'QA');

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `kd_pengetahuan` varchar(10) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_gejala` varchar(10) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`kd_pengetahuan`, `kd_penyakit`, `kd_gejala`, `pertanyaan`) VALUES
('PG001', 'P002', 'G002', 'Apakah mengalami Apakah mengalami liverpool ? ?'),
('PG002', 'P001', 'G001', 'Apakah mengalami liverpool ?'),
('PG003', 'P001', 'G002', 'Apakah mengalami letih dan lesu ?'),
('PG004', 'P001', 'G003', 'Apakah mengalami Kehilangan selera makan ?'),
('PG005', 'P004', 'G001', 'Apakah mengalami CPU dan monitor mati ?');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `penyebab` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nama_penyakit`, `penyebab`, `solusi`) VALUES
('P001', 'influenza', 'Menghirup udara yang sudah tercemar virus dari orang lain yang terinfeksi (misalnya melalui batuk atau bersin), atau dari menyentuh sesuatu yang sudah disentuh orang yang terinfeksi', 'Minum obat pereda nyeri NSAID seperti paracetamol dan ibuprofen, hingga obat batuk pilek, atau dekongestan. Menghirup uap hangat dapat melegakan hidung yang tersumbat dan membantu mengencerkan sekret hidung (ingus). Mandi air hangat, Menghirup uap hangat, Berkumur dengan air garam hangat, Perbanyak cairan dalam tubuh, Istirahat yang cukup, Konsumsi obat penghilang rasa sakit.'),
('P002', 'Bronkitis', 'Disebabkan oleh infeksi paru-paru yang pada banyak kasus penyebabnya adalah virus. Iritasi dan peradangan menyebabkan bronkus menghasilkan lendir lebih banyak. Bronkus merupakan saluran udara dalam sistem pernapasan yang bertugas membawa udara dari dan ke paru-paru.', 'Istirahat yang cukup, Minum air putih yang banyak, Makan buah nanas dan minum teh jahe, Minum campuran madu dan lemon, Menghirup uap hangat, Berkumur dengan air garam, Makan sup ayam hangat.'),
('P003', 'Sinusitis', 'Disebabkan oleh pembengkakan dinding dalam hidung akibat virus atau reaksi alergi yang masuk dari saluran pernapasan atas. Virus tersebut memicu sinus untuk menghasilkan lendir lebih banyak, sehingga terjadi penumpukan dan penyumbatan pada saluran hidung', 'Menghirup uap, Membersihkan saluran hidung, Kompres air hangat, Tidur dengan kepala diangkat, Meminum obat dekongestan tablet, Memakai semprotan dekongestan'),
('P004', 'power supply', 'daya terlalu tinggi', 'ganti dengan daya yang sesuai');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `no_tiket` text NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `judul_tiket` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_tiket` text,
  `users_id` int(10) NOT NULL,
  `status_tiket` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `no_tiket`, `tgl_daftar`, `judul_tiket`, `deskripsi`, `gambar_tiket`, `users_id`, `status_tiket`) VALUES
(133, '2608210001', '2021-08-26 16:26:40', 'kabel pc', 'perlu diganti', NULL, 52, 3),
(134, '2708210001', '2021-08-26 17:47:18', 'oke nih', 'siap bos', NULL, 47, 3),
(135, '2708210002', '2021-08-26 18:06:08', 'sick', 'uefa campions league', '270821000220210827010608.png', 47, 3),
(137, '2708210003', '2021-08-26 18:48:37', 'kerusakan pada bluetoth', 'mungkin lem biru', '270821000320210827014836.jpg', 55, 3),
(138, '2708210004', '2021-08-27 02:23:44', 'kabel hdmi putus', 'minta di ganti dengan kabel baru', '270821000420210827092343.jpg', 47, 3),
(139, '2708210005', '2021-08-27 02:26:51', 'monitor tidak berfungsi', 'kemungkinan ada masalah di cable', '270821000520210827092651.jpg', 55, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_hasil`
--

CREATE TABLE `tmp_hasil` (
  `id` int(10) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_gejala` varchar(10) NOT NULL,
  `poin_gejala` double NOT NULL,
  `poin_user` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_hasil`
--

INSERT INTO `tmp_hasil` (`id`, `kd_penyakit`, `kd_gejala`, `poin_gejala`, `poin_user`) VALUES
(15, 'P004', 'G001', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_relasi`
--

CREATE TABLE `tmp_relasi` (
  `id` int(11) NOT NULL,
  `kd_penyakit` varchar(10) NOT NULL,
  `kd_gejala` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_relasi`
--

INSERT INTO `tmp_relasi` (`id`, `kd_penyakit`, `kd_gejala`) VALUES
(398, 'P004', 'G001');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jabatan_id` varchar(50) NOT NULL,
  `divisi_id` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_user` text NOT NULL,
  `level_user` int(2) NOT NULL,
  `status_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nik`, `username`, `email`, `password`, `jabatan_id`, `divisi_id`, `created`, `modified`, `image_user`, `level_user`, `status_user`) VALUES
(43, '1010', 'firmansyah', 'fs@gmail.com', '$2y$10$NF4AYoS6WdU6JtSf4/OTHuwWVGpm1N3nvpb6SA0WWtX4vJ1wtc7Ia', '1', '18', '2021-05-30 05:01:18', '2021-06-06 08:03:45', '2.jpg', 2, 1),
(47, '111111111111', 'staff', 'staff@gmail.com', '$2y$10$GhCf8sjqATx1VR9.Fe/dReJ8hwiZEL8LINyuyMKwnE8CNngfMYyiK', '2', '14', '2021-06-07 11:11:36', '2021-08-26 16:04:21', 'Entity_Relationship_Diagram1.jpg', 2, 1),
(52, '27051996', 'ilmuwan', 'smk@gmail.com', '$2y$10$GhCf8sjqATx1VR9.Fe/dReJ8hwiZEL8LINyuyMKwnE8CNngfMYyiK', '2', '18', '2021-07-01 04:21:20', '2021-07-17 03:52:14', '20210701112119.jpg', 1, 1),
(55, '3506176306720001', 'joko', 'joko@gmail.com', '$2y$10$mfbzLwSmZp4UzeVfZkGH6OKM4RQ9ai6FsQRU6YuCbA3eGAJ7yHn0K', '', '', '2021-08-26 18:46:18', '2021-08-26 18:47:37', 'IMG_20210423_105328_2599.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tiket`
--
ALTER TABLE `detail_tiket`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`kd_pengetahuan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `user_id` (`users_id`);

--
-- Indexes for table `tmp_hasil`
--
ALTER TABLE `tmp_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_relasi`
--
ALTER TABLE `tmp_relasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tiket`
--
ALTER TABLE `detail_tiket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tmp_hasil`
--
ALTER TABLE `tmp_hasil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tmp_relasi`
--
ALTER TABLE `tmp_relasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
