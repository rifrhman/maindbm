-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 01:57 PM
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
-- Database: `contoh_dbm`
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
  `phone_number` varchar(20) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `last_education` varchar(128) NOT NULL,
  `test_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_basic`
--

INSERT INTO `candidate_basic` (`id_candidate`, `fullname`, `place_of_birth`, `date_of_birth`, `domicile`, `phone_number`, `gender`, `last_education`, `test_id`) VALUES
(8, 'John Doe', 'Jakarta', '2011-03-25', 'Bandung', '08129282938', 'L', 'S-1', 7),
(9, 'Martin', 'Bogor', '1998-02-12', 'Meikarta', '089282938122', 'P', 'S-1', 8),
(10, 'Sekar Maudy Indah Purnama Sari', 'Medan', '1997-12-09', 'Padang', '089238393832', 'P', 'S-2', 9);

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
  `image` varchar(255) DEFAULT NULL,
  `psikogram` varchar(255) DEFAULT NULL,
  `interview` varchar(255) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_secondary`
--

INSERT INTO `candidate_secondary` (`id`, `regis_num_candidate`, `regis_num_resident`, `email`, `religion`, `tall`, `weight`, `marital_status`, `postal_code`, `status_test`, `image`, `psikogram`, `interview`, `basic_id`) VALUES
(3, '3320112029389990', '12128939372993729', 'johndoe@gmail.com', 'Kristen', '187', '76', 'M0', NULL, NULL, NULL, NULL, NULL, 10),
(4, '3320112029389000', '12128939372993232', 'johndoe@gmail.com', 'Buddha', '187', '76', 'SG', 12310, 'Tidak Lulus', NULL, NULL, NULL, 9);

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
  `year_in` date DEFAULT NULL,
  `year_out` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Sourcing');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `test_one` date DEFAULT NULL,
  `test_two` date DEFAULT NULL,
  `test_three` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id_test`, `test_one`, `test_two`, `test_three`) VALUES
(7, '2022-10-30', NULL, NULL),
(8, '2022-10-30', NULL, NULL),
(9, '2022-10-31', NULL, NULL);

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
(2, 'sour', '$2y$10$g3n2q8DX3k9NsxNJbAeaDuKUoo53kgdvvzeTjSF6DzbxzSW0NeRAu', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_basic`
--
ALTER TABLE `candidate_basic`
  ADD PRIMARY KEY (`id_candidate`),
  ADD KEY `test_id` (`test_id`);

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
  ADD PRIMARY KEY (`id_education`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`);

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
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `candidate_secondary`
--
ALTER TABLE `candidate_secondary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_basic`
--
ALTER TABLE `candidate_basic`
  ADD CONSTRAINT `candidate_basic_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id_test`);

--
-- Constraints for table `candidate_secondary`
--
ALTER TABLE `candidate_secondary`
  ADD CONSTRAINT `candidate_secondary_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
