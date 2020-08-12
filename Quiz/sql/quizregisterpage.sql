-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 06:16 PM
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
-- Table structure for table `quizregisterpage`
--

CREATE TABLE `quizregisterpage` (
  `id` int(6) UNSIGNED NOT NULL,
  `loginid` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_type` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `confrimpassword` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quizregisterpage`
--

INSERT INTO `quizregisterpage` (`id`, `loginid`, `username`, `user_type`, `address`, `city`, `phone`, `email`, `birthday`, `password`, `confrimpassword`) VALUES
(1, 'admin', 'LeeHunChuen', 'admin', '72, Jalan SS 2/60, SS 2, 47300 Petaling Jaya, Selangor', 'Kajang', '012-5058168', 'leehunchuen@gmail.com', '1997-11-12', 'admin', 'admin'),
(2, 'winson', 'LeeHunChuen', 'user', '72, Jalan SS 2/60, SS 2, 47300 Petaling Jaya, Selangor', 'Kajang', '012-5058168', 'leehunchuen@gmail.com', '1997-11-12', '123', '123'),
(3, 'andrew', 'boonboon', 'user', 'selangor', 'Kajang', '012-5052138', 'andrewboon@hotmail.com', '2020-06-27', '1234', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizregisterpage`
--
ALTER TABLE `quizregisterpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizregisterpage`
--
ALTER TABLE `quizregisterpage`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
