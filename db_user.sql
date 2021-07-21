-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 06:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userID` int(11) NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `isVerified` int(1) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userID`, `Fname`, `Lname`, `Email`, `Password`, `hash`, `isVerified`, `Date`) VALUES
(38, 'nicolle', 'interior', 'interiornicolle@gmail.com', '73ca4196d38b4d464a4fa0fb02f0b840', 'f6531ba351b5b9f9a78eba20ada58289', 1, '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `file` blob NOT NULL,
  `company` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `file`, `company`) VALUES
(5, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help with my website project. ', '', 'PUP'),
(6, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help with my project. ', '', 'PUP'),
(7, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help with my website project', '', 'Pup'),
(8, 'Nicolle Interior', 'interiornicolle@gmail.com', 'I need help with my website project', '', 'PUP'),
(9, '', '', '', '', ''),
(10, 'saasvsa', 'ascbabscj@gmail.com', 'ascjasjcljacblabl', '', 'avasv'),
(11, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help analyzing my website. ', '', 'KoliTEch'),
(12, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help with my website ', '', 'PUP'),
(13, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help with desktop applications. ', '', 'PUP'),
(14, 'Nicolle Interior', 'interiorcoeli@gmail.com', 'I need help with desktop applications. ', '', 'PUP'),
(15, 'Nicolle', 'interiorcoeli@gmail.com', 'acasvebsebfebf', '', 'PUp'),
(16, 'Nicolle', 'interiorcoeli@gmail.com', 'acasvebsebfebf', '', 'PUp'),
(17, 'ahagvah', 'lashclahlc@gmail.com', 'ackcjanklcnalscasc', '', 'hashcash'),
(18, 'bcasckjasc', 'kacljasbj@gmail.com', 'ascjascjcnalcnlakncac', '', 'kjaskcakcka'),
(19, 'scsvdbsb', 'vsdv@gmail.com', 'cacacacwa', '', 'sdvav'),
(20, 'scsvdbsb', 'vsdv@gmail.com', 'cacacacwa', '', 'sdvav'),
(21, 'aaa', 'aa@gmail.com', 'asjasdjabjdajjasda', '', 'aaa'),
(22, 'aaa', 'aa@gmail.com', 'asjasdjabjdajjasda', '', 'aaa'),
(23, 'Nicolle', 'interiorcoeli@gmail.com', 'akhhadhahdaisodhasoidasd', '', 'pup'),
(24, 'ascasvdb', 'interiorcoeli@gmail.com', 'backasckbajcalsc', '', 'avava'),
(25, 'Nicolle', 'interiorcoeli@gmail.com', 'I need help', '', 'PUP');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `Id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`Id`, `userID`, `Email`, `Date`, `Time`) VALUES
(75, 38, 'interiornicolle@gmail.com', '2021-03-02', '01:39:32'),
(76, 38, 'interiornicolle@gmail.com', '2021-03-02', '01:42:15'),
(77, 38, 'interiornicolle@gmail.com', '2021-03-02', '01:46:24'),
(78, 38, 'interiornicolle@gmail.com', '2021-03-02', '01:57:07'),
(79, 38, 'interiornicolle@gmail.com', '2021-03-02', '02:19:16'),
(80, 38, 'interiornicolle@gmail.com', '2021-03-02', '02:34:20'),
(81, 38, 'interiornicolle@gmail.com', '2021-03-02', '02:45:16'),
(82, 38, 'interiornicolle@gmail.com', '2021-03-02', '02:57:36'),
(83, 38, 'interiornicolle@gmail.com', '2021-03-03', '00:53:44'),
(84, 38, 'interiornicolle@gmail.com', '2021-03-03', '03:12:16'),
(85, 38, 'interiornicolle@gmail.com', '2021-03-03', '03:20:18'),
(86, 38, 'interiornicolle@gmail.com', '2021-03-03', '08:12:34'),
(87, 38, 'interiornicolle@gmail.com', '2021-03-03', '08:16:50'),
(88, 38, 'interiornicolle@gmail.com', '2021-03-03', '08:20:41'),
(89, 38, 'interiornicolle@gmail.com', '2021-03-03', '08:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `userID` int(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `fkey` varchar(250) NOT NULL,
  `expdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
