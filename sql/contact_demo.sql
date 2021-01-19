-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2021 at 09:52 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstName`, `lastName`, `phone`, `email`, `timestamp`) VALUES
(205, 'Mokammel', 'Tanvir', '+8801915557363', 'tanvir@mokammeltanvir.com', '2021-01-19 19:02:55'),
(207, 'Name', 'demo1', '987456321', 'demo1@email.com', '2021-01-19 19:32:58'),
(208, 'Firstname', 'Lastname', '963258741', 'contact@email.com', '2021-01-19 19:43:56'),
(209, 'Contact firstname', 'Contact lastName', '987456321', 'contact@gemail.com', '2021-01-19 20:06:42'),
(210, 'Doe', 'John', '741258963', 'john@example.com', '2021-01-19 20:13:45'),
(211, 'name', 'demo', '987456321', 'contact@email.com', '2021-01-19 20:19:01'),
(212, 'Lorem', 'Ipsum', '987456321', 'lorem@demo.com', '2021-01-19 20:23:08'),
(213, 'World', 'Hello', '741258963', 'example@email.com', '2021-01-19 20:24:30'),
(214, 'php', 'Mysql', '20213456987', 'email@email.com', '2021-01-19 20:25:18'),
(215, 'FriendFname', 'FriendLname', '963258741', 'mail@email.com', '2021-01-19 20:26:10'),
(216, 'contact\'s Firstname', 'contact\'s Lastname', '987456321', 'email@email.com', '2021-01-19 20:42:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
