-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 11:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate_basic`
--

CREATE TABLE `candidate_basic` (
  `id_candidate` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `place_of_birth` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `domicile` varchar(128) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `last_education` varchar(128) NOT NULL,
  `test_one` date NOT NULL,
  `test_two` date DEFAULT NULL,
  `test_three` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `psikogram` varchar(255) DEFAULT NULL,
  `interview` varchar(255) DEFAULT NULL,
  `note_recommend` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_basic`
--

INSERT INTO `candidate_basic` (`id_candidate`, `fullname`, `place_of_birth`, `date_of_birth`, `domicile`, `phone_number`, `gender`, `last_education`, `test_one`, `test_two`, `test_three`, `image`, `psikogram`, `interview`, `note_recommend`) VALUES
(5482, 'Fatur Rahman', 'Jakarta', '2000-11-02', 'Tanah Abang', '08988425978', 'L', 'S1 - Sistem Informasi', '2022-10-17', NULL, NULL, 'user5.png', NULL, NULL, 'frontliner'),
(5483, 'Raka Fadillah', 'Bogor', '1997-11-07', 'Tanah Abang', '089885255546', 'L', 'S1 - Sistem Informasi', '2022-10-17', NULL, NULL, 'user6.png', NULL, NULL, NULL),
(5484, 'Arif Rahman Hakim', 'Jakarta', '1997-11-05', 'Bogor', '089528585858', 'L', 'D-3', '1997-11-14', NULL, NULL, NULL, NULL, NULL, NULL),
(5485, 'Apri', 'Jakarta', '1997-11-06', 'Bogor', '027145456484', 'L', 'S-1', '1997-11-15', NULL, NULL, NULL, NULL, NULL, NULL),
(5486, 'irfan', 'Jakarta', '1997-11-07', 'Bogor', '027145456484', 'L', 'S-2', '1997-11-16', NULL, NULL, NULL, NULL, NULL, NULL),
(5487, 'teddy', 'Jakarta', '1997-11-08', 'Bogor', '027145456484', 'L', 'S-1', '2022-10-17', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_secondary`
--

CREATE TABLE `candidate_secondary` (
  `id` int(11) NOT NULL,
  `regis_num_candidate` varchar(30) NOT NULL,
  `regis_num_resident` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `religion` varchar(30) NOT NULL,
  `tall` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `marital_status` varchar(10) NOT NULL,
  `postal_code` int(15) DEFAULT NULL,
  `status_test` varchar(100) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_secondary`
--

INSERT INTO `candidate_secondary` (`id`, `regis_num_candidate`, `regis_num_resident`, `email`, `religion`, `tall`, `weight`, `marital_status`, `postal_code`, `status_test`, `basic_id`) VALUES
(1, 'MGR552285', '320112056219980007', 'admin@mutual.com', 'Islam', '160', '65', 'SG', 10220, 'Lulus', 5482),
(2, 'MGR552285', '01292938392382389', 'lauira@gmail.com', 'Islam', '160', '89', 'M0', 12200, 'Lulus', 5483),
(3, 'MGR556655', '320112056219980007', 'rakafadillah@gmail.com', 'Islam', '165', '65', 'M1', 12200, 'Tidak Hadir', 5484),
(4, 'MGR552282', '01292938392382389', 'admin@mutual.com', 'Islam', '160', '65', 'M0', 12200, 'Tidak Lulus', 5485),
(5, 'MGR556655', '01292938392382389', 'admin@mutual.com', 'Katholik', '160', '65', 'M0', 12200, 'Lulus', 5486);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id_education` int(11) NOT NULL,
  `degree` varchar(128) DEFAULT NULL,
  `institute` varchar(200) DEFAULT NULL,
  `major` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `score` varchar(128) DEFAULT NULL,
  `year_in` varchar(128) DEFAULT NULL,
  `year_out` varchar(128) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id_education`, `degree`, `institute`, `major`, `city`, `score`, `year_in`, `year_out`, `basic_id`) VALUES
