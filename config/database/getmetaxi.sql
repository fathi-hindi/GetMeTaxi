-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 06:02 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `getmetaxi`
--
DROP DATABASE IF EXISTS `getmetaxi`;
CREATE DATABASE IF NOT EXISTS `getmetaxi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `getmetaxi`;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` bigint(20) NOT NULL,
  `member_id` bigint(20) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'P',
  `is_primary` int(11) NOT NULL DEFAULT '0',
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) NOT NULL,
  `nick_name` varchar(128) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `orgname` varchar(128) NOT NULL,
  `last_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(32),
  `fax` varchar(32),
  `mobile` varchar(32)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `member_id`, `status`, `is_primary`, `address1`, `address2`, `nick_name`, `city_id`, `orgname`, `last_create`) VALUES
(1, 1, 'P', 1, 'street line 1 ', 'buildding 4', '1', 1, '', '2017-01-22 19:28:48'),
(2, 2, 'P', 1, 'street line 3', 'buildding a', '12', 1, '', '2017-01-22 19:29:13'),
(1000, 1016, 'P', 1, 'test address1', 'test address2', 'test_address1', 1, 'test orgname', '2017-01-24 14:35:21'),
(1001, 1016, 'P', 0, 'test2 address1', 'test2 address2', 'test2_address1', 1, 'test2 orgname', '2017-01-24 14:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` bigint(20) NOT NULL,
  `identifer` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `identifer`, `status`) VALUES
