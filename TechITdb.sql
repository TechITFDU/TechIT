-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2018 at 05:58 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Ticket` int(11) NOT NULL,
  `Description` varchar(2048) NOT NULL,
  `Email` varchar(254) NOT NULL,
  `status` enum('unclaimed','in-progress','resolved','') NOT NULL DEFAULT 'unclaimed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Ticket`, `Description`, `Email`, `status`) VALUES
(1, 'uigfdg', 'will@example.com', 'unclaimed'),
(4, 'Help me with project', 'helpme@example.com', 'unclaimed'),
(6, '8189', 'helpme@example.com', 'unclaimed'),
(7, 'halp!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111', 'will@example.com', 'unclaimed'),
(8, 'halp!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111', 'will@example.com', 'unclaimed'),
(9, 'My name is Paul prentetnding to be tom', 'tom@example.com', 'unclaimed'),
(10, 'ibuh', 'paul@example.com', 'unclaimed'),
(25, 'So I bought this macbook....', 'paul@example.com', 'unclaimed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(254) NOT NULL,
  `EMPLOYEE` tinyint(1) NOT NULL DEFAULT '0',
  `TELEPHONE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `EMPLOYEE`, `TELEPHONE`) VALUES
('helpme@example.com', 0, '555-999-9876'),
('justin@example.com', 0, '555-123-9876'),
('paul@example.com', 1, '555-555-5555'),
('peter@example.com', 0, '555-123-5555'),
('tom@example.com', 1, '555-666-5555'),
('will@example.com', 1, '555-777-5555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Ticket`),
  ADD KEY `Foreign_Key` (`Email`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `Ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `users` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
