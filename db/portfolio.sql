-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2019 at 01:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `messege`
--

CREATE TABLE `messege` (
  `messege_id` int(11) NOT NULL,
  `messege` varchar(255) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `date` varchar(55) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `name`, `date`, `pic`, `description`, `link`) VALUES
(1, 'Heloko', 'December 2018', '391_Heloko.png', 'Heloko tempalte built by css3 / bootstrap and jquery and i used js plugins like singlePageNav.js magnific-popup.js , this tempalte is responsive for all devices', 'sites/Heloko'),
(2, 'Bioniqe', 'February', '685_Bioniqe.png', 'Heloko tempalte built by css3 / bootstrap and jquery and i used js plugins like singlePageNav.js magnific-popup.js , this tempalte is responsive for all devices', 'sites/Bioniqe'),
(3, 'Javascript Form', 'February 2019', '380_Javascript_form.png', 'sadddddddddddd', 'sites/Javascript_form'),
(4, 'Simple Front Form', 'December 2018', '420_front-form.png', 'asddddddddd', 'sites/front_form'),
(5, 'Them For AdLinkFly', '15 April 2019', '30_cuts-url.png', 'This script for cut link and a I was asked to create new them for this site from manager i create full edition for home page and login page and sigin page using css3 animation / bootstrap and jquery	 ', 'https://www.cuts-url.club'),
(6, 'Them For AdLinkFly', '12 September 2019', '88_shorter-link.png', 'This script for cut link and a I was asked to create new them for this site from manager i create full edition for home page and login page and sigin page using css3 animation / bootstrap and jquery	 ', 'https://www.shorter-link.best');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `username`, `password`) VALUES
(32485602, 'abdo esmail', '7632b55708e798a43f051d59fc624b21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messege`
--
ALTER TABLE `messege`
  ADD PRIMARY KEY (`messege_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messege`
--
ALTER TABLE `messege`
  MODIFY `messege_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32485603;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
