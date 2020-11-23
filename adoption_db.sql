-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 04:25 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `id` int(11) NOT NULL,
  `applicantID` int(11) DEFAULT NULL,
  `applicantName` varchar(512) DEFAULT 'NULL',
  `applicantSurname` varchar(512) DEFAULT 'NULL',
  `applicantIDNum` varchar(13) DEFAULT 'NULL',
  `applicantEmail` varchar(512) DEFAULT 'NULL',
  `applicantContact` varchar(512) DEFAULT 'NULL',
  `applicantAltContact` varchar(512) DEFAULT 'NULL',
  `applicantAddress` varchar(225) DEFAULT NULL,
  `babyGender` varchar(255) DEFAULT 'NULL',
  `babyAge` varchar(255) DEFAULT 'NULL',
  `babyRace` varchar(255) DEFAULT 'NULL',
  `applicantIdDoc` varchar(225) DEFAULT NULL,
  `applicantPayslip` varchar(255) DEFAULT NULL,
  `applicantRes` varchar(255) DEFAULT NULL,
  `is_approve` int(1) DEFAULT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `surname` varchar(25) DEFAULT NULL,
  `race` varchar(12) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `id_num` varchar(25) DEFAULT NULL,
  `dob` bigint(16) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `certificate` varchar(512) DEFAULT NULL,
  `image` varchar(512) DEFAULT NULL,
  `approved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `spouse_id` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL,
  `child_id` int(11) DEFAULT NULL,
  `is_adoptive` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT 'NULL',
  `email` varchar(255) DEFAULT 'NULL',
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(225) DEFAULT NULL,
  `contact_num` varchar(225) DEFAULT 'NULL',
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_pic` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `contact_num`, `register_date`, `profile_pic`) VALUES
(1, 'admin', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'Rick', 'Madisha', '0815528513', '2020-04-22 14:50:09', NULL),
(2, 'mattew', 'mattewb@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Mattew', 'Bevan', '0815528513', '2020-04-22 15:06:36', NULL),
(17, 'sam', 'sam@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Bevan', 'Price', '0815528513', '2020-11-18 12:05:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
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
-- AUTO_INCREMENT for table `agency`
--
ALTER TABLE `agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
