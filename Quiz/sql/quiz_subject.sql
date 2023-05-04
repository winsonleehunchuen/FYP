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
-- Table structure for table `quiz_subject`
--

CREATE TABLE `quiz_subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(250) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_subject`
--

INSERT INTO `quiz_subject` (`sub_id`, `sub_name`, `date`) VALUES
(1, 'C++ ', '2023-03-08 04:15:26'),
(2, 'Java', '2023-03-08 04:16:26'),
(3, 'Networking', '2023-03-08 04:18:26'),
(4, 'Online C Programming', '2023-03-08 04:19:26'),
(5, 'PHP', '2023-03-08 04:21:26'),
(6, 'VB', '2023-03-08 04:22:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz_subject`
--
ALTER TABLE `quiz_subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz_subject`
--
ALTER TABLE `quiz_subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
