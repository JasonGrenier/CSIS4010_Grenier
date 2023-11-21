-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 20, 2023 at 10:20 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmbeauty`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments_test`
--

CREATE TABLE `appointments_test` (
  `appointment_id` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointments_test`
--

INSERT INTO `appointments_test` (`appointment_id`, `StaffID`, `appointment_date`, `start_time`, `end_time`, `customer_name`, `customer_contact`) VALUES
(2, 4, '2023-11-20', '10:00:00', '11:00:00', 'John Doe', '123-456-7890'),
(3, 4, '2023-11-20', '13:00:00', '15:00:00', 'John Doe', '123-456-7890'),
(5, 4, '2023-12-04', '13:00:00', '15:00:00', 'Jane Doe', '123-456-7890');

-- --------------------------------------------------------

--
-- Table structure for table `availability_test`
--

CREATE TABLE `availability_test` (
  `availability_id` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `availability_test`
--

INSERT INTO `availability_test` (`availability_id`, `StaffID`, `day_of_week`, `start_time`, `end_time`) VALUES
(1, 4, 'Monday', '09:00:00', '17:00:00'),
(3, 4, 'Tuesday', '09:00:00', '17:00:00'),
(4, 5, 'Tuesday', '10:00:00', '17:00:00'),
(5, 4, 'Wednesday', '10:00:00', '17:00:00'),
(6, 4, 'Thursday', '10:00:00', '17:00:00'),
(7, 4, 'Friday', '10:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Salon`
--

CREATE TABLE `Salon` (
  `SalonID` int(11) NOT NULL,
  `SalonName` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Salon`
--

INSERT INTO `Salon` (`SalonID`, `SalonName`, `Address`, `Phone`, `Description`) VALUES
(1, 'ABC Salon', '123 Main St, City, Country', '555-123-4567', 'A trendy salon with a cozy atmosphere'),
(2, 'XYZ Salon', '456 Elm St, City, Country', '555-987-6543', 'Specializing in hair and beauty services'),
(3, 'PQR Spa', '789 Oak St, City, Country', '555-222-3333', 'Relax and rejuvenate at our spa'),
(4, 'K & M Beauty', '123 Beauty St, North Attleboro, MA', '555-XXXXXXX', 'A trendy salon co-owned by Kerri and Mel');

-- --------------------------------------------------------

--
-- Table structure for table `Service`
--

CREATE TABLE `Service` (
  `ServiceID` int(11) NOT NULL,
  `SalonID` int(11) DEFAULT NULL,
  `ServiceName` varchar(100) NOT NULL,
  `Description` text,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Service`
--

INSERT INTO `Service` (`ServiceID`, `SalonID`, `ServiceName`, `Description`, `Price`) VALUES
(4, 4, 'Hair Styling', 'Haircut and styling services', '50.00'),
(5, 4, 'Nail Care', 'Manicure and pedicure', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `StaffID` int(11) NOT NULL,
  `SalonID` int(11) DEFAULT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`StaffID`, `SalonID`, `FirstName`, `LastName`, `Phone`, `Email`) VALUES
(4, 4, 'Kerri', 'Demoura', '+1 774-306-4001', 'k.m.beautylounge411@gmail.com'),
(5, 4, 'Mel', 'Nyberg', '+1 774-306-4001', 'k.m.beautylounge411@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 'JGrenier12', 'Password1', 'Jason', 'Grenier', 'grenier.software@gmail.com', '774-254-2429');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments_test`
--
ALTER TABLE `appointments_test`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `availability_test`
--
ALTER TABLE `availability_test`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `Salon`
--
ALTER TABLE `Salon`
  ADD PRIMARY KEY (`SalonID`);

--
-- Indexes for table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ServiceID`),
  ADD KEY `SalonID` (`SalonID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD KEY `SalonID` (`SalonID`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments_test`
--
ALTER TABLE `appointments_test`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `availability_test`
--
ALTER TABLE `availability_test`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Salon`
--
ALTER TABLE `Salon`
  MODIFY `SalonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Service`
--
ALTER TABLE `Service`
  MODIFY `ServiceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments_test`
--
ALTER TABLE `appointments_test`
  ADD CONSTRAINT `appointments_test_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `availability_test`
--
ALTER TABLE `availability_test`
  ADD CONSTRAINT `availability_test_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `Service`
--
ALTER TABLE `Service`
  ADD CONSTRAINT `Service_ibfk_1` FOREIGN KEY (`SalonID`) REFERENCES `Salon` (`SalonID`);

--
-- Constraints for table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `FK_SalonID_Staff` FOREIGN KEY (`SalonID`) REFERENCES `Salon` (`SalonID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
