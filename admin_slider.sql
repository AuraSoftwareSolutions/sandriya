-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2018 at 11:37 AM
-- Server version: 5.6.32-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_slider`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_swedish_ci NOT NULL,
  `location` varchar(256) COLLATE utf8_swedish_ci NOT NULL,
  `uploaded` datetime NOT NULL,
  `type` varchar(16) COLLATE utf8_swedish_ci NOT NULL,
  `uploader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `groupid` int(11) NOT NULL,
  `groupname` varchar(32) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupid`, `groupname`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logsid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL,
  `eventtitle` varchar(32) COLLATE utf8_swedish_ci DEFAULT NULL,
  `eventdesc` varchar(1024) COLLATE utf8_swedish_ci NOT NULL,
  `eventdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logsid`, `eventid`, `eventtitle`, `eventdesc`, `eventdate`) VALUES
(1, 2, 'Delete event', 'An administrator has deleted a user.', '2018-04-01 06:12:54'),
(2, 6, 'Add event', 'An administrator has added a user to a group.', '2018-04-01 06:14:23'),
(3, 0, 'Add event', 'An administrator has added a user.', '2018-04-01 06:17:07'),
(4, 6, 'Add event', 'An administrator has added a user to a group.', '2018-04-01 06:17:16'),
(5, 1, 'Modify event', 'An administrator has modified a user.', '2018-04-01 06:20:16'),
(6, 1, 'Modify event', 'An administrator has modified a user.', '2018-04-01 09:33:30'),
(7, 4, 'Modify event', 'An administrator has modified a group.', '2018-04-01 09:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `comment`, `img`, `link`) VALUES
(1, '<ul>\n<li style=\"text-align: left;\">jkdchfkjshfsjhfkjh</li>\n</ul>', 'joomla-rest-header.png', 'http://sandrya.demo.rayyanholidays.com/img/adventure.jpg'),
(2, '<p style=\"text-align: left;\">dszsfff</p>', '1.png', 'http://sfsdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `slider_meta`
--

CREATE TABLE `slider_meta` (
  `hide` varchar(10) NOT NULL,
  `id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_meta`
--

INSERT INTO `slider_meta` (`hide`, `id`) VALUES
('0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  `hash` varchar(512) COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `groupid` int(11) NOT NULL DEFAULT '1',
  `dateregistered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogin` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `hash`, `email`, `groupid`, `dateregistered`, `lastlogin`) VALUES
(1, 'araf', 'sha256:1000:fDgcnh/jjPlL8Z7iuLrHkVvqP/Hh4u9G:Do4LBiURlfSX1eT7P/yCi7FiDFbqBDIp', 'arafullahi@gmail.com', 1, '2018-04-01 00:00:00', '2018-04-01 09:33:19'),
(3, 'admin', 'sha256:1000:ih9PXWNCSkZ4y895166O/wrXOK+6r7KC:5P6O6TT65lBv4SzeSMy+ZdFhb9HYJ/C/', 'admin@admin.com', 1, '2018-04-01 06:17:07', '2018-05-06 11:34:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupid`),
  ADD UNIQUE KEY `unique_groupid` (`groupid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logsid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_meta`
--
ALTER TABLE `slider_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
