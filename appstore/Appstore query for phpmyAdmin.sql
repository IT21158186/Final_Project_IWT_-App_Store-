-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 06:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(101, 'Ad.Pinsara', 'pinsara@gmail.com', 'Pinsara1234'),
(202, 'Ad.Dewmi', 'dewmi@gmail.com', 'dewmi1234'),
(303, 'Ad.Uresh', 'uresh@gmail.com', 'uresh1234'),
(404, 'Ad.Nimsara', 'nimsara@gmail.com', 'nimsara1234'),
(505, 'Ad.Sandali', 'sandali@gmail.com', 'sandali1234');

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `app_id` int(11) NOT NULL,
  `app_name` varchar(40) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `developer_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `file_path` varchar(80) DEFAULT NULL,
  `app_image` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`app_id`, `app_name`, `description`, `developer_id`, `cat_id`, `file_path`, `app_image`) VALUES
(1, 'Snapchat', 'Chat with friend and family', 1, 100, 'Snap.apk', 'Snap.png'),
(2, 'Whatsapp', 'Lets Whatsapp each other', 2, 100, '2.apk', '2.png'),
(3, 'Facebook', 'Lets Connect the world together', 3, 100, '3.apk', '3.png'),
(4, 'COC', 'Clash of Clans is a 2012 free-to-play mobile strat', 4, 200, 'COC.apk', 'COC.png'),
(6, 'EduAPP', 'Education together', 5, 400, '6.apk', '6.png'),
(7, 'MyBooks', 'Educational Books App', 1, 400, 'Book.txt', 'books-icon.png'),
(8, 'G.Class', 'D. Class is part of the G Suite for Education (for', 1, 400, 'G.class.apk', '8.png'),
(9, 'COD Mobile', 'Call of Duty: Mobile is a free-to-play shooter gam', 4, 200, 'COD Mobile.apk', 'COD Mobile.png'),
(10, 'Asphalt 9', 'Asphalt 9: Legends is a 2018 racing video game dev', 4, 200, 'Asphalt.apk', 'Asphalt.png'),
(11, 'Crypto', 'This Wallet is the official crypto wallet of Binan', 5, 300, 'Crypto.apk', 'Crypto.png'),
(12, 'X Player', 'XPlayer supports setting passwords for your privat', 2, 500, 'X Player.apk', 'X Player.png');

-- --------------------------------------------------------

--
-- Table structure for table `catergory`
--

CREATE TABLE `catergory` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catergory`
--

INSERT INTO `catergory` (`cat_id`, `cat_name`) VALUES
(100, 'Apps'),
(200, 'Games'),
(300, 'Commercial'),
(400, 'Educational'),
(500, 'Media');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developer_id` int(11) NOT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `about` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developer_id`, `company_name`, `about`, `email`, `password`, `mobile`) VALUES
(1, 'SLIIT', 'Professional App Maker Focused on Desiging Apps', '0001sliit@mail.com', 'sliit1122', NULL),
(2, 'CINEC', 'Android App developer', '0002cinec@mail.com', 'cinec1122', NULL),
(3, 'NSBM', 'Game developer', '0003nsbm@mail.com', 'nsbm1122', NULL),
(4, 'NIBM', 'Computer architecture', '0004nibm@mail.com', 'nibm1122', NULL),
(5, 'SIBA', 'Cyber sequrity App Maker', '0005siba@mail.com', 'siba1122', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `app_id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`app_id`, `rate`) VALUES
(1, 7),
(2, 8),
(3, 9),
(4, 16),
(8, 4),
(10, 5),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reg_users`
--

CREATE TABLE `reg_users` (
  `email` varchar(50) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_users`
--

INSERT INTO `reg_users` (`email`, `first_name`, `last_name`, `password`, `mobile_no`) VALUES
('hearth@mail.com', 'Dewmi', 'Herath', 'Dewmi1122', 781232123),
('mahagedara@mail.com', 'Nimsara', 'Mahagedara', 'Nimsara1122', 763355762),
('pinidiya96@mail.com', 'Uresh', 'Pinidiya', 'Uresh1122', 712342433),
('pinsara@mail.com', 'Deneth', 'Pinsara', 'Deneth1122', 769379809),
('vimansa@mail.com', 'Sandali', 'Vimansa', 'Sandali1122', 732434433);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `app_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`app_id`, `email`, `rating`, `comment`) VALUES
(1, 'mahagedara@mail.com', 4, 'it is a very Cool App'),
(1, 'pinsara@mail.com', 5, ''),
(2, 'pinidiya96@mail.com', 5, 'Super chat app'),
(4, 'vimansa@mail.com', 2, 'Not good'),
(8, 'pinsara@mail.com', 4, ''),
(10, 'pinsara@mail.com', 5, 'Excellent!!!!!!!'),
(11, 'pinsara@mail.com', 3, 'So valuable..'),
(12, 'pinsara@mail.com', 4, 'A best player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `apps_fk` (`developer_id`),
  ADD KEY `apps_fk2` (`cat_id`);

--
-- Indexes for table `catergory`
--
ALTER TABLE `catergory`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `reg_users`
--
ALTER TABLE `reg_users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`app_id`,`email`),
  ADD KEY `review_fk_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apps`
--
ALTER TABLE `apps`
  ADD CONSTRAINT `apps_fk` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`developer_id`),
  ADD CONSTRAINT `apps_fk2` FOREIGN KEY (`cat_id`) REFERENCES `catergory` (`cat_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_fk` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_fk_1` FOREIGN KEY (`app_id`) REFERENCES `apps` (`app_id`),
  ADD CONSTRAINT `review_fk_2` FOREIGN KEY (`email`) REFERENCES `reg_users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
