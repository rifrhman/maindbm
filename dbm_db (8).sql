-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 07:53 AM
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
-- Table structure for table `basic_admin`
--

CREATE TABLE `basic_admin` (
  `id` int(11) NOT NULL,
  `basic_id` int(11) NOT NULL,
  `id_emp` varchar(128) DEFAULT NULL,
  `id_privy` varchar(128) DEFAULT NULL,
  `cc` varchar(128) DEFAULT NULL,
  `branch_company` varchar(128) DEFAULT NULL,
  `payroll_one` varchar(128) DEFAULT NULL,
  `payroll_two` varchar(128) DEFAULT NULL,
  `blood_type` varchar(128) DEFAULT NULL,
  `address_ktp` varchar(128) DEFAULT NULL,
  `postal_code_ktp` varchar(128) DEFAULT NULL,
  `no_kk` varchar(128) DEFAULT NULL,
  `status_company` varchar(128) DEFAULT NULL,
  `surrogate_status` varchar(128) DEFAULT NULL,
  `type_recruitment` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basic_admin`
--

INSERT INTO `basic_admin` (`id`, `basic_id`, `id_emp`, `id_privy`, `cc`, `branch_company`, `payroll_one`, `payroll_two`, `blood_type`, `address_ktp`, `postal_code_ktp`, `no_kk`, `status_company`, `surrogate_status`, `type_recruitment`) VALUES
(11, 16220, '0201', 'P002', 'BCA', 'Semarang', '999555', '222555', 'O', 'Pakuan Regency', '124522', '321545602546461', 'M+', '-', 'MutualPlus');

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
  `psikogram_two` varchar(255) DEFAULT NULL,
  `psikogram_three` varchar(255) DEFAULT NULL,
  `interview` varchar(255) DEFAULT NULL,
  `note_recommend` text DEFAULT NULL,
  `desc_reject` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_basic`
--

INSERT INTO `candidate_basic` (`id_candidate`, `fullname`, `place_of_birth`, `date_of_birth`, `domicile`, `phone_number`, `gender`, `last_education`, `test_one`, `test_two`, `test_three`, `image`, `psikogram`, `psikogram_two`, `psikogram_three`, `interview`, `note_recommend`, `desc_reject`) VALUES
(16219, 'John Doe', 'Jakarta', '1996-05-06', 'Tanah Abang', '08988425978', 'L', 'S1 - Sistem Informasi', '2022-10-20', NULL, NULL, 'prof.jpg', NULL, NULL, NULL, NULL, NULL, 'kerja'),
(16220, 'Demo Name', 'Bogor', '2000-10-02', 'Salabenda', '08988455247', 'P', 'S1 - Psikologi', '2022-12-07', NULL, NULL, 'prof_dr_ova_emilia.jpeg', NULL, NULL, NULL, NULL, 'Disarankan Bekerja Sebagai Staff Administrasi', NULL),
(16221, 'Random', 'Jakarta', '2000-02-05', 'Tanah Abang', '0898854454', 'L', 'S1 - Sistem Informasi', '2022-12-07', NULL, NULL, 'profilesss.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidate_secondary`
--

CREATE TABLE `candidate_secondary` (
  `id` int(11) NOT NULL,
  `regis_num_candidate` varchar(30) DEFAULT NULL,
  `regis_num_resident` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `religion` varchar(30) DEFAULT NULL,
  `tall` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `marital_status` varchar(10) DEFAULT NULL,
  `postal_code` int(15) DEFAULT NULL,
  `status_test` varchar(100) DEFAULT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `validity_period` varchar(128) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_secondary`
--

INSERT INTO `candidate_secondary` (`id`, `regis_num_candidate`, `regis_num_resident`, `email`, `religion`, `tall`, `weight`, `marital_status`, `postal_code`, `status_test`, `certificate`, `validity_period`, `basic_id`) VALUES
(29, 'MGR0020', '3275012235600007', 'Johndoe@gmail.com', 'Katholik', '170', '58', 'SG', 12230, 'Lulus', '-', '-', 16219),
(30, 'MGR0002', '3201240556472125', 'Demoname@gmail.com', 'Islam', '170', '55', 'SG', 12310, 'Lulus', '-', '-', 16220),
(31, 'MGR556655', '320112056219980005', 'Admin@mutual.com', 'Islam', '175', '65', 'SG', 12200, 'Lulus', 'Kompetensi Komputer', '3 Bulan', 16221);

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
  `year_in_edu` varchar(128) DEFAULT NULL,
  `year_out_edu` varchar(128) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id_education`, `degree`, `institute`, `major`, `city`, `score`, `year_in_edu`, `year_out_edu`, `basic_id`) VALUES
(25, 'S1', 'Universitas Andalas', 'Manajemen Informatika', 'Padang', '3.45', '2017', '2021', 16219),
(26, 'S1', 'Universitas Pakuan', 'Psikologi', 'Bogor', '3.88', '2015', '2019', 16220);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contact`
--

CREATE TABLE `emergency_contact` (
  `id` int(11) NOT NULL,
  `basic_id` int(11) NOT NULL,
  `name_emergency` varchar(128) DEFAULT NULL,
  `phone_emergency` varchar(20) NOT NULL,
  `relation_emergency` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emergency_contact`
--

INSERT INTO `emergency_contact` (`id`, `basic_id`, `name_emergency`, `phone_emergency`, `relation_emergency`) VALUES
(13, 16220, 'Haja', '089885255266', 'Ayah');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id_exp` int(11) NOT NULL,
  `company` varchar(128) NOT NULL,
  `position_exp` varchar(128) NOT NULL,
  `year_in_exp` date NOT NULL,
  `month_period` int(6) NOT NULL,
  `last_salary` int(10) NOT NULL,
  `resign` varchar(200) NOT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id_exp`, `company`, `position_exp`, `year_in_exp`, `month_period`, `last_salary`, `resign`, `basic_id`) VALUES
(18, 'PT Shoope Internasional', 'IT Support', '2021-01-01', 6, 5500000, 'Training', 16219),
(19, 'PT BRI', 'Frontliner', '2019-02-01', 12, 5500000, 'Habis Kontrak', 16220);

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
(3, 'Recruitment'),
(4, 'Head Recruitment');

-- --------------------------------------------------------

--
-- Table structure for table `pkwt_employee`
--

CREATE TABLE `pkwt_employee` (
  `id` int(11) NOT NULL,
  `basic_id` int(11) NOT NULL,
  `pkwt_number` varchar(255) DEFAULT NULL,
  `date_pkwt` date DEFAULT NULL,
  `start_of_contract` date DEFAULT NULL,
  `end_of_contract` date DEFAULT NULL,
  `desc_pkwt` text DEFAULT NULL,
  `status_pkwt` varchar(128) DEFAULT NULL,
  `flags_resign` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkwt_employee`
--

INSERT INTO `pkwt_employee` (`id`, `basic_id`, `pkwt_number`, `date_pkwt`, `start_of_contract`, `end_of_contract`, `desc_pkwt`, `status_pkwt`, `flags_resign`) VALUES
(62, 16219, '1267/PKWT/Mplus/XII/2022', '2022-12-06', '2022-12-12', '2023-12-11', 'PKWT 1', 'Belum Kembali', NULL),
(64, 16220, '1234554', '2020-05-02', '2020-05-02', '2021-05-02', '-', 'Selesai', NULL),
(65, 16220, 'PKWT/2050', '2021-06-02', '2021-07-02', '2022-07-02', 'PKWT BARU', 'Belum Kembali', NULL),
(66, 16220, 'reminder ke 2 yang baru', '2023-01-05', '2023-01-05', '2024-06-05', 'reminder 2 new', 'Belum Kembali', NULL),
(67, 16220, 'reminder 3', '0001-01-01', '0001-01-01', '0001-01-01', 'reminder 3/reminder 07/12/2022', 'Belum Dibalas', NULL),
(68, 16219, 'reminder john', '0001-01-01', '0001-01-01', '0001-01-01', 'reminder john', 'Belum Dibalas', NULL),
(69, 16220, 'reminder', '0001-01-01', '0001-01-01', '0001-01-01', '-', 'Belum Dibalas', NULL),
(70, 16219, 'reminder john', '0001-01-01', '0001-01-01', '0001-01-01', '-', 'Belum Dibalas', NULL),
(71, 16219, 'pkwt 4', '0001-01-01', '0001-01-01', '0001-01-01', 'Reminder 07/12/2022', 'Belum Dibalas', NULL),
(72, 16219, '0000', '0001-01-01', '0001-01-01', '0001-01-01', 'reminder 07/12/2023', 'Belum Dibalas', NULL),
(73, 16220, '00000`', '0001-01-01', '0001-01-01', '0001-01-01', '-', 'Belum Dibalas', NULL),
(74, 16221, 'PKWT/2525', '2022-12-10', '2022-12-10', '2023-12-05', '-', NULL, NULL),
(75, 16221, 'PKWT/20202', '0001-01-01', '0001-01-01', '0001-01-01', 'Reminder kedua', 'Selesai', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resign_employee`
--

CREATE TABLE `resign_employee` (
  `id` int(11) NOT NULL,
  `basic_id` int(11) NOT NULL,
  `work_end_date` date DEFAULT NULL,
  `date_resign` date DEFAULT NULL,
  `desc_resign` text DEFAULT NULL,
  `resign_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `secondary_admin`
--

CREATE TABLE `secondary_admin` (
  `id` int(11) NOT NULL,
  `basic_id` int(11) NOT NULL,
  `allowance_premium` varchar(128) DEFAULT NULL,
  `allowance_others` varchar(128) DEFAULT NULL,
  `placement_city` varchar(128) DEFAULT NULL,
  `placement_district` varchar(128) DEFAULT NULL,
  `type_bank` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `name_of_bank` varchar(50) DEFAULT NULL,
  `bpjs_tk` varchar(128) DEFAULT NULL,
  `bpjs_ks` varchar(128) DEFAULT NULL,
  `npwp` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `placement` varchar(255) DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `desc_send` varchar(255) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `confirm` varchar(30) DEFAULT NULL,
  `is_join` varchar(128) DEFAULT NULL,
  `confirm_admin` varchar(128) DEFAULT NULL,
  `basic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'recruit', '$2y$10$FLgqzZz63XuukNmQg.nf4ePFeCQqlTHxvpqs1Ry2epTImbUHy138a', 3),
(4, 'head', '$2y$10$EbqaoidpidDTdaM/1JpNLOE/marauVyAMkxyntboGQA5XqYQajjOe', 4),
(5, 'winda', '$2y$10$LXJ5W5hLwCdS17vNo6b9T.WorJ4SV/j3nIPyebfEoYlQ7l.1o/Nq.', 2),
(6, 'irfan', '$2y$10$K8rbc01m484UtSE8QPeQle59c6yZd4b9xTZxw/Z7E6pYPBSGjor6a', 2),
(7, 'rosandri', '$2y$10$xj/7ciZO41lLq2im0P6w1OdkGbndLpDLSOdVjeoNegGRAoD1mgUrW', 3),
(8, 'rian', '$2y$10$wdA.tX/CHWD8arcUCfj7y.m8b3sac2Y/DPd271aWaaCCWL4UPMeuq', 3),
(9, 'dessy', '$2y$10$qrds0K.jkFGSLBGxAL23bOeJ860UKanYUGiS0NbibWtI/uzbx4Epu', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic_admin`
--
ALTER TABLE `basic_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_admin_ibfk_1` (`basic_id`);

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
-- Indexes for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD PRIMARY KEY (`id`),
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
-- Indexes for table `pkwt_employee`
--
ALTER TABLE `pkwt_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_id` (`basic_id`);

--
-- Indexes for table `resign_employee`
--
ALTER TABLE `resign_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_id` (`basic_id`);

--
-- Indexes for table `secondary_admin`
--
ALTER TABLE `secondary_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basic_id` (`basic_id`);

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
-- AUTO_INCREMENT for table `basic_admin`
--
ALTER TABLE `basic_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `candidate_basic`
--
ALTER TABLE `candidate_basic`
  MODIFY `id_candidate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16222;

--
-- AUTO_INCREMENT for table `candidate_secondary`
--
ALTER TABLE `candidate_secondary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pkwt_employee`
--
ALTER TABLE `pkwt_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `resign_employee`
--
ALTER TABLE `resign_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `secondary_admin`
--
ALTER TABLE `secondary_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `send_candidate`
--
ALTER TABLE `send_candidate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basic_admin`
--
ALTER TABLE `basic_admin`
  ADD CONSTRAINT `basic_admin_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `emergency_contact`
--
ALTER TABLE `emergency_contact`
  ADD CONSTRAINT `emergency_contact_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `pkwt_employee`
--
ALTER TABLE `pkwt_employee`
  ADD CONSTRAINT `pkwt_employee_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `resign_employee`
--
ALTER TABLE `resign_employee`
  ADD CONSTRAINT `resign_employee_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `secondary_admin`
--
ALTER TABLE `secondary_admin`
  ADD CONSTRAINT `secondary_admin_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);

--
-- Constraints for table `send_candidate`
--
ALTER TABLE `send_candidate`
  ADD CONSTRAINT `send_candidate_ibfk_1` FOREIGN KEY (`basic_id`) REFERENCES `candidate_basic` (`id_candidate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
