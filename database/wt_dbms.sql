-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2021 at 07:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(11) NOT NULL,
  `b_noOSeats` int(11) DEFAULT NULL,
  `b_timestamp` datetime DEFAULT NULL,
  `b_status` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cinema`
--

CREATE TABLE `cinema` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(64) DEFAULT NULL,
  `ct_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cinema_hall`
--

CREATE TABLE `cinema_hall` (
  `ch_id` int(11) NOT NULL,
  `ch_name` varchar(64) DEFAULT NULL,
  `ch_totalSeats` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cinema_seat`
--

CREATE TABLE `cinema_seat` (
  `cs_id` int(11) NOT NULL,
  `cs_seatNo` int(11) DEFAULT NULL,
  `cs_type` int(11) DEFAULT NULL,
  `ch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ct_id` int(11) NOT NULL,
  `ct_name` varchar(64) DEFAULT NULL,
  `ct_state` varchar(64) DEFAULT NULL,
  `ct_zipcode` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `m_description` varchar(512) DEFAULT NULL,
  `m_len` int(11) DEFAULT NULL,
  `m_genre` varchar(255) DEFAULT NULL,
  `m_rating` float DEFAULT NULL,
  `m_img` varchar(2083) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_amount` int(11) DEFAULT NULL,
  `p_timestamp` datetime DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `show_c`
--

CREATE TABLE `show_c` (
  `s_id` int(11) NOT NULL,
  `s_Date` datetime DEFAULT NULL,
  `s_startime` datetime DEFAULT NULL,
  `s_endtime` datetime DEFAULT NULL,
  `ch_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `show_seat`
--

CREATE TABLE `show_seat` (
  `ss_id` int(11) NOT NULL,
  `ss_status` int(11) DEFAULT NULL,
  `ss_price` int(11) DEFAULT NULL,
  `cs_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `b_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(64) DEFAULT NULL,
  `u_email` varchar(30) DEFAULT NULL,
  `u_phone` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `ct_id` (`ct_id`);

--
-- Indexes for table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  ADD PRIMARY KEY (`ch_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  ADD PRIMARY KEY (`cs_id`),
  ADD KEY `ch_id` (`ch_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `show_c`
--
ALTER TABLE `show_c`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `ch_id` (`ch_id`),
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `show_seat`
--
ALTER TABLE `show_seat`
  ADD PRIMARY KEY (`ss_id`),
  ADD KEY `cs_id` (`cs_id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `show_c` (`s_id`);

--
-- Constraints for table `cinema`
--
ALTER TABLE `cinema`
  ADD CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`ct_id`) REFERENCES `city` (`ct_id`);

--
-- Constraints for table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  ADD CONSTRAINT `cinema_hall_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `cinema` (`c_id`);

--
-- Constraints for table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  ADD CONSTRAINT `cinema_seat_ibfk_1` FOREIGN KEY (`ch_id`) REFERENCES `cinema_hall` (`ch_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `booking` (`b_id`);

--
-- Constraints for table `show_c`
--
ALTER TABLE `show_c`
  ADD CONSTRAINT `show_c_ibfk_1` FOREIGN KEY (`ch_id`) REFERENCES `cinema_hall` (`ch_id`),
  ADD CONSTRAINT `show_c_ibfk_2` FOREIGN KEY (`m_id`) REFERENCES `movie` (`m_id`);

--
-- Constraints for table `show_seat`
--
ALTER TABLE `show_seat`
  ADD CONSTRAINT `show_seat_ibfk_1` FOREIGN KEY (`cs_id`) REFERENCES `cinema_seat` (`cs_id`),
  ADD CONSTRAINT `show_seat_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `show_c` (`s_id`),
  ADD CONSTRAINT `show_seat_ibfk_3` FOREIGN KEY (`b_id`) REFERENCES `booking` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
