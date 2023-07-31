-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 05:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courtcase`
--
CREATE SCHEMA `courtcase`;
use `courtcase`;
-- --------------------------------------------------------

--
-- Table structure for table `casefile`
--

CREATE TABLE `casefile` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `national_id` varchar(111) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `postal` varchar(150) NOT NULL,
  `town` varchar(200) NOT NULL,
  `county` varchar(200) NOT NULL,
  `registry` varchar(111) NOT NULL,
  `casetype` varchar(150) NOT NULL,
  `caseno` varchar(150) NOT NULL,
  `yearfile` varchar(12) NOT NULL,
  `hearing` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `file1` varchar(500) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casefile`
--

INSERT INTO `casefile` (`id`, `name`, `national_id`, `phone`, `postal`, `town`, `county`, `registry`, `casetype`, `caseno`, `yearfile`, `hearing`, `status`, `details`, `file1`, `datetime`) VALUES
(14, 'Administrato ', '12345678', '0791471418', 'P.O BOX 2237-50100', 'KAKAMEGA', 'kisumu', 'Succession registry', 'Employemnt', '7586062', '2020', '2020-08-21', 'Inprocess', 'hhhhh', 'Succession registryEmployemnt7586062.2020', '2020-07-18 23:42:02'),
(19, 'Bonface Otiende', '122334343', '0791471418', '2787', 'Kakamega', 'Western', 'Crimimal registry', 'Sexual Offences', '6717597', '2020', '2020-08-22', 'Inprocess', 'paid not fully jjj', 'Crimimal registrySexual Offences6717597.2020', '2020-07-19 15:41:09'),
(20, 'Celestine Otieno', '3333333', '0782828822', 'P.o box 23=51000', 'kakamega', 'kakamega', 'Crimimal registry', 'Drug Use', '2969642', '2020', '2020-08-06', 'Inprocess', 'dfgfggffgfgfgfg', '', '2020-08-06 14:53:47');

-- --------------------------------------------------------

--
-- Table structure for table `caseprogress`
--

