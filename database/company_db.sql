-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 10:14 AM
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
-- Database: `company_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bannertable`
--

CREATE TABLE `bannertable` (
  `ban_id` int(11) NOT NULL,
  `ban_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bannertable`
--

INSERT INTO `bannertable` (`ban_id`, `ban_image`) VALUES
(1, 'banner-1.jpg'),
(2, 'banner-2.jpg'),
(3, 'banner-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorytable`
--

CREATE TABLE `categorytable` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorytable`
--

INSERT INTO `categorytable` (`cat_id`, `cat_name`) VALUES
(1, 'Pizza'),
(2, 'Burger'),
(3, 'Beverages'),
(4, 'Chowmein');

-- --------------------------------------------------------

--
-- Table structure for table `order_manager`
--

CREATE TABLE `order_manager` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pay_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_manager`
--

INSERT INTO `order_manager` (`id`, `fullname`, `email`, `phone_no`, `address`, `pay_mode`) VALUES
(1, 'Muhammad Ali', 'ali@gmail.com', '03412563262', 'North Nazimabad', 'COD'),
(2, 'Sara Khan', 's@gmail.com', '03412563262', 'gulshan', 'COD'),
(3, 'Sara Khan', 's@gmail.com', '03412563262', 'gulshan', 'COD'),
(4, 'Alpha', 'alpha@gmail.com', '03412563262', '45.North', 'COD'),
(5, 'Wajiha Siddiqui ', 'wajihasiddiqui90@gmail.com', '03353720735', 'Karachi Street 1', 'COD');

-- --------------------------------------------------------

--
-- Stand-in structure for view `procat_view`
-- (See below for the actual view)
--
CREATE TABLE `procat_view` (
`pro_id` int(11)
,`pro_name` varchar(50)
,`pro_des` varchar(100)
,`pro_price` int(11)
,`pro_image` varchar(50)
,`cat_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `producttable`
--

CREATE TABLE `producttable` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_des` varchar(100) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `cat_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttable`
--

INSERT INTO `producttable` (`pro_id`, `pro_name`, `pro_des`, `pro_price`, `pro_image`, `cat_id_fk`) VALUES
(1, 'Supreme pizza', 'Text text', 1000, 'download.jfif', 1),
(2, 'Chicken Tikka', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.', 591, 'Chicken Tikka.jpg', 1),
(3, 'Double Stacker', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 650, 'double_stacker.jpg', 2),
(4, 'Chicken Chowmein', 'Yummy spicy chicken chowmein', 1200, 'images.jfif', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `item_name`, `item_price`, `item_qty`) VALUES
(1, 'Double Stacker', 650, 3),
(3, 'Supreme pizza', 1000, 3),
(4, 'Chicken Tikka', 591, 2),
(5, 'Supreme pizza', 1000, 2);

-- --------------------------------------------------------

--
-- Structure for view `procat_view`
--
DROP TABLE IF EXISTS `procat_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `procat_view`  AS SELECT `p`.`pro_id` AS `pro_id`, `p`.`pro_name` AS `pro_name`, `p`.`pro_des` AS `pro_des`, `p`.`pro_price` AS `pro_price`, `p`.`pro_image` AS `pro_image`, `c`.`cat_name` AS `cat_name` FROM (`producttable` `p` join `categorytable` `c` on(`c`.`cat_id` = `p`.`cat_id_fk`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bannertable`
--
ALTER TABLE `bannertable`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `categorytable`
--
ALTER TABLE `categorytable`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `order_manager`
--
ALTER TABLE `order_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttable`
--
ALTER TABLE `producttable`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cat_id_fk` (`cat_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bannertable`
--
ALTER TABLE `bannertable`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorytable`
--
ALTER TABLE `categorytable`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_manager`
--
ALTER TABLE `order_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `producttable`
--
ALTER TABLE `producttable`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producttable`
--
ALTER TABLE `producttable`
  ADD CONSTRAINT `producttable_ibfk_1` FOREIGN KEY (`cat_id_fk`) REFERENCES `categorytable` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
