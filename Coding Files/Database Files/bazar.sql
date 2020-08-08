-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 03:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `phone`, `email`, `password`) VALUES
(2, 'hafizur20', '01680735420', 'hhafizur@yahoo.com', 'ad12');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_reply` varchar(50) NOT NULL,
  `admin_sent_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `subject`, `msg`, `date`, `admin_reply`, `admin_sent_time`) VALUES
(43, 'hafizur', 'Need help about a po', 'I need a help of a products post.Help me', '2020-05-25 12:20:02', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_demand_post`
--

CREATE TABLE `client_demand_post` (
  `b_product_id` int(20) NOT NULL,
  `b_username` varchar(25) NOT NULL,
  `b_name` varchar(25) NOT NULL,
  `b_email` varchar(25) NOT NULL,
  `b_phone` varchar(25) NOT NULL,
  `category` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `est_price` double(10,2) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `pro_details` varchar(30) NOT NULL,
  `de_place` varchar(25) NOT NULL,
  `product_status` varchar(15) NOT NULL DEFAULT 'Going',
  `post_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_demand_post`
--

INSERT INTO `client_demand_post` (`b_product_id`, `b_username`, `b_name`, `b_email`, `b_phone`, `category`, `type`, `product_name`, `est_price`, `quantity`, `pro_details`, `de_place`, `product_status`, `post_time`) VALUES
(32, 'saib', 'Saib Sizan', 'saib@gmail.com', '01856969969', 'Fruits', 'Emergency', 'Orange', 200.00, '2', 'I need 2 Kg fresh Orange today', 'Mirpur', 'Going', '2020-05-22 07:37:03.559017'),
(33, 'eshan', 'Eshan Barua', 'eshan@gmail.com', '01850098888', 'Meat', 'Super Speed', 'Beef', 600.00, '1', 'I need 1 KG beef in next 1 hou', 'Bashundhara', 'Going', '2020-05-22 07:40:44.697770'),
(34, 'eshan', 'Hafizur Rahman', 'himel@gmail.com', '01600000999', 'Fruits', 'Emergency', 'Litchee', 200.00, '2', 'I need 50 pieces kitche at mir', 'Mirpur', 'Going', '2020-05-22 11:15:30.718585');

-- --------------------------------------------------------

--
-- Table structure for table `client_products_images`
--

CREATE TABLE `client_products_images` (
  `pro_image_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `img_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_products_images`
--

INSERT INTO `client_products_images` (`pro_image_id`, `product_id`, `filename`, `img_user`) VALUES
(26, 32, 'uploads/orange.jpg', 'saib'),
(27, 33, 'uploads/GettyImages-901028510.jpg', 'eshan'),
(28, 34, 'uploads/Litchi.jpg', 'eshan'),
(29, 35, 'uploads/Litchi.jpg', 'eshan');

-- --------------------------------------------------------

--
-- Table structure for table `client_product_comments`
--

CREATE TABLE `client_product_comments` (
  `comment_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `client_username` varchar(100) NOT NULL,
  `client_reply` varchar(100) DEFAULT NULL,
  `vendor_username` varchar(20) DEFAULT NULL,
  `vendor_name` varchar(20) DEFAULT NULL,
  `vendor_phone` varchar(20) DEFAULT NULL,
  `vendor_comment` varchar(20) DEFAULT NULL,
  `comment_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_product_comments`
--

INSERT INTO `client_product_comments` (`comment_id`, `product_id`, `client_username`, `client_reply`, `vendor_username`, `vendor_name`, `vendor_phone`, `vendor_comment`, `comment_time`) VALUES
(8, 32, 'saib', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 33, 'eshan', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 34, 'eshan', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 35, 'eshan', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_signup`
--

CREATE TABLE `client_signup` (
  `signup_id` int(20) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reg_time` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(40) NOT NULL,
  `pass_re_code` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_signup`
--

INSERT INTO `client_signup` (`signup_id`, `firstname`, `lastname`, `username`, `phone`, `email`, `password`, `reg_time`, `address`, `pass_re_code`) VALUES
(124, 'Hafizur', 'Rahman', 'hafizur', '01600000000', 'hafizur@gmail.com', 'hafizur', '2020-07-22 13:56:44', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(110) NOT NULL,
  `m_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `name`, `email`, `subject`, `message`, `m_time`) VALUES
(3, 'Himel', 'saib@gmail.com', 'Help', 'I need help', '2020-05-22 17:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(5) NOT NULL,
  `subscribe_email` varchar(25) NOT NULL,
  `sub_time` datetime(6) DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `subscribe_email`, `sub_time`) VALUES
(4, 'sizan@gmail.com', '2020-05-20 22:47:03.048738');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_products_images`
--

CREATE TABLE `vendor_products_images` (
  `pro_image_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `img_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_products_images`
--

INSERT INTO `vendor_products_images` (`pro_image_id`, `product_id`, `filename`, `img_user`) VALUES
(27, 30, 'uploads/RawBeef.jpg', 'hafizur'),
(28, 31, 'uploads/cocola.jpg', 'hafizur'),
(30, 33, 'uploads/watermelon.jpg', 'nahid'),
(31, 34, 'uploads/guava.jpg', 'nahid'),
(32, 35, 'uploads/tandoori-chicken.jpg', 'nahid'),
(33, 36, 'uploads/user.jpg', 'nahid'),
(34, 37, 'uploads/Chicken-Tikka.jpg', 'hafizur');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_comments`
--

CREATE TABLE `vendor_product_comments` (
  `comment_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `vendor_username` varchar(100) NOT NULL,
  `vendor_reply` varchar(100) DEFAULT NULL,
  `client_username` varchar(20) DEFAULT NULL,
  `client_name` varchar(20) DEFAULT NULL,
  `client_phone` varchar(20) DEFAULT NULL,
  `client_comment` varchar(20) DEFAULT NULL,
  `comment_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_product_comments`
--

INSERT INTO `vendor_product_comments` (`comment_id`, `product_id`, `vendor_username`, `vendor_reply`, `client_username`, `client_name`, `client_phone`, `client_comment`, `comment_time`) VALUES
(28, 30, 'hafizur', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 31, 'hafizur', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 33, 'nahid', NULL, 'eshan', 'Hafizur', 'himel@gnmail.com', '          i need thi', '2020-05-22 17:30:47.000000'),
(32, 34, 'nahid', NULL, 'saib', 'Sizan', '030044', '      I need this pr', '2020-05-25 16:52:37.000000'),
(33, 35, 'nahid', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 36, 'nahid', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 37, 'hafizur', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_product_post`
--

CREATE TABLE `vendor_product_post` (
  `b_product_id` int(20) NOT NULL,
  `b_username` varchar(25) NOT NULL,
  `b_name` varchar(25) NOT NULL,
  `b_email` varchar(25) NOT NULL,
  `b_phone` varchar(25) NOT NULL,
  `category` varchar(15) NOT NULL,
  `type` varchar(15) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `est_price` double(10,2) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `pro_details` varchar(100) NOT NULL,
  `de_place` varchar(25) NOT NULL,
  `product_status` varchar(15) NOT NULL DEFAULT 'Going',
  `post_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `c_count` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_product_post`
--

INSERT INTO `vendor_product_post` (`b_product_id`, `b_username`, `b_name`, `b_email`, `b_phone`, `category`, `type`, `product_name`, `est_price`, `quantity`, `pro_details`, `de_place`, `product_status`, `post_time`, `c_count`) VALUES
(30, 'hafizur', 'Hafizur Rahman', 'himel@gmail.com', '01600000999', 'Meat', 'Emergency', 'Raw Beef', 600.00, '1', 'I can supply RAW beef and per kg price is 600 TK . It will be delivered in 4 hours after getting the', 'Banani', 'Going', '2020-05-22 07:47:40.842606', NULL),
(31, 'hafizur', 'Hafizur Rahman', 'himel@gmail.com', '01600000999', 'Groceries', 'Emergency', 'Cocola Noodles', 50.00, '1', 'We can supply cocola noodles per piece at 50 TK . ', 'Shyamoli', 'Going', '2020-05-22 07:49:26.605425', NULL),
(33, 'nahid', 'Nahid Babu', 'nahid@gmail.com', '01578888999', 'Fruits', 'Emergency', 'Watermelon', 600.00, '2', 'We supply watermelon 2 pcs 600 TK .Fresh and it will be delivered in 4 hours after receving the orde', 'Shyamoli', 'Going', '2020-05-22 07:55:00.614210', NULL),
(34, 'nahid', 'Nahid Babu', 'nahid@gmail.com', '01578888999', 'Fruits', 'Super Speed', 'Guava', 100.00, '1', 'I supply fresh guava per kg at 100 tk .Will be delivered in 3 hours ( Bashundhara )', 'Bashundhara', 'Going', '2020-05-22 07:56:32.814389', NULL),
(35, 'nahid', 'Nahid Babu', 'nahid@gmail.com', '01578888999', 'Meat', 'Emergency', 'Chicken', 200.00, '1', 'We supply per kg fresh chicken at 200 Tk in Banani . it will be delivered in 2 hours after getting o', 'Banani', 'Going', '2020-05-22 07:58:36.880976', NULL),
(36, 'nahid', 'Nahid Babu', 'nahid@gmail.com', '01578888999', 'Worker', 'Super Speed', 'Home Assistant', 300.00, '1', 'We provide home assistant service at your emergency time .Who can help you in your kitchen .Per hour', 'Banani', 'Going', '2020-05-22 08:02:26.024026', NULL),
(37, 'hafizur', 'Hafizur Rahman', 'himel@gmail.com', '5858885', 'Meat', 'Super Speed', 'Chicken', 600.00, '2', 'i can supply chicken in super speed', 'Banani', 'Going', '2020-05-22 11:24:38.408184', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_signup`
--

CREATE TABLE `vendor_signup` (
  `signup_id` int(20) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reg_time` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(40) NOT NULL,
  `pass_re_code` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendor_signup`
--

INSERT INTO `vendor_signup` (`signup_id`, `firstname`, `lastname`, `username`, `phone`, `email`, `password`, `reg_time`, `address`, `pass_re_code`) VALUES
(23, 'Nahid', 'Babu', 'nahid', '01578888999', 'nahid@gmail.com', 'nahid', '2020-05-19 13:58:44', '', NULL),
(25, 'Hafizur', 'Rahman', 'hafizur', '01600000999', 'himel@gmail.com', 'himel', '2020-05-19 14:02:54', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `ad_username` (`username`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_demand_post`
--
ALTER TABLE `client_demand_post`
  ADD PRIMARY KEY (`b_product_id`),
  ADD UNIQUE KEY `b_product_id` (`b_product_id`);

--
-- Indexes for table `client_products_images`
--
ALTER TABLE `client_products_images`
  ADD PRIMARY KEY (`pro_image_id`),
  ADD UNIQUE KEY `pro_image_id` (`pro_image_id`);

--
-- Indexes for table `client_product_comments`
--
ALTER TABLE `client_product_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `client_signup`
--
ALTER TABLE `client_signup`
  ADD PRIMARY KEY (`signup_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `subscribe_email` (`subscribe_email`);

--
-- Indexes for table `vendor_products_images`
--
ALTER TABLE `vendor_products_images`
  ADD PRIMARY KEY (`pro_image_id`);

--
-- Indexes for table `vendor_product_comments`
--
ALTER TABLE `vendor_product_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `vendor_product_post`
--
ALTER TABLE `vendor_product_post`
  ADD PRIMARY KEY (`b_product_id`);

--
-- Indexes for table `vendor_signup`
--
ALTER TABLE `vendor_signup`
  ADD PRIMARY KEY (`signup_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `client_demand_post`
--
ALTER TABLE `client_demand_post`
  MODIFY `b_product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `client_products_images`
--
ALTER TABLE `client_products_images`
  MODIFY `pro_image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `client_product_comments`
--
ALTER TABLE `client_product_comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client_signup`
--
ALTER TABLE `client_signup`
  MODIFY `signup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendor_products_images`
--
ALTER TABLE `vendor_products_images`
  MODIFY `pro_image_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `vendor_product_comments`
--
ALTER TABLE `vendor_product_comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vendor_product_post`
--
ALTER TABLE `vendor_product_post`
  MODIFY `b_product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vendor_signup`
--
ALTER TABLE `vendor_signup`
  MODIFY `signup_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
