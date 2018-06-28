-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2018 at 10:00 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odessaaquarium`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `enquiry_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `date_of_enquiry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiries`
--


-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `stock_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `name`, `quantity_in_stock`, `unit_price`, `stock_cat_id`) VALUES
(1, 'Black body black tail guppy', 400, 0.085, 1),
(2, 'Black body blue varitail guppy', 400, 0.125, 1),
(3, 'Black body green varitail guppy ', 400, 0.125, 1),
(4, 'Black body red tail guppy ', 300, 0.095, 1),
(5, 'Blue tail cobra guppy ', 400, 0.125, 1),
(6, 'Blue varitail guppy ', 300, 0.085, 1),
(7, 'Green tail cobra guppy ', 400, 0.085, 1),
(8, 'Green varitail guppy ', 400, 0.085, 1),
(9, 'Red tail cobra guppy ', 400, 0.085, 1),
(10, 'Green neon guppy ', 400, 0.085, 1),
(11, 'Tuxedo blond guppy ', 400, 0.125, 1),
(12, 'Green sailfin molly ', 100, 0.3, 2),
(13, 'Leopard gold sailfin molly ', 100, 0.3, 2),
(14, 'Black sailfin molly ', 100, 0.3, 2),
(15, 'Golden marble sailfin molly ', 100, 0.3, 2),
(16, 'Golden sailfin molly ', 100, 0.3, 2),
(17, 'Silver sailfin molly ', 100, 0.2, 2),
(18, 'Black molly', 150, 0.15, 2),
(19, 'Black lyretail molly ', 200, 0.2, 2),
(20, 'Black platy', 1000, 0.15, 3),
(21, 'Blue platy', 100, 0.125, 3),
(22, 'Blue coral platy', 100, 0.15, 3),
(23, 'Blue spotted platy', 100, 0.15, 3),
(24, 'Golden comet platy', 100, 0.15, 3),
(25, 'Marigold platy', 100, 0.15, 3),
(26, 'Rainbow platy', 100, 0.15, 3),
(27, 'Red crescent platy', 100, 0.15, 3),
(28, 'Three spot gourami', 100, 0.13, 4),
(29, 'Blue gourami', 100, 0.13, 4),
(30, 'Opaline gourami', 100, 0.12, 4),
(31, 'Golden gourami', 100, 0.13, 4),
(32, 'Pearl gourami', 100, 0.13, 4),
(33, 'Silver gourami', 100, 0.13, 4),
(34, 'Snakeskin gourami', 100, 0.13, 4),
(35, 'Pink kissing gourami', 100, 0.13, 4),
(36, 'Pink kissing gourami', 100, 0.13, 4),
(37, 'Giant gourami', 100, 0.13, 4),
(38, 'Blue coral gourami', 100, 0.13, 4),
(39, 'Tiger barb', 100, 0.14, 5),
(40, 'Green tiger barb', 100, 0.14, 5),
(41, 'Glass tiger barb', 100, 0.14, 5),
(42, 'Albino tiger barb', 100, 0.14, 5),
(43, 'Red gill tiger barb', 100, 0.14, 5),
(44, 'Long-fin rosy barb', 100, 0.14, 5),
(45, 'Neon rosy barb', 100, 0.15, 5),
(46, 'Golden barb', 100, 0.14, 5),
(47, 'Red orana', 100, 0.15, 6),
(48, 'Red and white orana', 100, 0.15, 6),
(49, 'Black moor', 100, 0.15, 6),
(50, 'Calico orana', 100, 0.15, 6),
(51, 'Red cap orandas', 100, 0.15, 6),
(52, 'Pearl scale', 100, 0.175, 6),
(53, 'Lionhead ranchu', 100, 0.175, 6),
(54, 'Black lionhead ranchu', 100, 0.175, 6),
(55, 'Red lionhead oranda', 100, 0.175, 6),
(56, 'Red telescope eye', 100, 0.18, 6),
(57, 'Calico telescope', 100, 0.18, 6),
(58, 'Bubble eye', 100, 0.18, 6),
(59, 'Black butterfly oranda', 100, 0.18, 6),
(60, 'Panda goldfish', 100, 0.18, 6),
(61, 'Red shubankin', 100, 0.15, 6),
(62, 'Kot carp', 100, 0.15, 6),
(63, 'Assorted goldfish', 100, 0.175, 6),
(64, 'Black line tetra ', 100, 0.215, 7),
(65, 'Black neon tetra', 100, 0.215, 7),
(66, 'Black phantom tetra', 100, 0.215, 7),
(67, 'Black tetra', 100, 0.2, 7),
(68, 'Blind cave fish', 100, 0.2, 7),
(69, 'Blue king tetra', 100, 0.2, 7),
(70, 'Congo tetra', 100, 0.2, 7),
(71, 'Emperor tetra', 100, 0.215, 7),
(72, 'Flame tetra', 100, 0.215, 7),
(73, 'Glassy tetra', 100, 0.215, 7),
(74, 'Glowlight tetra', 100, 0.215, 7),
(75, 'Golden pencil fish', 100, 0.215, 7),
(76, 'Lemon tetra', 100, 0.215, 7),
(77, 'Neon tetra', 100, 0.215, 7),
(78, 'Siamese fighting fish', 100, 0.12, 8),
(79, 'Blue fighting fish', 100, 0.12, 8),
(80, 'Green fighting fish', 100, 0.12, 8),
(81, 'Red fighting fish', 100, 0.12, 8),
(82, 'Split tail fighting fish', 100, 0.12, 8),
(83, 'Short tail fighting fish', 100, 0.12, 8),
(84, 'Female fighting fish', 100, 0.12, 8);

-- --------------------------------------------------------

--
-- Table structure for table `stock_category`
--

CREATE TABLE `stock_category` (
  `stock_category_id` int(11) NOT NULL,
  `stock_category` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_category`
--

INSERT INTO `stock_category` (`stock_category_id`, `stock_category`, `user_id`, `category_image`) VALUES
(1, 'Guppy', '1', 'ca5.jpg'),
(2, 'Molly', '1', 'ca3.jpg'),
(3, 'Platy', '1', 'noimage.png'),
(4, 'Gourami', '1', 'noimage.png'),
(5, 'Barb', '1', 'ca2.jpg'),
(6, 'Goldfish', '1', 'ca4.jpg'),
(7, 'Tetra', '1', 'ca1.jpg'),
(8, 'Fighting fish', '1', 'ca6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `upload_name` varchar(255) NOT NULL,
  `active_upload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--



-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `date_created`) VALUES
(1, 'Admininstrator', 'admin@gmail.com', 'admin', 'b7e0a5659cdab412fdc73bdfa8647220', '2018-06-17 23:14:51');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `stock_category`
--
ALTER TABLE `stock_category`
  ADD PRIMARY KEY (`stock_category_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `stock_category`
--
ALTER TABLE `stock_category`
  MODIFY `stock_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
