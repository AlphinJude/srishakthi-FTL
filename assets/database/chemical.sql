-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2021 at 07:45 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemical`
--

-- --------------------------------------------------------

--
-- Table structure for table `chem_list`
--

CREATE TABLE `chem_list` (
  `chem_id` int(11) NOT NULL,
  `chem_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chem_stock`
--

CREATE TABLE `chem_stock` (
  `chem_id` int(11) DEFAULT NULL,
  `total_qty` int(11) NOT NULL,
  `rem_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chem_used`
--

CREATE TABLE `chem_used` (
  `client_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `chem_id` int(11) DEFAULT NULL,
  `quantity_used` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_list`
--

CREATE TABLE `client_list` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `client_contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `update_stock`
--

CREATE TABLE `update_stock` (
  `chem_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chem_list`
--
ALTER TABLE `chem_list`
  ADD PRIMARY KEY (`chem_id`);

--
-- Indexes for table `chem_stock`
--
ALTER TABLE `chem_stock`
  ADD KEY `chem_id` (`chem_id`);

--
-- Indexes for table `chem_used`
--
ALTER TABLE `chem_used`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `chem_id` (`chem_id`);

--
-- Indexes for table `client_list`
--
ALTER TABLE `client_list`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `update_stock`
--
ALTER TABLE `update_stock`
  ADD KEY `chem_id` (`chem_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chem_list`
--
ALTER TABLE `chem_list`
  MODIFY `chem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `client_list`
--
ALTER TABLE `client_list`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chem_stock`
--
ALTER TABLE `chem_stock`
  ADD CONSTRAINT `chem_stock_ibfk_1` FOREIGN KEY (`chem_id`) REFERENCES `chem_list` (`chem_id`);

--
-- Constraints for table `chem_used`
--
ALTER TABLE `chem_used`
  ADD CONSTRAINT `chem_used_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client_list` (`client_id`),
  ADD CONSTRAINT `chem_used_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `tests` (`test_id`),
  ADD CONSTRAINT `chem_used_ibfk_3` FOREIGN KEY (`chem_id`) REFERENCES `chem_list` (`chem_id`);

--
-- Constraints for table `update_stock`
--
ALTER TABLE `update_stock`
  ADD CONSTRAINT `update_stock_ibfk_1` FOREIGN KEY (`chem_id`) REFERENCES `chem_list` (`chem_id`),
  ADD CONSTRAINT `update_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
