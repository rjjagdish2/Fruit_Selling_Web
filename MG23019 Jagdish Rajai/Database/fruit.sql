-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 08:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cid` int(5) NOT NULL,
  `cname` varchar(60) NOT NULL,
  `cmail` varchar(50) NOT NULL,
  `add1` varchar(100) NOT NULL,
  `pcode` int(6) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `mobileno` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cid`, `cname`, `cmail`, `add1`, `pcode`, `pwd`, `mobileno`) VALUES
(45, 'jagdish rajai', 'rjjagdish2@gmail.com', 'krishna res', 364001, 'Jagdish@123', '6359439942'),
(46, 'payal rajai', 'paya@g.com', 'swastik Complex Bhavnagar', 364002, 'Payal@123', '9632587412');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE `ordertbl` (
  `ooid` int(10) NOT NULL,
  `cid` int(5) NOT NULL,
  `pid` int(11) NOT NULL,
  `amt` int(10) NOT NULL,
  `qty` int(5) NOT NULL,
  `odt` varchar(50) NOT NULL,
  `packed` int(2) NOT NULL,
  `deli` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`ooid`, `cid`, `pid`, `amt`, `qty`, `odt`, `packed`, `deli`) VALUES
(1398, 45, 27, 60, 3, '2024-04-22 12:06:03', 1, 1),
(32073, 46, 51, 100, 3, '2024-04-22 12:08:03', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `qty_type` char(1) NOT NULL,
  `fimage` varchar(40) NOT NULL,
  `season` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `price`, `qty`, `qty_type`, `fimage`, `season`) VALUES
(27, 'Stawberry', '60', '97', 'p', 'pngwing.com (2).png', 'sm'),
(43, 'Mengo', '120', '90', 'k', 'pngwing.com (10).png', 'su'),
(51, 'green grape', '100', '6', 'k', 'pngwing.com (7).png', 'su'),
(52, 'black greaps', '120', '100', 'p', 'pngwing.com (8).png', 'su'),
(54, 'banana', '20', '1', 'k', 'pngwing.com (12).png', 'mo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `oid` (`ooid`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordertbl`
--
ALTER TABLE `ordertbl`
  ADD CONSTRAINT `ordertbl_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `client` (`cid`),
  ADD CONSTRAINT `ordertbl_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
