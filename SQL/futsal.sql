-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 06:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futsal`
--

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `CourtID` int(11) NOT NULL,
  `CourtName` varchar(100) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `futsal_bookings`
--

CREATE TABLE `futsal_bookings` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pitch` varchar(255) NOT NULL,
  `bookday` date NOT NULL,
  `shift` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `timecheck` int(11) NOT NULL,
  `confirm_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `futsal_bookings`
--

INSERT INTO `futsal_bookings` (`id`, `user`, `pitch`, `bookday`, `shift`, `contact`, `email`, `timecheck`, `confirm_key`) VALUES
(2, 'yujan1', 'Arena', '2023-10-09', '6 TO 7 AM', '2222222', 'yujanr3@gmail.com', 1696865437, 1),
(3, 'yujan1', 'Arena', '2023-10-09', '6 TO 7 AM', '2222222', 'yujanr3@gmail.com', 1696868781, 1),
(4, 'yujan', 'nepalaya', '2023-10-09', '6 TO 7 AM', '2222222', 'yujanr4@gmail.com', 1696868813, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `ConfirmPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`UserID`, `Username`, `Email`, `Password`, `ConfirmPassword`) VALUES
(4, 'yujan', 'yujanr3@gmail.com', '218c540b5d2d084da85deb0ef97e3b46', '218c540b5d2d084da85deb0ef97e3b46'),
(5, 'yujan1', 'yujanr4@gmail.com', '4b3d6fe716abe6d153f2da5a515a090a', '4b3d6fe716abe6d153f2da5a515a090a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`CourtID`);

--
-- Indexes for table `futsal_bookings`
--
ALTER TABLE `futsal_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `CourtID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `futsal_bookings`
--
ALTER TABLE `futsal_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
