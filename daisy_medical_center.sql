-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 02:36 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daisy_medical_center`
--
CREATE DATABASE IF NOT EXISTS `daisy_medical_center` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `daisy_medical_center`;

-- --------------------------------------------------------

--
-- Table structure for table `action_log_doctor`
--

CREATE TABLE `action_log_doctor` (
  `d_actionID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_log_doctor`
--

INSERT INTO `action_log_doctor` (`d_actionID`, `username`, `doctorID`, `action`) VALUES
(2, 'HichamAdmin', 1178, 'Added'),
(8, 'HichamAdmin', 1178, 'Deleted'),
(12, 'HichamAdmin', 1173, 'Added'),
(13, 'HichamAdmin', 1192, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `action_log_patient`
--

CREATE TABLE `action_log_patient` (
  `p_actionID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `patientID` int(11) NOT NULL,
  `action` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action_log_patient`
--

INSERT INTO `action_log_patient` (`p_actionID`, `username`, `patientID`, `action`) VALUES
(1, 'HichamAdmin', 11735313, 'Added'),
(4, 'HichamAdmin', 11735313, 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_gender` varchar(10) NOT NULL,
  `a_address` varchar(50) NOT NULL,
  `a_phone` varchar(15) NOT NULL,
  `a_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Username`, `Password`, `a_name`, `a_gender`, `a_address`, `a_phone`, `a_email`) VALUES
('HichamAdmin', '12345', 'Hicham Baydoun', 'Male', 'Beirut', '89907558', 'hichamAdmin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `patientID` int(20) NOT NULL,
  `doctorID` int(20) NOT NULL,
  `app_no` int(20) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `d_name` varchar(20) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`patientID`, `doctorID`, `app_no`, `p_name`, `d_name`, `date`, `time`) VALUES
(11735296, 1173, 41, 'Hicham Baydoun', 'Ali Fayad', '2020-06-30', '10:30:00'),
(11735305, 1173, 42, 'Sarah', 'Ali Fayad', '2020-05-30', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctorID` int(20) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `specialty` varchar(20) NOT NULL,
  `d_address` varchar(70) DEFAULT NULL,
  `d_phone` varchar(15) DEFAULT NULL,
  `d_email` varchar(20) NOT NULL,
  `d_gender` varchar(10) DEFAULT NULL,
  `d_password` varchar(15) DEFAULT NULL,
  `d_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctorID`, `d_name`, `specialty`, `d_address`, `d_phone`, `d_email`, `d_gender`, `d_password`, `d_image`) VALUES
(1173, 'Ali Fayad', '3', 'Beirut', '6789054321', 'dr@gmail.com', 'M', '1234', 'doc-1.jpg'),
(1174, 'Farah Hassoun', '5', 'Beirut', '1897645679', 'farah@gmail.com', 'F', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donationID` int(11) NOT NULL,
  `fullName` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cardName` int(11) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donationID`, `fullName`, `email`, `cardName`, `cardNumber`, `amount`, `date`, `time`) VALUES
(36, 'Hicham Baydoun', 'hicham@gmail.com', 0, 12345, 100, '2020-05-27', '16:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(20) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_age` float DEFAULT NULL,
  `p_gender` varchar(10) DEFAULT NULL,
  `p_address` varchar(70) DEFAULT NULL,
  `p_phone` varchar(15) DEFAULT NULL,
  `p_email` varchar(20) NOT NULL,
  `p_password` varchar(15) NOT NULL,
  `p_image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `p_name`, `p_age`, `p_gender`, `p_address`, `p_phone`, `p_email`, `p_password`, `p_image`) VALUES
(11735296, 'Hicham Baydoun', 21, 'M', 'Beirut', '1234567890', 'hicham@gmail.com', '1234', 'hyouka1.jpg'),
(11735297, 'Issa Hariri', 45, 'M', 'Beirut', '1234567890', 'issa@gmail.com', '1234', 'staff-3.jpg'),
(11735305, 'Sarah', 21, 'F', 'Beirut', '1234567890', 'sarah@gmail.com', '1234', 'staff-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `historyID` int(11) NOT NULL,
  `patientID` int(20) NOT NULL,
  `doctorID` int(20) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`historyID`, `patientID`, `doctorID`, `details`, `date`, `time`) VALUES
(10, 11735305, 1173, 'Patient is recovering from stage 4', '2020-05-27', '18:25:16'),
(15, 11735305, 1173, 'Patient is recovering in treatment', '2020-05-27', '18:32:43'),
(16, 11735296, 1173, 'Patient is undergoing chemo', '2020-05-27', '16:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(20) NOT NULL,
  `patientID` int(20) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `report_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`reportID`, `patientID`, `doctorID`, `date`, `time`, `report_name`) VALUES
