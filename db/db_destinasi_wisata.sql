-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 09:17 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_destinasi_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_destinasi`
--

CREATE TABLE `tb_destinasi` (
  `id_destinasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `judul` text NOT NULL,
  `konten` longtext NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `url_google_maps` text NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `jml_komen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_destinasi`
--

INSERT INTO `tb_destinasi` (`id_destinasi`, `id_kategori`, `author`, `datetime`, `judul`, `konten`, `alamat`, `url_google_maps`, `gambar`, `status`, `jml_komen`) VALUES
(8, 2, 'Muhamad Ramadhan', '2022-02-15 23:43:28', 'HUTAN LINDUNG SUNGAI WAIN (HLSW)', '<p>Kawasan HLSW selalu dikembangkan dari tahun ke tahun. Sejak tahun 1934, HLSW secara langsung dipelihara oleh Sultan Kutai. Pada tahun 1947, kawasan ini mulai dimanfaatkan sebagai penampungan air bersih. Pada tahun 1992 dan 1996, HSLW dikembangkan untuk merehabilitasi 80 orang utan hasil tangkapan Borneo Orang Utan Survival Foundations (BOSF). sejak saat itu pula HLSW di fungsinkan sebagai pusat laboratorium flora dan fauna di Balikpapan. Di samping itu, HLSW juga berfungsi sebagai pusat pendidikan lingkungan.</p><br />\r\n<br />\r\n<p>Fasilitas :</p><br />\r\n<br />\r\n<p>1. Pusat penelitian Tumbuhan dan Hewan.<br><br />\r\n2. Tracking bridge (Jembatan trek).<br><br />\r\n3. Beberapa Pos peristirahatan Menara Pengintai (watch tower).<br><br />\r\n4. Perahu Rumah \"Beruang Madu\".<br><br />\r\n5. Rumah \"Enggang\".</p><br />\r\n<br />\r\n<p>Operasional : Senin - Minggu, Pukul 06.00 - 18.00.</p><br />\r\n<br />\r\n<p>HTM : Rp. 15.000</p>', 'JL. SOEKARNO HATTA KM 15 KEL. KARANG JOANG BALIKPAPAN UTARA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0215164523706!2d116.83754031475375!3d-1.1451015991647413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x32b3339c89387b9a!2zMcKwMDgnNDIuNCJTIDExNsKwNTAnMjMuMCJF!5e0!3m2!1sid!2sid!4v1644944753292!5m2!1sid!2sid', '2019-09-04.jpg', 'publish', 4),
(9, 2, 'Muhamad Ramadhan', '2022-03-02 23:23:48', 'tes', '<p>tes</p>', 'tes', 'tes', '2019-09-041.jpg', 'publish', 0),
(10, 2, 'Muhamad Ramadhan', '2022-02-15 23:43:28', 'HUTAN LINDUNG SUNGAI WAIN (HLSW)', '<p>Kawasan HLSW selalu dikembangkan dari tahun ke tahun. Sejak tahun 1934, HLSW secara langsung dipelihara oleh Sultan Kutai. Pada tahun 1947, kawasan ini mulai dimanfaatkan sebagai penampungan air bersih. Pada tahun 1992 dan 1996, HSLW dikembangkan untuk merehabilitasi 80 orang utan hasil tangkapan Borneo Orang Utan Survival Foundations (BOSF). sejak saat itu pula HLSW di fungsinkan sebagai pusat laboratorium flora dan fauna di Balikpapan. Di samping itu, HLSW juga berfungsi sebagai pusat pendidikan lingkungan.</p><br />\r\n<br />\r\n<p>Fasilitas :</p><br />\r\n<br />\r\n<p>1. Pusat penelitian Tumbuhan dan Hewan.<br><br />\r\n2. Tracking bridge (Jembatan trek).<br><br />\r\n3. Beberapa Pos peristirahatan Menara Pengintai (watch tower).<br><br />\r\n4. Perahu Rumah \"Beruang Madu\".<br><br />\r\n5. Rumah \"Enggang\".</p><br />\r\n<br />\r\n<p>Operasional : Senin - Minggu, Pukul 06.00 - 18.00.</p><br />\r\n<br />\r\n<p>HTM : Rp. 15.000</p>', 'JL. SOEKARNO HATTA KM 15 KEL. KARANG JOANG BALIKPAPAN UTARA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0215164523706!2d116.83754031475375!3d-1.1451015991647413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x32b3339c89387b9a!2zMcKwMDgnNDIuNCJTIDExNsKwNTAnMjMuMCJF!5e0!3m2!1sid!2sid!4v1644944753292!5m2!1sid!2sid', '2019-09-04.jpg', 'publish', 0),
(11, 2, 'Muhamad Ramadhan', '2022-02-15 23:43:28', 'HUTAN LINDUNG SUNGAI WAIN (HLSW)', '<p>Kawasan HLSW selalu dikembangkan dari tahun ke tahun. Sejak tahun 1934, HLSW secara langsung dipelihara oleh Sultan Kutai. Pada tahun 1947, kawasan ini mulai dimanfaatkan sebagai penampungan air bersih. Pada tahun 1992 dan 1996, HSLW dikembangkan untuk merehabilitasi 80 orang utan hasil tangkapan Borneo Orang Utan Survival Foundations (BOSF). sejak saat itu pula HLSW di fungsinkan sebagai pusat laboratorium flora dan fauna di Balikpapan. Di samping itu, HLSW juga berfungsi sebagai pusat pendidikan lingkungan.</p><br />\r\n<br />\r\n<p>Fasilitas :</p><br />\r\n<br />\r\n<p>1. Pusat penelitian Tumbuhan dan Hewan.<br><br />\r\n2. Tracking bridge (Jembatan trek).<br><br />\r\n3. Beberapa Pos peristirahatan Menara Pengintai (watch tower).<br><br />\r\n4. Perahu Rumah \"Beruang Madu\".<br><br />\r\n5. Rumah \"Enggang\".</p><br />\r\n<br />\r\n<p>Operasional : Senin - Minggu, Pukul 06.00 - 18.00.</p><br />\r\n<br />\r\n<p>HTM : Rp. 15.000</p>', 'JL. SOEKARNO HATTA KM 15 KEL. KARANG JOANG BALIKPAPAN UTARA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0215164523706!2d116.83754031475375!3d-1.1451015991647413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x32b3339c89387b9a!2zMcKwMDgnNDIuNCJTIDExNsKwNTAnMjMuMCJF!5e0!3m2!1sid!2sid!4v1644944753292!5m2!1sid!2sid', '2019-09-04.jpg', 'publish', 0),
(12, 2, 'Muhamad Ramadhan', '2022-03-02 23:23:48', 'tes', '<p>tes</p>', 'tes', 'tes', '2019-09-041.jpg', 'publish', 0),
(13, 2, 'Muhamad Ramadhan', '2022-02-15 23:43:28', 'HUTAN LINDUNG SUNGAI WAIN (HLSW)', '<p>Kawasan HLSW selalu dikembangkan dari tahun ke tahun. Sejak tahun 1934, HLSW secara langsung dipelihara oleh Sultan Kutai. Pada tahun 1947, kawasan ini mulai dimanfaatkan sebagai penampungan air bersih. Pada tahun 1992 dan 1996, HSLW dikembangkan untuk merehabilitasi 80 orang utan hasil tangkapan Borneo Orang Utan Survival Foundations (BOSF). sejak saat itu pula HLSW di fungsinkan sebagai pusat laboratorium flora dan fauna di Balikpapan. Di samping itu, HLSW juga berfungsi sebagai pusat pendidikan lingkungan.</p><br />\r\n<br />\r\n<p>Fasilitas :</p><br />\r\n<br />\r\n<p>1. Pusat penelitian Tumbuhan dan Hewan.<br><br />\r\n2. Tracking bridge (Jembatan trek).<br><br />\r\n3. Beberapa Pos peristirahatan Menara Pengintai (watch tower).<br><br />\r\n4. Perahu Rumah \"Beruang Madu\".<br><br />\r\n5. Rumah \"Enggang\".</p><br />\r\n<br />\r\n<p>Operasional : Senin - Minggu, Pukul 06.00 - 18.00.</p><br />\r\n<br />\r\n<p>HTM : Rp. 15.000</p>', 'JL. SOEKARNO HATTA KM 15 KEL. KARANG JOANG BALIKPAPAN UTARA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0215164523706!2d116.83754031475375!3d-1.1451015991647413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0:0x32b3339c89387b9a!2zMcKwMDgnNDIuNCJTIDExNsKwNTAnMjMuMCJF!5e0!3m2!1sid!2sid!4v1644944753292!5m2!1sid!2sid', '2019-09-04.jpg', 'publish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `deskripsi`, `datetime`) VALUES
(2, 'Wisata Alam', 'Wisata Alam', '2022-02-15 23:11:29'),
(3, 'Wisata Buatan', 'Wisata Buatan', '2022-02-15 23:31:23'),
(4, 'Wisata Religi', 'Wisata Religi', '2022-02-15 23:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_destinasi` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) DEFAULT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_destinasi`, `datetime`, `nama`, `email`, `website`, `komentar`, `rating`) VALUES
(1, 8, '2022-03-03 23:34:51', 'rama', 'rama@gmail.com', NULL, 'tes', 4),
(2, 8, '2022-03-03 23:37:33', 'rama', 'rama@gmail.com', NULL, 'tes lagi', 5),
(3, 8, '2022-03-03 23:41:21', 'rama', 'ram@s.c', NULL, 'tes', 1),
(4, 8, '2022-03-04 00:18:34', 'tes lagi', 'te@gmail.c', NULL, 'tes', 4),
(5, 13, '2022-03-08 16:01:44', 'rama', 'rama@gmail.com', NULL, 'tes', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Muhamad Ramadhan', 'admin', '$2y$10$zBE.5Z8qc33ikcP79fqJHetnWIXEFMLNG7ihywrFXTMkStgaX6Flq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_destinasi`
--
ALTER TABLE `tb_destinasi`
  MODIFY `id_destinasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
