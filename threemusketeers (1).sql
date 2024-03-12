-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2024 at 03:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `threemusketeers`
--

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `memtel` varchar(10) NOT NULL,
  `dateIn` datetime NOT NULL,
  `dateOut` datetime NOT NULL,
  `staId` varchar(5) NOT NULL,
  `listName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`memtel`, `dateIn`, `dateOut`, `staId`, `listName`) VALUES
('257877445', '2024-03-13 20:19:00', '2024-03-15 18:18:00', 'b01', 'ดีดี'),
('0958647415', '2024-03-13 02:16:00', '2024-03-14 16:42:00', 'sm03', 'kodd'),
('0685423339', '2024-03-20 20:17:00', '2024-03-14 23:17:00', 'sm01', 'vv'),
('0685423339', '2024-03-20 20:17:00', '2024-03-14 23:17:00', 'sm01', 'vv');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memtel` varchar(10) NOT NULL,
  `memfirst` varchar(100) NOT NULL,
  `memlast` varchar(100) NOT NULL,
  `mememail` varchar(100) NOT NULL,
  `mempass` text NOT NULL,
  `memstatus` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memtel`, `memfirst`, `memlast`, `mememail`, `mempass`, `memstatus`) VALUES
('0984574544', 'haji', 'enzo', 'pi@pi', '72ab8af56bddab33b269c5964b26620a', 1),
('255444444', 'ouk', 'ffbbfcd692e84d6b82af1b5c0e6f5446', 'ss@ss', 'ss', 0),
('986547252', 'demon', 'po', 'dd@dd', '1aabac6d068eef6a7bad3fdf50a05cc8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `staId` varchar(5) NOT NULL,
  `staName` varchar(100) NOT NULL,
  `staPic` blob,
  `staType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`staId`, `staName`, `staPic`, `staType`) VALUES
('b01', 'สนามหญ้าเทียมใหญ่3 ', NULL, 'สนามหญ้าเทียมใหญ่'),
('b02', 'สนามหญ้าเทียมใหญ่ๆๆ ', NULL, 'สนามหญ้าเทียมใหญ่'),
('b03', 'สนามหญ้าเทียมใหญ่5  ', NULL, 'สนามหญ้าเทียมใหญ่'),
('sm01', 'สนามหญ้าเทียมเล็ก1', NULL, 'สนามหญ้าเทียมเล็ก'),
('sm03', 'สนามวอร์ม', NULL, 'สนามหญ้าเทียมเล็ก');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD KEY `memtel` (`memtel`),
  ADD KEY `memtel_2` (`memtel`,`staId`),
  ADD KEY `staId` (`staId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memtel`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`staId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_2` FOREIGN KEY (`staId`) REFERENCES `stadium` (`staId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
