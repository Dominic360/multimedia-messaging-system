-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2022 at 01:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mms`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `friend_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_img` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `my_id` int(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `user_id`, `user_img`, `user_name`, `my_id`, `date`) VALUES
(16, 3, '07.jpg', 'Jeni Joe', 1, '14-10-2022'),
(17, 3, '07.jpg', 'Jeni Joe', 2, '14-10-2022'),
(20, 2, '05.jpg', 'Michael', 1, '14-10-2022'),
(21, 1, '02.jpg', 'Dominic', 2, '14-10-2022'),
(24, 1, '02.jpg', 'Dominic', 3, '19-10-2022'),
(25, 2, '05.jpg', 'Michael', 3, '19-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `audio` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `username`, `message`, `audio`, `img`, `video`, `date`) VALUES
(1, 'Jeni Joe', 'hi guys', '', '', '', '19-10-2022'),
(2, 'Dominic', 'wassup guys', '', '', '', '19-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `receiver` varchar(20) NOT NULL,
  `message` varchar(20) DEFAULT NULL,
  `audio` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `date` varchar(20) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `username`, `receiver`, `message`, `audio`, `img`, `video`, `date`) VALUES
(1, 'Dominic', 'Jeni Joe', 'hello jeni', '', '', '', '14-10-2022'),
(2, 'Jeni Joe', 'Dominic', 'hi dominic', '', '', '', '14-10-2022'),
(3, 'Michael', 'Jeni Joe', '', '', 'bg4.jpg', '', '14-10-2022'),
(4, 'Jeni Joe', 'Dominic', 'xup', '', '', '', '14-10-2022'),
(5, 'Jeni Joe', 'Michael', 'xup', '', '', '', '14-10-2022'),
(6, 'Michael', 'Dominic', 'hey im micheal', '', '', '', '14-10-2022'),
(7, 'Michael', 'Jeni Joe', 'Notin much', '', '', '', '14-10-2022'),
(8, 'Jeni Joe', '', 'hello guys', '', '', '', '19-10-2022');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `img`, `date`) VALUES
(1, 'Dominic', 'nicky', '1234', '02.jpg', '2022-09-30'),
(2, 'Michael', 'mich', '12345', '05.jpg', '2022-09-30'),
(3, 'Jeni Joe', 'jeni', '12345', '07.jpg', '2022-10-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`friend_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `friend_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
