-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 11:24 AM
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
(1, 1, 'Panadol 500mg 100 tablets', '9.99', 95, 305, 0, 0, b'1111111111111111111111111111111'),
(2, 1, 'Panadol 500mg 50 tablets', '6.99', 250, 0, 0, 0, b'1111111111111111111111111111111'),
(3, 1, 'Panadol Rapid 20 tablets', '4.49', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(4, 1, 'Nurofen 200mg 96 tablets', '15.99', 382, 0, 0, 0, b'1111111111111111111111111111111'),
(5, 1, 'Nurofen for Children 1-5 Years Strawberry', '17.99', 37, 0, 0, 0, b'1111111111111111111111111111111'),
(6, 2, 'Lipitor 20mg Tablets 30', '6.99', 21, 0, 0, 0, b'1111111111111111111111111111111'),
(7, 2, 'Plavix 75mg Tablets 28 (a)', '7.29', 3, 0, 0, 0, b'1111111111111111111111111111111'),
(8, 3, 'Swisse Ultiboost Calcium + Vitamin D', '13.00', 411, 10, 0, 0, b'1111111111111111111111111111111'),
(9, 3, 'Herron Osteo Eze Active Plus MSM 120 Tablets', '40.83', 21, 0, 0, 0, b'1111111111111111111111111111111'),
(10, 4, 'Marc Jacobs Daisy Eau de Toilette 100ml Spray', '65.20', 7, 3, 0, 0, b'1111111111111111111111111111111'),
(11, 4, 'Calvin Klein CK One 200ml Eau de Toilette Spray', '37.99', 21, 0, 0, 0, b'1111111111111111111111111111111'),
(12, 5, 'OptiSlim VLCD Bar Choc Fudge 5 Pack', '15.50', 35, 0, 0, 0, b'1111111111111111111111111111111'),
(13, 5, 'Optislim VLCD Bars Variety 60g 15 Pack', '15.50', 37, 8, 0, 0, b'1111111111111111111111111111111'),
(14, 6, 'Colgate Toothpaste Regular Flavour 250g', '3.20', 0, 40, 0, 0, b'1111111111111111111111111111111'),
(15, 6, 'Colgate Toothpaste Total 190g', '5.55', 45, 5, 0, 0, b'1111111111111111111111111111111');

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
(1, 'Painkillers'),
(2, 'Prescription drugs'),
(3, 'Vitamins'),
(4, 'Fragrances'),
(5, 'Weight loss'),
(6, 'Dental care');

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
(1, NULL, '2020-07-13 10:21:29'),
(2, NULL, '2021-07-13 10:23:26'),
(3, NULL, '2021-08-05 10:27:32'),
(4, NULL, '2021-08-13 12:14:12'),
(5, NULL, '2021-08-14 12:18:16'),
(6, NULL, '2021-08-14 23:38:18'),
(7, NULL, '2021-08-15 16:17:08'),
(8, NULL, '2021-08-15 16:17:11'),
(9, NULL, '2021-08-16 21:00:44');

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
(1, 1, 1, 5, '2020-07-13 10:21:29'),
(2, 8, 1, 10, '2020-07-13 10:21:29'),
(3, 14, 2, 40, '2021-07-13 10:23:27'),
(4, 13, 3, 5, '2021-08-05 10:27:32'),
(5, 10, 4, 3, '2021-08-13 12:14:12'),
(6, 13, 5, 3, '2021-08-14 12:18:16'),
(7, 15, 6, 5, '2021-08-14 23:38:18'),
(8, 1, 7, 300, '2021-08-15 16:17:08');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productgroup`
--
ALTER TABLE `productgroup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saleline`
--
ALTER TABLE `saleline`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
