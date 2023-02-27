-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 07:58 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` varchar(9) NOT NULL,
  `qid` varchar(6) NOT NULL,
  `email` tinytext NOT NULL,
  `answer` longtext NOT NULL,
  `flag` tinyint(1) NOT NULL,
  `view` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `qid`, `email`, `answer`, `flag`, `view`) VALUES
('CARo2uGIs', 'x40mzK', 'fahadansari6913@gmail.com', 'You can Pause or Resume study your any time and anywhere', 1, 0),
('drdSD5wj5', 'oSBu26', '', 'Firstly you have make fir complaint', 1, 1),
('qZY5Q69pe', 'oSBu26', '', 'qwerty', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` varchar(6) NOT NULL,
  `query` mediumtext NOT NULL,
  `flag` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `query`, `flag`) VALUES
('4dTvYy', 'What are the procedure for hostel allotment?', 1),
('Kg0QiC', 'who is vc of jamia', 1),
('NJZKuh', ' What are the procedure for registeration of JMI Wi-Fi?', 1),
('oSBu26', ' My JMI ID Card have been losted, What should I do know?', 1),
('x40mzK', 'What are benefits for ABC ID', 1),
('zkoYjA', 'when will be will open \r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` varchar(9) NOT NULL,
  `u_id` mediumtext NOT NULL,
  `q_id` varchar(6) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `u_id`, `q_id`, `status`) VALUES
('JUB4zlfZH', 'fahadansari6913@gmail.com', 'oSBu26', 1),
('Yi3MDBZR8', 'fahadansari6913@gmail.com', 'x40mzK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email` tinytext NOT NULL,
  `enrollment` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `enrollment`) VALUES
('fahadansari6913@gmail.com', 2000626);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `contact` double NOT NULL,
  `password` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `name`, `contact`, `password`) VALUES
('', '', 0, ''),
('fahadansari6913@gmail.com', 'Fahad Ansari', 9956875787, 'qwerty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`enrollment`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`(30));
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
