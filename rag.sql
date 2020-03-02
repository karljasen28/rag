-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 04:05 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rag`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllOwner` ()  SELECT * FROM users WHERE type = 'owner'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllUser` ()  SELECT * FROM users WHERE type = 'user'$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `tran_id` int(11) NOT NULL,
  `gad_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_days` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `tran_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `rental_price` varchar(50) NOT NULL,
  `tran_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`tran_id`, `gad_id`, `owner_id`, `user_id`, `no_days`, `start_date`, `end_date`, `tran_date`, `rental_price`, `tran_status`) VALUES
(4, 4, 5, 4, '2', '2020-02-28', '2020-03-01', '2020-02-28 09:17:25', '300', 'approved'),
(5, 6, 5, 4, '2', '2020-03-02', '2020-03-04', '2020-03-02 02:27:08', '1600', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `gadgets`
--

CREATE TABLE `gadgets` (
  `g_id` int(11) NOT NULL,
  `g_pic` varchar(50) DEFAULT NULL,
  `g_model` varchar(50) NOT NULL,
  `g_brand` varchar(50) NOT NULL,
  `g_serial` varchar(50) NOT NULL,
  `g_price` varchar(50) NOT NULL,
  `g_desc` varchar(50) NOT NULL,
  `g_category` varchar(50) NOT NULL,
  `owner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gadgets`
--

INSERT INTO `gadgets` (`g_id`, `g_pic`, `g_model`, `g_brand`, `g_serial`, `g_price`, `g_desc`, `g_category`, `owner_id`) VALUES
(4, 'oppo.jpg', 'A5 2020', 'Oppo', 'G574232CKL', '150', '4gb/64gb Color White', 'smartphone', 5),
(5, 'v9.jpg', 'v9', 'Vivo', 'JK6742LcVm', '500', '2gb/32gb Color Black', 'smartphone', 5),
(6, 'canond500.jfif', 'D500', 'Canon', 'GLASKSD123', '800', 'Color Black 18mm Lens', 'camera', 5);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `registered_person` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pro_pic` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pro_pic`, `fname`, `lname`, `gender`, `bdate`, `address`, `contactno`, `email`, `password`, `type`, `status`, `account`) VALUES
(4, 'profile1.jfif', 'June', 'Amante', 'Male', '2020-01-01', 'Lorega Cebu', '09324732512', 'junejuly@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 'active', 'verified'),
(5, 'profile.jpg', 'Karl Jasen', 'Tapangan', 'Male', '2021-01-01', 'Mandaue Cebu City', '0922345678', 'karl@gmail.com', '202cb962ac59075b964b07152d234b70', 'owner', 'active', 'verified'),
(6, 'profile.jpg', 'Matias', 'Enad', 'Male', '2020-03-02', 'Guadalupe Cebu', '0932145621', 'mat@gmail.com', '202cb962ac59075b964b07152d234b70', 'owner', 'active', 'verified'),
(8, '', 'beverly', 'castillo', 'female', '2020-02-03', 'Minglanilla Cebu City', '019894813155', 'bev@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 'active', 'unverified'),
(9, '', 'Juan', 'Tamad', 'Male', '2020-12-01', 'Cebu City', '0912354564', 'tamad@gmail.com', '202cb962ac59075b964b07152d234b70', 'owner', 'active', 'unverified');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `createLogs` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.id, NOW(), 'registered')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `validation`
--

CREATE TABLE `validation` (
  `val_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `val_pic` varchar(50) NOT NULL,
  `val_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `validation`
--

INSERT INTO `validation` (`val_id`, `user_id`, `val_pic`, `val_status`) VALUES
(2, 4, 'card1.jpg', 'approved'),
(4, 5, 'card1.jpg', 'approved'),
(5, 6, 'card1.jpg', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`tran_id`),
  ADD KEY `gad_id` (`gad_id`),
  ADD KEY `owner_id` (`owner_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gadgets`
--
ALTER TABLE `gadgets`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `registered_person` (`registered_person`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `validation`
--
ALTER TABLE `validation`
  ADD PRIMARY KEY (`val_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `tran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gadgets`
--
ALTER TABLE `gadgets`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `validation`
--
ALTER TABLE `validation`
  MODIFY `val_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`gad_id`) REFERENCES `gadgets` (`g_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `gadgets`
--
ALTER TABLE `gadgets`
  ADD CONSTRAINT `gadgets_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`registered_person`) REFERENCES `users` (`id`);

--
-- Constraints for table `validation`
--
ALTER TABLE `validation`
  ADD CONSTRAINT `validation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
