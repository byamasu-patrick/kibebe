-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 08:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11496636_donline`
--

-- --------------------------------------------------------

--
-- Table structure for table `kibebe_person`
--

CREATE TABLE `kibebe_person` (
  `ID` int(11) NOT NULL,
  `Full_Name` varchar(250) NOT NULL,
  `Phone_Number` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `profile_Picture` varchar(20) NOT NULL,
  `Date_Registered` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kibebe_person`
--

INSERT INTO `kibebe_person` (`ID`, `Full_Name`, `Phone_Number`, `Password`, `profile_Picture`, `Date_Registered`) VALUES
(1, 'Byamasu Patrick', '0996668149', 'patrick', 'user_images/profile/', ' Wed Jan 22 2020');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id_P` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(255) NOT NULL,
  `Product_Price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id_P`, `Product_Id`, `Product_Name`, `Product_Price`) VALUES
(26, 2, ' Jacket', 453),
(27, 3, ' Laptop bag', 300),
(28, 4, ' Books', 250);

-- --------------------------------------------------------

--
-- Table structure for table `product_material_connect`
--

CREATE TABLE `product_material_connect` (
  `Connect_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Material_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_material_connect`
--

INSERT INTO `product_material_connect` (`Connect_Id`, `Product_Id`, `Material_Id`) VALUES
(63, 2, 4),
(64, 2, 5),
(65, 2, 6),
(66, 2, 8),
(67, 2, 88),
(68, 2, 23),
(69, 2, 56),
(70, 3, 9),
(71, 3, 10),
(72, 3, 34),
(73, 3, 32),
(74, 3, 45),
(75, 3, 67),
(76, 3, 0),
(77, 4, 33),
(78, 4, 36),
(79, 4, 38),
(80, 4, 43),
(81, 4, 42),
(82, 4, 103),
(83, 4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `Id_R` int(11) NOT NULL,
  `Material_Id` int(11) NOT NULL,
  `Material_Name` varchar(255) NOT NULL,
  `Material_Price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`Id_R`, `Material_Id`, `Material_Name`, `Material_Price`) VALUES
(23, 4, 'Kitambala', 700),
(24, 5, 'Uzi', 250),
(25, 6, 'Kikwembe', 4000),
(26, 7, 'Machine', 200000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kibebe_person`
--
ALTER TABLE `kibebe_person`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Phone_Number` (`Phone_Number`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id_P`);

--
-- Indexes for table `product_material_connect`
--
ALTER TABLE `product_material_connect`
  ADD PRIMARY KEY (`Connect_Id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`Id_R`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kibebe_person`
--
ALTER TABLE `kibebe_person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id_P` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_material_connect`
--
ALTER TABLE `product_material_connect`
  MODIFY `Connect_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `Id_R` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
