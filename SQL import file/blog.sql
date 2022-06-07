-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220606.e7487227e5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 07, 2022 at 01:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `gender` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `first_name`, `last_name`, `gender`) VALUES
(1, 'Jonny', 'Miller', 'Male'),
(2, 'Marco', 'Lucas', 'Male'),
(3, 'Luna', 'Djogani', 'Female'),
(4, 'Melissa', 'Jan', 'Female'),
(5, 'Michael', 'Muller', 'Male'),
(6, 'Luka', 'Joyner', 'Male'),
(7, 'Ilija', 'Djokovic', 'Male'),
(8, 'Maria', 'San Lopez', 'Female'),
(17, 'Stefan', 'Cumpalovic', 'Male'),
(31, 'Kirsten', 'Korosec', 'Female'),
(32, 'Kirsten', 'Korosec', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `text` text NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `text`, `post_id`, `author_id`) VALUES
(1, 'What an ispiring post, I love how you explained it!', 2, 3),
(3, 'Great explanation!', 2, 1),
(4, 'Where can I read more about this topic?', 2, 2),
(5, 'Great content', 1, 2),
(6, 'Nice one!', 1, 4),
(7, 'That is delightful', 3, 4),
(8, 'Great post and very useful information', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `title`, `body`, `created_at`, `author_id`) VALUES
(1, 'What are things like around here?', 'A chonky sidebar with four buttons takes up a lot of space, seemingly just to remind Gmail users that Google offers videoconferencing and chat services. Its even worse on the mobile version, where the chonkbar constantly lives on the bottom of the screen.', '2022-06-06 19:39:10', 1),
(2, 'Mathematicians Transcend a Geometric Theory of Motion', 'IN A NEARLY 400-page paper posted in March, the mathematicians Mohammed Abouzaid and Andrew Blumberg of Columbia University have constructed a major extension of one of the biggest advances in geometry in recent decades. The work they built on relates to ', '2022-06-06 19:40:52', 5),
(3, 'Welcome to the Great Reinfection', 'Two years and some change in, that novelty has largely evaporated. A perfect storm of waning immunity, loosened restrictions, and an extremely transmissible variant making the rounds has meant reinfections are the new normal for many. But even setting asi', '2022-06-06 19:42:14', 3),
(8, 'New post test', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id dolores omnis officia, eos, dicta beatae error corrupti explicabo, nisi quae neque quo pariatur est modi.', '2022-06-07 11:10:28', 17),
(11, 'Vivify Blog ', 'In Vivify Ideas, well-established work processes allow you to focus on applying your skills and producing high-quality work results. We will push you out of your comfort zone and allow you to thrive in challenging projects and roles.', '2022-06-07 12:02:00', 17),
(22, 'AppOmni raises $70M to find and secure vulnerabilities in Sa', 'The gap in the security market that AppOmni is targeting is a longstanding one that is in some ways becoming more critical with the evolution of IT. As more companies follow through on the promise of “digital transformation” and embrace doing more and investing more in cloud services, they are adopting an ever-wider array of apps — some of which are “approved” by IT and some of which are not — that users can access from a growing number of endpoints (that is, devices, such as laptops, their desks, their phones and tablets, across home Wi-Fi, public hotspots, mobile networks, office networks and so on and so forth). That spaghetti of permutations, taken across a wide array of apps, creates a lot of crossovers that inadvertently lead to vulnerabilities.', '2022-06-07 13:39:52', 31);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `FK_author_id` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`postid`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_author_id` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