(1, 'S1', 'Universitas Andalas', 'Teknik Pertanian', 'Bogor', '3.45', '2021', '2018', 5482),
(2, 'D1', 'Universitas Pakuan', 'Teknik Pertanian', 'Jakarta', '3.78', '2017', '2021', 5482),
(3, 'SMA', 'SMA 26 Jakarta', 'IPA', 'Jakarta', '7.5', '2015', '2017', 5482),
(4, 'S1', 'Universitas Pakuan', 'Teknik Pertanian', 'Bogor', '3.45', '2017', '2021', 5483),
(5, 'SMA', 'SMA PERMATA BOGOR', 'IPA', 'Bogor', '3.45', '2017', '2021', 5483),
(6, 'SMK', 'SMA 26 Jakarta', 'Tekhnik Sipil', 'Bogor', '7.5', '2021', '2022', 5483),
(7, 'SMK', 'SMA 26 Jakarta', 'Tekhnik Sipil', 'Bogor', '7.5', '2021', '2022', 5483),
(8, 'S2', 'Universitas Andalas', 'Teknik Pertanian', 'Jakarta Pusat', '3.45', '2017', '2021', 5482),
(9, 'D2', 'Universitas Andalas', 'IPA', 'Bogor', '3.45', '2017', '2021', 5483),
(10, 'SMK', 'SMA PERMATA BOGOR', 'IPA', 'Jakarta', '7.5', '2021', '2022', 5486);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id_exp` int(11) NOT NULL,
  `company` varchar(128) NOT NULL,
  `position` varchar(128) NOT NULL,
  `year_in` int(6) NOT NULL,
  `month_period` int(6) NOT NULL,
  `last_salary` int(10) NOT NULL,
  `resign` varchar(200) NOT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id_exp`, `company`, `position`, `year_in`, `month_period`, `last_salary`, `resign`, `basic_id`) VALUES
(1, 'PT Shoope Internasional', 'Administrator', 2017, 24, 5500000, 'Habis Kontrak', 5482),
(2, 'PT Shoope Internasional', 'Administrator', 2017, 24, 5500000, 'Habis Kontrak', 5483),
(3, 'PT BRI', 'Frontliner', 2021, 24, 5500000, 'Habis Kontrak', 5483),
(4, 'PT. Habibi Digital Nusantara', 'Teknologi Pertanian', 2021, 2, 4500000, 'Habis Kontrak', 5483);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, 'Administrator'),
(2, 'Sourcing'),
(3, 'Recruitment');

-- --------------------------------------------------------

--
-- Table structure for table `send_candidate`
--

CREATE TABLE `send_candidate` (
  `id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `date_send` date NOT NULL,
  `result_send` varchar(50) NOT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `desc_send` varchar(255) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send_candidate`
--

INSERT INTO `send_candidate` (`id`, `client`, `position`, `date_send`, `result_send`, `salary`, `start_date`, `end_date`, `desc_send`, `basic_id`) VALUES
(1, 'PT BRI', 'Frontliner', '2022-11-07', 'Lolos', NULL, NULL, NULL, NULL, 5483),
(2, 'PT BRI', 'Administrator', '2022-11-17', 'Lolos', NULL, NULL, NULL, NULL, 5482),
(3, 'PT BRI', 'Teknologi Pertanian', '2022-11-30', 'Tidak Lolos', NULL, NULL, NULL, NULL, 5486),
(4, 'BANK BTPN', 'Frontliner', '2022-11-16', 'Sedang Dikirim', NULL, NULL, NULL, NULL, 5486),
(5, 'BANK BTPN', 'Administrator', '2022-11-30', 'Lolos', NULL, NULL, NULL, NULL, 5483);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level_id`) VALUES
(1, 'admin', '$2y$10$Y1Hki8BwnQDcXcErOKMnze2syOR03nmMnZ9JwgQ4MntLEKJRdGu7.', 1),
(2, 'sour', '$2y$10$g3n2q8DX3k9NsxNJbAeaDuKUoo53kgdvvzeTjSF6DzbxzSW0NeRAu', 2),
(3, 'recruit', '$2y$10$FLgqzZz63XuukNmQg.nf4ePFeCQqlTHxvpqs1Ry2epTImbUHy138a', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_basic`
--
ALTER TABLE `candidate_basic`
  ADD PRIMARY KEY (`id_candidate`),
  ADD KEY `test_id` (`test_one`);

--
-- Indexes for table `candidate_secondary`
--
ALTER TABLE `candidate_secondary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_id` (`basic_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`),
  ADD KEY `basic_id` (`basic_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_exp`),
  ADD KEY `basic_id` (`basic_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_candidate`
--
ALTER TABLE `send_candidate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_id` (`basic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_basic`
--
ALTER TABLE `candidate_basic`
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5489;

--
-- AUTO_INCREMENT for table `candidate_secondary`
--
ALTER TABLE `candidate_secondary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `send_candidate`
--
ALTER TABLE `send_candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_secondary`
--
ALTER TABLE `candidate_secondary`
  ADD CONSTRAINT `candidate_secondary_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `send_candidate`
--
ALTER TABLE `send_candidate`
  ADD CONSTRAINT `send_candidate_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
