-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 09:02 AM
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
-- Database: `php_sreps`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `FamilyName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `ProductGroupId` int(11) DEFAULT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(8,2) DEFAULT NULL,
  `QuantityOnHand` int(11) NOT NULL,
  `QuantitySold` int(11) NOT NULL,
  `QuantityToOrder` int(11) NOT NULL,
  `QuantityRequested` int(11) NOT NULL,
  `IsHidden` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `ProductGroupId`, `Name`, `Price`, `QuantityOnHand`, `QuantitySold`, `QuantityToOrder`, `QuantityRequested`, `IsHidden`) VALUES
(1, 1, 'lippy lover', '999.99', 399, 0, 0, 0, b'1111111111111111111111111111111'),
(2, 1, 'celebshine', '2999.99', 205, 30, 0, 0, b'1111111111111111111111111111111'),
(3, 1, 'rawWish', '499.49', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(4, 1, 'Skinpad', '2000.00', 372, 0, 0, 0, b'1111111111111111111111111111111'),
(5, 1, 'royal stickls', '1999.99', 500, 0, 0, 0, b'1111111111111111111111111111111'),
(6, 2, 'Lipitor 20mg Tablets 30', '6.99', 21, 0, 0, 0, b'1111111111111111111111111111111'),
(7, 2, 'bacon', '1999.99', 10, 0, 0, 0, b'1111111111111111111111111111111'),
(8, 3, 'gold chain', '4999.99', 419, 2, 0, 0, b'1111111111111111111111111111111'),
(9, 3, 'Herron Osteo Eze Active Plus MSM 120 Tablets', '40.83', 21, 0, 0, 0, b'1111111111111111111111111111111'),
(10, 4, 'Marc Jacobs Daisy Eau de Toilette 100ml Spray', '65.20', 10, 0, 0, 0, b'1111111111111111111111111111111'),
(11, 4, 'Calvin Klein CK One 200ml Eau de Toilette Spray', '37.99', 50, 0, 0, 0, b'1111111111111111111111111111111'),
(12, 5, 'pepsi', '145.99', 35, 0, 0, 0, b'1111111111111111111111111111111'),
(13, 5, 'coke', '145.99', 33, 0, 0, 0, b'1111111111111111111111111111111'),
(14, 6, 'Colgate Toothpaste Regular Flavour 250g', '3.20', 60, 0, 0, 0, b'1111111111111111111111111111111'),
(15, 6, 'Colgate Toothpaste Total 190g', '5.55', 50, 0, 0, 0, b'1111111111111111111111111111111'),
(16, 7, 'chopstick', '199.99', 400, 0, 0, 0, b'1111111111111111111111111111111'),
(17, 7, 'oven glove', '269.99', 240, 10, 0, 0, b'1111111111111111111111111111111'),
(18, 8, 'Panadol Rapid 20 tablets', '4.49', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(19, 8, 'Nurofen 200mg 96 tablets', '15.99', 379, 3, 0, 0, b'1111111111111111111111111111111'),
(20, 9, 'asdoMar', '479.99', 35, 0, 0, 0, b'1111111111111111111111111111111'),
(21, 10, 'vitamins', '599.99', 400, 0, 0, 0, b'1111111111111111111111111111111'),
(22, 10, 'Panadol 500mg 50 tablets', '6.99', 250, 0, 0, 0, b'1111111111111111111111111111111'),
(23, 11, 'boxers', '4999.99', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(24, 11, 'Men-shirt', '1500.99', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(25, 12, 'slippers', '217.99', 37, 0, 0, 0, b'1111111111111111111111111111111'),
(26, 12, 'shoe', '2999.99', 400, 0, 0, 0, b'1111111111111111111111111111111'),
(27, 13, 'gift package', '6999.99', 25, 0, 0, 0, b'1111111111111111111111111111111'),
(28, 14, 'tissue paper', '254.49', 377, 5, 0, 0, b'1111111111111111111111111111111'),
(29, 15, 'sponge', '199.99', 342, 0, 0, 0, b'1111111111111111111111111111111'),
(30, 15, 'bat', '999.99', 37, 0, 0, 0, b'1111111111111111111111111111111'),
(31, 17, 'electric jug', '2999.99', 398, 0, 0, 0, b'1111111111111111111111111111111'),
(32, 18, 'onga', '499.99', 240, 10, 0, 0, b'1111111111111111111111111111111'),
(33, 19, 'rice 10kg', '5999.49', 377, 5, 0, 0, b'1111111111111111111111111111111'),
(34, 15, 'ball', '2999.99', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(35, 20, 'chain', '2999.99', 37, 0, 0, 0, b'1111111111111111111111111111111'),
(36, 5, 'juice', '650.00', 20, 0, 0, 0, b'1111111111111111111111111111111'),
(37, 15, 'paper towel', '199.99', 50, 0, 0, 0, b'1111111111111111111111111111111'),
(38, 15, 'rubber glove', '499.99', 100, 0, 0, 0, b'1111111111111111111111111111111'),
(39, 7, 'pan', '2999.99', 20, 0, 0, 0, b'1111111111111111111111111111111'),
(40, 7, 'knife set', '1000.00', 10, 10, 0, 0, b'1111111111111111111111111111111'),
(41, 7, 'lemon squeezer', '4999.99', 10, 0, 0, 0, b'1111111111111111111111111111111'),
(42, 9, 'koo', '999.99', 10, 0, 0, 0, b'1111111111111111111111111111111'),
(43, 9, 'dardanet', '0.00', 0, 0, 0, 0, b'1111111111111111111111111111111'),
(44, 9, 'dardanel', '3999.99', 50, 0, 0, 0, b'1111111111111111111111111111111'),
(45, 7, 'fork set', '1000.00', 50, 0, 0, 0, b'1111111111111111111111111111111'),
(46, 4, 'kiddies ball', '999.99', 40, 10, 0, 0, b'1111111111111111111111111111111');

--
-- Triggers `product`
--
DELIMITER $$
CREATE TRIGGER `TRIG_Product_Insert_Checks` BEFORE INSERT ON `product` FOR EACH ROW BEGIN
	DECLARE msg varchar(128);
	IF NEW.Price < 0 THEN
		set msg = concat('TRIG_Product_Insert_Checks Error:',
			'Trying to insert a negative value into Product.Price: ',
            cast(NEW.Price as char));
	ELSEIF NEW.QuantityOnHand < 0 THEN
		set msg = concat('TRIG_Product_Insert_Checks Error:',
			'Trying to insert a negative value into Product.QuantityOnHand: ',
            cast(NEW.QuantityOnHand as char));
	ELSEIF NEW.QuantitySold < 0 THEN
		set msg = concat('TRIG_Product_Insert_Checks Error:',
			'Trying to insert a negative value into Product.QuantitySold: ',
            cast(NEW.QuantitySold as char));
	ELSEIF NEW.QuantityToOrder < 0 THEN
		set msg = concat('TRIG_Product_Insert_Checks Error:',
			'Trying to insert a negative value into Product.QuantityToOrder: ',
            cast(NEW.QuantityToOrder as char));
	ELSEIF NEW.QuantityRequested < 0 THEN
		set msg = concat('TRIG_Product_Insert_Checks Error:',
			'Trying to insert a negative value into Product.QuantityRequested: ',
            cast(NEW.QuantityRequested as char));
	END IF;
    IF msg IS NOT NULL THEN
		signal sqlstate '45000' set message_text = msg;
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRIG_Product_Update_Checks` BEFORE UPDATE ON `product` FOR EACH ROW BEGIN
	DECLARE msg varchar(128);
	IF NEW.Price < 0 THEN
		set msg = concat('TRIG_Product_Update_Checks Error:',
			'Trying to update a negative value in Product.Price: ',
            cast(new.Price as char));
	ELSEIF NEW.QuantityOnHand < 0 THEN
		set msg = concat('TRIG_Product_Update_Checks Error:',
			'Trying to update a negative value in Product.QuantityOnHand: ',
            cast(new.QuantityOnHand as char));
	ELSEIF NEW.QuantitySold < 0 THEN
		set msg = concat('TRIG_Product_Update_Checks Error:',
			'Trying to update a negative value in Product.QuantitySold: ',
            cast(new.QuantitySold as char));
	ELSEIF NEW.QuantityToOrder < 0 THEN
		set msg = concat('TRIG_Product_Update_Checks Error:',
			'Trying to update a negative value in Product.QuantityToOrder: ',
            cast(new.QuantityToOrder as char));
	ELSEIF NEW.QuantityRequested < 0 THEN
		set msg = concat('TRIG_Product_Update_Checks Error:',
			'Trying to update a negative value in Product.QuantityRequested: ',
            cast(new.QuantityRequested as char));
	END IF;
    IF msg IS NOT NULL THEN
		signal sqlstate '45000' set message_text = msg;
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `productgroup`
--

