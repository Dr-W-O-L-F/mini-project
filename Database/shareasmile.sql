-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 09:18 AM
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
('aabc@gmail.com', 'pass@1234', 'Organization', 'Your favorite number?', '5'),
('abc@gmail.com', 'pass@1234', 'Donor', 'Your favorite number?', '6'),
('gbb@gmail.com', 'pass@1234', 'Organization', 'Your favorite number?', '6'),
('pailysaji33@gmail.com', 'paily@1234', 'Admin', 'What is your pet?', 'Dog'),
('tho2@gmail.com', 'pass@1234', 'Donor', 'Your favorite number?', '10');

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
(5, 'Thomas', 'tho2@gmail.com', 828186010, 'Eranakulam', 'Eranakulam', 123456, 'pass@1234');

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
('Paily Saji', 'aabc@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 16, 'QWERTY', 'aabc@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-76542', 'uploads/7.jpg', 1),
('Paily Saji', 'gbb@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 15, 'QWERTTY', 'gbb@gmail.com', '08281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-59778', 'uploads/f4.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `request_form`
--

CREATE TABLE `request_form` (
  `donation_id` int(11) NOT NULL,
  `organization_email` varchar(100) NOT NULL,
  `donation_type` varchar(200) NOT NULL,
  `donation_details` varchar(600) NOT NULL,
  `estimated_amount` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `holder_name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_form`
--

INSERT INTO `request_form` (`donation_id`, `organization_email`, `donation_type`, `donation_details`, `estimated_amount`, `account_number`, `ifsc_code`, `bank_name`, `holder_name`, `branch`, `place`, `date`) VALUES
(3, 'aabc@gmail.com', 'Scholarship', 'Need for Education', '30000', '8436341685', '35468PH', 'India Bank', 'Thomas Mathew', 'Eranakulam', 'Eranakulam', '08/31/2023'),
(4, 'aabc@gmail.com', 'Hospital Case', 'Need for Medical Treatment', '50000', '5632552236', 'L5226P', 'India Bank', 'John', 'Eranakulam', 'Eranakulam', '09/26/2023'),
(5, 'aabc@gmail.com', 'Orphanage', 'Maintainance of Orphanage', '60000', '563222559965', 'LF689U', 'India Bank', 'Thomas', 'Muvattupuzha', 'Muvattupuzha', '08/31/2023'),
(6, 'aabc@gmail.com', 'Scholarship', 'Need for higher Education', '250000', '368435364', 'GR6435GD', 'India Bank', 'Kora', 'Muvattupuzha', 'Muvattupuzha', '09/05/2023');

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
-- Indexes for table `request_form`
--
ALTER TABLE `request_form`
  ADD PRIMARY KEY (`donation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_donor`
--
ALTER TABLE `registration_donor`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration_organisation`
--
ALTER TABLE `registration_organisation`
  MODIFY `organisation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `request_form`
--
ALTER TABLE `request_form`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
