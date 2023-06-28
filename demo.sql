-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 08:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `p_key` int(11) NOT NULL,
  `idname` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`p_key`, `idname`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'customer1', 'customer1'),
(3, 'customer2', 'customer2');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `p_key` int(11) NOT NULL,
  `date` date NOT NULL,
  `company` varchar(30) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `item` text NOT NULL,
  `qnty` int(11) NOT NULL,
  `weight` float NOT NULL,
  `req_for_ship` text NOT NULL,
  `track_id` text NOT NULL,
  `ship_size` text NOT NULL,
  `box_cnt` int(11) NOT NULL,
  `spec` text NOT NULL,
  `ch_qnty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`p_key`, `date`, `company`, `owner`, `item`, `qnty`, `weight`, `req_for_ship`, `track_id`, `ship_size`, `box_cnt`, `spec`, `ch_qnty`) VALUES
(2, '0000-00-00', 'fossilxyz', 'Neeraj', 'engine oil', 3, 300, 'urgent', '4567890', 'large', 5, '2/3 wheeler', 'bulk'),
(2, '0000-00-00', 'fossilx', 'Neeraj', 'engine oil', 4, 400, 'urgent', '4567890', 'large', 6, '2/3 wheeler', 'bulk'),
(3, '0000-00-00', 'fossilsbc', 'Bhenki', 'engine oil 1', 8, 600, 'urgent', '4567890', 'large', 10, '2/3 wheeler', 'bulk'),
(3, '2023-06-15', 'fossilabc', 'Bhenki', 'engine oil 1', 9, 700, 'urgent', '4567890', 'large', 11, '2/3 wheeler', 'bulk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`p_key`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
