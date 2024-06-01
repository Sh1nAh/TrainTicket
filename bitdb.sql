-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 10:23 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(30) NOT NULL,
  `Rank` varchar(30) NOT NULL,
  `PhNo` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `Rank`, `PhNo`, `Address`) VALUES
(3, 'Kyawt No No Aung', 'Station Master', '09256194212', 'Yangon'),
(4, 'U San Aung', 'Station Master', '09256194212', 'Nay Pyi Taw'),
(5, 'U Aung', 'Station Clark', '095063784', 'Yangon');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `CoachID` int(11) NOT NULL,
  `TrainID` int(11) NOT NULL,
  `CoachNo` varchar(30) NOT NULL,
  `CoachType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`CoachID`, `TrainID`, `CoachNo`, `CoachType`) VALUES
(2, 1, 'OCA', 'Ordinary Class'),
(3, 1, 'OCB', 'Ordinary Class'),
(4, 1, 'OCC', 'Ordinary Class'),
(5, 1, 'OCD', 'Ordinary Class'),
(6, 1, 'OCE', 'Ordinary Class'),
(7, 1, 'OCF', 'Ordinary Class'),
(8, 1, 'OCG', 'Ordinary Class'),
(9, 1, 'OCH', 'Ordinary Class'),
(10, 1, 'UCA', 'Upper Class'),
(11, 1, 'UCB', 'Upper Class'),
(12, 1, 'UCC', 'Upper Class'),
(13, 1, 'US', 'Upper Slepper'),
(22, 2, 'OCA', 'Ordinary Class'),
(23, 2, 'OCB', 'Ordinary Class'),
(24, 2, 'OCC', 'Ordinary Class'),
(25, 2, 'OCD', 'Ordinary Class'),
(26, 2, 'OCE', 'Ordinary Class'),
(27, 2, 'OCF', 'Ordinary Class'),
(28, 2, 'OCG', 'Ordinary Class'),
(29, 2, 'OCH', 'Ordinary Class'),
(30, 2, 'UCA', 'Upper Class'),
(31, 2, 'UCB', 'Upper Class'),
(32, 2, 'UCC', 'Upper Class'),
(33, 2, 'US', 'Upper Slepper'),
(39, 3, 'OCA', 'Ordinary Class'),
(40, 3, 'OCB', 'Ordinary Class'),
(41, 3, 'OCC', 'Ordinary Class'),
(42, 3, 'OCD', 'Ordinary Class'),
(43, 3, 'OCE', 'Ordinary Class'),
(44, 3, 'OCF', 'Ordinary Class'),
(45, 3, 'OCG', 'Ordinary Class'),
(46, 3, 'OCH', 'Ordinary Class'),
(47, 3, 'UCA', 'Upper Class'),
(48, 3, 'UCB', 'Upper Class'),
(49, 3, 'UCC', 'Upper Class'),
(50, 3, 'US', 'Upper Slepper'),
(56, 4, 'OCA', 'Ordinary Class'),
(57, 4, 'OCB', 'Ordinary Class'),
(58, 4, 'OCC', 'Ordinary Class'),
(59, 4, 'OCD', 'Ordinary Class'),
(60, 4, 'OCE', 'Ordinary Class'),
(61, 4, 'OCF', 'Ordinary Class'),
(62, 4, 'OCG', 'Ordinary Class'),
(63, 4, 'OCH', 'Ordinary Class'),
(64, 4, 'UCA', 'Upper Class'),
(65, 4, 'UCC', 'Upper Class'),
(66, 4, 'US', 'Upper Slepper'),
(72, 5, 'OCA', 'Ordinary Class'),
(73, 5, 'OCB', 'Ordinary Class'),
(74, 5, 'OCC', 'Ordinary Class'),
(75, 5, 'OCD', 'Ordinary Class'),
(76, 5, 'OCE', 'Ordinary Class'),
(77, 5, 'OCF', 'Ordinary Class'),
(78, 5, 'OCG', 'Ordinary Class'),
(79, 5, 'OCH', 'Ordinary Class'),
(80, 5, 'UCA', 'Upper Class'),
(81, 5, 'UCB', 'Upper Class'),
(82, 5, 'UCC', 'Upper Class'),
(83, 5, 'US', 'Upper Slepper'),
(89, 6, 'OCA', 'Ordinary Class'),
(90, 6, 'OCB', 'Ordinary Class'),
(91, 6, 'OCC', 'Ordinary Class'),
(92, 6, 'OCD', 'Ordinary Class'),
(93, 6, 'OCE', 'Ordinary Class'),
(94, 6, 'OCF', 'Ordinary Class'),
(95, 6, 'OCG', 'Ordinary Class'),
(96, 6, 'OCH', 'Ordinary Class'),
(97, 6, 'UCA', 'Upper Class'),
(98, 6, 'UCB', 'Upper Class'),
(99, 6, 'UCC', 'Upper Class'),
(100, 6, 'US', 'Upper Slepper'),
(106, 7, 'OCA', 'Ordinary Class'),
(107, 7, 'OCB', 'Ordinary Class'),
(108, 7, 'OCC', 'Ordinary Class'),
(109, 7, 'OCD', 'Ordinary Class'),
(110, 7, 'OCE', 'Ordinary Class'),
(111, 7, 'OCF', 'Ordinary Class'),
(112, 7, 'OCG', 'Ordinary Class'),
(113, 7, 'OCH', 'Ordinary Class'),
(114, 7, 'UCA', 'Upper Class'),
(115, 7, 'UCB', 'Upper Class'),
(116, 7, 'UCC', 'Upper Class'),
(117, 7, 'US', 'Upper Slepper'),
(123, 8, 'OCA', 'Ordinary Class'),
(124, 8, 'OCB', 'Ordinary Class'),
(125, 8, 'OCC', 'Ordinary Class'),
(126, 8, 'OCD', 'Ordinary Class'),
(127, 8, 'OCE', 'Ordinary Class'),
(128, 8, 'OCF', 'Ordinary Class'),
(129, 8, 'OCG', 'Ordinary Class'),
(130, 8, 'OCH', 'Ordinary Class'),
(131, 8, 'UCA', 'Upper Class'),
(132, 8, 'UCB', 'Upper Class'),
(133, 8, 'UCC', 'Upper Class'),
(134, 8, 'US', 'Upper Slepper');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `ReserveID` varchar(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `TicketQty` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ReserveID`, `UserID`, `Date`, `TicketQty`, `TotalAmount`, `Status`) VALUES
('R_000001', 1, '2019-11-23', 1, 600, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `reservedetail`
--

CREATE TABLE `reservedetail` (
  `ReserveID` varchar(11) NOT NULL,
  `TicketID` int(11) NOT NULL,
  `Fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rtraveller`
--

CREATE TABLE `rtraveller` (
  `TravellerID` int(11) NOT NULL,
  `ReserveID` varchar(11) NOT NULL,
  `TravellerName` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Age` varchar(30) NOT NULL,
  `NRCNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rtraveller`
--

INSERT INTO `rtraveller` (`TravellerID`, `ReserveID`, `TravellerName`, `Gender`, `Age`, `NRCNo`) VALUES
(4, '', 'No No', 'Female', '19', '238022');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatID` int(11) NOT NULL,
  `CoachID` int(11) NOT NULL,
  `SeatNo` varchar(30) NOT NULL,
  `SeatType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatID`, `CoachID`, `SeatNo`, `SeatType`) VALUES
(4, 2, '5OCA1', 'Ordinary Class'),
(5, 2, '5OCA2', 'Ordinary Class'),
(6, 2, '5OCA3', 'Ordinary Class'),
(7, 2, '5OCA4', 'Ordinary Class'),
(8, 2, '5OCA5', 'Ordinary Class'),
(66, 3, '5OCB1', 'Ordinary Class'),
(67, 3, '5OCB2', 'Ordinary Class'),
(68, 3, '5OCB3', 'Ordinary Class'),
(69, 3, '5OCB4', 'Ordinary Class'),
(70, 3, '5OCB5', 'Ordinary Class'),
(128, 4, '5OCC1', 'Ordinary Class'),
(129, 4, '5OCC2', 'Ordinary Class'),
(130, 4, '5OCC3', 'Ordinary Class'),
(131, 4, '5OCC4', 'Ordinary Class'),
(132, 4, '5OCC5', 'Ordinary Class'),
(138, 5, '5OCD1', 'Ordinary Class'),
(139, 5, '5OCD2', 'Ordinary Class'),
(140, 5, '5OCD3', 'Ordinary Class'),
(141, 5, '5OCD4', 'Ordinary Class'),
(142, 5, '5OCD5', 'Ordinary Class'),
(148, 6, '5OCE1', 'Ordinary Class'),
(149, 6, '5OCE2', 'Ordinary Class'),
(150, 6, '5OCE3', 'Ordinary Class'),
(151, 6, '5OCE4', 'Ordinary Class'),
(152, 6, '5OCE5', 'Ordinary Class'),
(153, 7, '5OCF1', 'Ordinary Class'),
(154, 7, '5OCF2', 'Ordinary Class'),
(155, 7, '5OCF3', 'Ordinary Class'),
(156, 7, '5OCF4', 'Ordinary Class'),
(157, 7, '5OCF5', 'Ordinary Class'),
(158, 10, '5UCA1', 'Upper Class'),
(159, 10, '5UCA2', 'Upper Class'),
(160, 10, '5UCA3', 'Upper Class'),
(161, 10, '5UCA4', 'Upper Class'),
(162, 10, '5UCA5', 'Upper Class'),
(169, 13, '5USA1', 'Upper Sleeper'),
(170, 13, '5USA2', 'Upper Sleeper'),
(171, 13, '5USA3', 'Upper Sleeper'),
(172, 13, '5USA4', 'Upper Sleeper');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `SellID` varchar(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `TicketQty` int(11) NOT NULL,
  `TotalAmount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `selldetail`
--

CREATE TABLE `selldetail` (
  `SellID` varchar(11) NOT NULL,
  `TicketID` int(11) NOT NULL,
  `Fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `StationID` int(11) NOT NULL,
  `RouteID` int(11) NOT NULL,
  `StationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`StationID`, `RouteID`, `StationName`) VALUES
(4, 1, 'BAGO (UP)'),
(5, 2, 'BAGO (DN)'),
(6, 1, 'DIKU (UP)'),
(7, 2, 'DIKU (DN)'),
(8, 1, 'PTZ (UP)'),
(9, 2, 'PTZ (DN)'),
(10, 2, 'NLB (DN)'),
(11, 1, 'NLB (UP)'),
(12, 1, 'PWG (UP)'),
(13, 2, 'PWG (DN)'),
(14, 1, 'PYU (UP)'),
(15, 2, 'PYU (DN)'),
(16, 1, 'TGO (UP)'),
(17, 2, 'TGO (DN)'),
(18, 1, 'YDS (UP)'),
(19, 2, 'YDS (DN)'),
(20, 1, 'SWA (UP)'),
(21, 2, 'SWA (DN)'),
(22, 1, 'YNI (UP)'),
(23, 2, 'YNI (DN)'),
(24, 1, 'PMA (UP)'),
(25, 2, 'PMA (DN)'),
(26, 1, 'NPT (UP)'),
(27, 2, 'NPT (DN)'),
(28, 1, 'TAT (UP)'),
(29, 2, 'TAT (DN)'),
(30, 1, 'YAM (UP)'),
(31, 2, 'YAM (DN)'),
(32, 1, 'PWW (UP)'),
(33, 2, 'PWW (DN)'),
(34, 1, 'TZI (UP)'),
(35, 2, 'TZI (DN)'),
(36, 1, 'TEW (UP)'),
(37, 2, 'TEW (DN)'),
(38, 1, 'MDY (UP)'),
(39, 2, 'YGN (DN)'),
(42, 1, 'KUK (UP)'),
(43, 2, 'KUK (DN)'),
(44, 1, 'ELA (UP)'),
(45, 2, 'ELA (DN)'),
(46, 1, 'MTH (UP)'),
(47, 2, 'MTH (DN)'),
(48, 1, 'KSE (UP)'),
(49, 2, 'KSE (DN)');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketID` int(11) NOT NULL,
  `Date` varchar(30) NOT NULL,
  `TrainNo` varchar(30) NOT NULL,
  `TrainType` varchar(30) NOT NULL,
  `CoachNo` varchar(30) NOT NULL,
  `CoachType` varchar(30) NOT NULL,
  `SeatNo` varchar(30) NOT NULL,
  `DepartureTime` varchar(30) NOT NULL,
  `ArrivalStation` varchar(30) NOT NULL,
  `Route` varchar(30) NOT NULL,
  `Fare` int(11) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketID`, `Date`, `TrainNo`, `TrainType`, `CoachNo`, `CoachType`, `SeatNo`, `DepartureTime`, `ArrivalStation`, `Route`, `Fare`, `Status`) VALUES
(4, '2019-11-17', '5 UP', 'Special Express', 'OCA', 'Ordinary Class', '5OCA1', '3:00 PM', 'BAGO (UP)', 'Mandalay (Yangon - Mandalay)', 600, 'Reserved'),
(5, '2019-11-17', '5 UP', 'Special Express', 'UCA', 'Upper Class', '5UCA1', '3:00 PM', 'BAGO (UP)', 'Mandalay (Yangon - Mandalay)', 1150, 'Available'),
(6, '2019-11-17', '5 UP', 'Special Express', 'US', 'Upper Sleeper', '5USA1', '3:00 PM', 'BAGO (UP)', 'Mandalay (Yangon - Mandalay)', 1550, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `TrainID` int(11) NOT NULL,
  `AdminID` int(11) NOT NULL,
  `RouteID` int(11) NOT NULL,
  `TrainNo` varchar(30) NOT NULL,
  `TrainType` varchar(30) NOT NULL,
  `DepartureTime` varchar(30) NOT NULL,
  `ArrivalTime` varchar(30) NOT NULL,
  `Stations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`TrainID`, `AdminID`, `RouteID`, `TrainNo`, `TrainType`, `DepartureTime`, `ArrivalTime`, `Stations`) VALUES
(1, 3, 1, '5 UP', 'Special Express', '3:00 PM', '5:00 AM', 'BAGO (UP),TGO (UP),PMA (UP),NPT (UP),TZI (UP),MDY (UP),'),
(2, 3, 2, '6 DN', 'Special Express', '3:00 PM', '5:00 AM', 'BAGO (DN),TGO (DN),PMA (DN),NPT (DN),TZI (DN),YGN (DN),'),
(3, 3, 1, '3 UP', 'Express', '5:00 PM', '8:00 AM', 'BAGO (UP),DIKU (UP),NLB (UP),PYU (UP),TGO (UP),NPT (UP),TAT (UP),YAM (UP),PWW (UP),TZI (UP),MDY (UP),KUK (UP),ELA (UP),MTH (UP),KSE (UP),'),
(4, 3, 2, '4 DN', 'Express', '5:00 PM', '8:00 AM', 'BAGO (DN),DIKU (DN),NLB (DN),PYU (DN),TGO (DN),NPT (DN),TAT (DN),YAM (DN),PWW (DN),TZI (DN),YGN (DN),KUK (DN),ELA (DN),MTH (DN),KSE (DN),'),
(5, 3, 1, '11 UP', 'Express', '6:00 AM', '9:00 PM', 'BAGO (UP),DIKU (UP),PTZ (UP),NLB (UP),PWG (UP),PYU (UP),TGO (UP),YDS (UP),SWA (UP),YNI (UP),PMA (UP),NPT (UP),TAT (UP),YAM (UP),PWW (UP),TZI (UP),TEW (UP),MDY (UP),'),
(6, 3, 2, '12 DN', 'Express', '6:00 AM', '9:00 PM', 'BAGO (DN),DIKU (DN),PTZ (DN),NLB (DN),PWG (DN),PYU (DN),TGO (DN),YDS (DN),SWA (DN),YNI (DN),PMA (DN),NPT (DN),TAT (DN),YAM (DN),PWW (DN),TZI (DN),TEW (DN),YGN (DN),'),
(7, 3, 1, '1 UP', 'Mail Train', '4:00 AM', '3:00 AM', 'BAGO (UP),DIKU (UP),PTZ (UP),NLB (UP),PWG (UP),PYU (UP),TGO (UP),YDS (UP),SWA (UP),YNI (UP),PMA (UP),NPT (UP),TAT (UP),YAM (UP),PWW (UP),TZI (UP),TEW (UP),MDY (UP),KUK (UP),ELA (UP),MTH (UP),KSE (UP),'),
(8, 3, 2, '2 DN', 'Mail Train', '8:30 AM', '9:30 AM', 'BAGO (DN),DIKU (DN),PTZ (DN),NLB (DN),PWG (DN),PYU (DN),TGO (DN),YDS (DN),SWA (DN),YNI (DN),PMA (DN),NPT (DN),TAT (DN),YAM (DN),PWW (DN),TZI (DN),TEW (DN),YGN (DN),KUK (DN),ELA (DN),MTH (DN),KSE (DN),');

-- --------------------------------------------------------

--
-- Table structure for table `trainroute`
--

CREATE TABLE `trainroute` (
  `RouteID` int(11) NOT NULL,
  `Route` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainroute`
--

INSERT INTO `trainroute` (`RouteID`, `Route`) VALUES
(1, 'Mandalay (Yangon - Mandalay)'),
(2, 'Yangon (Mandalay - Yangon)');

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE `traveller` (
  `TravellerID` int(11) NOT NULL,
  `SellID` varchar(11) NOT NULL,
  `TravellerName` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Age` varchar(30) NOT NULL,
  `NRCNo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `PhNo` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `ConfirmPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Gender`, `PhNo`, `Password`, `ConfirmPassword`) VALUES
(1, 'Ei Po Po Aung', 'Female', '095063784', '2626', ''),
(2, 'Ei Ei Khaing', 'Female', '09799816696', '0000', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`CoachID`);

--
-- Indexes for table `rtraveller`
--
ALTER TABLE `rtraveller`
  ADD PRIMARY KEY (`TravellerID`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatID`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`StationID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketID`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`TrainID`);

--
-- Indexes for table `trainroute`
--
ALTER TABLE `trainroute`
  ADD PRIMARY KEY (`RouteID`);

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`TravellerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `CoachID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `rtraveller`
--
ALTER TABLE `rtraveller`
  MODIFY `TravellerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `SeatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;
--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `StationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `TrainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `trainroute`
--
ALTER TABLE `trainroute`
  MODIFY `RouteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
