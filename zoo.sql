-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogID` int(11) NOT NULL,
  `blogEntry` text NOT NULL,
  `blogImg` varchar(100) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `updatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryDesc` varchar(100) NOT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `categoryDesc`, `createDate`) VALUES
(1, 'animal', 'showing and feeding', '2024-12-03 16:00:00'),
(2, 'birds', 'watching birds', '2024-12-04 11:38:01'),
(3, 'reptiles', 'watching reptiles', '2024-12-10'),
(4, 'marsupials', 'watching marsupials', '2024-12-10'),
(5, 'rodents', 'watching rodents', '2024-12-24'),
(6, 'amphibians', 'watching amphibians', '2024-12-24'),
(7, 'aquatic', 'watching aquatic animals', '2024-12-24'),
(8, 'insects', 'watching insects', '2024-12-24'),
(10, 'nature', 'trails and view', '2024-12-04 11:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImg` varchar(100) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `productQty` int(11) NOT NULL,
  `productPrice` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productImg`, `categoryID`, `productQty`, `productPrice`) VALUES
(1, 'Tiger', 'uploads/tiger.jpg', 1, 5, 8.90),
(2, 'Elephant', 'uploads/elephant.jpg', 1, 7, 9.90),
(3, 'Hornbill', 'uploads/hornbill.jpg', 2, 5, 6.00),
(4, 'Parrot', 'uploads/parrot.jpg', 2, 5, 9.90),
(5, 'Deer', 'uploads/deer.jpg', 1, 3, 10.00),
(6, 'Orang Utan', 'uploads/orangutan.jpg', 1, 3, 12.50),
(7, 'Proboscis', 'uploads/proboscis.jpg', 1, 4, 9.90),
(8, 'Otter', 'uploads/otter.jpg', 1, 10, 6.50),
(9, 'Rhino', 'uploads/rhino.jpg', 1, 4, 9.90),
(10, 'Malaysia Civet', 'uploads/civet.jpg', 1, 12, 12.00),
(11, 'Ostrich', 'uploads/ostrich.jpg', 2, 4, 1.00),
(12, 'Banteng', 'uploads/banteng.jpg', 1, 3, 1.00),
(13, 'Botanical Garden', 'uploads/garden.jpg', 3, 3, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderAmt` decimal(8,2) NOT NULL,
  `reservationDate` date NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `userID`, `orderAmt`, `reservationDate`, `status`) VALUES
(5, 1, 21.90, '2024-12-17', 1),
(7, 1, 14.90, '2024-12-17', 1),
(8, 1, 8.90, '2024-12-17', 1),
(9, 1, 30.80, '2024-12-17', 1);


-- --------------------------------------------------------

--
-- Table structure for table `reservation_detail`
--

CREATE TABLE `reservation_detail` (
  `lineID` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `orderQuantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation_detail`
--

INSERT INTO `reservation_detail` (`lineID`, `reservationID`, `productID`, `orderQuantity`) VALUES
(1, 5, 7, 1),
(2, 5, 10, 1),
(3, 7, 7, 1),
(4, 7, 11, 5),
(5, 8, 1, 1),
(6, 9, 1, 1),
(7, 9, 4, 1),
(8, 9, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL,
  `reviewText` text NOT NULL,
  `rating` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `reviewBy` int(11) NOT NULL,
  `reviewDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPwd` varchar(255) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `regDate` date NOT NULL DEFAULT current_timestamp(),
  `userRoles` int(2) NOT NULL DEFAULT 2 COMMENT '1 - System Admin, 2 - Normal User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPwd`, `userEmail`, `regDate`, `userRoles`) VALUES
(1, 'user1', '$2y$10$PjT7N5VQ9oM/cLoJ204wsOo6MYgGqwS0lOqD.649A93kNppBONyjy', 'user1@email.com', '2024-12-16', 2),
(2, 'user2', '$2y$10$Xbsopm11vCGLgPkhHkRSGuDQzFqQSn4zWEFcSM7W/U5B91rStsBwO', 'user2@email.com', '2024-12-16', 2),
(3, 'user3', '$2y$10$UU12nkXR.muKnCiW/7XoNOatJGVUFcxnFO.U9UD/6usFvyrUy5Yc2', 'user3@email.com', '2024-12-17', 2),
(4, 'user4', '$2y$10$Z8YFrqG/cQr/P/gT.RER6u3k5rVBIfqPsN9m1kTO29.m9h9Ox3z5q', 'user4@email.com', '2024-12-17', 2),
(5, 'user', '$2y$10$nSSUd8AF6LPyZHDtd4LRpesd65dUdJCpQ3S6plQd7DZpFEVvLpROu', 'user@mail.com', '2024-12-17', 2),
(6, 'syarafana', '$2y$10$2W.Ex.M2O0IYiP83.Xkl/.B1JlRufc4qr8O5K/aEkTU6uoGip2Dui', 'syara@email.com', '2025-01-12', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogID`),
  ADD KEY `createdBy` (`createdBy`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `userID` (`userID`);

ALTER TABLE reservation_detail
ADD COLUMN visitorType VARCHAR(50) NOT NULL,
ADD COLUMN ticketCategory VARCHAR(50) NOT NULL,
ADD COLUMN pricePerTicket DECIMAL(10, 2) NOT NULL;

--
-- Indexes for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD PRIMARY KEY (`lineID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `reservationID` (`reservationID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `userID` (`reviewBy`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  MODIFY `lineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`createdBy`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation_detail`
--
ALTER TABLE `reservation_detail`
  ADD CONSTRAINT `reservation_detail_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_detail_ibfk_2` FOREIGN KEY (`reservationID`) REFERENCES `reservation` (`reservationID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`reviewBy`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `product` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
