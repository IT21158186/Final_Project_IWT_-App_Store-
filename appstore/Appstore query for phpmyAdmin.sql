-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 07:37 PM
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
(101, 'Deneth', 'pinsara@gmail.com', 'pinsara1234'),
(202, 'Dewmi', 'dewmi@gmail.com', 'dewmi1234'),
(303, 'Uresh', 'uresh@gmail.com', 'uresh1234'),
(404, 'Nimsara', 'nimsara@gmail.com', 'nimsara1234'),
(505, 'Sandali', 'sandali@gmail.com', 'sandali1234');

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
(14, 'Avaira', '--Virus Guard--', 1, 100, 'Avira.apk', 'Avira.png'),
(15, 'Avast', '--Virus Guard--', 1, 100, 'Avast.apk', 'Avast.png'),
(16, 'Facebook', '--Social media application-- ', 1, 100, 'fb (2).apk', 'FB.png'),
(17, 'Helakuru', '--Sinhala Keyboard--', 1, 100, 'Helakuru.apk', 'Helakuru.png'),
(18, 'OperaMini', '--Web browser--', 1, 100, 'Opera.apk', 'opera.png'),
(19, 'Bapp', '--BOC online banking app--', 2, 300, 'B App.apk', 'B App.png'),
(20, 'Crypto', '--e-Crypto exchange wallet--', 2, 300, 'Crypto.apk', 'Crypto.png'),
(21, 'e-Seylan', '--Seylan bank online app--', 2, 300, 'Seylan.apk', 'Seylan.png'),
(22, 'E- Banking', '--Online transaction platform--', 2, 300, 'ebanking.apk', 'EBanking.png'),
(23, 'Worldbank', '--World bank online app--', 2, 300, 'World bank.apk', 'Worldbank.png'),
(24, 'Asphalt 9', '--Racing game new update--', 3, 200, 'Asphalt.apk', 'Asphalt.png'),
(25, 'COC', '--Clash of clans - strategy game--', 3, 200, 'COC.apk', 'COC.png'),
(26, 'COD Mobile', '--Call of Duty mobile game apk--', 3, 200, 'COD Mobile.apk', 'COD Mobile.png'),
(27, 'Edu App', '--Educational apk for uni students--', 4, 400, '6.apk', '6.png'),
(28, 'My Book', '--E- Book Browser--', 4, 400, 'books.apk', 'books.png'),
(29, 'MySchool', '--Online school learning app--', 4, 400, 'Myscl.apk', 'Myschool.png'),
(30, 'G.Class', '--Google classroom apk--', 4, 400, 'G.class.apk', 'G. class.png'),
(31, 'Snapchat', '--Photo filters and editing app--', 5, 500, 'Snap.apk', 'Snap.png'),
(32, 'Spotify', '--Online mp3 Player--', 5, 500, 'Spotify.apk', 'Spotify.png'),
(33, 'VLC Player', '--mp3, mp4 Media player--', 5, 500, 'VLC.apk', 'VLC.png'),
(34, 'X Player', '--mp4, 4K video player--', 5, 500, 'X Player.apk', 'X Player.png'),
(35, 'Youtube', '--Video streaming browser--', 5, 500, 'YT.apk', 'YT.png'),
(36, 'Whatsapp', '--Online messaging app--', 5, 100, 'Whatsapp.apk', 'Whatsapp.png'),
(37, 'FireFox', '--internet browser--', 5, 100, 'firefox.apk', 'firefox.png');

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
(1, 'Activision', 'Professional App Maker Focused on Desiging Apps', 'activision@mail.com', '12345', '076 9379809'),
(2, 'Rooster', 'Android App developer', 'rooster@mail.com', '12345', '0763355762'),
(3, 'Ubisoft', 'Game developer', 'ubisoft@mail.com', '12345', '0713311593'),
(4, 'Hyke', 'Computer architecture', 'hyke@mail.com', '12345', '0703612338'),
(5, 'Supercell', 'Cyber sequrity App Maker', 'supercell@mail.com', '12345', '0713694485');

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
(15, 3),
(19, 4),
(25, 5),
(32, 3),
(36, 4);

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
(15, 'pinsara@mail.com', 3, ''),
(19, 'pinsara@mail.com', 4, ''),
(25, 'pinsara@mail.com', 5, 'Best strategy game '),
(32, 'pinsara@mail.com', 3, ''),
(36, 'pinsara@mail.com', 4, '');

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
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