(1, 'Nablus', 1),
(2, 'Tulkarem', 1),
(3, 'Jenin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `citydesc`
--

CREATE TABLE `citydesc` (
  `city_id` bigint(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `language_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citydesc`
--

INSERT INTO `citydesc` (`city_id`, `name`, `language_id`) VALUES
(1, 'Nablus', 1),
(2, 'Tulkarem', 1),
(3, 'Jenin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` bigint(20) NOT NULL,
  `local_name` char(16) NOT NULL,
  `language` char(5) NOT NULL,
  `description` varchar(128) NOT NULL,
  `encoding` varchar(32) NOT NULL,
  `country` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `local_name`, `language`, `description`, `encoding`, `country`) VALUES
(1, 'en', 'en_US', 'English', 'utf8', 'US');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` bigint(20) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `type`) VALUES
(1, 'O'),
(2, 'O'),
(1016, 'U');

-- --------------------------------------------------------

--
-- Table structure for table `orderattr`
--

CREATE TABLE `orderattr` (
  `orders_id` bigint(20) NOT NULL,
  `attr_name` varchar(32) NOT NULL,
  `attr_value` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` bigint(20) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'P',
  `time_placed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `users_id` bigint(20) NOT NULL,
  `comment` varchar(254) NOT NULL,
  `type` char(3) NOT NULL,
  `source` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxioffice`
--

CREATE TABLE `taxioffice` (
  `taxioffice_id` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `city_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxioffice`
--

INSERT INTO `taxioffice` (`taxioffice_id`, `status`, `city_id`) VALUES
(1, 1, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taxiofficedesc`
--

CREATE TABLE `taxiofficedesc` (
  `taxioffice_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `fax` varchar(128) NOT NULL,
  `mobile` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(254) NOT NULL,
  `thumbnail` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxiofficedesc`
--

INSERT INTO `taxiofficedesc` (`taxioffice_id`, `language_id`, `phone`, `fax`, `mobile`, `name`, `url`, `thumbnail`) VALUES
(1, 1, '123456789', '123456789', '123456789', 'An-Najah Taxi Office', '', ''),
(2, 1, '123456789', '123456789', '123456789', 'Al-3temad Taxi Office', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `taxitype`
--

CREATE TABLE `taxitype` (
  `taxitype_id` bigint(20) NOT NULL,
  `identifer` varchar(128) NOT NULL,
  `max_passenger` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxitype`
--

INSERT INTO `taxitype` (`taxitype_id`, `identifer`, `max_passenger`) VALUES
(1, '4_PASSENGER', 4),
(2, '7_PASSENGER', 4);

-- --------------------------------------------------------

--
-- Table structure for table `taxitypedesc`
--

CREATE TABLE `taxitypedesc` (
  `taxitype_id` bigint(20) NOT NULL,
  `language_id` bigint(20) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(128) DEFAULT NULL,
  `thumbnail` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxitypedesc`
--

INSERT INTO `taxitypedesc` (`taxitype_id`, `language_id`, `name`, `description`, `thumbnail`) VALUES
(1, 1, '4 - Passenger Taxi', '4 - Passenger Taxi', ''),
(2, 1, '7 - Passenger Taxi', '4 - Passenger Taxi', '');

-- --------------------------------------------------------

--
-- Table structure for table `userpwdhst`
--

CREATE TABLE `userpwdhst` (
  `userpwdhst_id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `logon_password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpwdhst`
--

INSERT INTO `userpwdhst` (`userpwdhst_id`, `users_id`, `logon_password`, `salt`, `creation_date`) VALUES
(1002, 1016, '123', '', '2017-01-24 12:49:33');

-- --------------------------------------------------------

--
-- Table structure for table `userreg`
--

CREATE TABLE `userreg` (
  `users_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `logon_id` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `password_retries` int(11) NOT NULL,
  `password_expired` int(11) NOT NULL,
  `salt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userreg`
--

INSERT INTO `userreg` (`users_id`, `status`, `logon_id`, `password`, `password_retries`, `password_expired`, `salt`) VALUES
(1016, 1, 'fhindi@test.com', '123', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` bigint(20) NOT NULL,
  `user_type` char(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `fax` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_type`, `date_of_birth`, `first_name`, `last_name`, `middle_name`, `phone`, `fax`, `mobile`, `photo`, `email`) VALUES
(1016, 'R', '0000-00-00', 'Fathi', 'Hindi', '', '0597262705', '', '', '', 'fathi@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `index_101` (`member_id`,`nick_name`),
  ADD KEY `index_102` (`member_id`) USING BTREE,
  ADD KEY `index_112` (`city_id`) USING BTREE;

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `index_103` (`identifer`);

--
-- Indexes for table `citydesc`
--
ALTER TABLE `citydesc`
  ADD PRIMARY KEY (`city_id`,`language_id`) USING BTREE,
  ADD KEY `index_104` (`city_id`),
  ADD KEY `index_105` (`language_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`,`type`);

--
-- Indexes for table `orderattr`
--
ALTER TABLE `orderattr`
  ADD UNIQUE KEY `index_117` (`orders_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `index_116` (`users_id`) USING BTREE;

--
-- Indexes for table `taxioffice`
--
ALTER TABLE `taxioffice`
  ADD PRIMARY KEY (`taxioffice_id`),
  ADD KEY `index_107` (`city_id`);

--
-- Indexes for table `taxiofficedesc`
--
ALTER TABLE `taxiofficedesc`
  ADD KEY `index_110` (`language_id`),
  ADD KEY `index_111` (`taxioffice_id`);

--
-- Indexes for table `taxitype`
--
ALTER TABLE `taxitype`
  ADD PRIMARY KEY (`taxitype_id`),
  ADD UNIQUE KEY `index_113` (`identifer`);

--
-- Indexes for table `taxitypedesc`
--
ALTER TABLE `taxitypedesc`
  ADD PRIMARY KEY (`taxitype_id`,`language_id`) USING BTREE,
  ADD KEY `index_114` (`taxitype_id`),
  ADD KEY `index_115` (`language_id`);

--
-- Indexes for table `userpwdhst`
--
ALTER TABLE `userpwdhst`
  ADD PRIMARY KEY (`userpwdhst_id`),
  ADD KEY `index_108` (`users_id`) USING BTREE;

--
-- Indexes for table `userreg`
--
ALTER TABLE `userreg`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `index_109` (`logon_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `taxitype`
--
ALTER TABLE `taxitype`
  MODIFY `taxitype_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userpwdhst`
--
ALTER TABLE `userpwdhst`
  MODIFY `userpwdhst_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_102` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_110` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `citydesc`
--
ALTER TABLE `citydesc`
  ADD CONSTRAINT `fk_107` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_108` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderattr`
--
ALTER TABLE `orderattr`
  ADD CONSTRAINT `fk_116` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_115` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxioffice`
--
ALTER TABLE `taxioffice`
  ADD CONSTRAINT `fk_104` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_111` FOREIGN KEY (`taxioffice_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxiofficedesc`
--
ALTER TABLE `taxiofficedesc`
  ADD CONSTRAINT `fk_105` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_109` FOREIGN KEY (`taxioffice_id`) REFERENCES `taxioffice` (`taxioffice_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `taxitypedesc`
--
ALTER TABLE `taxitypedesc`
  ADD CONSTRAINT `fk_113` FOREIGN KEY (`taxitype_id`) REFERENCES `taxitype` (`taxitype_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_114` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userpwdhst`
--
ALTER TABLE `userpwdhst`
  ADD CONSTRAINT `fk_101` FOREIGN KEY (`users_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userreg`
--
ALTER TABLE `userreg`
  ADD CONSTRAINT `fk_100` FOREIGN KEY (`users_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_112` FOREIGN KEY (`users_id`) REFERENCES `member` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
