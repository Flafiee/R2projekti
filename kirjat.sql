-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2026 at 09:42 AM
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
-- Table structure for table `kirjat`
--

CREATE TABLE `kirjat` (
  `KirjaID` int(11) NOT NULL,
  `KirjaName` varchar(70) NOT NULL,
  `KirjaMäärä` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kirjat`
--

INSERT INTO `kirjat` (`KirjaID`, `KirjaName`, `KirjaMäärä`) VALUES
(1, 'Don Quixote', 4),
(2, 'Alices Adventures in Wonderland', 3),
(3, 'The Adventures of Huckleberry Finn', 3),
(4, 'The Adventures of Tom Sawyer', 2),
(5, 'Treasure Island', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kirjat`
--
ALTER TABLE `kirjat`
  ADD PRIMARY KEY (`KirjaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kirjat`
--
ALTER TABLE `kirjat`
  MODIFY `KirjaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
