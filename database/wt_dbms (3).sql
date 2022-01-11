-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 11:27 AM
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

--
-- Dumping data for table `cinema`
--

INSERT INTO `cinema` (`c_id`, `c_name`, `ct_id`) VALUES
(1, 'c1', 1),
(2, 'c2', 2);

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

--
-- Dumping data for table `cinema_hall`
--

INSERT INTO `cinema_hall` (`ch_id`, `ch_name`, `ch_totalSeats`, `c_id`) VALUES
(1, 'c_abc', 10, 1),
(2, 'c_abcd', 10, 2);

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

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ct_id`, `ct_name`, `ct_state`, `ct_zipcode`) VALUES
(1, 'aa', 'aab', '10'),
(2, 'ab', 'aab', '11');

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

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`m_id`, `m_name`, `m_description`, `m_len`, `m_genre`, `m_rating`, `m_img`) VALUES
(1, 'Inception(2010)', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.', 148, 'Action Adventure Sci-Fi', 8.8, 'https://www.imdb.com/title/tt1375666/mediaviewer/rm3426651392/?ref_=tt_ov_i'),
(2, '12 Angry Men(1957)', NULL, 96, 'Crime Drama', 9, 'https://www.imdb.com/title/tt0050083/mediaviewer/rm2927108352/?ref_=tt_ov_i'),
(3, 'Life Is Beautiful(1997)', NULL, 116, 'Comedy Drama Romance', 8.6, 'https://www.imdb.com/title/tt0118799/mediaviewer/rm2303464448/?ref_=tt_ov_i'),
(4, 'Lost Highway(1997)', NULL, 134, 'Mystery Thriller', 7.6, 'https://www.imdb.com/title/tt0116922/mediaviewer/rm3025737728/?ref_=tt_ov_i'),
(5, 'The Dark Knight Rises(2012)', NULL, 164, 'Action Crime Drama', 8.4, 'https://www.imdb.com/title/tt1345836/mediaviewer/rm834516224/?ref_=tt_ov_i'),
(6, '3 Idiots(2009)', NULL, 170, 'Comedy Drama', 8.948, 'https://www.imdb.com/title/tt1187043/mediaviewer/rm2029391104/?ref_=tt_ov_i'),
(7, 'Fight Club(1999)', NULL, 139, 'Drama', 8.8, 'https://www.imdb.com/title/tt0137523/mediaviewer/rm1412004864/?ref_=tt_ov_i'),
(8, '2001:A Space Odyssey(1968)', NULL, 149, 'Adventure Sci-Fi', 8.3, 'https://www.imdb.com/title/tt0062622/mediaviewer/rm3872284416/?ref_=tt_ov_i'),
(9, 'Plup Fiction (1994)', NULL, 154, 'Crime Drama', 8.9, 'https://www.imdb.com/title/tt0110912/mediaviewer/rm1959546112/?ref_=tt_ov_i'),
(10, 'Requiem for a Dream(2000)', NULL, 102, 'Drama', 8.3, 'https://www.imdb.com/title/tt0180093/mediaviewer/rm3305703424/?ref_=tt_ov_i'),
(11, 'The Bandit(1996)', NULL, 128, 'Crime Drama Thriller', 8.2, 'https://www.imdb.com/title/tt0116231/mediaviewer/rm3335127552/?ref_=tt_ov_i'),
(12, 'Barry Lyndon(1975)', NULL, 185, 'History Adventure Drama', 8.1, 'https://www.imdb.com/title/tt0072684/mediaviewer/rm1970725120/?ref_=tt_ov_i'),
(13, 'Magnolia(1999)', NULL, 188, 'Drama', 8, 'https://www.imdb.com/title/tt0175880/mediaviewer/rm3411106304/?ref_=tt_ov_i'),
(14, 'Back to the Future(1985)', NULL, 116, 'Comedy Adventure Sci-Fi', 8.5, 'https://www.imdb.com/title/tt0088763/mediaviewer/rm554638848/?ref_=tt_ov_i'),
(15, 'The Shawshank Redemtion(1994)', NULL, 142, 'Drama', 9.3, 'https://www.imdb.com/title/tt0111161/mediaviewer/rm10105600/?ref_=tt_ov_i'),
(16, 'Star Wars: Episode III - Revenge of the Sith(2005)', NULL, 140, 'Action Adventure Fantasy', 7.5, 'https://www.imdb.com/title/tt0121766/mediaviewer/rm4094016256/?ref_=tt_ov_i'),
(17, 'Forest Gump(1994)', NULL, 142, 'Drama Romance', 8.8, 'https://www.imdb.com/title/tt0109830/mediaviewer/rm1954748672/?ref_=tt_ov_i'),
(18, 'The Prestige(2006)', NULL, 130, 'Drama Mystery Thriller', 8.5, 'https://www.imdb.com/title/tt0482571/mediaviewer/rm4031813632/?ref_=tt_ov_i'),
(19, 'The Lord of the Rings: The Return of the King(2003)', NULL, 201, 'Action Adventure Drama', 8.9, 'https://www.imdb.com/title/tt0167260/mediaviewer/rm584928512/?ref_=tt_ov_i'),
(20, 'The Hateful Eight(2015)', NULL, 168, 'Crime Drama Mystery', 7.8, 'https://www.imdb.com/title/tt3460252/mediaviewer/rm2736055040/?ref_=tt_ov_i');

-- --------------------------------------------------------

--
-- Table structure for table `movie_30`
--

CREATE TABLE `movie_30` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(100) DEFAULT NULL,
  `m_rating` int(11) DEFAULT NULL,
  `m_len` int(11) DEFAULT NULL,
  `m_genre` varchar(255) DEFAULT NULL,
  `m_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_30`
--

INSERT INTO `movie_30` (`m_id`, `m_name`, `m_rating`, `m_len`, `m_genre`, `m_img`) VALUES
(1, 'Inception(2010)', 9, 148, 'Action Adventure Sci-Fi', 'https://www.imdb.com/title/tt1375666/mediaviewer/rm3426651392/?ref_=tt_ov_i'),
(2, '12 Angry Men(1957)', 9, 96, 'Crime Drama', 'https://www.imdb.com/title/tt0050083/mediaviewer/rm2927108352/?ref_=tt_ov_i'),
(3, 'Life Is Beautiful(1997)', 9, 116, 'Comedy Drama Romance', 'https://www.imdb.com/title/tt0118799/mediaviewer/rm2303464448/?ref_=tt_ov_i'),
(4, 'Lost Highway(1997)', 8, 134, 'Mystery Thriller', 'https://www.imdb.com/title/tt0116922/mediaviewer/rm3025737728/?ref_=tt_ov_i'),
(5, 'The Dark Knight Rises(2012)', 8, 164, 'Action Crime Drama', 'https://www.imdb.com/title/tt1345836/mediaviewer/rm834516224/?ref_=tt_ov_i'),
(6, '3 Idiots(2009)', 9, 170, 'Comedy Drama', 'https://www.imdb.com/title/tt1187043/mediaviewer/rm2029391104/?ref_=tt_ov_i'),
(7, 'Fight Club(1999)', 9, 139, 'Drama', 'https://www.imdb.com/title/tt0137523/mediaviewer/rm1412004864/?ref_=tt_ov_i'),
(8, '2001:A Space Odyssey(1968)', 8, 149, 'Adventure Sci-Fi', 'https://www.imdb.com/title/tt0062622/mediaviewer/rm3872284416/?ref_=tt_ov_i'),
(9, 'Plup Fiction (1994)', 9, 154, 'Crime Drama', 'https://www.imdb.com/title/tt0110912/mediaviewer/rm1959546112/?ref_=tt_ov_i'),
(10, 'Requiem for a Dream(2000)', 8, 102, 'Drama', 'https://www.imdb.com/title/tt0180093/mediaviewer/rm3305703424/?ref_=tt_ov_i'),
(11, 'The Bandit(1996)', 8, 128, 'Crime Drama Thriller', 'https://www.imdb.com/title/tt0116231/mediaviewer/rm3335127552/?ref_=tt_ov_i'),
(12, 'Barry Lyndon(1975)', 8, 185, 'History Adventure Drama', 'https://www.imdb.com/title/tt0072684/mediaviewer/rm1970725120/?ref_=tt_ov_i'),
(13, 'Magnolia(1999)', 8, 188, 'Drama', 'https://www.imdb.com/title/tt0175880/mediaviewer/rm3411106304/?ref_=tt_ov_i'),
(14, 'Back to the Future(1985)', 9, 116, 'Comedy Adventure Sci-Fi', 'https://www.imdb.com/title/tt0088763/mediaviewer/rm554638848/?ref_=tt_ov_i'),
(15, 'The Shawshank Redemtion(1994)', 9, 142, 'Drama', 'https://www.imdb.com/title/tt0111161/mediaviewer/rm10105600/?ref_=tt_ov_i'),
(16, 'Star Wars: Episode III - Revenge of the Sith(2005)', 8, 140, 'Action Adventure Fantasy', 'https://www.imdb.com/title/tt0121766/mediaviewer/rm4094016256/?ref_=tt_ov_i'),
(17, 'Forest Gump(1994)', 9, 142, 'Drama Romance', 'https://www.imdb.com/title/tt0109830/mediaviewer/rm1954748672/?ref_=tt_ov_i'),
(18, 'The Prestige(2006)', 9, 130, 'Drama Mystery Thriller', 'https://www.imdb.com/title/tt0482571/mediaviewer/rm4031813632/?ref_=tt_ov_i'),
(19, 'The Lord of the Rings: The Return of the King(2003)', 9, 201, 'Action Adventure Drama', 'https://www.imdb.com/title/tt0167260/mediaviewer/rm584928512/?ref_=tt_ov_i'),
(20, 'The Hateful Eight(2015)', 8, 168, 'Crime Drama Mystery', 'https://www.imdb.com/title/tt3460252/mediaviewer/rm2736055040/?ref_=tt_ov_i');

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

--
-- Dumping data for table `show_c`
--

INSERT INTO `show_c` (`s_id`, `s_Date`, `s_startime`, `s_endtime`, `ch_id`, `m_id`) VALUES
(1, '2022-01-01 00:00:00', '2022-01-01 10:00:00', '2022-01-01 12:30:00', 1, 1),
(2, '2022-01-02 00:00:00', '2022-01-02 09:00:00', '2022-01-02 11:30:00', 1, 2),
(3, '2022-01-03 00:00:00', '2022-01-03 10:00:00', '2022-01-03 12:30:00', 2, 2);

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
  `u_pass` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_pass`) VALUES
(1, 'Yash ', 'yash@mail.com', 'yashpass'),
(2, 'yashkara', 'yashkara@gmail.com', 'yashkarapass');

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
-- Indexes for table `movie_30`
--
ALTER TABLE `movie_30`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cinema_hall`
--
ALTER TABLE `cinema_hall`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cinema_seat`
--
ALTER TABLE `cinema_seat`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `movie_30`
--
ALTER TABLE `movie_30`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_c`
--
ALTER TABLE `show_c`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `show_seat`
--
ALTER TABLE `show_seat`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