CREATE TABLE `caseprogress` (
  `id` int(10) NOT NULL,
  `caseno` varchar(200) NOT NULL,
  `status` varchar(222) NOT NULL,
  `hearing` varchar(150) NOT NULL,
  `details` text NOT NULL,
  `dateprocessed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caseprogress`
--

INSERT INTO `caseprogress` (`id`, `caseno`, `status`, `hearing`, `details`, `dateprocessed`) VALUES
(1, '5969737', 'Inprocess', '2020-07-30', 'welcom to tech', '2020-07-18 23:29:25'),
(2, '7586062', 'New', '2020-08-21', 'hhhhh hjhjhhj', '2020-07-19 00:53:22'),
(3, '5969737', 'Inprocess', '2020-07-28', 'Copyright © 2020:Court Case Management System', '2020-07-19 01:34:07'),
(4, '7586062', 'Closed', '2020-08-21', 'hhhhh  g                            j                                  \r\n                                ll                    \r\n                                           \r\n                ', '2020-07-19 12:11:19'),
(5, '7586062', 'Closed', '2020-08-21', 'wwwwwwwwwwwwwww', '2020-07-19 12:12:11'),
(6, '6717597', 'Inprocess', '2020-08-22', 'paid not fully jjjv ', '2020-07-19 15:42:05'),
(7, '6717597', 'Inprocess', '2020-08-22', 'send to jail', '2020-07-29 13:08:39'),
(8, '2969642', 'Inprocess', '2020-08-08', 'waiting for mention', '2020-08-06 14:43:58'),
(9, '2969642', 'Inprocess', '2020-08-06', 'hrhrfhr', '2020-08-06 14:47:49'),
(10, '2969642', 'New', '2020-08-06', '44444444444', '2020-08-06 14:52:48'),
(11, '2969642', 'Inprocess', '2020-08-06', 'dfgfggffgfgfgfg', '2020-08-06 14:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `casetype`
--

CREATE TABLE `casetype` (
  `id` int(10) NOT NULL,
  `case_name` varchar(200) NOT NULL,
  `reg_name` varchar(111) NOT NULL,
  `refno` varchar(150) NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casetype`
--

INSERT INTO `casetype` (`id`, `case_name`, `reg_name`, `refno`, `dateadd`) VALUES
(1, 'Sexual Offences', '', '6178187', '2020-07-08 14:38:58'),
(2, '', 'Theft Cases', '6895093', '2020-07-08 14:40:21'),
(3, 'Drug Use', 'Crimimal registry', '9467550', '2020-07-08 14:41:55'),
(4, 'Employemnt', 'Civil registry', '1568585', '2020-07-08 14:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `regcategory`
--

CREATE TABLE `regcategory` (
  `id` int(10) NOT NULL,
  `refno` varchar(200) NOT NULL,
  `reg_name` varchar(111) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regcategory`
--

INSERT INTO `regcategory` (`id`, `refno`, `reg_name`, `datetime`) VALUES
(1, '5765599', 'Crimimal registry', '2020-07-08 13:37:34'),
(2, '5685848', 'Civil registry', '2020-07-08 13:37:48'),
(3, '4293999', 'Succession registry', '2020-07-08 13:38:03'),
(4, '1718079', 'Election Registry', '2020-07-08 13:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `national_id` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` varchar(150) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `national_id`, `phone`, `level`, `datetime`) VALUES
(1, 'Bonny', 'admin@admin.com', 'bngt4788878', '1111111', 'bngt4788878.png', 'inactive', '254987413', '0705368736', 'Select Staff Level', '2020-07-18 13:22:46'),
(18, 'Administrator', 'admin@gmail.com', 'admin', 'admin', 'rasheddd21-06-20-06-2020steo.jpg', 'active', '12345678', '0791471418', 'admin', '2020-06-08 08:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roll` int(6) NOT NULL,
  `class` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `pcontact` varchar(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `name`, `roll`, `class`, `city`, `pcontact`, `photo`, `datetime`) VALUES
(41, 'Ajharul Islam', 444433, '1st', 'House#15, Ward#', '01944444444', '4444332020-06-06-06-58.jpg', '2020-06-06 16:17:58'),
(43, 'Majhar Rakib', 444439, '2nd', 'House#1eww', '01812888858', '4444392020-06-06-06-53.jpg', '2020-06-06 16:18:53'),
(44, 'kutub ussin', 443322, '4th', 'Dhaka, Banglade', '01797159600', '4433222020-06-06-06-28.jpg', '2020-06-06 16:19:28'),
(45, 'Shirin Akter', 443342, '2nd', 'Dhaka, Banglade', '01797159600', '4433422020-06-06-06-51.jpg', '2020-06-06 16:19:51'),
(47, 'utfol kumar das', 443353, '2nd', 'Dhaka, Banglade', '01814270541', '4433532020-06-06-06-32.jpg', '2020-06-06 16:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `national_id` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `level` varchar(200) NOT NULL DEFAULT 'user',
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `photo`, `status`, `national_id`, `phone`, `level`, `datetime`) VALUES
(10, 'Ajharul Islam', 'dedke@gmail.com', 'user', 'user', 'user08-07-20-07-202024.jpg', 'active', '122334343', '0791471418', 'user', '2020-06-08 11:49:10'),
(21, 'Bonface Otiende', 'bonfaceotiende1050@gmail.com', 'troff123456', '123456789', 'troff123456.jpg', 'active', '123456', '', 'user', '2020-08-06 14:00:01'),
(22, 'Bainito Muteshi', 'baingosi98@gmail.com', 'gtehrgfhdd', '123456789', 'gtehrgfhdd.jpg', 'active', '5623653653', '0716709832', 'user', '2020-08-06 14:16:44'),
(23, 'Celestine Otieno', 'ce@gmail.com', 'otieno123', '123456789', 'otieno123.jpg', 'active', '3333333', '0782828822', 'user', '2020-08-06 14:27:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casefile`
--
ALTER TABLE `casefile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caseprogress`
--
ALTER TABLE `caseprogress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casetype`
--
ALTER TABLE `casetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regcategory`
--
ALTER TABLE `regcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casefile`
--
ALTER TABLE `casefile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `caseprogress`
--
ALTER TABLE `caseprogress`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `casetype`
--
ALTER TABLE `casetype`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `regcategory`
--
ALTER TABLE `regcategory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