(1, 11735296, 1174, '2020-05-14', '12:30:00', 'report.pdf'),
(5, 11735296, 1173, '2020-04-01', '09:03:00', 'report.pdf'),
(13, 11735296, 1173, '2020-05-22', '19:28:04', 'report.pdf'),
(16, 11735296, 1173, '2020-05-27', '16:06:42', 'report.pdf'),
(27, 11735297, 1174, '2020-06-11', '13:37:12', 'report.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `specialty`
--

CREATE TABLE `specialty` (
  `specialtyID` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialty`
--

INSERT INTO `specialty` (`specialtyID`, `s_name`) VALUES
(1, 'Anal Cancer'),
(2, 'Bladder Cancer'),
(3, 'Blood Cancer'),
(4, 'Bone Cancer'),
(5, 'Brain Cancer'),
(6, 'Breast Cancer'),
(7, 'Cervical Cancer'),
(8, 'Colorectal Cancer'),
(9, 'Esophageal Cancer'),
(10, 'Head and neck Cancer'),
(11, 'Kidney Cancer'),
(12, 'Liver Cancer'),
(13, 'Lung Cancer'),
(14, 'Ovarian Cancer'),
(15, 'Pancreatic Cancer'),
(16, 'Prostate Cancer'),
(17, 'Skin Cancer'),
(18, 'Stomach Cancer'),
(19, 'Testicular Cancer'),
(20, 'Thyroid Cancer'),
(21, 'Radiation Oncologist'),
(22, 'Medical Oncologist'),
(48, 'Surgical Oncologist');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `v_id` int(11) NOT NULL,
  `v_name` varchar(30) NOT NULL,
  `v_email` varchar(20) NOT NULL,
  `v_comment` varchar(250) NOT NULL,
  `v_why` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`v_id`, `v_name`, `v_email`, `v_comment`, `v_why`) VALUES
(21, 'Hicham Baydoun', 'hicham@gmail.com', 'this is about', 'this is why');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_log_doctor`
--
ALTER TABLE `action_log_doctor`
  ADD PRIMARY KEY (`d_actionID`),
  ADD KEY `action_log_doctor_ibfk_1` (`doctorID`),
  ADD KEY `action_log_doctor_ibfk_2` (`username`);

--
-- Indexes for table `action_log_patient`
--
ALTER TABLE `action_log_patient`
  ADD PRIMARY KEY (`p_actionID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_no`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `appointment_ibfk_1` (`doctorID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctorID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donationID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`historyID`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `doctorID` (`doctorID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `report_ibfk_1` (`patientID`),
  ADD KEY `report_ibfk_2` (`doctorID`);

--
-- Indexes for table `specialty`
--
ALTER TABLE `specialty`
  ADD PRIMARY KEY (`specialtyID`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_log_doctor`
--
ALTER TABLE `action_log_doctor`
  MODIFY `d_actionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `action_log_patient`
--
ALTER TABLE `action_log_patient`
  MODIFY `p_actionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctorID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1193;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11735314;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `historyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `specialty`
--
ALTER TABLE `specialty`
  MODIFY `specialtyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD CONSTRAINT `patient_history_ibfk_1` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_history_ibfk_2` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`patientID`) REFERENCES `patient` (`patientID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`doctorID`) REFERENCES `doctor` (`doctorID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
