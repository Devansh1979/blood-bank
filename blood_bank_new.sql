-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 08:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Firstname` varchar(20) NOT NULL,
  `Lastname` varchar(20) NOT NULL,
  `LoginId` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Status` tinyint(2) NOT NULL,
  `Creationdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Firstname`, `Lastname`, `LoginId`, `Password`, `Status`, `Creationdate`) VALUES
(1, 'Super', 'Admin', 'admin@gmail.com', '123', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbank`
--

CREATE TABLE `bloodbank` (
  `id` int(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Loginid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodbank`
--

INSERT INTO `bloodbank` (`id`, `Name`, `Password`, `Loginid`) VALUES
(1, 'kashish', '7mQC2jEG', 'mehramonu94@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bloodbankparticipation`
--

CREATE TABLE `bloodbankparticipation` (
  `status` tinyint(4) NOT NULL,
  `Participation_id` int(20) NOT NULL,
  `Vol_id` varchar(50) NOT NULL,
  `Camp_id` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodbankparticipation`
--

INSERT INTO `bloodbankparticipation` (`status`, `Participation_id`, `Vol_id`, `Camp_id`, `Date`, `Time`) VALUES
(1, 2, 'SV88@gmail.com', 13, '2023-04-15', '11:10:00'),
(1, 5, 'AS99@gmail.com', 15, '2023-04-15', '02:30:00'),
(0, 7, 'RK77@gmail.com', 6, '2023-04-15', '09:45:00'),
(0, 9, 'SK66@gmail.com', 15, '2023-04-15', '04:00:00'),
(1, 11, 'mehramonu94@gmail.com', 13, '2023-04-20', '00:00:12'),
(0, 13, 'devanshbhakhri11@gmail.com', 0, '2024-09-18', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bloodcamp`
--

CREATE TABLE `bloodcamp` (
  `Camp_id` int(10) NOT NULL,
  `Camp_title` varchar(20) NOT NULL,
  `Camp_date` date NOT NULL,
  `Camp_city` varchar(20) NOT NULL,
  `Camp_address` varchar(100) NOT NULL,
  `Organized_by` varchar(50) NOT NULL,
  `No_of_beds` int(60) NOT NULL,
  `Doctor_name` varchar(20) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Creation_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodcamp`
--

INSERT INTO `bloodcamp` (`Camp_id`, `Camp_title`, `Camp_date`, `Camp_city`, `Camp_address`, `Organized_by`, `No_of_beds`, `Doctor_name`, `Status`, `Creation_date`) VALUES
(3, 'E-Rakt Kosh', '2023-04-15', 'Patiala', '  Verka Bye Pass.Patiala', 'RCbb12@gmail.com', 100, 'Dr. Roshni', 1, '2023-04-15 00:00:00'),
(6, 'Khoondaan ', '2023-04-15', 'Ludhiana', '  Modal Town.Ludhiana', 'Ganga12@gmail.com', 100, 'Dr. Rajan Bedi', 1, '2023-04-15 00:00:00'),
(13, 'Red Cross Blood Bank', '2023-04-15', 'Asr', 'Golden Avenue, ASR', 'Hayat12@gmail.com', 3, 'Dr.Rekha', 1, '2023-04-15 00:00:00'),
(15, 'Raktdaan-Mahadaan', '2023-04-15', 'Amritsar', 'Majitha Road', 'SSBB67@gmail.com', 25, 'Dr. Raj Arora', 1, '2023-04-15 00:00:00'),
(16, 'Khoondan', '2023-04-15', 'Asr', '  Majitha Road,Asr', 'Ganga12@gmail.com', 12, 'Gurdeep Singh', 1, '2023-04-15 00:00:00'),
(17, 'Khoondan', '2023-04-15', 'Asr', '  Majitha Road,Asr', 'Ganga12@gmail.com', 12, 'Harnoor Singh', 1, '2023-04-15 00:00:00'),
(18, 'Blood Camp 2023', '2023-04-26', 'Amritsar', '  Lawernce Road', 'SSBB67@gmail.com', 15, 'Rohit Chopra', 1, '2023-04-23 02:10:21'),
(23, 'Camp', '2024-04-16', 'Amritsar', '  Amritsar', 'mehramonu94@gmail.com', 10, 'Arvind sharma', 1, '2024-04-15 07:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `bloodextract`
--

CREATE TABLE `bloodextract` (
  `Id` int(10) NOT NULL,
  `Groupid` int(30) NOT NULL,
  `ExtractName` varchar(20) NOT NULL,
  `Quantity_per_unit` decimal(10,0) NOT NULL,
  `Unit` varchar(4) NOT NULL,
  `Price_per_unit` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodextract`
--

INSERT INTO `bloodextract` (`Id`, `Groupid`, `ExtractName`, `Quantity_per_unit`, `Unit`, `Price_per_unit`) VALUES
(1, 1, 'whole blood', 69, 'gm', '1450'),
(2, 1, 'Red cells', 23, 'gm', '1450'),
(3, 1, 'White cells', 23, 'gm', '1450'),
(4, 1, 'Cryoprecipitate', 12, 'gm', '200'),
(5, 1, 'platelets', 5, 'gm', '450'),
(6, 1, 'Monocytes', 32, 'gm', '450'),
(7, 1, 'Lymphocytes', 12, 'gm', '1450'),
(8, 1, 'Neutrophils', 44, 'gm', '1450'),
(9, 2, 'whole blood', 32, 'gm', '1450'),
(10, 2, 'White cells', 37, 'gm', '400'),
(11, 2, 'Red cells', 46, 'gm', '1450'),
(12, 2, 'Cryoprecipitate', 12, 'gm', '1450'),
(13, 2, 'platelets', 10, 'gm', '1450'),
(14, 2, 'Monocytes', 14, 'gm', '450'),
(16, 2, 'Lymphocytes', 24, 'gm', '1450'),
(17, 2, 'Neutrophils', 181, 'gm', '1450'),
(18, 3, 'Whole blood', 108, 'gm', '2000'),
(19, 3, 'Red cells', 2000, 'gm', '2000'),
(20, 3, 'White cells', 22, 'gm', '2000'),
(21, 3, 'Cryoprecipitate', 11, 'gm', '650'),
(22, 3, 'platelets', 22, 'gm', '1600'),
(23, 3, 'Monocytes', 11, 'gm', '650'),
(24, 3, 'Lymphocytes', 12, 'gm', '650'),
(25, 3, 'Neutrophils', 5, 'gm', '650'),
(26, 4, 'whole blood', 34, 'gm', '2000'),
(27, 4, 'Red cells', 23, 'gm', '1500'),
(28, 4, 'White cells', 15, 'gm', '1600'),
(29, 4, 'Cryoprecipitate', 20, 'gm', '1700'),
(30, 4, 'Platelet', 45, 'gm', '500'),
(31, 4, 'Monocytes', 30, 'gm', '650'),
(32, 4, 'Lymphocytes', 40, 'gm', '550'),
(33, 4, 'Neutrophils', 30, 'gm', '550'),
(34, 8, 'whole blood', 34, 'gm', '1450'),
(35, 8, 'Red cells ', 34, 'gm', '1450'),
(36, 8, 'White cells ', 22, 'gm', '1450'),
(37, 8, 'Cryoprecipitate', 77, 'gm', '500'),
(38, 8, 'Platelets', 11, 'gm', '1450'),
(39, 8, 'Monocytes', 22, 'gm', '650'),
(40, 8, 'Lymphocytes', 5, 'gm', '1450'),
(41, 8, 'Neutrophils', 11, 'gm', '1250');

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `Groupid` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Type` text NOT NULL,
  `Status` tinyint(2) NOT NULL,
  `Creationdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`Groupid`, `Name`, `Type`, `Status`, `Creationdate`) VALUES
(1, 'A+', 'other', 1, '2023-04-15 00:00:00'),
(2, 'B+', 'other', 1, '2023-04-15 00:00:00'),
(3, 'O+', 'universaldonor', 1, '2023-04-15 00:00:00'),
(4, 'O-', 'universaldonor', 1, '2023-04-15 00:00:00'),
(8, 'AB+', 'universalacceptor', 1, '2023-04-15 00:00:00'),
(10, 'AB-', 'other', 1, '2023-04-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `Patientid` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `Patientid`, `Message`) VALUES
(3, 'sonali@gmail.com', '  Thanks for giving me blood.     '),
(4, 'kanika@gmail.com', '  Thanks for saving my life .'),
(5, 'gurnam@gmail.com', '  Thanks !!!!! Life Care Blood Bank'),
(6, 'misssonali113@ssssccw.edu.in', '  Thanks for giving me a blood.'),
(7, 'misssonali113@ssssccw.edu.in', '  thanks'),
(8, 'misssonali1221@gmail.com', '  THANKS TO GIVE ME BLOOD'),
(9, 'missshivani113@gmail.com', '  thnks');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Inv_id` int(30) NOT NULL,
  `blood_bank_id` varchar(50) NOT NULL,
  `blood_group_id` int(30) NOT NULL,
  `Extract_id` int(30) NOT NULL,
  `Unit` varchar(11) NOT NULL,
  `Status` tinyint(2) NOT NULL,
  `Creation_date` date NOT NULL,
  `Camp_id` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Inv_id`, `blood_bank_id`, `blood_group_id`, `Extract_id`, `Unit`, `Status`, `Creation_date`, `Camp_id`) VALUES
(6, 'Ganga12@gmail.com', 1, 6, '12', 1, '2023-04-10', '3'),
(9, 'HHBB77@gmail.com', 2, 9, '21', 1, '2023-04-10', '13'),
(11, 'RRBB34@gmail.com', 8, 37, '32', 1, '2023-04-10', '3'),
(12, 'RCBB56@gmail.com', 6, 46, '25', 1, '2023-04-10', '6'),
(13, 'SSBB67@gmail.com', 3, 18, '77', 1, '2023-04-10', '15'),
(14, 'Ganga12@gmail.com', 1, 1, '2', 1, '2023-04-10', '3'),
(15, 'Ganga12@gmail.com', 2, 10, '2', 1, '2023-04-10', '3'),
(16, 'Ganga12@gmail.com', 1, 2, '12', 1, '2023-04-10', '13');

-- --------------------------------------------------------

--
-- Table structure for table `patient_registration`
--

CREATE TABLE `patient_registration` (
  `Patient_id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Login_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_registration`
--

INSERT INTO `patient_registration` (`Patient_id`, `Name`, `Password`, `Login_Id`) VALUES
(2, 'Sonali', '1N6CHieS', 'misssonali113@ssssccw.edu.in'),
(3, 'Sonali', 'YHNUy1Z9', 'misssonali113@gmail.com'),
(4, 'sonali', 'QbfRZmd2', 'misssonali113@ssssccw.edu.in'),
(5, 'Sonali', 'BKd5u4Rf', 'misssonali113@gmail.com'),
(6, 'Sonali', 'mczLiK4T', 'misssonali113@ssssccw.edu.in'),
(7, 'Gurpreet kaur', 'em1jWaxD', 'preetigurpreetkaur591@ssssccw.edu.in'),
(8, 'Simranpreet kaur ', 'gxBXVbhG', 'simranpreet1218@gmail.com'),
(9, 'Rishti', '2j7XUw8P', 'rishtipal716@gmail.com'),
(10, 'Rishti', 'jMHYbnWL', 'rishtipal716@gmail.com'),
(11, 'Rishti', 'cbH5Psjk', 'rishtipal716@gmail.com'),
(12, 'Rishti', '4ZD8LvNe', 'rishtipal716@gmail.com'),
(13, 'Rishti', 'ZfxB6qir', 'rishtipal716@gmail.com'),
(14, 'Rishti', 'ZyvKFLNg', 'rishtipal716@gmail.com'),
(15, 'Kashish', '7pk4PERJ', 'mehramonu94@gmail.com'),
(16, 'pawanpreetkaur', 'w1pdJDcq', 'pawanpreetkaur500@gmail.com'),
(17, 'Kashish Mehra', 'HAQ23pSe', 'mehramonu94@gmail.com'),
(18, '', '83PqDuYn', ''),
(20, 'devansh', 'CYuFfUq9', 'devanshbhakhri11@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `requirement_request`
--

CREATE TABLE `requirement_request` (
  `Id` int(20) NOT NULL,
  `Patient_id` varchar(50) NOT NULL,
  `Blood_group_requirement` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Extract` varchar(30) NOT NULL,
  `No_of_units` varchar(3) NOT NULL,
  `require_receipt` varchar(100) NOT NULL,
  `Priority` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `Creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirement_request`
--

INSERT INTO `requirement_request` (`Id`, `Patient_id`, `Blood_group_requirement`, `Date`, `Extract`, `No_of_units`, `require_receipt`, `Priority`, `status`, `Creation_date`) VALUES
(1, 'galaxy.rajnish@gmail.com', '2', '2023-04-10', '13', '2', '', 'moderate', 1, '2023-04-10'),
(2, 'rishtipal716@gmail.com', '4', '2023-04-10', '27', '3', '', 'normal', 1, '2023-04-10'),
(3, 'misssonali113@ssssccw.edu.in', '1', '2023-04-10', '5', '2', '', 'moderate', 1, '2023-04-10'),
(4, 'muskanbhasin0786@ssssccw.edu.in', '2', '2023-04-10', '11', '2', '', 'moderate', 1, '2023-04-10'),
(5, 'rishtipal716@gmail.com', '1', '2023-04-10', '1', '2', '', 'normal', 1, '2023-04-10'),
(6, 'rishtipal716@gmail.com', '12', '2023-04-10', '1', '1', '', 'Free', 1, '2023-04-10'),
(7, 'galaxy.rajnish@gmail.com', '2', '2023-04-10', '10', '1', '', 'Free', 1, '2023-04-10'),
(8, 'misssonali113@ssssccw.edu.in', '2', '2023-04-10', '9', '1', '', 'Free', 1, '2023-04-10'),
(9, 'amishasharma0010@gmail.com', '2', '2023-04-10', '9', '1', '', 'Free', 1, '2023-04-10'),
(10, 'poojakaur579@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(11, 'poojakaur579@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(12, 'poojakaur579@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(13, 'muskanbhasin0786@ssssccw.edu.in', '2', '2023-04-10', '10', '1', '', 'Free', 1, '2023-04-10'),
(14, 'muskanbhasin0786@ssssccw.edu.in', '8', '2023-04-10', '38', '1', '', 'Free', 1, '2023-04-10'),
(15, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(16, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(17, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(18, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(19, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(20, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(21, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(22, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(23, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(24, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(25, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(26, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(27, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(28, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(29, 'misssonali113@ssssccw.edu.in', '1', '2023-04-10', '1', '1', '', 'Free', 1, '2023-04-10'),
(30, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(31, 'misssonali113@ssssccw.edu.in', '1', '2023-04-10', '1', '1', '', 'Free', 1, '2023-04-10'),
(32, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(33, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(34, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(35, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(36, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(37, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(38, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(39, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(40, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(41, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(42, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(43, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(44, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(45, 'muskanbhasin0786@ssssccw.edu.in', '3', '2023-04-10', '19', '1', '', 'Free', 1, '2023-04-10'),
(46, 'misssonali113@ssssccw.edu.in', '2', '2023-04-10', '9', '2', '', 'moderate', 1, '2023-04-10'),
(47, 'sandhyaprajapati976@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(48, 'sandhyaprajapati976@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(49, 'sandhyaprajapati976@gmail.com', '1', '2023-04-10', '2', '1', '', 'normal', 0, '2023-04-10'),
(50, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(51, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(52, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(53, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(54, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(55, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(56, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(57, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(58, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(59, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(60, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(61, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(62, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(63, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(64, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(65, 'misssonali1221@gmail.com', '2', '2023-04-10', '11', '1', '', 'Free', 1, '2023-04-10'),
(66, 'misssonali1221@gmail.com', '2', '2023-04-10', '22', '2', '', 'normal', 1, '2023-04-10'),
(67, 'missshivani113@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(68, 'missshivani113@gmail.com', '2', '2023-04-10', '10', '2', '', 'normal', 1, '2023-04-10'),
(69, 'missshivani113@gmail.com', '1', '2023-04-10', '8', '1', '', 'normal', 1, '2023-04-10'),
(70, 'misssonali113@gmail.com', '1', '2023-04-10', '4', '1', '', 'normal', 1, '2023-04-10'),
(71, 'misssonali113@ssssccw.edu.in', '2', '2023-04-10', '9', '1', '', 'Free', 1, '2023-04-10'),
(72, 'misssonali113@ssssccw.edu.in', '4', '2023-04-10', '27', '2', '', 'normal', 1, '2023-04-10'),
(73, 'misssonali113@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(74, 'misssonali113@gmail.com', '1', '2023-04-10', '1', '1', '', 'normal', 0, '2023-04-10'),
(75, 'misssonali113@ssssccw.edu.in', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(76, 'misssonali113@ssssccw.edu.in', '4', '2023-04-10', '26', '1', '', 'moderate', 1, '2023-04-10'),
(77, 'preetigurpreetkaur591@ssssccw.edu.in', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(79, 'simranpreet1218@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(80, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(81, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(82, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(83, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(84, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(85, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(86, 'rishtipal716@gmail.com', '1', '2023-04-10', '2', '2', '', 'moderate', 0, '2023-04-10'),
(88, 'mehramonu94@gmail.com', '1', '2023-04-10', '2', '1', '', 'Free', 1, '2023-04-10'),
(89, 'pawanpreetkaur500@gmail.com', '2', '2023-04-10', '14', '2', 'images/.png', 'emergency', 1, '2023-04-10'),
(90, 'mehramonu94@gmail.com', '2', '2023-04-13', '11', '1', '', 'Free', 1, '2023-04-23'),
(91, 'devanshbhakhri11@gmail.com', '1', '2024-09-30', '2', '1', '', 'Free', 1, '2024-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `tab_payment`
--

CREATE TABLE `tab_payment` (
  `payid` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `volmedicalrep`
--

CREATE TABLE `volmedicalrep` (
  `vol_id` int(10) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Report_type` varchar(10) NOT NULL,
  `FileURL` varchar(50) NOT NULL,
  `Medicalstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volmedicalrep`
--

INSERT INTO `volmedicalrep` (`vol_id`, `Name`, `Report_type`, `FileURL`, `Medicalstatus`) VALUES
(1, 'Shrishti', 'BP', 'images/BP.png', '1'),
(3, 'Rohan Kapo', 'DIABETES', 'images/diabities.jpeg', '1'),
(4, 'Suman Kaus', 'CBC', 'images/cbc.jpeg', '1'),
(5, 'Amisha Sha', 'CBC', 'images/cbc.jpeg', '1'),
(6, 'Amisha Sha', 'BP', 'images/image_1.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `volunteerprofile`
--

CREATE TABLE `volunteerprofile` (
  `id` int(11) NOT NULL,
  `Login_Id` varchar(50) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phno` varchar(20) NOT NULL,
  `Address` varchar(10) NOT NULL,
  `Bloodgroup` varchar(20) NOT NULL,
  `Age` int(5) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `FileURL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteerprofile`
--

INSERT INTO `volunteerprofile` (`id`, `Login_Id`, `Name`, `Email`, `Phno`, `Address`, `Bloodgroup`, `Age`, `Gender`, `FileURL`) VALUES
(1, 'SV88@gmail.com', 'Srishti', 'SV88@gmail.com', '7865432109', '  Avtar Av', '1', 30, 'female', 'images/w1.jpeg'),
(2, 'AS99@gmail.com', 'Amisha Sharma', 'AS99@gmail.com', '8907650989', '  Ranjit A', '2', 40, 'female', 'images/w2.png'),
(3, 'RK77@gmail.com', 'Rohan Kapoor', 'RK77@gmail.com', '5600987569', '  Golden G', '3', 28, 'male', 'images/vol1.jpeg'),
(4, 'SK66@gmail.com', 'Suman Kaushal', 'SK66@gmail.com', '8675460098', '  Verka By', '5', 24, 'female', 'images/w3.jpeg'),
(5, 'RK77@gmail.com', 'Rohan Kapoor', 'Rs@gmail.com', '76543211136', 'Verka Bye ', '2', 29, 'male', 'images/m4.jpeg'),
(6, 'ST12@gmail.com', 'Somya Thakur', 'ST12@gmail.com', '6754312450', '  GT Road,', '4', 25, 'female', 'images/image_1.jpg'),
(8, 'SV88@gmail.com', 'Srishti', 'SV88@gmail.com', '987596489', 'Avtar Aven', '-1', 27, 'female', 'images/w3.jpeg'),
(9, 'ST12@gmail.com', 'Somya Thakur', 'mehramonu94@gmail.com', '8847373903', 'Amritsar', '3', 12, 'male', 'images/'),
(10, 'mehramonu94@gmail.com', 'Kashish', 'mehramonu94@gmail.com', '8847373903', 'Amritsar', '2', 27, 'male', 'images/'),
(11, 'mehramonu94@gmail.com', 'kashish', 'mehramonu94@gmail.com', '1111111', '  11111111', '3', 12, 'male', 'images/'),
(12, 'hushraj@thapar.edu', 'Hushraj Singh', 'hushraj@thapar.edu', '7717644689', '  Ropar', '1', 20, 'male', 'images/2T7Y1.gif'),
(13, 'devanshbhakhri11@gmail.com', 'Devansh', 'devanshbhakhri11@gmail.com', '8146667018', '  amritsar', '2', 20, 'male', 'images/gym_photo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_registration`
--

CREATE TABLE `volunteer_registration` (
  `Vol_reg_id` int(30) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(80) NOT NULL,
  `Login_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `volunteer_registration`
--

INSERT INTO `volunteer_registration` (`Vol_reg_id`, `Name`, `Password`, `Login_id`) VALUES
(1, 'kashish', '2rm5HeCL', 'mehramonu94@gmail.com'),
(2, 'Hushraj Singh', '5BCpAEaj', 'hushraj@thapar.edu'),
(3, 'Hushraj Singh', 'V1vYuGej', 'saini.hck@gmail.com'),
(4, 'Devansh', 'zJMnYySQ', 'devanshbhakhri11@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodbank`
--
ALTER TABLE `bloodbank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bloodbankparticipation`
--
ALTER TABLE `bloodbankparticipation`
  ADD PRIMARY KEY (`Participation_id`);

--
-- Indexes for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  ADD PRIMARY KEY (`Camp_id`);

--
-- Indexes for table `bloodextract`
--
ALTER TABLE `bloodextract`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`Groupid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Inv_id`);

--
-- Indexes for table `patient_registration`
--
ALTER TABLE `patient_registration`
  ADD PRIMARY KEY (`Patient_id`);

--
-- Indexes for table `requirement_request`
--
ALTER TABLE `requirement_request`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tab_payment`
--
ALTER TABLE `tab_payment`
  ADD PRIMARY KEY (`payid`);

--
-- Indexes for table `volmedicalrep`
--
ALTER TABLE `volmedicalrep`
  ADD PRIMARY KEY (`vol_id`);

--
-- Indexes for table `volunteerprofile`
--
ALTER TABLE `volunteerprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer_registration`
--
ALTER TABLE `volunteer_registration`
  ADD PRIMARY KEY (`Vol_reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bloodbank`
--
ALTER TABLE `bloodbank`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bloodbankparticipation`
--
ALTER TABLE `bloodbankparticipation`
  MODIFY `Participation_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bloodcamp`
--
ALTER TABLE `bloodcamp`
  MODIFY `Camp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bloodextract`
--
ALTER TABLE `bloodextract`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `Groupid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `Inv_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `patient_registration`
--
ALTER TABLE `patient_registration`
  MODIFY `Patient_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `requirement_request`
--
ALTER TABLE `requirement_request`
  MODIFY `Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tab_payment`
--
ALTER TABLE `tab_payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `volmedicalrep`
--
ALTER TABLE `volmedicalrep`
  MODIFY `vol_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `volunteerprofile`
--
ALTER TABLE `volunteerprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `volunteer_registration`
--
ALTER TABLE `volunteer_registration`
  MODIFY `Vol_reg_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
