-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2025 at 04:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prescription_refill`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_methods`
--

CREATE TABLE `contact_methods` (
  `contact_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `contact_type` enum('email','phone','sms') NOT NULL,
  `contact_value` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_methods`
--

INSERT INTO `contact_methods` (`contact_id`, `patient_id`, `contact_type`, `contact_value`, `is_primary`) VALUES
(1, 1, 'email', 'john.doe@example.com', 1),
(2, 1, 'phone', '+96170123456', 0),
(3, 2, 'email', 'leila.hassan@example.com', 1),
(4, 3, 'phone', '+96170987654', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `medication_id` int(11) NOT NULL,
  `medication_name` varchar(100) NOT NULL,
  `stock_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`medication_id`, `medication_name`, `stock_quantity`) VALUES
(1, 'Paracetamol', 100),
(2, 'Ibuprofen', 50),
(3, 'Amoxicillin', 30),
(4, 'Cetirizine', 75),
(5, 'Aspirin', 40);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `refill_request_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `sent_date` datetime NOT NULL,
  `message_content` text NOT NULL,
  `delivery_status` enum('sent','failed','delivered') DEFAULT 'sent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `refill_request_id`, `contact_id`, `sent_date`, `message_content`, `delivery_status`) VALUES
(4, 1, 1, '2025-07-23 06:58:48', 'Your refill request is pending approval.', 'sent'),
(5, 2, 3, '2025-07-23 06:58:48', 'Your refill request has been approved.', 'delivered'),
(6, 3, 4, '2025-07-23 06:58:48', 'We need more info on your refill request.', 'sent');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `full_name`, `date_of_birth`) VALUES
(1, 'John Doe', '1980-05-15'),
(2, 'Leila Hassan', '1992-10-01'),
(3, 'Omar Khalil', '1975-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prescription_id` int(11) NOT NULL,
  `rx_number` varchar(50) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `quantity_prescribed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prescription_id`, `rx_number`, `patient_id`, `medication_id`, `issue_date`, `expiry_date`, `quantity_prescribed`) VALUES
(1, 'RX10001', 1, 1, '2025-01-01', '2025-12-31', 30),
(2, 'RX10002', 2, 3, '2025-02-15', '2025-08-15', 20),
(3, 'RX10003', 3, 5, '2025-03-10', '2026-03-09', 15);

-- --------------------------------------------------------

--
-- Table structure for table `refill_requests`
--

CREATE TABLE `refill_requests` (
  `refill_request_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `request_source` enum('webform','email','voicemail') NOT NULL,
  `extracted_via_ai` tinyint(1) DEFAULT 1,
  `status` enum('pending','approved','rejected','clarification_needed') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refill_requests`
--

INSERT INTO `refill_requests` (`refill_request_id`, `prescription_id`, `request_date`, `request_source`, `extracted_via_ai`, `status`) VALUES
(1, 1, '2025-07-23 06:58:33', 'webform', 1, 'pending'),
(2, 2, '2025-07-23 06:58:33', 'email', 1, 'approved'),
(3, 3, '2025-07-23 06:58:33', 'voicemail', 1, 'clarification_needed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_methods`
--
ALTER TABLE `contact_methods`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `fk_contact_patient` (`patient_id`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_notification_refill` (`refill_request_id`),
  ADD KEY `fk_notification_contact` (`contact_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prescription_id`),
  ADD UNIQUE KEY `rx_number` (`rx_number`),
  ADD KEY `fk_prescription_patient` (`patient_id`),
  ADD KEY `fk_prescription_medication` (`medication_id`);

--
-- Indexes for table `refill_requests`
--
ALTER TABLE `refill_requests`
  ADD PRIMARY KEY (`refill_request_id`),
  ADD KEY `fk_refill_prescription` (`prescription_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_methods`
--
ALTER TABLE `contact_methods`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `refill_requests`
--
ALTER TABLE `refill_requests`
  MODIFY `refill_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_methods`
--
ALTER TABLE `contact_methods`
  ADD CONSTRAINT `fk_contact_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notification_contact` FOREIGN KEY (`contact_id`) REFERENCES `contact_methods` (`contact_id`),
  ADD CONSTRAINT `fk_notification_refill` FOREIGN KEY (`refill_request_id`) REFERENCES `refill_requests` (`refill_request_id`);

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `fk_prescription_medication` FOREIGN KEY (`medication_id`) REFERENCES `medications` (`medication_id`),
  ADD CONSTRAINT `fk_prescription_patient` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `refill_requests`
--
ALTER TABLE `refill_requests`
  ADD CONSTRAINT `fk_refill_prescription` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`prescription_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
