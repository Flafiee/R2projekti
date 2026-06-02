-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2026 at 09:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `r2projekti`
--

-- --------------------------------------------------------

--
-- Table structure for table `kirjailijat`
--

CREATE TABLE `kirjailijat` (
  `KirjailijaID` int(11) NOT NULL,
  `KirjailijaName` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kirjailijat`
--

INSERT INTO `kirjailijat` (`KirjailijaID`, `KirjailijaName`) VALUES
(1, 'Miguel de Cervantes'),
(2, 'Lewis Carroll'),
(3, 'Mark Twain'),
(4, 'Robert Louis Stevenson');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kirjailijat`
--
ALTER TABLE `kirjailijat`
  ADD PRIMARY KEY (`KirjailijaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kirjailijat`
--
ALTER TABLE `kirjailijat`
  MODIFY `KirjailijaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