CREATE TABLE `productgroup` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productgroup`
--

INSERT INTO `productgroup` (`Id`, `Name`) VALUES
(1, 'Cosmetics'),
(2, 'Organic Food'),
(3, 'Jewelries'),
(4, 'Toys'),
(5, 'Drinks'),
(6, 'Hair Products'),
(7, 'Kitchen Wares'),
(8, 'Pharmaceutical products'),
(9, 'Canned Foods'),
(10, 'Poultry Products'),
(11, 'Clothes'),
(12, 'Footwear'),
(13, 'Packaged Products'),
(14, 'Toiletries'),
(15, 'Household Products'),
(16, 'Sports Equipment'),
(17, 'Electronics'),
(18, 'Seasonal Products'),
(19, 'Food Stuffs'),
(20, 'Pet Supplies');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `Id` int(11) NOT NULL,
  `CustomerId` int(11) DEFAULT NULL,
  `SaleDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`Id`, `CustomerId`, `SaleDateTime`) VALUES
(8, NULL, '2020-09-21 05:38:12'),
(15, NULL, '2020-06-23 22:42:05'),
(16, NULL, '2021-08-23 22:42:20'),
(17, NULL, '2021-07-23 22:42:41'),
(18, NULL, '2021-06-23 22:43:02'),
(19, NULL, '2021-05-23 22:43:51'),
(20, NULL, '2021-08-22 23:07:19'),
(23, NULL, '2021-08-24 04:56:49'),
(24, NULL, '2021-08-28 18:09:37'),
(25, NULL, '2021-09-01 16:50:11'),
(26, NULL, '2021-09-01 17:58:30'),
(27, NULL, '2021-09-01 17:58:43'),
(28, NULL, '2021-09-01 17:59:17'),
(29, NULL, '2021-09-01 17:59:32'),
(30, NULL, '2021-09-01 18:00:46'),
(31, NULL, '2021-09-01 18:04:35'),
(32, NULL, '2021-09-01 18:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `saleline`
--

CREATE TABLE `saleline` (
  `Id` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `SaleId` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `saleDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleline`
--

INSERT INTO `saleline` (`Id`, `ProductId`, `SaleId`, `Quantity`, `saleDateTime`) VALUES
(28, 2, 15, 12, '2020-06-23 22:42:05'),
(29, 13, 17, 12, '2021-07-23 22:42:41'),
(30, 20, 18, 2, '2021-06-23 22:43:02'),
(31, 31, 19, 2, '2021-05-23 22:43:51'),
(32, 29, 19, 40, '2021-05-23 22:43:51'),
(33, 7, 20, 3, '2021-08-22 23:07:19'),
(36, 1, 23, 1, '2021-08-24 04:56:49'),
(37, 4, 24, 10, '2021-08-28 18:09:37'),
(38, 2, 25, 3, '2021-09-01 16:50:11'),
(39, 46, 26, 10, '2021-09-01 17:58:30'),
(40, 2, 27, 30, '2021-09-01 17:58:43'),
(41, 8, 28, 2, '2021-09-01 17:59:17'),
(42, 19, 28, 3, '2021-09-01 17:59:17'),
(43, 28, 28, 5, '2021-09-01 17:59:17'),
(44, 32, 29, 10, '2021-09-01 17:59:32'),
(45, 17, 30, 10, '2021-09-01 18:00:46'),
(46, 33, 31, 5, '2021-09-01 18:04:35'),
(47, 40, 32, 10, '2021-09-01 18:17:18');

--
-- Triggers `saleline`
--
DELIMITER $$
CREATE TRIGGER `TRIG_SaleLine_Delete` BEFORE DELETE ON `saleline` FOR EACH ROW BEGIN
	UPDATE Product 
    SET 
		QuantityOnHand = QuantityOnHand + OLD.Quantity,
        QuantitySold = QuantitySold - OLD.Quantity
	WHERE Id = OLD.ProductId;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRIG_SaleLine_Insert` BEFORE INSERT ON `saleline` FOR EACH ROW BEGIN
	DECLARE msg varchar(128);
	IF NEW.Quantity < 1 THEN
		set msg = concat('TRIG_SaleLine_Insert_Checks Error:',
			'Trying to insert a non-positive value into SaleLine.Quantity: ',
            cast(NEW.Quantity as char));
	ELSE
		UPDATE Product 
		SET 
			QuantityOnHand = QuantityOnHand - NEW.Quantity,
			QuantitySold = QuantitySold + NEW.Quantity
		WHERE Id = NEW.ProductId;
	END IF;
    IF msg IS NOT NULL THEN
		signal sqlstate '45000' set message_text = msg;
	END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TRIG_SaleLine_Update` BEFORE UPDATE ON `saleline` FOR EACH ROW BEGIN
	DECLARE msg varchar(128);
	IF NEW.Quantity < 1 THEN
		set msg = concat('TRIG_SaleLine_Update_Checks Error:',
			'Trying to update a non-positive value in SaleLine.Quantity: ',
            cast(NEW.Quantity as char));
	ELSE
		UPDATE Product 
		SET 
			QuantityOnHand = QuantityOnHand + OLD.Quantity,
			QuantitySold = QuantitySold - OLD.Quantity
		WHERE Id = OLD.ProductId;
		
		UPDATE Product
		SET
			QuantityOnHand = QuantityOnHand - NEW.Quantity,
			QuantitySold = QuantitySold + NEW.Quantity
		WHERE Id = NEW.ProductId;
	END IF;
    IF msg IS NOT NULL THEN
		signal sqlstate '45000' set message_text = msg;
	END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Product_ProductGroup` (`ProductGroupId`);

--
-- Indexes for table `productgroup`
--
ALTER TABLE `productgroup`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Sale_Customer` (`CustomerId`);

--
-- Indexes for table `saleline`
--
ALTER TABLE `saleline`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_SaleLine_Product` (`ProductId`),
  ADD KEY `FK_SaleLine_Sale` (`SaleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `productgroup`
--
ALTER TABLE `productgroup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `saleline`
--
ALTER TABLE `saleline`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_Product_ProductGroup` FOREIGN KEY (`ProductGroupId`) REFERENCES `productgroup` (`Id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `Sale_Customer` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`Id`);

--
-- Constraints for table `saleline`
--
ALTER TABLE `saleline`
  ADD CONSTRAINT `FK_SaleLine_Product` FOREIGN KEY (`ProductId`) REFERENCES `product` (`Id`),
  ADD CONSTRAINT `FK_SaleLine_Sale` FOREIGN KEY (`SaleId`) REFERENCES `sale` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
