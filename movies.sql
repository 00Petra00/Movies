-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 03:44 PM
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
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `username` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`username`, `name`, `author`) VALUES
('teszt1', 'Avatar', 'James Cameron'),
('teszt1', 'Inside Out', 'Pete Docter'),
('teszt1', 'Insidious', 'Leigh Whannell'),
('teszt1', 'Mission: Impossible', 'Christopher McQuarrie'),
('teszt1', 'Shrek', 'Vicky Jenson, Andrew Adamson'),
('teszt1', 'Strays', ' Josh Greenbaum'),
('teszt1', 'The Body', 'Jeethu Joseph'),
('teszt1', 'The Little Mermaid', 'Rob Marshall'),
('teszt2', 'Guardians of the Galaxy 3', 'James Gunn'),
('teszt2', 'Shazam!', 'David F. Sandberg'),
('teszt2', 'The Marvels', 'Nia DaCosta');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `image` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`image`, `name`, `author`, `year`) VALUES
('65043932a60e8.jpg', 'Avatar', 'James Cameron', 2009),
('65043baa83d91.jpg', 'Charlie and the Chocolate Factory', 'Tim Burton', 2005),
('650438478c730.jpg', 'Guardians of the Galaxy 3', 'James Gunn', 2023),
('65043c9243b41.jpg', 'Inside Out', 'Pete Docter', 2015),
('65043cdec1ec0.jpg', 'Insidious', 'Leigh Whannell', 2015),
('65043abbcea60.jpg', 'Mission: Impossible', 'Christopher McQuarrie', 2023),
('65044a44ba21f.jpg', 'Shazam!', 'David F. Sandberg', 2019),
('65043906d2a55.jpg', 'Shrek', 'Vicky Jenson, Andrew Adamson', 2001),
('65043c1608cc8.jpg', 'Strays', ' Josh Greenbaum', 2023),
('65043d1fedb88.jpg', 'The Body', 'Jeethu Joseph', 2019),
('650439730cab0.jpg', 'The Little Mermaid', 'Rob Marshall', 2023),
('6504388936d95.jpg', 'The Marvels', 'Nia DaCosta', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('teszt1', '12345678'),
('teszt2', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`username`,`name`,`author`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`name`,`author`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`name`) REFERENCES `movie` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
