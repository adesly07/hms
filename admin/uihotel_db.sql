-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 11:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uihotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(11) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Adedigba Sylvester', 'admin', '08064405936', 'adesly07@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2023-05-18 12:17:58'),
(2, 'Sylvester Seun', 'sly', '07085362201', 'adesly07@gmail.com', 'sly', '0000-00-00 00:00:00'),
(3, 'Amy Adedigba', 'amy', '08077889789', 'amy@gmail.com', 'amy', '0000-00-00 00:00:00'),
(4, 'Mary', 'mary', '0806', 'mary@g.com', 'mary', '0000-00-00 00:00:00'),
(5, 'Moyin', 'moyin', '080', 'moyin@g.com', 'moyin', '2023-05-17 23:31:19'),
(6, 'Sylvester Seun', 'seun', '08064405936', 'adesly07@gmail.com', 'f15117b4bc582e2b21cb2116f2d5c88d', '2023-05-18 12:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `ID` int(10) NOT NULL,
  `RoomType` varchar(50) DEFAULT NULL,
  `RoomNumber` varchar(20) DEFAULT NULL,
  `BookingNumber` int(9) NOT NULL,
  `CName` varchar(200) NOT NULL,
  `CNumber` varchar(11) NOT NULL,
  `CEmail` varchar(50) NOT NULL,
  `IDType` varchar(120) DEFAULT NULL,
  `IDNumber` varchar(20) NOT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `CheckinDate` varchar(200) DEFAULT NULL,
  `CheckoutDate` varchar(200) DEFAULT NULL,
  `NDays` int(4) NOT NULL,
  `Price` int(10) NOT NULL,
  `Amount` int(10) NOT NULL,
  `AmtPaid` int(10) NOT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`ID`, `RoomType`, `RoomNumber`, `BookingNumber`, `CName`, `CNumber`, `CEmail`, `IDType`, `IDNumber`, `Gender`, `Address`, `CheckinDate`, `CheckoutDate`, `NDays`, `Price`, `Amount`, `AmtPaid`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 'Single Room', 'U001', 204995719, 'Sylvester Seun', '08064405936', 'adesly07@gmail.com', 'Voter ID Card', '3456676667', 'Male', 'No 12, Elephant bus stop, Oluyole Estate Extension, Ibadan', '2023-05-21', '2023-05-22', 1, 5500, 5500, 0, '2023-05-21 17:22:34', 'Pending', 'Reserved', '2023-05-21 23:25:59'),
(2, 'Single Room', 'U002', 649031605, 'Sylvester Seun', '08064405936', 'adesly07@gmail.com', 'Voter ID Card', '43455', 'Male', 'No 12, Elephant bus stop, Oluyole Estate Extension, Ibadan', '2023-05-21', '2023-05-22', 1, 5500, 5500, 5500, '2023-05-21 20:45:32', 'Pending', 'Checkout', '2023-05-22 09:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `RoomType` varchar(120) DEFAULT NULL,
  `Nrooms` varchar(20) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `NofPersons` int(10) NOT NULL,
  `RoomFacility` text NOT NULL,
  `Price` int(10) NOT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `RoomType`, `Nrooms`, `Description`, `NofPersons`, `RoomFacility`, `Price`, `Date`) VALUES
(1, 'Single Room', '26', 'Only for one person', 1, 'TV and Wireless internet access', 5500, '2023-05-21 15:36:04'),
(2, 'Double Room', '20', 'For two persons with large bed size', 2, 'Wireless internet access, TV, 2 beds', 11000, '2023-05-21 15:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `EnquiryDate` timestamp NULL DEFAULT current_timestamp(),
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `ID` int(10) NOT NULL,
  `RoomType` varchar(50) DEFAULT NULL,
  `RoomNumber` varchar(200) DEFAULT NULL,
  `Status` int(4) DEFAULT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`ID`, `RoomType`, `RoomNumber`, `Status`, `file_name`, `file_size`, `file_type`, `CreationDate`) VALUES
(1, 'Single Room', 'U001', 1, '02022-05-29.jpg', '9760', 'image/jpeg', '2023-05-21 23:40:37'),
(2, 'Double Room', 'U004', 0, '048376952_570351836765684_690836609716715520_n.jpg', '32890', 'image/jpeg', '2023-05-21 17:22:03'),
(3, 'Single Room', 'U002', 0, '02022-05-29.jpg', '9760', 'image/jpeg', '2023-05-22 07:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
