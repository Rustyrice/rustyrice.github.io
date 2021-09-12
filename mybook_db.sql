-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 12:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybook_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_i_follow`
--

CREATE TABLE `content_i_follow` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_invites`
--

CREATE TABLE `group_invites` (
  `id` bigint(20) NOT NULL,
  `groupid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `inviter` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `groupid` bigint(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `group_requests`
--

CREATE TABLE `group_requests` (
  `id` bigint(20) NOT NULL,
  `groupid` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_requests`
--

INSERT INTO `group_requests` (`id`, `groupid`, `userid`, `disabled`) VALUES
(1, 6829070463056, 9943701, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `likes` text NOT NULL,
  `following` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `msgid` varchar(60) NOT NULL,
  `sender` bigint(20) NOT NULL,
  `receiver` bigint(20) NOT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(500) DEFAULT NULL,
  `received` tinyint(1) NOT NULL DEFAULT 0,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_sender` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_receiver` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `tags` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msgid`, `sender`, `receiver`, `message`, `file`, `received`, `seen`, `deleted_sender`, `deleted_receiver`, `date`, `tags`) VALUES
(1, 'NFQBqzaCjYU5podA01BJNP9bI9FheXq4INrT_iDbOUUHWcOdS', 667394095, 9943701, '', 'uploads/667394095/jGzhCJkg8QKQ228.jpg', 0, 1, 0, 0, '2021-09-04 11:43:40', '[]'),
(2, 'NFQBqzaCjYU5podA01BJNP9bI9FheXq4INrT_iDbOUUHWcOdS', 667394095, 9943701, 'test', '', 0, 1, 0, 0, '2021-09-04 11:46:55', '[]'),
(3, 'NFQBqzaCjYU5podA01BJNP9bI9FheXq4INrT_iDbOUUHWcOdS', 9943701, 667394095, 'sup', '', 0, 1, 0, 0, '2021-09-04 11:50:48', '[]'),
(4, 'NFQBqzaCjYU5podA01BJNP9bI9FheXq4INrT_iDbOUUHWcOdS', 9943701, 667394095, 'haa', '', 0, 1, 0, 0, '2021-09-04 11:50:50', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `activity` varchar(10) NOT NULL,
  `contentid` bigint(20) NOT NULL,
  `content_owner` bigint(20) NOT NULL,
  `content_type` varchar(10) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification_seen`
--

CREATE TABLE `notification_seen` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `notification_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification_seen`
--

INSERT INTO `notification_seen` (`id`, `userid`, `notification_id`) VALUES
(1, 667394095, 0),
(2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `has_image` tinyint(1) NOT NULL,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `tags` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `postid`, `userid`, `owner`, `post`, `image`, `comments`, `likes`, `date`, `has_image`, `is_profile_image`, `is_cover_image`, `parent`, `tags`) VALUES
(1, 661567268, 667394095, 0, '', 'uploads/667394095/OCzbP0oOCETg68g.jpg', 0, 0, '2021-09-04 10:21:17', 1, 1, 0, 0, '[]'),
(2, 71185240210789, 667394095, 0, '', 'uploads/667394095/s53pUTnzZ3TOurv.jpg', 0, 0, '2021-09-04 10:21:34', 1, 0, 1, 0, '[]'),
(3, 532345624, 667394095, 0, '', 'uploads/667394095/XJClf3kzbnd8ZoH.jpg', 0, 0, '2021-09-04 10:21:48', 1, 0, 1, 0, '[]'),
(5, 530727, 667394095, 0, '', 'uploads/667394095/ORCKUu7S1m7a2Yk.mp4', 0, 0, '2021-09-04 10:23:35', 0, 0, 0, 0, '[]'),
(6, 583729947249358, 667394095, 0, 'haha', '', 0, 0, '2021-09-04 10:28:48', 0, 0, 0, 0, '[]'),
(7, 905852, 667394095, 0, '', 'uploads/667394095/6dW2XpHGWvCpLi1.jpg', 0, 0, '2021-09-04 10:29:44', 1, 0, 0, 0, '[]'),
(8, 2899542671565151849, 667394095, 0, '', 'uploads/667394095/RNIvVZdpAMua1Rz.jpg', 0, 0, '2021-09-05 06:30:18', 1, 0, 1, 0, '[]'),
(10, 33138571, 667394095, 0, '', 'uploads/667394095/c760Kzz50IM5Py5.jpg', 0, 0, '2021-09-07 09:51:33', 1, 0, 0, 0, '[]'),
(11, 48881, 667394095, 0, '', 'uploads/667394095/SnAOgCBcZJszrne.mp4', 0, 0, '2021-09-07 09:56:00', 0, 0, 0, 0, '[]'),
(12, 1597351880071296467, 667394095, 0, '', 'uploads/667394095/vVHVRxUtEI3GUQ0.mp4', 0, 0, '2021-09-07 10:06:26', 0, 0, 0, 0, '[]'),
(13, 947497150773, 667394095, 0, '', 'uploads/667394095/9Bv89OsXnoineGj.jpg', 0, 0, '2021-09-07 10:08:06', 1, 0, 0, 0, '[]'),
(14, 7871197079, 6829070463056, 6829070463056, '', 'uploads/6829070463056/6mu22II6XNSzr2P.jpg', 0, 0, '2021-09-07 10:21:51', 1, 0, 1, 0, '[]'),
(15, 2948989843846906, 6829070463056, 6829070463056, '', 'uploads/6829070463056/46jn79WjzxzJTpK.jpg', 0, 0, '2021-09-07 10:21:51', 1, 0, 1, 0, '[]'),
(16, 64097372270271789, 6829070463056, 6829070463056, '', 'uploads/6829070463056/KEi3LRoZ0jYhJfZ.jpg', 0, 0, '2021-09-07 10:22:33', 1, 0, 1, 0, '[]'),
(17, 34569282886792885, 6829070463056, 6829070463056, '', 'uploads/6829070463056/ITovBGJwQ1TYF1E.jpg', 0, 0, '2021-09-07 10:22:54', 1, 0, 1, 0, '[]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `owner` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `url_address` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `online` int(11) NOT NULL,
  `profile_image` varchar(1000) NOT NULL,
  `cover_image` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL,
  `about` text NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  `group_type` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `owner`, `first_name`, `last_name`, `gender`, `type`, `email`, `password`, `url_address`, `date`, `online`, `profile_image`, `cover_image`, `likes`, `about`, `tag_name`, `group_type`) VALUES
(1, 667394095, 0, 'Nathan', 'Lim', 'Male', 'profile', 'nathanlim@gmail.com', '6d483563e9f0ef21d2a02a0f06cfac97e53a3296', 'nathan.lim', '2021-09-03 11:26:20', 1631003065, 'uploads/667394095/OCzbP0oOCETg68g.jpg', 'uploads/667394095/RNIvVZdpAMua1Rz.jpg', 0, '', 'nathanlim', ''),
(2, 6829070463056, 667394095, 'Test', '', '', 'group', '', '', 'test.3707', '2021-09-04 05:44:34', 0, '', 'uploads/6829070463056/ITovBGJwQ1TYF1E.jpg', 0, '', '', 'public'),
(3, 9943701, 0, 'Lebron', 'James', 'Male', 'profile', 'lebronjames@gmail.com', 'a780806dcc29a0cff2d4058dd58f30aa1d44dda9', 'lebron.james', '2021-09-04 05:50:28', 1630749050, '', '', 0, '', 'lebronjames', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_i_follow`
--
ALTER TABLE `content_i_follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `group_invites`
--
ALTER TABLE `group_invites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `inviter` (`inviter`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `role` (`role`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `group_requests`
--
ALTER TABLE `group_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupid` (`groupid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `msgid` (`msgid`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`),
  ADD KEY `received` (`received`),
  ADD KEY `seen` (`seen`),
  ADD KEY `deleted_sender` (`deleted_sender`),
  ADD KEY `deleted_receiver` (`deleted_receiver`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `contentid` (`contentid`),
  ADD KEY `content_owner` (`content_owner`),
  ADD KEY `date` (`date`);

--
-- Indexes for table `notification_seen`
--
ALTER TABLE `notification_seen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `notification_id` (`notification_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `comments` (`comments`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`),
  ADD KEY `parent` (`parent`),
  ADD KEY `owner` (`owner`);
ALTER TABLE `posts` ADD FULLTEXT KEY `post` (`post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `gender` (`gender`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `userid` (`userid`),
  ADD KEY `url_address` (`url_address`),
  ADD KEY `date` (`date`),
  ADD KEY `likes` (`likes`),
  ADD KEY `tag_name` (`tag_name`),
  ADD KEY `online` (`online`),
  ADD KEY `type` (`type`),
  ADD KEY `owner` (`owner`),
  ADD KEY `group_type` (`group_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_i_follow`
--
ALTER TABLE `content_i_follow`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_invites`
--
ALTER TABLE `group_invites`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_requests`
--
ALTER TABLE `group_requests`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_seen`
--
ALTER TABLE `notification_seen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
