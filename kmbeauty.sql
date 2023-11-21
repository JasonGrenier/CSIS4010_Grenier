-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 21, 2023 at 06:25 AM
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
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `AppointmentID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `AppointmentDate` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `ClientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`AppointmentID`, `StaffID`, `AppointmentDate`, `StartTime`, `EndTime`, `ClientID`) VALUES
(34, 5, '2023-11-22', '14:00:00', '15:00:00', 2),
(35, 5, '2023-11-23', '09:00:00', '10:00:00', 2),
(36, 4, '2023-11-24', '16:00:00', '17:00:00', 4),
(37, 4, '2023-11-25', '10:30:00', '11:30:00', 4),
(38, 4, '2023-11-26', '14:30:00', '15:30:00', 4),
(39, 5, '2023-11-27', '11:00:00', '12:00:00', 1),
(40, 5, '2023-11-28', '13:30:00', '14:30:00', 2),
(41, 5, '2023-11-29', '09:30:00', '10:30:00', 4),
(42, 4, '2023-11-20', '10:00:00', '11:00:00', 1),
(43, 4, '2023-11-21', '14:00:00', '15:30:00', 1),
(44, 4, '2023-11-22', '12:30:00', '14:30:00', 1),
(45, 5, '2023-11-23', '11:30:00', '12:30:00', 2),
(46, 5, '2023-11-24', '10:00:00', '11:30:00', 2),
(47, 5, '2023-11-25', '09:00:00', '12:00:00', 2),
(48, 4, '2023-11-26', '14:00:00', '16:00:00', 4),
(49, 4, '2023-11-27', '11:30:00', '13:30:00', 4),
(50, 4, '2023-11-28', '09:00:00', '12:00:00', 4),
(51, 5, '2023-11-29', '12:00:00', '13:30:00', 1),
(52, 5, '2023-11-30', '10:30:00', '12:30:00', 2),
(53, 5, '2023-12-01', '09:30:00', '11:00:00', 4),
(54, 4, '2023-12-20', '10:00:00', '11:00:00', 1),
(55, 4, '2023-12-21', '14:00:00', '15:30:00', 1),
(56, 4, '2023-12-22', '12:30:00', '14:30:00', 1),
(57, 5, '2023-12-23', '11:30:00', '12:30:00', 2),
(58, 5, '2023-12-24', '10:00:00', '11:30:00', 2),
(59, 5, '2023-12-25', '09:00:00', '12:00:00', 2),
(60, 4, '2023-12-26', '14:00:00', '16:00:00', 4),
(61, 4, '2023-12-27', '11:30:00', '13:30:00', 4),
(62, 4, '2023-12-28', '09:00:00', '12:00:00', 4),
(63, 5, '2023-11-29', '12:00:00', '13:30:00', 1),
(64, 5, '2023-11-30', '10:30:00', '12:30:00', 2),
(65, 5, '2023-12-01', '09:30:00', '11:00:00', 4),
(66, 4, '2023-12-07', '10:00:00', '11:00:00', 1),
(67, 4, '2023-12-08', '14:00:00', '15:30:00', 1),
(68, 4, '2023-12-09', '12:30:00', '14:30:00', 1),
(69, 5, '2023-12-10', '11:30:00', '12:30:00', 2),
(70, 5, '2023-12-11', '10:00:00', '11:30:00', 2),
(71, 5, '2023-12-12', '09:00:00', '12:00:00', 2),
(72, 4, '2023-12-13', '14:00:00', '16:00:00', 4),
(73, 4, '2023-12-14', '11:30:00', '13:30:00', 4),
(74, 4, '2023-12-15', '09:00:00', '12:00:00', 4),
(75, 5, '2023-11-16', '12:00:00', '13:30:00', 1),
(76, 5, '2023-11-17', '10:30:00', '12:30:00', 2),
(77, 5, '2023-12-18', '09:30:00', '11:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Availability`
--

CREATE TABLE `Availability` (
  `AvailabilityID` int(11) NOT NULL,
  `StaffID` int(11) DEFAULT NULL,
  `DayOfWeek` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Availability`
--

INSERT INTO `Availability` (`AvailabilityID`, `StaffID`, `DayOfWeek`, `StartTime`, `EndTime`) VALUES
(1, 4, 'Monday', '09:00:00', '17:00:00'),
(3, 4, 'Tuesday', '09:00:00', '17:00:00'),
(4, 5, 'Tuesday', '10:00:00', '17:00:00'),
(5, 4, 'Wednesday', '10:00:00', '17:00:00'),
(6, 4, 'Thursday', '10:00:00', '17:00:00'),
(7, 4, 'Friday', '10:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `ClientID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`ClientID`, `FirstName`, `LastName`, `Email`, `Phone`) VALUES
(1, 'Jason', 'Grenier', 'grenier.software@gmail.com', '111-222-3333'),
(2, 'Sally', 'Joe', 'scupofjoe@gmail.com', '5082223344'),
(4, 'Lucia', 'Manzo', 'bestbaker@yahoo.com', '1112224444');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `StaffID` (`StaffID`),
  ADD KEY `FK_ClientID` (`ClientID`);

--
-- Indexes for table `Availability`
--
ALTER TABLE `Availability`
  ADD PRIMARY KEY (`AvailabilityID`),
  ADD KEY `StaffID` (`StaffID`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ClientID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `AppointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `Availability`
--
ALTER TABLE `Availability`
  MODIFY `AvailabilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `FK_ClientID` FOREIGN KEY (`ClientID`) REFERENCES `Client` (`ClientID`),
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

--
-- Constraints for table `Availability`
--
ALTER TABLE `Availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`StaffID`) REFERENCES `Staff` (`StaffID`);

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
