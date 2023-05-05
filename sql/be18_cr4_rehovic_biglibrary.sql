-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 03:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be18_cr4_rehovic_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`) VALUES
(1, 'john doe'),
(2, 'kevin stein'),
(3, 'joseph hallo'),
(4, 'miriam weiß'),
(5, 'jane doe');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(64) NOT NULL,
  `mediatype_id` int(11) NOT NULL,
  `description` varchar(2047) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `publish_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isbn` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `image`, `name`, `mediatype_id`, `description`, `author_id`, `publisher_id`, `publish_date`, `status`, `isbn`) VALUES
(1, 'https://cdn.pixabay.com/photo/2022/12/19/18/23/fall-7666292__340.jpg', 'Now Is Not the Time to Panic: A Novel', 1, 'a book by Wilson, Kevin', 1, 1, '2023-02-12', 0, '9780062913500'),
(2, 'https://cdn.pixabay.com/photo/2023/03/14/12/41/wheat-7852286_640.jpg', 'Seeing with the Heart: A Guide to Navigating Life Adventures', 1, 'a book by O Brien SJ, Kevin', 3, 2, '2022-07-15', 1, '9780829455298'),
(3, 'https://cdn.pixabay.com/photo/2022/08/15/15/38/animal-7388186__340.jpg', 'We Need to Talk About Kevin', 1, '', 2, 3, '2020-09-25', 1, '9780062119049'),
(4, 'https://cdn.pixabay.com/photo/2016/11/21/15/08/playstation-1845880__340.jpg', 'speed for need', 5, 'a racing game', 2, 2, '2022-07-06', 1, ''),
(5, 'https://cdn.pixabay.com/photo/2016/01/29/01/04/billiards-1167221__340.jpg', 'in-depth guide billard', 4, '', 5, 3, '2021-04-03', 0, ''),
(6, 'https://cdn.pixabay.com/photo/2018/06/07/16/49/virtual-3460451__340.jpg', 'VR', 1, 'a story about VR', 4, 3, '2023-03-29', 1, '978-6-0350-9606-5'),
(7, 'https://cdn.pixabay.com/photo/2021/01/29/11/33/chess-5960730__340.jpg', 'best chess openings 2023', 1, '', 2, 2, '2023-01-26', 0, '978-5-8243-2802-8'),
(8, 'https://cdn.pixabay.com/photo/2022/07/04/04/37/musician-7300353__340.jpg', 'life on venus', 3, '', 2, 1, '0000-00-00', 1, ''),
(9, 'https://cdn.pixabay.com/photo/2016/06/28/01/42/chess-1483735__340.jpg', '', 1, '', 1, 1, '0000-00-00', 0, ''),
(10, 'https://cdn.pixabay.com/photo/2013/07/12/16/57/pacman-151558__340.png', 'pacman', 2, '', 4, 2, '2006-06-23', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `mediatype`
--

CREATE TABLE `mediatype` (
  `id` int(11) NOT NULL,
  `mediatype` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mediatype`
--

INSERT INTO `mediatype` (`id`, `mediatype`) VALUES
(1, 'book'),
(2, 'cd/dvd/blue-ray'),
(3, 'audio cassette'),
(4, 'video cassette'),
(5, 'game');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `name`, `address`) VALUES
(1, 'doeman', 'doestreet 4, 10001 NYC'),
(2, 'silverboy', 'silver 92, 10009 NYC'),
(3, 'janebooks', 'janestreet 21, 10002 NYC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mediatype_id` (`mediatype_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `mediatype`
--
ALTER TABLE `mediatype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mediatype`
--
ALTER TABLE `mediatype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`mediatype_id`) REFERENCES `mediatype` (`id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
