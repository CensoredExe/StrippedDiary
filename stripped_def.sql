-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2019 at 07:44 PM
-- Server version: 5.7.27
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stripped_def`
--

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE `deleted` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(256) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_date` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deleted`
--

INSERT INTO `deleted` (`post_id`, `post_title`, `post_content`, `post_author`, `post_date`) VALUES
(1, 'The official, very first post.', 'The very first post. I know, its amazing. A simple website with text input and storing data, how complex. I plan on using this purely for keeping track of my progress with programming etc. I feel it will hold me accountable - if I actually use it that is.', 1, '15/08/2019 02:56:28'),
(3, 'Test for delete func', 'This post is being written purely for the purpose of testing the \'Average\' stats on the index landing page. Hopefully, it works.', 1, '23/08/2019 00:39:17'),
(4, 'hello\'test', 'dasd', 1, '23/08/2019 00:41:03'),
(5, 'sddas', 'This post is being written purely for the purpose of testing the \'Average\' stats on the index landing page. Hopefully, it works.', 1, '23/08/2019 00:42:28'),
(6, 'Test', '<h1>Test</h1><h2>Wow</h2>', 1, '23/08/2019 00:57:21'),
(7, 'Test2', 'Hi, I\'m oliver. I like to write.', 1, '23/08/2019 00:57:50'),
(8, 'Test \' test', 'dsa', 1, '23/08/2019 01:01:27'),
(9, 'test', 'This post is being written purely for the purpose of testing the \'Average\' stats on the index landing page. Hopefully, it works.', 1, '23/08/2019 01:02:57'),
(10, 'test', '&lt;h1&gt;test&lt;/h1&gt;', 1, '23/08/2019 01:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(256) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_date` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_author`, `post_date`) VALUES
(11, 'hey', 'i love you - mia', 3, '23/08/2019 01:31:51'),
(13, 'fuck you', 'fuck you\r\n', 3, '23/08/2019 01:35:23'),
(14, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:28'),
(15, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:31'),
(16, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:35'),
(17, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:39'),
(18, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:47'),
(19, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:51'),
(20, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:55'),
(21, 'fuck you', 'fuck you', 3, '23/08/2019 01:35:59'),
(22, 'fuck you', 'fuck you', 3, '23/08/2019 01:36:07'),
(23, 'fuck you', 'fuck you', 3, '23/08/2019 01:36:10'),
(24, 'fuck you', 'fuck you', 3, '23/08/2019 01:36:13'),
(25, 'fuck you', 'fuck you', 3, '23/08/2019 01:36:18'),
(26, 'fuck', 'gonna go burn down my middle school', 4, '23/08/2019 01:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_email` varchar(256) NOT NULL,
  `user_bio` longtext NOT NULL,
  `user_font` varchar(256) NOT NULL,
  `user_role` varchar(256) NOT NULL,
  `user_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_bio`, `user_font`, `user_role`, `user_password`) VALUES
(1, 'Oliver Crowe', 'olivercampbellcrowe@outlook.com', 'Haven\'t entered a bio', 'TO BE ADDED', 'user', '$2y$10$j3MU.lYs5Og6NUa3WkhYxel1nZzXfxO1YLSjUGTiqRXTXQqc40QXC'),
(2, 'Oliver Crowe2', 'test@gmail.com', 'Hasnt entered bio', 'TO BE ADDED', 'user', '$2y$10$h5mnWqVIC28qgSVs1WBG5OJOT5.swMXv..8Opo1FHaWwXaW1c71Eq'),
(3, 'whore', 'olisgay@gmail.com', 'Hasnt entered bio', 'TO BE ADDED', 'user', '$2y$10$rtGVmDKI1UsTSdF2DVkJbOovK7tqV7Bi1hvA087czyDKzUnDWkMgi'),
(4, 'Sham', 'thatsmartweebnamedjames@gmail.com', 'Hasnt entered bio', 'TO BE ADDED', 'user', '$2y$10$CVR5WNVcLFYOM3th7N31X.cPJtnNKXurCtj8MElTulFD/v4TT9K9S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
