-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2017 at 06:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(39, 'Java'),
(40, 'Php'),
(41, 'C++'),
(42, 'OOM');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(21, 19, 'vishal', 'vishal@gmail.com', 'i hate ashu', 'approve', '2017-12-28'),
(26, 20, 'Ram', 'ram@tikkam.com', 'v nice', 'approve', '2017-12-28'),
(28, 21, 'vishal', 'vishal@gmail.com', 'bad', 'approve', '2017-12-28'),
(29, 19, 'ram', 'ram@tikkam.com', 'siuakxjbsiuxkj', 'approve', '2017-12-28'),
(30, 20, 'vishal', 'vishal@gmail.com', 'saudkjboj\r\n', 'unapproved', '2017-12-28'),
(31, 21, 'ram', 'tikkam@ram.com', 'qsaoxjlsabn\r\n', 'unapproved', '2017-12-28'),
(32, 19, 'vishal1', 'vishal@gmail.com', 'bad badest', 'unapproved', '2017-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(19, 39, 'C++', 'ashu   ', '2017-12-28', 'icons.png', '                                                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ullam, porro quae magnam quasi pariatur eligendi laudantium expedita esse odit possimus doloribus at blanditiis, consectetur velit animi reiciendis similique enim.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias consequuntur quod, omnis dolores, id eum voluptates unde quidem placeat itaque optio ullam natus a! Quam neque quidem, voluptate at voluptatum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis unde repudiandae ducimus, nesciunt maxime, neque ex quas omnis nulla et dolorem provident blanditiis consequatur pariatur. Quibusdam ullam, delectus blanditiis quas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolores possimus vitae perferendis culpa placeat praesentium fuga molestias modi ea nobis, quasi, odit iure. Soluta quos placeat assumenda reprehenderit illum.                                            ', 'php', 0, 'draft'),
(20, 40, 'Java', 'Suraj  ', '2017-12-28', 'skull_background.jpg', '                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ullam, porro quae magnam quasi pariatur eligendi laudantium expedita esse odit possimus doloribus at blanditiis, consectetur velit animi reiciendis similique enim.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias consequuntur quod, omnis dolores, id eum voluptates unde quidem placeat itaque optio ullam natus a! Quam neque quidem, voluptate at voluptatum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis unde repudiandae ducimus, nesciunt maxime, neque ex quas omnis nulla et dolorem provident blanditiis consequatur pariatur. Quibusdam ullam, delectus blanditiis quas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolores possimus vitae perferendis culpa placeat praesentium fuga molestias modi ea nobis, quasi, odit iure. Soluta quos placeat assumenda reprehenderit illum.                                            ', 'Adv JAVA', 1, 'Published'),
(21, 19, 'C++', 'Ashok', '2017-12-28', 'steak_background.jpg', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias ullam, porro quae magnam quasi pariatur eligendi laudantium expedita esse odit possimus doloribus at blanditiis, consectetur velit animi reiciendis similique enim.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias consequuntur quod, omnis dolores, id eum voluptates unde quidem placeat itaque optio ullam natus a! Quam neque quidem, voluptate at voluptatum.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis unde repudiandae ducimus, nesciunt maxime, neque ex quas omnis nulla et dolorem provident blanditiis consequatur pariatur. Quibusdam ullam, delectus blanditiis quas.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolores possimus vitae perferendis culpa placeat praesentium fuga molestias modi ea nobis, quasi, odit iure. Soluta quos placeat assumenda reprehenderit illum.', 'C++,C', 0, 'Published');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
