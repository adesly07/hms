-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 11:41 PM
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
-- Table structure for table `create_login`
--

CREATE TABLE `create_login` (
  `cid` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_login`
--

INSERT INTO `create_login` (`cid`, `name`, `username`, `password`, `section`) VALUES
(1, 'Sylvester', 'sly', 'sly', 'Administrator'),
(2, 'Agbonyin Jimi', 'jim', 'jim', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `pid` int(4) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `u_price` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `s_date` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`pid`, `p_name`, `u_price`, `user`, `s_date`, `ip`) VALUES
(1, 'Jollof Rice', '100', 'Sylvester', '2023/05/23', '::1'),
(2, 'Chicken', '400', 'Sylvester', '2023/05/23', '::1'),
(3, 'Bottle water', '100', 'Sylvester', '2023/05/23', '::1'),
(4, 'Fried Rice', '100', 'Sylvester', '2023/05/23', '::1'),
(5, 'Fried Fish', '200', 'Sylvester', '2023/05/23', '::1'),
(7, 'Malt', '250', 'Sylvester', '2023/05/23', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(20) NOT NULL,
  `pid` int(10) NOT NULL,
  `r_no` varchar(10) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `p_rate` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `cashier` varchar(20) NOT NULL,
  `i_date` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `i_time` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `pid`, `r_no`, `p_name`, `qty`, `p_rate`, `amount`, `cashier`, `i_date`, `month`, `year`, `i_time`, `ip`) VALUES
(2, 1, '463446736', 'Jollof Rice', '2', '100', '200', 'Sylvester', '2023/05/23', 'May', '2023', '17:32:49', ''),
(3, 2, '463446736', 'Chicken', '1', '400', '400', 'Sylvester', '2023/05/23', 'May', '2023', '17:33:04', ''),
(4, 3, '463446736', 'Bottle water', '2', '100', '200', 'Sylvester', '2023/05/23', 'May', '2023', '17:34:28', ''),
(5, 4, '930821834', 'Fried Rice', '3', '100', '300', 'Sylvester', '2023/05/23', 'May', '2023', '19:21:47', ''),
(6, 5, '930821834', 'Fried Fish', '1', '200', '200', 'Sylvester', '2023/05/23', 'May', '2023', '19:22:00', ''),
(7, 7, '930821834', 'Malt', '1', '250', '250', 'Sylvester', '2023/05/23', 'May', '2023', '19:22:26', ''),
(8, 1, '759267299', 'Jollof Rice', '4', '100', '400', 'Sylvester', '2023/05/23', 'May', '2023', '19:46:43', ''),
(9, 7, '759267299', 'Malt', '1', '250', '250', 'Sylvester', '2023/05/23', 'May', '2023', '19:46:57', ''),
(10, 5, '759267299', 'Fried Fish', '1', '200', '200', 'Sylvester', '2023/05/23', 'May', '2023', '19:47:10', ''),
(11, 4, '157968765', 'Fried Rice', '2', '100', '200', 'Sylvester', '2023/05/23', 'May', '2023', '22:33:24', '');

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
  `Discount` varchar(4) NOT NULL,
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

INSERT INTO `tblbooking` (`ID`, `RoomType`, `RoomNumber`, `BookingNumber`, `CName`, `CNumber`, `CEmail`, `IDType`, `IDNumber`, `Gender`, `Address`, `CheckinDate`, `CheckoutDate`, `NDays`, `Discount`, `Price`, `Amount`, `AmtPaid`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 'Single Room', 'U001', 204995719, 'Sylvester Seun', '08064405936', 'adesly07@gmail.com', 'Voter ID Card', '3456676667', 'Male', 'No 12, Elephant bus stop, Oluyole Estate Extension, Ibadan', '2023-05-21', '2023-05-22', 1, '2', 5500, 5390, 3500, '2023-05-21 17:22:34', 'Approved', 'Checkedin', '2023-05-23 08:02:11'),
(2, 'Single Room', 'U002', 649031605, 'Sylvester Seun', '08064405936', 'adesly07@gmail.com', 'Voter ID Card', '43455', 'Male', 'No 12, Elephant bus stop, Oluyole Estate Extension, Ibadan', '2023-05-21', '2023-05-22', 1, '', 5500, 5500, 5500, '2023-05-21 20:45:32', 'Approved', 'Checkout', '2023-05-23 08:02:12'),
(3, 'Single Room', 'U002', 902051995, 'Adedigba Amy', '08064405936', 'amy@gmail.com', 'Voter ID Card', '12335456567', 'Female', 'No 12, Elephant bus stop, Oluyole Estate Extension, Ibadan', '2023-05-22', '2023-05-24', 2, '', 5500, 11000, 0, '2023-05-22 19:49:16', 'Approved', 'Booked', '2023-05-23 08:02:12'),
(4, 'Double Room', 'U003', 241850529, 'Mary Yewande', '08059605896', 'maryadedioyin@gmail.com', 'National ID Card', '23455342123', 'Female', 'No 12, Elephant bus stop, Oluyole Estate Extension, Ibadan', '2023-05-22', '2023-05-27', 5, '', 11000, 55000, 55000, '2023-05-22 20:12:08', 'Approved', 'Checkout', '2023-05-23 08:02:12');

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
(1, 'Single Room', '26', 'Only for one person. A single room is for one person and contains a single bed, and will usually be quite small', 1, 'TV and Wireless internet access', 5500, '2023-05-22 17:04:09'),
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
-- Table structure for table `tblfacility`
--

CREATE TABLE `tblfacility` (
  `ID` int(10) NOT NULL,
  `FacilityTitle` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  `file_size` varchar(200) NOT NULL,
  `file_type` varchar(200) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfacility`
--

INSERT INTO `tblfacility` (`ID`, `FacilityTitle`, `Description`, `file_name`, `file_size`, `file_type`, `CreationDate`) VALUES
(1, '24-Hour room service', '24-Hour room service available', '084767659_911420212658843_8788358700935938048_n.jpg', '512509', 'image/jpeg', '2023-05-22 10:53:20'),
(2, 'Meeting facilities', 'Meeting facilities available for company person', '0UI Hotel.jpg', '468463', 'image/jpeg', '2023-05-22 10:58:47');

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
(1, 'Single Room', 'U001', 1, 'portfolio1.jpg', '9760', 'image/jpeg', '2023-05-22 15:40:18'),
(2, 'Double Room', 'U004', 0, 'portfolio2.jpg', '32890', 'image/jpeg', '2023-05-22 15:40:20'),
(3, 'Single Room', 'U002', 1, 'portfolio3.jpg', '9760', 'image/jpeg', '2023-05-22 19:49:16'),
(4, 'Double Room', 'U003', 0, '0portfolio-3.jpg', '101159', 'image/jpeg', '2023-05-22 20:41:34');

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
-- Indexes for table `create_login`
--
ALTER TABLE `create_login`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tblfacility`
--
ALTER TABLE `tblfacility`
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
-- AUTO_INCREMENT for table `create_login`
--
ALTER TABLE `create_login`
  MODIFY `cid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `pid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `tblfacility`
--
ALTER TABLE `tblfacility`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
