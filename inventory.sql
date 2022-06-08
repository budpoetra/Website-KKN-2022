-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 10:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(123, 'Admin', '$2y$10$6nkDQkpXmJJYrg8R2oHnFeJafvijl0bj.y9FGb69DUdqx8YaU1Uzm');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `namaCostemer` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `date`, `namaCostemer`, `desc`, `total`) VALUES
(3, '2022-06-03', 'Arfan', 'Nike (RBC); Vans (SPC)', 105000),
(4, '2022-06-03', 'Reza', 'Adidas (SEC)', 40000),
(5, '2022-06-03', 'Ayuk', 'Vans (SPC)', 30000),
(7, '2022-06-03', 'Fadel', 'Vans (SC); Adidas (SPC); Nike (FREE)', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `finish`
--

CREATE TABLE `finish` (
  `id` int(11) NOT NULL,
  `namaCostemer` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finish`
--

INSERT INTO `finish` (`id`, `namaCostemer`, `desc`, `total`) VALUES
(2, 'Budi', 'Puma (SPC)', 30000),
(3, 'Indra', 'Caterpillar (RL)', 120000);

-- --------------------------------------------------------

--
-- Table structure for table `income-month`
--

CREATE TABLE `income-month` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income-month`
--

INSERT INTO `income-month` (`id`, `month`, `income`) VALUES
(1, 'January', 8),
(2, 'February', 5),
(3, 'March', 7),
(4, 'April', 4),
(5, 'May', 2),
(6, 'June', 5),
(7, 'July', 5),
(8, 'August', 2),
(9, 'September', 9),
(10, 'October', 1),
(11, 'November', 7),
(12, 'December', 9);

-- --------------------------------------------------------

--
-- Table structure for table `income-year`
--

CREATE TABLE `income-year` (
  `id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income-year`
--

INSERT INTO `income-year` (`id`, `month`, `income`) VALUES
(1, 'January', 0),
(2, 'February', 0),
(3, 'March', 0),
(4, 'April', 0),
(5, 'May', 0),
(6, 'June', 0),
(7, 'July', 0),
(8, 'August', 0),
(9, 'September', 0),
(10, 'October', 0),
(11, 'November', 0),
(12, 'December', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finish`
--
ALTER TABLE `finish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income-month`
--
ALTER TABLE `income-month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income-year`
--
ALTER TABLE `income-year`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `finish`
--
ALTER TABLE `finish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income-month`
--
ALTER TABLE `income-month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `income-year`
--
ALTER TABLE `income-year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
