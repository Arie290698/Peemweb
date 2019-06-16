-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2019 at 10:33 AM
-- Server version: 5.7.26-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reidesuc_uap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(2048) NOT NULL DEFAULT './gambar/user.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `pass`, `nama`, `email`, `foto`) VALUES
(1, 'admin', 'admin', 'Admin Ajah', 'phantomsensei90@gmail.com', './gambar/admin'),
(2, 'Arie', 'Arie', 'Arie', 'Arie', './gambar/user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `chat` varchar(512) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `nama`, `chat`, `waktu`) VALUES
(1, 'Arie', 'Wasu', '2019-06-08 06:57:12'),
(2, 'Xian', 'Tolo', '2019-06-08 07:01:18'),
(3, 'Aku', 'Jawaban no 1 apaan cuy', '2019-06-09 11:52:31'),
(4, 'admin [Admin]', 'Masih saya pantau, bentar lagi saja tendang palanya satu persatu!1!1!', '2019-06-09 17:34:09'),
(5, 'Aku', 'alah bacot kamu nak', '2019-06-11 02:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `user` varchar(80) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `que_des` varchar(200) DEFAULT NULL,
  `ans1` varchar(50) DEFAULT NULL,
  `ans2` varchar(50) DEFAULT NULL,
  `ans3` varchar(50) DEFAULT NULL,
  `ans4` varchar(50) DEFAULT NULL,
  `true_ans` int(11) DEFAULT NULL,
  `your_ans` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`user`, `test_id`, `que_des`, `ans1`, `ans2`, `ans3`, `ans4`, `true_ans`, `your_ans`) VALUES
('Arie', 12, 'Ya', 'yes', 'y', 'ok', 'ya', 1, 1),
('Arie', 12, 'Bahasa Inggrisnya saya', 'I', 'Me', 'Saya', 'Aku', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pesan` varchar(2048) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `pesan`) VALUES
(1, 'Arie Cahyadi', 'phantomsensei90@gmail.com', 'Coba sih aku ngirim pesan buat kamu');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `user` varchar(20) DEFAULT NULL,
  `test_id` int(5) DEFAULT NULL,
  `score` int(3) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`user`, `test_id`, `score`) VALUES
('raj', 12, 0),
('raj', 12, 0),
('raj', 12, 0),
('raj', 12, 2),
('raj', 12, 0),
('raj', 12, 1),
('raj', 12, 2),
('raj', 12, 1),
('raj', 12, 2),
('raj', 12, 2),
('raj', 12, 2),
('raj', 12, 2),
('raj', 12, 2),
('raj', 12, 2),
('q', 12, 0),
('raj', 12, 2),
('raj', 12, 1),
('raj', 12, 1),
('raj', 12, 2),
('Arie', 12, 2),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 2),
('Arie', 12, 2),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 1),
('Arie', 12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `user_id` int(5) NOT NULL,
  `login` varchar(20) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(20) CHARACTER SET latin1 NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `address` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `city` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(2048) CHARACTER SET latin1 NOT NULL DEFAULT './gambar/user.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`user_id`, `login`, `pass`, `username`, `address`, `city`, `phone`, `email`, `foto`) VALUES
(1, 'Arie', 'G', 'Arie Cahyadi', 'Pringombo', 'Pringsewu', '08877227004', 'phantomsensei90@gmail.com', './gambar/pp-11615.png'),
(2, '', '', '', '', '', '', '', './gambar/user.jpg'),
(3, 'Tambat', 'tambat', 'Tambat Ramdani', 'w', 'ew', 'ret', 'ok', './gambar/user.jpg'),
(4, 'Aku', 'Aku', 'Aku', 'Aku', 'Aku', 'Aku', 'Aku', './gambar/Aku');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(5) NOT NULL,
  `test_id` varchar(5) DEFAULT NULL,
  `soal` varchar(150) DEFAULT NULL,
  `ans1` varchar(75) DEFAULT NULL,
  `ans2` varchar(75) DEFAULT NULL,
  `ans3` varchar(75) DEFAULT NULL,
  `ans4` varchar(75) DEFAULT NULL,
  `benar` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `test_id`, `soal`, `ans1`, `ans2`, `ans3`, `ans4`, `benar`) VALUES
(42, '12', 'Bahasa Inggrisnya saya', 'I', 'Me', 'Saya', 'Aku', '1'),
(43, '12', 'Ya', 'yes', 'y', 'ok', 'ya', '1'),
(44, '13', 'sdf', 'sdfs', 'ewrw', 'dfgdf', 'cvbc', '2'),
(45, '12', 'gdf', 'dfg', 'dfgd', 'dfgdf', 'ret', '1'),
(46, '12', 'gdf', 'dfg', 'dfgd', 'dfgdf', 'ret', '1'),
(47, '13', 'sdf', 'sdfsdf', 'sdfs', 'dfsd', 'fs', '1'),
(48, '12', 'aku', 'aku', 'aku', 'aku', 'aku', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(5) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `nama`) VALUES
(12, 'Soal Bahasa Inggris Tahun 2069'),
(13, 'Soal Bahasa Inggris Tahun 2070'),
(14, 'Soal Bahasa Inggris Tahun 6969'),
(15, 'Arie Cahyadie'),
(17, 'Arie Cahyadi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
