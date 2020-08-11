-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 04:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(100) NOT NULL,
  `adminPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', 'e6053eb8d35e02ae40beeeacef203c1a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `qustNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT 0,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `qustNo`, `rightAns`, `ans`) VALUES
(29, 1, 0, 'World Whole Web'),
(30, 1, 0, 'Wide World Web'),
(31, 1, 0, 'Web World Wide'),
(32, 1, 1, 'World Wide Web'),
(33, 2, 0, 'Arithmetic logic unit, Mouse'),
(34, 2, 1, 'Arithmetic logic unit, Mouse'),
(35, 2, 0, 'Arithmetic logic unit, Integrated Circuits'),
(36, 2, 0, 'Control Unit, Monitor'),
(37, 3, 1, 'Vaccum Tubes and Magnetic Drum'),
(38, 3, 0, 'Integrated Circuits'),
(39, 3, 0, 'Magnetic Tape and Transistor'),
(40, 3, 0, 'All of above'),
(41, 4, 0, 'Expansion Board'),
(42, 4, 0, 'External Drive'),
(43, 4, 1, 'Mother Board'),
(44, 4, 0, 'All of above'),
(45, 5, 0, 'Uniprocess'),
(46, 5, 1, 'Multiprocessor'),
(47, 5, 0, 'Multithreaded'),
(48, 5, 0, 'Multiprogramming');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qus`
--

CREATE TABLE `tbl_qus` (
  `id` int(11) NOT NULL,
  `qustNo` int(11) NOT NULL,
  `qust` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_qus`
--

INSERT INTO `tbl_qus` (`id`, `qustNo`, `qust`) VALUES
(11, 1, ' WWW stands for ?'),
(12, 2, 'Which of the following are components of Central Processing Unit (CPU) ?'),
(13, 3, ' Which among following first generation of computers had ?'),
(14, 4, 'Where is RAM located ?'),
(15, 5, 'If a computer has more than one processor then it is known as ?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theme`
--

CREATE TABLE `tbl_theme` (
  `id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_theme`
--

INSERT INTO `tbl_theme` (`id`, `theme_name`) VALUES
(1, 'defalt.css');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `password`, `email`, `status`) VALUES
(2, 'korim', 'korim12', 'e6053eb8d35e02ae40beeeacef203c1a', 'korim@gmail.com', 1),
(4, 'rohan', 'rohan234', 'e6053eb8d35e02ae40beeeacef203c1a', 'rakib@mylighthost.com', 0),
(5, 'ratul', 'ratul2', 'e6053eb8d35e02ae40beeeacef203c1a', 'ratul@gmail.com', 0),
(6, 'rakubur', 'rakubur123', 'e6053eb8d35e02ae40beeeacef203c1a', 'admin@mylighthost.com', 0),
(7, 'dfd', 'dffd', 'b52c96bea30646abf8170f333bbd42b9', 'kamrul@gmail.com', 0),
(8, 'himel', 'himel147', 'e6053eb8d35e02ae40beeeacef203c1a', 'himel147@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_qus`
--
ALTER TABLE `tbl_qus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_theme`
--
ALTER TABLE `tbl_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_qus`
--
ALTER TABLE `tbl_qus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
