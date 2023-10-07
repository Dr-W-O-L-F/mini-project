-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 12:34 PM
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
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `replay` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `subject`, `description`, `email`, `timestamp`, `status`, `replay`) VALUES
(1, 'Payment ', 'Not Working', 'abc@gmail.com', '2023-10-06 05:25:06', 1, 'OK'),
(3, 'Request', 'Not Submitting\r\n', 'aabc@gmail.com', '2023-10-06 05:25:16', 1, 'OK'),
(4, 'Not Responding', 'Page is not working\r\n', 'aabc@gmail.com', '2023-10-06 05:22:05', 0, ''),
(5, 'Not Responding', 'Page Not Working', 'abc@gmail.com', '2023-10-06 05:22:01', 0, ''),
(6, 'Request', 'Testing', 'abc@gmail.com', '2023-10-06 05:21:53', 0, ''),
(7, 'testing', 'testing complaint box\r\n', 'aabc@gmail.com', '2023-10-06 05:00:43', 1, 'tested'),
(8, 'Donor Testing', 'Testing if it is working?', 'abc@gmail.com', '2023-10-05 15:29:39', 0, ''),
(9, 'Organization Testing', 'complaint box testing\r\n', 'aabc@gmail.com', '2023-10-05 15:31:43', 0, ''),
(10, 'Request', 'hi', 'amalchandran@gmail.com', '2023-10-06 09:26:39', 1, 'hello');

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
('aabc@gmail.com', 'pass@1234', 'Organization', 'Your favorite food?', 'Biriyani'),
('abc@gmail.com', 'pass@1234', 'Donor', 'What is your pet?', 'Dog'),
('amal@gmail.com', 'amal@1234', 'Donor', 'Your favorite food?', 'Mandhi'),
('amalchandran@gmail.com', 'Amal@262524', 'Donor', 'What is your pet?', 'Dog'),
('gbb@gmail.com', 'pass@1234', 'Organization', 'Your favorite number?', '6'),
('mon@gmail.com', 'pass@1234', 'Donor', 'Your favorite number?', '10'),
('monc@gmail.com', 'pass@1234', 'Organization', 'Your favorite number?', '6'),
('pailysaji33@gmail.com', 'paily@1234', 'Admin', 'What is your pet?', 'Dog'),
('tho2@gmail.com', 'pass@1234', 'Donor', 'Your favorite number?', '10');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `donor_email` varchar(50) NOT NULL,
  `organization_email` varchar(500) NOT NULL,
  `donation_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `full_name`, `email`, `phone_number`, `city`, `address`, `amount`, `payment_status`, `donor_email`, `organization_email`, `donation_id`, `time_stamp`) VALUES
(40, 'John Kora', 'agc@gmail.com', '08281860108', 'Pothanicad', 'Muvattupuzha', '5000', 1, 'abc@gmail.com', 'aabc@gmail.com', 20, '2023-10-07 09:40:48'),
(41, 'Paily Saji', 'abc@gmail.com', '08281860108', 'Pothanicad', 'llll', '500', 1, 'abc@gmail.com', 'aabc@gmail.com', 20, '2023-10-07 09:41:57'),
(42, 'Paily Saji', 'aabc@gmail.com', '08281860108', 'Pothanicad', 'Eranakulam', '15000', 1, 'abc@gmail.com', 'aabc@gmail.com', 20, '2023-10-07 09:49:15'),
(43, 'Paily Saji', 'aabc@gmail.com', '08281860108', 'Pothanicad', 'Eranakulam', '500000', 1, 'abc@gmail.com', 'aabc@gmail.com', 21, '2023-10-07 10:32:49');

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
(4, 'Paily Saji', 'abc@gmail.com', 2020202021, 'Paingottoor', 'Eranakulam', 123456, 'pass@1234'),
(7, 'Amal Chandran', 'amal@gmail.com', 2147483647, 'Kothamangalam', 'Eranakulam', 686695, 'amal@1234'),
(8, 'Amal Chandran', 'amalchandran@gmail.com', 2147483647, 'Kothamangalam', 'Eranakulam', 686691, 'Amal@262524'),
(6, 'moncy', 'mon@gmail.com', 1234567890, 'Muvattupuzha', 'Eranakulam', 123459, 'pass@1234'),
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
('Paily Saji', 'aabc@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 16, 'Demo Organization', 'aabc@gmail.com', '8281860100', 'Eranakulam', 'Eranakulam', '123456', 'KL-76542', 'uploads/651edeab51c22.jpg', 1),
('Paily Saji', 'gbb@gmail.com', '8281860108', 'Eranakulam', 'Eranakulam', '123456', 15, 'QWERTTY', 'gbb@gmail.com', '08281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-59778', 'uploads/f4.jpg', 0),
('moncy', 'monc@gmail.com', '01234567890', 'Muvattupuzha', 'Eranakulam', '123459', 17, 'QWERTTY', 'monc@gmail.com', '08281860108', 'Eranakulam', 'Eranakulam', '123456', 'KL-98546', 'uploads/9.jpg', 1);

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
(20, 'aabc@gmail.com', 'Hospital Case', 'Operation', '20000', '8436341685', '35468PH', 'India Bank', 'John Kora', 'Muvattupuzha', 'Muvattupuzha', '09/22/2023');

-- --------------------------------------------------------

--
-- Table structure for table `total_amount`
--

CREATE TABLE `total_amount` (
  `amount_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `recieved_amount` int(11) NOT NULL DEFAULT 0,
  `estimated_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_amount`
--

INSERT INTO `total_amount` (`amount_id`, `request_id`, `recieved_amount`, `estimated_amount`) VALUES
(4, 20, 20500, 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

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
-- Indexes for table `total_amount`
--
ALTER TABLE `total_amount`
  ADD PRIMARY KEY (`amount_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `registration_donor`
--
ALTER TABLE `registration_donor`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registration_organisation`
--
ALTER TABLE `registration_organisation`
  MODIFY `organisation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_form`
--
ALTER TABLE `request_form`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `total_amount`
--
ALTER TABLE `total_amount`
  MODIFY `amount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
