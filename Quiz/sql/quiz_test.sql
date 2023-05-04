-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 10:52 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz_test`
--

CREATE TABLE `quiz_test` (
  `test_id` int(5) NOT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_name` varchar(300) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_test`
--

INSERT INTO `quiz_test` (`test_id`, `sub_id`, `test_name`, `date`) VALUES
(1, 1, 'C++ Test 1', '2023-03-09 09:05:26'),
(2, 1, 'C++ Test 2', '2023-03-09 09:08:26'),
(3, 1, 'C++ Test 3', '2023-03-09 09:10:26'),
(4, 1, 'C++ Test 4', '2023-03-09 09:12:26'),
(5, 2, 'Java Test 1', '2023-03-09 09:14:26'),
(6, 2, 'Java Test 2', '2023-03-09 09:15:26'),
(7, 2, 'Java Test 3', '2023-03-09 09:16:26'),
(8, 3, ' Networking Test 1', '2023-03-09 09:18:26'),
(9, 3, ' Networking Test 2', '2023-03-09 09:20:26'),
(10, 3, ' Networking Test 3', '2023-03-09 09:23:26'),
(11, 4, 'Online C Language Test 1', '2023-03-09 09:24:26'),
(12, 4, 'Online C Language Test 2', '2023-03-09 09:26:26'),
(13, 4, 'Online C Language Test 3', '2023-03-09 09:28:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_test`
--
ALTER TABLE `quiz_test`
  ADD PRIMARY KEY (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_test`
--
ALTER TABLE `quiz_test`
  MODIFY `test_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
