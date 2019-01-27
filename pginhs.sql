-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 06:22 PM
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
-- Database: `pginhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `correction`
--

CREATE TABLE `correction` (
  `id` int(11) NOT NULL,
  `iga_id` varchar(255) NOT NULL,
  `last_hi` float NOT NULL,
  `last_rev_date` varchar(255) NOT NULL,
  `correction_hi` float NOT NULL,
  `correction_date` varchar(255) NOT NULL,
  `requester` varchar(255) NOT NULL,
  `approver` varchar(255) NOT NULL,
  `status` enum('Approved','Rejected','Pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golfers`
--

CREATE TABLE `golfers` (
  `id` int(11) NOT NULL,
  `iga_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(255) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `office_city` varchar(255) NOT NULL,
  `country` varchar(127) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `fax` varchar(40) NOT NULL,
  `h_index` float NOT NULL,
  `p_hi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golfer_club`
--

CREATE TABLE `golfer_club` (
  `id` int(11) NOT NULL,
  `iga_id` varchar(255) NOT NULL,
  `club_id` int(11) NOT NULL,
  `club_id_number` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golfer_score`
--

CREATE TABLE `golfer_score` (
  `id` int(12) NOT NULL,
  `iga_u_id` int(12) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` enum('Regular','Tournament') NOT NULL,
  `course_id` int(12) NOT NULL,
  `tee` enum('Black','Blue','White','White Lady','Red') NOT NULL,
  `course_rtg` float NOT NULL,
  `slope_rtg` float NOT NULL,
  `h_index` float NOT NULL,
  `c_handicap` float NOT NULL,
  `str_1` int(11) NOT NULL,
  `str_2` int(11) NOT NULL,
  `str_3` int(11) NOT NULL,
  `str_4` int(11) NOT NULL,
  `str_5` int(11) NOT NULL,
  `str_6` int(11) NOT NULL,
  `str_7` int(11) NOT NULL,
  `str_8` int(11) NOT NULL,
  `str_9` int(11) NOT NULL,
  `str_10` int(11) NOT NULL,
  `str_11` int(11) NOT NULL,
  `str_12` int(11) NOT NULL,
  `str_13` int(11) NOT NULL,
  `str_14` int(11) NOT NULL,
  `str_15` int(11) NOT NULL,
  `str_16` int(11) NOT NULL,
  `str_17` int(11) NOT NULL,
  `str_18` int(11) NOT NULL,
  `t_str_out` int(11) NOT NULL,
  `t_str_in` int(11) NOT NULL,
  `adj_1` int(11) NOT NULL,
  `adj_2` int(11) NOT NULL,
  `adj_3` int(11) NOT NULL,
  `adj_4` int(11) NOT NULL,
  `adj_5` int(11) NOT NULL,
  `adj_6` int(11) NOT NULL,
  `adj_7` int(11) NOT NULL,
  `adj_8` int(11) NOT NULL,
  `adj_9` int(11) NOT NULL,
  `adj_10` int(11) NOT NULL,
  `adj_11` int(11) NOT NULL,
  `adj_12` int(11) NOT NULL,
  `adj_13` int(11) NOT NULL,
  `adj_14` int(11) NOT NULL,
  `adj_15` int(11) NOT NULL,
  `adj_16` int(11) NOT NULL,
  `adj_17` int(11) NOT NULL,
  `adj_18` int(11) NOT NULL,
  `t_adj_out` int(11) NOT NULL,
  `t_adj_in` int(11) NOT NULL,
  `eagle` int(11) NOT NULL,
  `birdie` int(11) NOT NULL,
  `par` int(11) NOT NULL,
  `bogey` int(11) NOT NULL,
  `double_bogey` int(11) NOT NULL,
  `gs` int(11) NOT NULL,
  `ags` int(11) NOT NULL,
  `esc` int(11) NOT NULL,
  `hcp_diff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golf_club`
--

CREATE TABLE `golf_club` (
  `id` int(11) NOT NULL,
  `club_code` varchar(20) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `abb_name` varchar(127) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golf_club`
--

INSERT INTO `golf_club` (`id`, `club_code`, `club_name`, `abb_name`, `location`) VALUES
(2, 'A0002', 'Jakarta Golf Club', 'JGC', 'DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `golf_courses`
--

CREATE TABLE `golf_courses` (
  `id` int(12) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `abb_name` varchar(127) NOT NULL,
  `location` varchar(255) NOT NULL,
  `p_o_1` int(2) NOT NULL,
  `p_o_2` int(2) NOT NULL,
  `p_o_3` int(2) NOT NULL,
  `p_o_4` int(2) NOT NULL,
  `p_o_5` int(2) NOT NULL,
  `p_o_6` int(2) NOT NULL,
  `p_o_7` int(2) NOT NULL,
  `p_o_8` int(2) NOT NULL,
  `p_o_9` int(2) NOT NULL,
  `p_i_10` int(2) NOT NULL,
  `p_i_11` int(2) NOT NULL,
  `p_i_12` int(2) NOT NULL,
  `p_i_13` int(2) NOT NULL,
  `p_i_14` int(2) NOT NULL,
  `p_i_15` int(2) NOT NULL,
  `p_i_16` int(2) NOT NULL,
  `p_i_17` int(2) NOT NULL,
  `p_i_18` int(2) NOT NULL,
  `total_p_o` int(3) NOT NULL,
  `total_p_i` int(3) NOT NULL,
  `i_out_1` int(2) NOT NULL,
  `i_out_2` int(2) NOT NULL,
  `i_out_3` int(2) NOT NULL,
  `i_out_4` int(2) NOT NULL,
  `i_out_5` int(2) NOT NULL,
  `i_out_6` int(2) NOT NULL,
  `i_out_7` int(2) NOT NULL,
  `i_out_8` int(2) NOT NULL,
  `i_out_9` int(2) NOT NULL,
  `i_in_10` int(2) NOT NULL,
  `i_in_11` int(2) NOT NULL,
  `i_in_12` int(2) NOT NULL,
  `i_in_13` int(2) NOT NULL,
  `i_in_14` int(2) NOT NULL,
  `i_in_15` int(2) NOT NULL,
  `i_in_16` int(2) NOT NULL,
  `i_in_17` int(2) NOT NULL,
  `i_in_18` int(2) NOT NULL,
  `c_r_black` float NOT NULL,
  `c_r_blue` float NOT NULL,
  `c_r_white` float NOT NULL,
  `c_r_white_l` float NOT NULL,
  `c_r_red` float NOT NULL,
  `s_r_black` int(4) NOT NULL,
  `s_r_blue` int(4) NOT NULL,
  `s_r_white` int(4) NOT NULL,
  `s_r_white_l` int(4) NOT NULL,
  `s_r_red` int(4) NOT NULL,
  `slope_system` enum('pre-slope','own-slope') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` char(64) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE `revision` (
  `id` int(11) NOT NULL,
  `rev_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suspense_golfers`
--

CREATE TABLE `suspense_golfers` (
  `id` int(11) NOT NULL,
  `suspense_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `address` varchar(127) NOT NULL,
  `city` varchar(255) NOT NULL,
  `office_address` varchar(255) NOT NULL,
  `office_city` varchar(255) NOT NULL,
  `country` varchar(127) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `fax` varchar(40) NOT NULL,
  `h_index` float NOT NULL,
  `p_hi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suspense_golfer_club`
--

CREATE TABLE `suspense_golfer_club` (
  `id` int(11) NOT NULL,
  `suspense_id` varchar(255) NOT NULL,
  `club_id` int(11) NOT NULL,
  `club_id_number` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` enum('Admin','User') NOT NULL,
  `exp_date` varchar(127) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `type`, `exp_date`, `status`) VALUES
(2, 'admin', '$2y$10$vg8563VNQCYWlUBJzU2A4./kTwR/jDB700Z0MSIqbUWBUSMON6sgC', 'Sukmaindra Damasaputra', 'sukmaindra9@gmail.com', 'Admin', '', 'Active'),
(3, 'A0002', '$2y$10$ObmmQs9OM8JHpt/ntQygwe1.O2H.p8p9ezrk8okX7xXkgG6Hpm58q', 'Jakarta Golf Club', '', 'User', '', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `correction`
--
ALTER TABLE `correction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iga_id` (`iga_id`);

--
-- Indexes for table `golfers`
--
ALTER TABLE `golfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `iga_id` (`iga_id`);

--
-- Indexes for table `golfer_club`
--
ALTER TABLE `golfer_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iga_id` (`iga_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `golfer_score`
--
ALTER TABLE `golfer_score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iga_u_id` (`iga_u_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `golf_club`
--
ALTER TABLE `golf_club`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `club_code` (`club_code`);

--
-- Indexes for table `golf_courses`
--
ALTER TABLE `golf_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token_id` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suspense_golfers`
--
ALTER TABLE `suspense_golfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suspense_id` (`suspense_id`);

--
-- Indexes for table `suspense_golfer_club`
--
ALTER TABLE `suspense_golfer_club`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suspense_id` (`suspense_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `correction`
--
ALTER TABLE `correction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golfers`
--
ALTER TABLE `golfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golfer_club`
--
ALTER TABLE `golfer_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golfer_score`
--
ALTER TABLE `golfer_score`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golf_club`
--
ALTER TABLE `golf_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `golf_courses`
--
ALTER TABLE `golf_courses`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `revision`
--
ALTER TABLE `revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suspense_golfers`
--
ALTER TABLE `suspense_golfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suspense_golfer_club`
--
ALTER TABLE `suspense_golfer_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `correction`
--
ALTER TABLE `correction`
  ADD CONSTRAINT `correction_ibfk_1` FOREIGN KEY (`iga_id`) REFERENCES `golfers` (`iga_id`);

--
-- Constraints for table `golfer_club`
--
ALTER TABLE `golfer_club`
  ADD CONSTRAINT `golfer_club_ibfk_1` FOREIGN KEY (`iga_id`) REFERENCES `golfers` (`iga_id`),
  ADD CONSTRAINT `golfer_club_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `golf_club` (`id`);

--
-- Constraints for table `golfer_score`
--
ALTER TABLE `golfer_score`
  ADD CONSTRAINT `golfer_score_ibfk_1` FOREIGN KEY (`iga_u_id`) REFERENCES `golfers` (`id`),
  ADD CONSTRAINT `golfer_score_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `golf_courses` (`id`);

--
-- Constraints for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD CONSTRAINT `login_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `suspense_golfer_club`
--
ALTER TABLE `suspense_golfer_club`
  ADD CONSTRAINT `suspense_golfer_club_ibfk_1` FOREIGN KEY (`suspense_id`) REFERENCES `suspense_golfers` (`suspense_id`),
  ADD CONSTRAINT `suspense_golfer_club_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `golf_club` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
