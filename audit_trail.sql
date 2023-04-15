-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 09:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audit_trail`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `action` varchar(200) CHARACTER SET utf8 COLLATE utf8_croatian_mysql561_ci NOT NULL,
  `date` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `date`, `username`) VALUES
(101, 'add product having id - 643a50c03d35f', '23-04-15 02:22:40', 'dat'),
(102, 'add product having id - 643a50fb3a753', '23-04-15 02:23:39', 'dat'),
(103, 'login to system', '23-04-15 02:24:48', 'dat'),
(104, 'login to system', '23-04-15 02:24:51', 'dat'),
(105, 'login to system', '23-04-15 02:25:21', 'dat'),
(106, 'login to system', '23-04-15 02:25:28', 'dat');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `product_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `product_price` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_description`) VALUES
('6438e13564fc4', 'Mighty Patch Original from Hero Cosmetics', '90.000', 'The Original Award-Winning Acne Patch: Mighty Patch is a hydrocolloid sticker that improves the look of pimples overnight without the popping. Just stick it on, get some sleep, and wake up with clearer-looking skin.'),
('643a50c03d35f', 'Fitbit Versa 4 Fitness Smartwatch with Daily Readiness', '10.000.000', 'Get inspired and stay accountable with Versa 4 + Premium - learn when to work out or recover, see real-time stats during exercise and find new ways to keep your routine fresh and fun'),
('643a50fb3a753', 'Loose Short Coat', '500.000', 'The stylish windbreaker is smooth, and the eye-catching fabric enhances the sense of visual hierarchy\r\nTemperament, self-confidence, add a sense of fashion at the same time, can create a good figure tall and thin.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `level`) VALUES
('dat', '1234', 1),
('diep', '1234', 0),
('huyen', '1234', 0),
('thao', '1234', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_users_1` (`username`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_users_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
