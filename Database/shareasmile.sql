-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 07:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shareasmile`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `security_question` varchar(100) NOT NULL,
  `security_answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `user_type`, `security_question`, `security_answer`) VALUES
('abc@gmail.com', 'pass@1234', 'Donor', 'Your favorite number?', '6'),
('ahbc@gmai.com', 'pass@1234', 'Organisation', 'Your favorite number?', '0'),
('gbb@gmail.com', 'pass@1234', 'Organization', 'Your favorite number?', '6'),
('pailysaji33@gmail.com', 'paily@1234', 'Admin', 'What is your pet?', 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `registration_donor`
--

CREATE TABLE `registration_donor` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mob` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `pincode` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_donor`
--

INSERT INTO `registration_donor` (`user_id`, `full_name`, `email`, `mob`, `street`, `district`, `pincode`, `password`) VALUES
(4, 'Paily Saji', 'abc@gmail.com', 2147483647, 'llll', 'llll', 123456, 'pass@1234'),
(2, 'Paily Saji', 'cbc@gmail.com', 2147483647, 'llll', 'llll', 123456, 'pass@1234');

-- --------------------------------------------------------

--
-- Table structure for table `registration_organisation`
--

CREATE TABLE `registration_organisation` (
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `street` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `organisation_id` int(11) NOT NULL,
  `organisation_name` varchar(100) NOT NULL,
  `organisation_email` varchar(100) NOT NULL,
  `organisation_phone` varchar(20) NOT NULL,
  `organisation_street` varchar(100) NOT NULL,
  `organistion_district` varchar(100) NOT NULL,
  `organisation_pincode` varchar(10) NOT NULL,
  `organisation_licence_number` varchar(50) NOT NULL,
  `organisation_licence_file` varchar(200) NOT NULL,
  `verify_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration_organisation`
--

INSERT INTO `registration_organisation` (`full_name`, `email`, `phone`, `street`, `district`, `pincode`, `organisation_id`, `organisation_name`, `organisation_email`, `organisation_phone`, `organisation_street`, `organistion_district`, `organisation_pincode`, `organisation_licence_number`, `organisation_licence_file`, `verify_status`) VALUES
('Paily Saji', 'aabc@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 11, 'QWERTY', 'aabc@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-8675434', 'uploads/bg.jpg', 0),
('Paily Saji', 'cbc@gmail.com', '8281860108', 'lll', 'llll', '123456', 1, 'BPC Piravom', 'abc@gmai.com', '8281860108', 'Pothanicad', 'Eranakulam', '123456', 'A-28489', 'uploads/3.jpg', 1),
('John Kora', 'agc@gmail.com', '8281860108', 'Muvattupuzha', 'Eranakulam', '123459', 3, 'OR Organization', 'agc@gmail.com', '8281860108', 'Muvattupuzha', 'Eranakulam', '123459', 'AB-56366', 'uploads/bg.jpg', 0),
('Paily Saji', 'cabc@gmail.com', '8281860108', 'lll', 'llll', '123456', 2, 'BPC Piravom', 'ahbc@gmai.com', '8281860108', 'Paingottoor', 'Idukki', '123457', 'A-28480', 'uploads/3.jpg', 2),
('John Kora', 'agc@gmail.com', '8281860108', 'Muvattupuzha', 'Eranakulam', '123459', 4, 'OR Organization', 'azc@gmail.com', '8281860108', 'Muvattupuzha', 'Eranakulam', '123459', 'AB-56366', 'uploads/bg.jpg', 0),
('Paily Saji', 'bbb@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 14, 'QWERTY', 'bbb@gmail.com', '08281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-59778', 'uploads/f4.jpg', 0),
('Paily Saji', 'gbb@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 15, 'QWERTTY', 'gbb@gmail.com', '08281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-59778', 'uploads/f4.jpg', 0),
('John Kora', 'agc@gmail.com', '8281860108', 'Muvattupuzha', 'Eranakulam', '123459', 10, 'OR Organization', 'hzc@gmail.com', '8281860108', 'Muvattupuzha', 'Eranakulam', '123459', 'AB-56366', 'uploads/bg.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registration_donor`
--
ALTER TABLE `registration_donor`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `registration_organisation`
--
ALTER TABLE `registration_organisation`
  ADD PRIMARY KEY (`organisation_email`),
  ADD UNIQUE KEY `organisation_id` (`organisation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_donor`
--
ALTER TABLE `registration_donor`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration_organisation`
--
ALTER TABLE `registration_organisation`
  MODIFY `organisation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
